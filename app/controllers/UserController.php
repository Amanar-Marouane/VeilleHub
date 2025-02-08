<?php

namespace app\controllers;

use app\models\{User, Auth, Student};
use core\Mailer;

class UserController
{
    private $baseController;

    public function __construct()
    {
        $this->baseController = new BaseController;
    }

    public function register()
    {
        $email = BaseController::emailValidation($_POST['email']);
        if ($email && Auth::is_exist_email($email)) $this->baseController::redirect("/register", "error", "This email already exist");
        $flag = false;
        if (!BaseController::passwordValidation($_POST['password'])) $this->baseController::redirect("/register", "error", "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*)");
        if (!BaseController::fullnameValidation($_POST['name'])) $this->baseController::redirect("/register", "error", "Name must be between 2-50 letters and can only contain single spaces between words");
        if (!BaseController::emailValidation($_POST['email'])) $this->baseController::redirect("/register", "error", "Please Enter A Valid Email Format");
        if ($_POST["confirm_password"] != $_POST["password"]) $this->baseController::redirect("/register", "error", "Your confirmed password isn't match");
        if ($flag) $this->baseController::redirect("/register", "error", "Something went wrong, try again");

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User($_POST['name'], $_POST['email'], $password);
        if ($user->register()) $this->baseController::redirect("/login", "success", "Registering have been done successfuly, Pls wait until your account get approved");

        $this->baseController::redirect("/register", "error", "Something went wrong, try again");
    }

    public function login()
    {
        if (!BaseController::emailValidation($_POST['email'])) $this->baseController::redirect("/login", "error", "Please Enter A Valid Email Format");
        if (!BaseController::passwordValidation($_POST['password'])) $this->baseController::redirect("/login", "error", "Check Your Email Or Password");

        if ($info = Auth::login($_POST["email"], $_POST['password'])) {
            if ($info["account_status"] == "Pending") $this->baseController::redirect("/login", "error", "Wait until your account get approved, this may take 1 day");
            $_SESSION['user_id'] = $info["user_id"];
            $_SESSION['account_type'] = $info["account_type"];
            $this->baseController::redirect("/calendar", "success", "You loged in successfuly");
        }
        $this->baseController::redirect("/login", "error", "Check Your Email Or Password");
    }

    public function logout()
    {
        Auth::logout();
        $this->baseController::redirect("/login", "success", "");
    }

    public function resetPwd()
    {
        $email = $_POST['email'];
        if (!Auth::is_exist_email($email)) {
            $this->baseController::redirect("/reset", "error", "Check your info");
        }
        $mailer = new Mailer;
        $mailer->sendVerification($email);
        $this->baseController::redirect("/reset/verify/$email", "success", "The verification code has been sent to your account, Please checked");
    }

    public function verify($email)
    {
        include __DIR__ . "/../views/auth/uidVerification.view.php";
    }

    public function codeCheck()
    {
        if (!BaseController::emailValidation($_POST['email'])) $this->baseController::redirect("/login", "error", "Something Went Wrong");
        $email = $_POST['email'];
        $code = $_POST['code'];
        if (Auth::codeChecker($email, $code)) {
            $this->baseController::redirect("/reset/newpsw/$email", "success", "");
        } else {
            $this->baseController::redirect("/reset/verify/$email", "error", "You have 3 more tries, and you'll be freezed 4h");
        }
    }

    public function newPsw($email)
    {
        include __DIR__ . "/../views/auth/newPassword.view.php";
    }

    public function reset()
    {
        if (!BaseController::emailValidation($_POST['email'])) $this->baseController::redirect("/login", "error", "Something Went Wrong");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!$old_password = Auth::user_password($email)) $this->baseController::redirect("/login", "error", "Something Went Wrong");
        if (password_verify($password, $old_password["password"])) $this->baseController::redirect("/reset/newpsw/$email", "error", "You Can't Use Your Old Password");
        if (Auth::reset($email, $password)) $this->baseController::redirect("/login", "success", "Code has been reset successfuly");
        else $this->baseController::redirect("/login", "error", "Something Went Wrong");
    }

    public function dashboradStudent()
    {
        $student = new Student;
        $info = $student->dashboradStudent($_SESSION['user_id']);
        extract($info);
        if ($upcoming_veille) extract($upcoming_veille, EXTR_PREFIX_ALL, "upcoming");
        else {
            $upcoming_title = "There's No Upcoming Veilles At The Moment (Check Later)";
            $upcoming_start = "??:??:????";
            $upcoming_end = "??:??:????";
        }
        include __DIR__ . "/../views/presentations/student-veille-dashboard.view.php";
    }

    public function statiquesDashboradStudent()
    {
        $student = new Student;
        $info = $student->statiquesDashboradStudent($_SESSION['user_id']);
        extract($info);
        extract($overview);
        extract($total_students);

        include __DIR__ . "/../views/presentations/studentStatistiqueDashboard.view.php";
    }
}

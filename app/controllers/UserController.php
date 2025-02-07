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
        // $flag = false;
        // if (!BaseController::passwordValidation($_POST['password'])) $flag = true;
        // if (!BaseController::fullnameValidation($_POST['name'])) $flag = true;
        // if (!BaseController::emailValidation($_POST['email'])) $flag = true;
        // if ($flag) {
        //     $this->baseController::redirect("/register", "error", "Something went wrong, try again");
        // }
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User($_POST['name'], $_POST['email'], $password);
        if ($user->register()) $this->baseController::redirect("/login", "success", "Registering have been done successfuly, Pls wait until your account get approved");
        $this->baseController::redirect("/register", "error", "Something went wrong, try again");
    }

    public function login()
    {
        if ($info = Auth::login($_POST["email"], $_POST['password'])) {
            if ($info["account_status"] == "Pending") $this->baseController::redirect("/login", "error", "Wait until your account get approved, this may take 1 day");
            $_SESSION['user_id'] = $info["user_id"];
            $_SESSION['account_type'] = $info["account_type"];
            $this->baseController::redirect("/calendar", "success", "You loged in successfuly");
        }
        $this->baseController::redirect("/login", "error", "Check your info");
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
        $email = $_POST['email'];
        $code = $_POST['code'];
        if (Auth::codeChecker($email, $code)) {
            $this->baseController::redirect("/reset/newpsw/$email", "success", "");
        } else {
            $this->baseController::redirect("/reset/verify/$email", "error", "You have 3 more try, and you'll be freezed 4h");
        }
    }

    public function newPsw($email)
    {
        include __DIR__ . "/../views/auth/newPassword.view.php";
    }

    public function reset()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (Auth::reset($email, $password)) $this->baseController::redirect("/login", "success", "Code has been reset successfuly");
        else $this->baseController::redirect("/login", "error", "Something Went Wrong");
    }

    public function dashboradStudent(){
        $student = new Student;
        $info = $student->dashboradStudent($_SESSION['user_id']);
        extract($info);
        if($upcoming_veille) extract($upcoming_veille, EXTR_PREFIX_ALL, "upcoming");
        else {
            $upcoming_title = "???????????????";
            $upcoming_start = "??:??:????";
            $upcoming_end = "??:??:????";
        }
        include __DIR__ . "/../views/presentations/student-veille-dashboard.view.php";
    }
}

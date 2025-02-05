<?php

namespace app\controllers;

use app\models\{User, Auth};

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
            if($info["account_status"] == "Pending") $this->baseController::redirect("/login", "error", "Wait until your account get approved, this may take 1 day");
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
}

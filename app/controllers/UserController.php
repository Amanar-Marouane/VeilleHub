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
        if ($user->register()) $this->baseController::redirect("/calendar", "success", "Registering have been done successfuly");
        $this->baseController::redirect("/register", "error", "Something went wrong, try again");
    }

    public function login()
    {
        if ($user_id = Auth::login($_POST["email"], $_POST['password'])) {
            $_SESSION['user_id'] = $user_id;
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

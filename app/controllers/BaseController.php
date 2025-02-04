<?php

namespace app\controllers;

class BaseController
{

    public static function redirect($location, $sessionKey, $message)
    {
        $_SESSION[$sessionKey] = $message;
        header("Location: $location");
        exit;
    }

    public static function passwordValidation($password)
    {
        if (!empty($password)) {
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/", $password)) {
                return $password;
            }
        }
        return false;
    }

    public static function emailValidation($email)
    {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $email;
            }
        }
        return false;
    }

    public static function fullnameValidation($fullname)
    {
        if (!empty($fullname)) {
            if (preg_match("/^[A-Za-z]{2,50}(?: [A-Za-z]+)*$/", $fullname)) {
                return $fullname;
            }
        }
        return false;
    }
}

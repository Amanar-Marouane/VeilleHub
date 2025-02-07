<?php

namespace app\controllers;

use core\Db;

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

    public static function isWithin48Hours()
    {
        $instence = new Db;
        $stmt = "SELECT users.full_name, users.email, veilles.*
                FROM assigning
                JOIN veilles ON veilles.veille_id = assigning.veille_id
                JOIN users ON users.user_id = assigning.student_id
                WHERE TIMESTAMPDIFF(HOUR, veilles.start, CURRENT_TIMESTAMP) <= 48";
        return $instence->fetchAll($stmt);
    }
}

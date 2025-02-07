<?php

namespace app\models;

use core\Db;

class Auth
{

    public static function login($email, $password)
    {
        $instence = new Db;
        $stmt = "SELECT password, user_id, account_type, account_status FROM users WHERE email = ?";
        $bindParam = [$email];

        $info = $instence->fetch($stmt, $bindParam);
        $co_password = $info["password"];
        if (!$co_password) return false;
        if (password_verify($password, $co_password)) return $info;
        return false;
    }

    public static function logout()
    {
        session_destroy();
    }

    public static function check()
    {
        return isset($_SESSION["user_id"]);
    }

    public static function codeChecker($email, $code)
    {
        $instence = new Db;
        $stmt = "SELECT code FROM verification WHERE email = ?";
        $codeV = $instence->fetch($stmt, [$email]);
        return $codeV["code"] == $code;
    }

    public static function reset($email, $password)
    {
        $hashed_psw = password_hash($password, PASSWORD_DEFAULT);
        $instence = new Db;
        $stmt = "UPDATE users SET password = ? WHERE email = ?";
        return $instence->query($stmt, [$hashed_psw, $email]);
    }

    public static function is_exist_email($email) {
        $instence = new Db;
        $stmt = "SELECT email FROM users WHERE email = ?";
        return $instence->fetch($stmt, [$email]);
    }
}

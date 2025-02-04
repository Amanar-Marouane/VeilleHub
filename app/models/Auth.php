<?php

namespace app\models;

use core\Db;

class Auth
{

    public static function login($email, $password)
    {
        $instence = new Db;
        $stmt = "SELECT password, user_id FROM users WHERE email = ?";
        $bindParam = [$email];

        $info = $instence->fetch($stmt, $bindParam);
        $co_password = $info["password"];
        if (!$co_password) return false;
        if (password_verify($password, $co_password)) return $info['user_id'];
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
}

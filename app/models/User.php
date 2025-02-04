<?php

namespace app\models;

use core\Db;

class User
{
    private $full_name;
    private $email;
    private $password;
    private $pdo;

    public function __construct($full_name, $email, $password)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
        $this->pdo = new Db;
    }

    public function register()
    {
        $bindParams = [$this->full_name, $this->email, $this->password];
        $stmt = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";

        return $this->pdo->query($stmt, $bindParams);
    }
}

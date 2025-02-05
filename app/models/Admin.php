<?php

namespace app\models;

use core\Db;

class Admin
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Db;
    }

    public function getAllAccounts()
    {
        $stmt = "SELECT * FROM  users WHERE account_type = 'Student'";
        return $this->pdo->fetchAll($stmt);
    }
}

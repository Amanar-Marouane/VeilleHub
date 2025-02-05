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

    public function delete($id)
    {
        $stmt = "DELETE FROM users WHERE user_id = ?";
        return $this->pdo->query($stmt, [$id]);
    }

    public function approve($id)
    {
        $stmt = "UPDATE users
                 set account_status = 'Approved' WHERE user_id = ?";
        return $this->pdo->query($stmt, [$id]);
    }
}

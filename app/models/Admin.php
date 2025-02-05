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

    public function delete($id, $target, $table)
    {
        $stmt = "DELETE FROM $table WHERE $target = ?";
        return $this->pdo->query($stmt, [$id]);
    }

    public function approve($id)
    {
        $stmt = "UPDATE users
                 set account_status = 'Approved' WHERE user_id = ?";
        return $this->pdo->query($stmt, [$id]);
    }

    public function getSuggestions()
    {
        $stmt = "SELECT * FROM  suggestions";
        return $this->pdo->fetchAll($stmt);
    }
}

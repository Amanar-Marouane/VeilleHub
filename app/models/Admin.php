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

    public function assign(array $students, $veille_id)
    {
        $this->pdo->transaction();
        $stmt = "DELETE FROM assigning WHERE veille_id = ?";
        $this->pdo->query($stmt, [$veille_id]);
        foreach ($students as $student_id) {
            $stmt = "INSERT INTO assigning (student_id, veille_id) VALUES (?, ?)";
            if (!$this->pdo->query($stmt, [$student_id, $veille_id])) $this->pdo->rollback();
        }
        return $this->pdo->commit();
    }

    public function getAllAssignments()
    {
        $stmt = "SELECT * FROM assigning";
        return $this->pdo->fetchAll($stmt);
    }
}

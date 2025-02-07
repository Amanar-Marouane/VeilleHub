<?php

namespace app\models;

use core\Db;

class Student extends User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Db;
    }

    public function dashboradStudent($student_id)
    {
        $into = [];
        $stmt = "SELECT veilles.* 
                FROM veilles
                JOIN assigning ON assigning.veille_id = veilles.veille_id
                WHERE assigning.student_id = ?";
        $info["assigned_veilles"] = $this->pdo->fetchAll($stmt, [$student_id]);

        $stmt = "SELECT veilles.* 
                FROM veilles
                JOIN assigning ON assigning.veille_id = veilles.veille_id
                WHERE assigning.student_id = ?
                AND start > CURRENT_TIMESTAMP";
        $info["upcoming_veille"] = $this->pdo->fetch($stmt, [$student_id]);

        return $info;
    }
}

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
                WHERE assigning.student_id = ?
                AND veilles.start > CURRENT_TIMESTAMP
                OR CURRENT_TIMESTAMP < veilles.end
                GROUP BY veilles.veille_id";
        $info["assigned_veilles"] = $this->pdo->fetchAll($stmt, [$student_id]);

        $stmt = "SELECT veilles.* 
                FROM veilles
                JOIN assigning ON assigning.veille_id = veilles.veille_id
                WHERE assigning.student_id = ?
                AND start > CURRENT_TIMESTAMP
                OR CURRENT_TIMESTAMP < end
                ORDER BY start DESC";
        $info["upcoming_veille"] = $this->pdo->fetch($stmt, [$student_id]);

        return $info;
    }

    public function statiquesDashboradStudent($student_id)
    {
        $info = [];
        $stmt = "SELECT student_id, participition_count,
                (
                    SELECT COUNT(DISTINCT participation_count) 
                        FROM (
                            SELECT student_id, COUNT(*) AS participation_count
                            FROM assigning
                            GROUP BY student_id
                        ) AS ranks
                        WHERE ranks.participation_count > student_participations.participition_count
                ) + 1 AS rank_position
                FROM (
                    SELECT student_id, COUNT(student_id) AS participition_count
                    FROM assigning
                    GROUP BY student_id
                    ORDER BY participition_count DESC
                ) AS student_participations
                WHERE student_id = ?";
        $info["overview"] = $this->pdo->fetch($stmt, [$student_id]);

        $stmt = "SELECT COUNT(user_id) AS total_students FROM users";
        $info["total_students"] = $this->pdo->fetch($stmt);
        
        return $info;
    }
}

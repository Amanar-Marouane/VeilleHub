<?php

namespace app\models;

use Exception;
use core\Db;

class Presentation
{

    private $title;
    private $description;

    public function set($property)
    {
        if (property_exists($this, $property)) {
            $this->$property = $property;
        } else {
            throw new Exception("Property doesn't exists");
        }
    }

    public function get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new Exception("Property doesn't exists");
        }
    }

    public static function getAll()
    {
        $instence = new Db;
        $stmt = "SELECT * FROM veilles";
        return $instence->fetchAll($stmt);
    }

    public static function statistiques()
    {
        $instence = new Db;
        $info = [];
        $stmt = "SELECT COUNT(veille_id) AS total_veilles FROM veilles";
        $info['total_veilles'] = $instence->fetch($stmt);

        $stmt = "SELECT COUNT(suggest_id) AS total_suggestions FROM suggestions";
        $info['total_suggestions'] = $instence->fetch($stmt);

        $stmt = "SELECT users.full_name, COUNT(assigning.student_id) AS veille_count
                FROM users
                JOIN assigning ON users.user_id = assigning.student_id
                GROUP BY users.full_name
                LIMIT 3";
        $info['top'] = $instence->fetchAll($stmt);

        $stmt = "SELECT 
                (COUNT(DISTINCT assigning.student_id) / COUNT(DISTINCT users.user_id)) * 100 AS participation_rate
                FROM users
                LEFT JOIN assigning ON users.user_id = assigning.student_id
                WHERE users.account_type != 'Admin'";
        $info['participation_rate'] = $instence->fetch($stmt);
        return $info;
    }
}

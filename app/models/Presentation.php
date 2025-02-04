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

    public static function getAll(){
        $instence = new Db;
        $stmt = "SELECT * FROM veilles";
        return $instence->fetchAll($stmt);
    }
}

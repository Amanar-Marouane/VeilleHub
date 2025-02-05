<?php

namespace app\models;

use core\Db;

class Subject
{
    private $title;
    private $start;
    private $end;
    private $pdo;

    public function __construct($title, $start, $end)
    {
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
        $this->pdo = new Db;
    }

    public function create()
    {
        $stmt = "INSERT INTO veilles (title, start, end) VALUES (?, ?, ?)";
        return $this->pdo->query($stmt, [$this->title, $this->start, $this->end]);
    }

    public function getLastVeille()
    {
        $stmt = "select * from veilles ORDER BY start desc limit 1";
        return $this->pdo->fetch($stmt);
    }
}

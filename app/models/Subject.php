<?php

namespace app\models;

use core\Db;

class Subject
{
    private $title;
    private $note;
    private $start;
    private $end;
    private $pdo;

    public function __construct($title = '', $start = '', $end = '', $note = "")
    {
        $this->pdo = new Db;
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
        $this->note = $note;
    }

    public function create()
    {
        $stmt = "INSERT INTO veilles (title, start, end) VALUES (?, ?, ?)";
        return $this->pdo->query($stmt, [$this->title, $this->start, $this->end]);
    }

    public function getLastVeille()
    {
        $stmt = "SELECT * FROM veilles ORDER BY veille_id DESC LIMIT 1";
        return $this->pdo->fetch($stmt);
    }

    public function getNextVeille()
    {
        $stmt = "SELECT * FROM veilles 
                WHERE start > CURRENT_TIMESTAMP 
                ORDER BY start ASC 
                LIMIT 1";
        return $this->pdo->fetch($stmt);
    }

    public function approve($id)
    {

        $this->pdo->transaction();
        $stmt = "INSERT veilles (title)
                 VALUES ((SELECT suggest_content FROM suggestions WHERE suggest_id = ?))";
        if (!$this->pdo->query($stmt, [$id])) $this->pdo->rollback();

        $stmt = "DELETE FROM suggestions WHERE suggest_id = ?";
        if (!$this->pdo->query($stmt, [$id])) $this->pdo->rollback();
        return $this->pdo->commit();
    }

    public function getAllVeilles()
    {
        $stmt = "SELECT * FROM veilles";
        return $this->pdo->fetchAll($stmt);
    }

    public function update($id)
    {
        $stmt = "UPDATE veilles
                SET title = ?, start = ?, end = ?
                WHERE veille_id = ?";
        return $this->pdo->query($stmt, [$this->title, $this->start, $this->end, $id]);
    }

    public function suggest()
    {
        $stmt = "INSERT INTO suggestions (suggest_content, note) VALUES (?, ?)";
        return $this->pdo->query($stmt, [$this->title, $this->note]);
    }
}

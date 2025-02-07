<?php

namespace core;

use PDO;
use Dotenv\Dotenv;
use PDOException;

class Db
{
    private $pdo;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        extract($_ENV);
        $servername = $DB_SERVERNAME;
        $username = $DB_USERNAME;
        $password = $DB_PASSWORD;
        $dbname = $DB_NAME;
        $options = json_decode($DB_OPTIONS, true);

        $dsn = "mysql:host=$servername;dbname=$dbname";

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function query($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($query, $params = [])
    {
        return $this->query($query, $params)->fetchAll();
    }

    public function fetch($query, $params = [])
    {
        return $this->query($query, $params)->fetch();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function transaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function commit()
    {
        return $this->pdo->commit();
    }

    public function rollback()
    {
        return $this->pdo->rollBack();
    }
}

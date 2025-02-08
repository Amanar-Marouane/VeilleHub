<?php

namespace core\Middleware;

use Dotenv\Dotenv;

class System
{

    public function handle()
    {
        header('Content-Type: application/json');

        $dotenv = Dotenv::createImmutable(__DIR__ . "/..");
        $dotenv->load();
        extract($_ENV);

        $received_token = $_SERVER['HTTP_X_SYSTEM_REQUEST'] ?? null;

        if (is_null($received_token) || $X_SYSTEM_REQUEST != $received_token) {
            header("Location: /calendar");
        }
    }
}

<?php

namespace app\controllers;

use app\models\Presentation;
use Dotenv\Dotenv;

class PresentationController
{

    public function getAll()
    {
        $veilles = Presentation::getAll();
        echo json_encode($veilles);
    }

    public function statistiques()
    {
        $info = Presentation::statistiques();
        extract($info);
        extract($total_veilles);
        extract($total_suggestions);
        extract($participation_rate);

        include __DIR__ . "/../views/presentations/statistiqueDashboard.view.php";
    }

    public function calendar()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../core/");
        $dotenv->load();
        extract($_ENV);

        include __DIR__ . "/../views/presentations/calender.view.php";
    }
}

<?php

namespace app\controllers;

use app\models\Presentation;

class PresentationController
{

    public function getAll()
    {
        $veilles = Presentation::getAll();
        echo json_encode($veilles);
    }

    public function statistiques(){
        $info = Presentation::statistiques();
        extract($info);
        extract($total_veilles);
        extract($total_suggestions);
        extract($participation_rate);

        include __DIR__ . "/../views/presentations/statistiqueDashboard.php";
    }
}

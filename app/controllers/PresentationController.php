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
}

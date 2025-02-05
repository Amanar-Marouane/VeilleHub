<?php

namespace app\controllers;

use app\models\Subject;

class SubjectController
{
    private $baseController;

    public function __construct()
    {
        $this->baseController = new BaseController;
    }

    public function create()
    {
        $subject = new Subject($_POST['title'], $_POST['start'], $_POST['end']);
        if ($subject->create()) $this->baseController->redirect("/dashboard/veilles", "success", "The veille has been added successfuly!");
        else $this->baseController->redirect("/dashboard/veilles", "error", "Something went wrong, try again");
    }
}

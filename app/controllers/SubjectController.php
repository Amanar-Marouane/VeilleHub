<?php

namespace app\controllers;

use app\models\{Subject, Admin};

class SubjectController
{
    private $baseController;
    private $admin;

    public function __construct()
    {
        $this->baseController = new BaseController;
        $this->admin = new Admin;
    }

    public function create()
    {
        $subject = new Subject($_POST['title'], $_POST['start'], $_POST['end']);
        if ($subject->create()) $this->baseController->redirect("/dashboard/veilles", "success", "The veille has been added successfuly!");
        else $this->baseController->redirect("/dashboard/veilles", "error", "Something went wrong, try again");
    }

    public function delete()
    {
        $id = $_POST['veille_id'];
        if ($this->admin->delete($id, "veille_id", "veilles")) $this->baseController->redirect("/dashboard/veilles", "success", "The veille has been deleted successfuly!");
        else $this->baseController->redirect("/dashboard/veilles", "error", "Something went wrong, try again");
    }

    public function update()
    {
        $subject = new Subject($_POST['title'], $_POST['start'], $_POST['end']);
        $id = $_POST['veille_id'];
        if ($subject->update($id)) $this->baseController->redirect("/dashboard/veilles", "success", "The veille has been updated successfuly!");
        else $this->baseController->redirect("/dashboard/veilles", "error", "Something went wrong, try again");
    }

    public function assign()
    {
        $students = $_POST["students"];
        $veille_id = $_POST['veille_id'];
        if ($this->admin->assign($students, $veille_id)) $this->baseController->redirect("/dashboard/veilles", "success", "The veille has been assigned successfuly!");
        else $this->baseController->redirect("/dashboard/veilles", "error", "Something went wrong, try again");
    }

    public function suggest()
    {
        $suggest = new Subject($_POST['title'], "", "", $_POST['note']);
        if ($suggest->suggest()) $this->baseController->redirect("/dashboard/student", "success", "The sugget has been submited successfuly!");
        else $this->baseController->redirect("/dashboard/student", "error", "Something went wrong!");
    }
}

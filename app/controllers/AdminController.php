<?php

namespace app\controllers;

use app\models\Admin;

class AdminController
{
    private $admin;
    private $baseController;

    public function __construct()
    {
        $this->admin = new Admin;
        $this->baseController = new BaseController;
    }

    public function getAccounts()
    {
        $accounts = $this->admin->getAllAccounts();
        include __DIR__ . "/../views/presentations/accountsDashboard.view.php";
    }

    public function accountVal()
    {
        $id = $_POST['user_id'];
        $bool = (bool)(int) $_POST['action'];
        if ($bool) {
            $this->admin->approve($id);
        } else {
            $this->admin->delete($id);
        }
        //$this->baseController->redirect("dashboard/accounts", "success", "Operation has been done successfuly!");
        $this->baseController->redirect("/dashboard/accounts", "success", "Operation has been done successfuly!");
    }
}

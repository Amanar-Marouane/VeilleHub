<?php

namespace app\controllers;

use app\models\Admin;

class AdminController {
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin;
    }

    public function getAccounts(){
        $accounts = $this->admin->getAllAccounts();
        include __DIR__ . "/../views/presentations/accountsDashboard.view.php";
    }
}
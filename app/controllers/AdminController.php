<?php

namespace app\controllers;

use app\models\{Admin, Subject};

class AdminController
{
    private $admin;
    private $subject;
    private $baseController;

    public function __construct()
    {
        $this->admin = new Admin;
        $this->subject = new Subject("", "", "");
        $this->baseController = new BaseController;
    }

    public function getAccounts()
    {
        $accounts = $this->admin->getAllAccounts();

        $pending_accounts = array_filter($accounts, function ($account) {
            return $account["account_status"] == "Pending";
        });

        $approved_accounts = array_filter($accounts, function ($account) {
            return $account["account_status"] == "Approved";
        });

        include __DIR__ . "/../views/presentations/accountsDashboard.view.php";
    }

    public function accountVal()
    {
        $id = $_POST['user_id'];
        $bool = (bool)(int) $_POST['action'];
        if ($bool) {
            $this->admin->approve($id);
        } else {
            $this->admin->delete($id, "user_id", "users");
        }
        $this->baseController->redirect("/dashboard/accounts", "success", "Operation has been done successfuly!");
    }

    public function veillesManage()
    {
        $info["suggestions"] = $this->admin->getSuggestions();
        $info["lastVeille"] = $this->subject->getLastVeille();
        $info["nextVeille"] = $this->subject->getNextVeille();
        $info["current_veilles"] = $this->subject->getAllVeilles();
        $info["students"] = $this->admin->getAllAccounts();
        $info["assignments"] = $this->admin->getAllAssignments();
        extract($info);
        extract($lastVeille, EXTR_PREFIX_ALL, "last");
        extract($nextVeille, EXTR_PREFIX_ALL, "next");
        include __DIR__ . "/../views/presentations/veillesDashboard.view.php";
    }

    public function suggestVal()
    {
        $id = $_POST['suggest_id'];
        $bool = (bool)(int) $_POST['action'];
        if ($bool) {
            $this->subject->approve($id);
        } else {
            $this->admin->delete($id, "suggest_id", "suggestions");
        }
        $this->baseController->redirect("/dashboard/veilles", "success", "Operation has been done successfuly!");
    }
}

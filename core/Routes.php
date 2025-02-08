<?php

use app\controllers\{AdminController, PresentationController, SubjectController, UserController};

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/Router.php";

$router = new Router;

$router->route("register", "views/auth/register.view.php")->only("guest");
$router->route("register/user", "", new UserController, "register")->only("guest");
$router->route("login", "views/auth/login.view.php")->only("guest");
$router->route("login/user", "", new UserController, "login")->only("guest");
$router->route("reset", "views/auth/resetPassword.view.php")->only("guest");
$router->route("reset/password", "", new UserController, "resetPwd")->only("guest");
$router->route("reset/verify/{email}", "", new UserController, "verify")->only("guest");
$router->route("reset/check", "", new UserController, "codeCheck")->only("guest");
$router->route("reset/newpsw/{email}", "", new UserController, "newPsw")->only("guest");
$router->route("reset/force", "", new UserController, "reset")->only("guest");

$router->route("logout", "", new UserController, "logout")->only("auth");

$router->route("calendar", "", new PresentationController, "calendar");
$router->route("getall/veilles", "", new PresentationController, "getAll")->only("system");

$router->route("dashboard/veilles", "", new AdminController, "veillesManage")->only("admin");
$router->route("dashboard/veilles/create", "", new SubjectController, "create")->only("admin");
$router->route("dashboard/veilles/delete", "", new SubjectController, "delete")->only("admin");
$router->route("dashboard/veilles/update", "", new SubjectController, "update")->only("admin");
$router->route("dashboard/veilles/assign", "", new SubjectController, "assign")->only("admin");
$router->route("dashboard/suggestions/validation", "", new AdminController, "suggestVal")->only("admin");
$router->route("dashboard/accounts", "", new AdminController, "getAccounts")->only("admin");
$router->route("dashboard/accounts/validation", "", new AdminController, "accountVal")->only("admin");
$router->route("dashborad/statistiques", "", new PresentationController, "statistiques")->only("admin");

$router->route("dashboard/student", "", new UserController, "dashboradStudent")->only("student");
$router->route("dashborad/student/suggest", "", new SubjectController, "suggest")->only("student");
$router->route("dashborad/student/statistiques", "", new UserController, "statiquesDashboradStudent")->only("student");

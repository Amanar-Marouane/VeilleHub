<?php

use app\controllers\{AdminController, PresentationController, SubjectController, UserController};

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/Router.php";

$router = new Router;

$router->route("register", "views/auth/register.view.php");
$router->route("register/user", "", new UserController, "register");

$router->route("login", "views/auth/login.view.php");
$router->route("login/user", "", new UserController, "login");

$router->route("logout", "", new UserController, "logout");

$router->route("reset", "views/auth/resetPassword.view.php");
$router->route("reset/password", "", new UserController, "resetPwd");
$router->route("reset/verify/{email}", "", new UserController, "verify");
$router->route("reset/check", "", new UserController, "codeCheck");
$router->route("reset/newpsw/{email}", "", new UserController, "newPsw");
$router->route("reset/force", "", new UserController, "reset");

$router->route("calendar", "views/presentations/calender.view.php");
$router->route("getall/veilles", "", new PresentationController, "getAll");

$router->route("dashboard/veilles", "", new AdminController, "veillesManage");
$router->route("dashboard/veilles/create", "", new SubjectController, "create");
$router->route("dashboard/veilles/delete", "", new SubjectController, "delete");
$router->route("dashboard/veilles/update", "", new SubjectController, "update");
$router->route("dashboard/veilles/assign", "", new SubjectController, "assign");
$router->route("dashboard/suggestions/validation", "", new AdminController, "suggestVal");

$router->route("dashboard/accounts", "", new AdminController, "getAccounts");
$router->route("dashboard/accounts/validation", "", new AdminController, "accountVal");

$router->route("dashborad/statistiques", "", new PresentationController, "statistiques");

$router->route("dashboard/student", "", new UserController, "dashboradStudent");
$router->route("dashborad/student/suggest", "", new SubjectController, "suggest");
$router->route("dashborad/student/statistiques", "", new UserController, "statiquesDashboradStudent");

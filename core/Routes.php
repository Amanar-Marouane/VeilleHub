<?php

use app\controllers\{AdminController, PresentationController, SubjectController, UserController};

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/Router.php";

$router = new Router;
$router->route("calendar", "views/presentations/calender.view.php");
$router->route("statistiques", "", new PresentationController, "statistiques");
$router->route("dashboard/veilles", "", new AdminController, "veillesManage");
$router->route("dashboard/veilles/create", "", new SubjectController, "create");
$router->route("dashboard/veilles/delete", "", new SubjectController, "delete");
$router->route("dashboard/veilles/update", "", new SubjectController, "update");
$router->route("dashboard/veilles/assign", "", new SubjectController, "assign");
$router->route("register", "views/auth/register.view.php");
$router->route("login", "views/auth/login.view.php");
$router->route("dashboard/accounts", "", new AdminController, "getAccounts");
$router->route("register/user", "", new UserController, "register");
$router->route("login/user", "", new UserController, "login");
$router->route("getall/veilles", "", new PresentationController, "getAll");
$router->route("logout", "", new UserController, "logout");
$router->route("dashboard/accounts/validation", "", new AdminController, "accountVal");
$router->route("dashboard/suggestions/validation", "", new AdminController, "suggestVal");

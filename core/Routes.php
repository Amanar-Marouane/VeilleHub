<?php

use app\controllers\{AdminController, PresentationController, UserController};

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/Router.php";

$router = new Router;
$router->route("calendar", "views/presentations/calender.view.php");
$router->route("register", "views/auth/register.view.php");
$router->route("login", "views/auth/login.view.php");
$router->route("dashboard/accounts", "", new AdminController, "getAccounts");
$router->route("register/user", "", new UserController, "register");
$router->route("login/user", "", new UserController, "login");
$router->route("getall/veilles", "", new PresentationController, "getAll");
$router->route("logout", "", new UserController, "logout");

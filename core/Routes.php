<?php

use app\controllers\PresentationController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/Router.php";

$router = new Router;
$router->route("calendar", "views/presentations/calender.view.php");
$router->route("getAll/veilles", "", new PresentationController, "getAll", "get");

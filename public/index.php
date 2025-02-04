<?php
require_once __DIR__ . "/../core/Routes.php";

$uri = getURI();
$router->dispatch($uri);

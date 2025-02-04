<?php

function dd($value)
{
    var_dump($value);
    die();
}

function getURI()
{
    return strtolower(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
}

function messagesHandler()
{
    if (!isset($_SESSION['error'])) $_SESSION['error'] = "";
    if (!isset($_SESSION['success'])) $_SESSION['success'] = "";
}

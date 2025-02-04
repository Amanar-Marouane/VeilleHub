<?php

use function PHPSTORM_META\type;

if (PHP_SESSION_NONE) session_start();

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";

AutoLoader::autoloader();
class Router
{
    private array $routes = [];
    private array $GET = [];

    public function route(string $uri, $filePath, $class = null, $method = null, $type = null): void
    {
        $this->routes[] = [
            "uri" => $uri,
            "path" => $filePath,
            "class" => $class,
            "method" => $method,
            "type" => $type,
        ];
    }

    public function dispatch(string $uri): void
    {
        messagesHandler();
        foreach ($this->routes as $route) {
            if ($route["type"] === "get") {
                $instance = $route["class"];
                $method = $route["method"];
                call_user_func_array([$instance, $method], [$matches[1] ?? ""]);
                return;
            }
            $pattern =  preg_replace("#\{\w+\}#", "([^\/]+)", $route["uri"]);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                if (!is_null($route["class"])) {
                    $instance = $route["class"];
                    $method = $route["method"];
                    call_user_func_array([$instance, $method], [$matches[1] ?? ""]);
                    return;
                }
                include __DIR__ . "/../app/{$route["path"]}";
                return;
            }
        }
        include __DIR__ . "/../app/views/404.view.php";
    }
}

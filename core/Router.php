<?php

use core\Middleware\Middleware;

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";

AutoLoader::autoloader();
class Router
{
    private array $routes = [];

    public function route(string $uri, $filePath, $class = null, $method = null)
    {
        $this->routes[] = [
            "uri" => $uri,
            "path" => $filePath,
            "class" => $class,
            "method" => $method,
            "middleware" => null,
        ];
        return $this;
    }

    public function dispatch(string $uri): void
    {
        $middleware = new Middleware;
        messagesHandler();
        foreach ($this->routes as $route) {
            $pattern =  preg_replace("#\{\w+\}#", "([^\/]+)", $route["uri"]);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                $allowed = $route['middleware'];
                if (!is_null($allowed)) {
                    $middleware->middlewareHandler($allowed);
                };
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

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
    }
}

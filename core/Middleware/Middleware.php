<?php

namespace core\Middleware;

class Middleware{

    private $map = [
        "guest"=> Guest::class,
        "system"=> System::class,
        "student"=> Student::class,
        "admin"=> Admin::class,
        "auth" => Auth::class,
    ];

    public function middlewareHandler($key){
        (new $this->map[$key])->handle();
    }
}
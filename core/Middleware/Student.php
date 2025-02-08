<?php

namespace core\Middleware;

class Student{

    public function handle(){
        if ($_SESSION['account_type'] != "Student") {
            header("Location: /calendar");
        }
    }
}
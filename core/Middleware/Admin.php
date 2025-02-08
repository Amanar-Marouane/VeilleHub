<?php

namespace core\Middleware;

class Admin
{

    public function handle()
    {
        if ($_SESSION['account_type'] != "Admin") {
            header("Location: /calendar");
        }
    }
}

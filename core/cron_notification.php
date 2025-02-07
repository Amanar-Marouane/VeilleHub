<?php

namespace core;

use app\controllers\BaseController;

require_once __DIR__ . '/../app/controllers/BaseController.php';
require_once __DIR__ . '/../core/Db.php';
require_once __DIR__ . "/Mailer.php";
require_once __DIR__ . "/../vendor/autoload.php";

$students = BaseController::isWithin48Hours();
if (!empty($students)) {
    $mailer = new Mailer;
    foreach ($students as $student) {
        extract($student);
        $mailer->sendRemainder($email, $full_name, $title, $start, $end);
    }
} else {
    echo "No Remainder Got Sent";
}

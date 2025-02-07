<?php

namespace core;

use app\controllers\BaseController;
use PHPMailer\PHPMailer\{PHPMailer, Exception};
use Dotenv\Dotenv;
use Ramsey\Uuid\Uuid;

class Mailer
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        try {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            extract($_ENV);

            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.gmail.com';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $MAILER_USERNAME;
            $this->mail->Password   = $MAILER_PASSWORD;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port       = 587;
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendVerification($email)
    {
        $this->mail->setFrom($this->mail->Username, 'Amanar Marouane');
        $this->mail->addAddress($email);

        $this->mail->isHTML(true);
        $this->mail->Subject = 'Verification Code';
        $verification_code = Uuid::uuid4()->toString();
        $this->mail->Body    = "Your verification code is: <strong>$verification_code</strong>";

        $this->mail->send();
        $instence = new Db;
        $instence->transaction();
        try {
            $stmt = "DELETE FROM verification WHERE email = ?";
            $instence->query($stmt, [$email]);
            $stmt = "INSERT INTO verification (email, code) VALUES (?, ?)";
            $instence->query($stmt, [$email, $verification_code]);
        } catch (Exception $e) {
            $instence->rollback();
            $baseController = new BaseController;
            $baseController->redirect("/reset", "error", "Something Went Wrong");
        }
        $instence->commit();
    }

    public function sendRemainder($email, $full_name, $title, $start, $end)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Amanar Marouane');
            $this->mail->addAddress($email);

            $this->mail->isHTML(true);
            $this->mail->Subject = 'Veille Reminder';

            $formattedStart = date("d/m/Y H:i", strtotime($start));
            $formattedEnd = date("d/m/Y H:i", strtotime($end));

            $this->mail->Body = "
            <p>Hello <strong>$full_name</strong>,</p>
            <p>This is a reminder for your upcoming <strong>Veille</strong> titled <strong>\"$title\"</strong>.</p>
            <p><strong>Start:</strong> $formattedStart</p>
            <p><strong>End:</strong> $formattedEnd</p>
            <p>Make sure to prepare accordingly!</p>
            <br>
            <p>Best regards,</p>
            <p><strong>Amanar Marouane</strong></p>
        ";

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

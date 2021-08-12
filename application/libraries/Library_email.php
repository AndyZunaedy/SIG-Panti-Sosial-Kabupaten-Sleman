<?php
ob_start();
defined('BASEPATH') or exit('No direct script allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Library_email
{
     public function __construct()
    {
        log_message('debug', 'PHPMailer class is loaded');
    }

    public function ambil()
    {
        require_once APPPATH . 'third_party/PHPMailer/Exception.php';
        require_once APPPATH . 'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH . 'third_party/PHPMailer/SMTP.php';
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;

        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "junetpokemon@gmail.com";
        $mail->Password = '27071997Andy#';
        $mail->isHTML(true);
        return $mail;
    }
}

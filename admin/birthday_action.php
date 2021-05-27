<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_GET["action"]) && $_GET["action"] == "send_mail") {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = 'smtp.gmail.com'; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is depracated
    $mail->SMTPAuth = true;
    $mail->Username = 'doancongptit@gmail.com';
    $mail->Password = 'nguoilaidosongda1';
    $mail->setFrom('doancongptit@gmail.com', 'DVC');
    $mail->addAddress($_GET["gmail"]);
    $mail->addReplyTo('doancongptit@gmail.com', 'Information');
    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->Body = 'CHÚC MỪNG SINH NHẬT QUÝ KHÁCH';
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    Header("Location: ./admin_dashboard.php");
}

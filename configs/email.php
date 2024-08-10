<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

try {
    //Server settings
    //$mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = $_ENV["MAIL_HOST"];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV["MAIL_USER"];
    $mail->Password   = $_ENV["MAIL_PASSWORD"];
    $mail->SMTPSecure = $_ENV["MAIL_SMTP"];
    $mail->Port       = $_ENV["MAIL_PORT"];

    //Recipients
    $mail->setFrom($_ENV["MAIL_USER"], '');
    $mail->addAddress('');

    //Content
    $mail->isHTML(true);
    $mail->Subject = '';
    $mail->Body    = "";

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
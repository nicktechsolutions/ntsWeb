<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {

    // Gmail SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nicktechsolutions01@gmail.com';
    $mail->Password = 'zpnl tifg lknq olnt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender
    $mail->setFrom('nicktechsolutions01@gmail.com', 'Website Contact');

    // Receiver
    $mail->addAddress('nicktechsolutions01@gmail.com');

    // Reply to visitor
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // Email
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];

    $mail->Body = "
        <h3>New Contact Form Submission</h3>

        <p><strong>Name:</strong> {$_POST['name']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Message:</strong></p>

        <p>{$_POST['message']}</p>
    ";

    $mail->send();

    echo "Message sent successfully.";

} catch (Exception $e) {

    echo "Message could not be sent. {$mail->ErrorInfo}";
}

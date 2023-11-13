<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  // SMTP server
    $mail->SMTPAuth   = true;                 // Enable SMTP authentication
    $mail->Username   = 'kinyi9461@gmail.com';   // SMTP username (your Gmail email address)
    $mail->Password   = '946116499461';      // SMTP password
    $mail->SMTPSecure = 'tls';                // Enable TLS encryption; `ssl` also accepted
    $mail->Port       = 587;                  // TCP port to connect to

    // Recipients
    $mail->setFrom('kinyi9461@gmail.com', 'timothy kinyi');
    $mail->addAddress('teekinyijr@gmail.com', 'kinyi timothy'); // Add a recipient

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Subject of the email';
    $mail->Body    = 'This is the HTML message body. You can use HTML tags here.';
    $mail->AltBody = 'This is the plain text version of the email content.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

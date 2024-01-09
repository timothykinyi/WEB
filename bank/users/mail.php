<?php
$to = $emailto;
$subject = "customer support";
$message = $feedback;
$headers = "From: bazebank0@gmail.com";

$success = mail($to, $subject, $message, $headers);

if ($success) {
    echo "Email sent successfully". error_log("Your error message here", 3, "/path/to/php-error.log");
    ;
} else {
    echo "Error sending email";
}

?>
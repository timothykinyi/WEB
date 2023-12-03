<?php
$to = "kinyi9461@gmail.com";
$subject = "Subject of the email";
$message = "This is the body of the email";
$headers = "From: kinyi9461@gmail.com";

$success = mail($to, $subject, $message, $headers);

if ($success) {
    echo "Email sent successfully". error_log("Your error message here", 3, "/path/to/php-error.log");
    ;
} else {
    echo "Error sending email";
}

?>
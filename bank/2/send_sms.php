<?php
require 'vendor/autoload.php'; // Include the Twilio PHP library

use Twilio\Rest\Client;

// Twilio credentials
$accountSid = 'AC3a480cb9b0c275b1f56d5bbd245735a7';
$authToken  = 'f64dfd7d6525728ace6907f657668572';
$twilioNumber = '+13309680278';

// Create a Twilio client
$client = new Client($accountSid, $authToken);

// Your message and recipient's phone number
$message = 'Hello, this is a test message from your website!';
$recipientPhoneNumber = '+254742243421'; // Replace with the recipient's actual phone number

try {
    // Send the SMS
    $client->messages->create(
        $recipientPhoneNumber,
        [
            'from' => $twilioNumber,
            'body' => $message
        ]
    );

    echo "SMS sent successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

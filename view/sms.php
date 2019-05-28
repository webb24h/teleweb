<?php
include '../twilio/Twilio/autoload.php';
include '../config.php';

use Twilio\Twiml;

$response = new Twiml;
$response->message("Thank you for contacting Teleweb by sms. Please contact customer service at 1-866-932-2244 for any further inquiry.");
print $response;
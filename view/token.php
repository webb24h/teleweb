<?php
include '../twilio/Twilio/autoload.php';
include '../config.php';

use Twilio\Jwt\ClientToken;

// choose a random username for the connecting user
$identity = "SalesAgent".rand(9, 99999).round(microtime(true) * 1000).date('Y');

$capability = new ClientToken($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
$capability->allowClientOutgoing($TWILIO_TWIML_APP_SID);
$capability->allowClientIncoming($identity);
$token = $capability->generateToken();

// return serialized token and the user's randomly generated ID
header('Content-Type: application/json');
echo json_encode(array(
    'identity' => $identity,
    'token' => $token,
));

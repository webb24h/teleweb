<?php
include '../twilio/Twilio/autoload.php';
include '../config.php';

use Twilio\Twiml;

$response = new Twiml;

// get the phone number from the page request parameters, if given
if (isset($_REQUEST['To']) && strlen($_REQUEST['To']) > 0) {
    $number = htmlspecialchars($_REQUEST['To']);
    $dial = $response->dial(array
            ('callerId' => $TWILIO_CALLER_ID, 
                                   'record' => 'record-from-answer'
        ));

  if($number == "English Queue" || $number== "French Queue") {
     $dial->queue($number);
  } 
  elseif (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
     $dial->number($number);
    } else {
      $dial->client($number);
    }
} else {
    $response->say("Thanks for calling!");
}

header('Content-Type: text/xml');
echo $response;
<?php

/*
 * 
 * 
 * include config
 * 
 */
include_once '../config.php';
/*
 * 
 * TWILIO
 * AUTOLOAD
 * 
 * 
 * 
 */
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
include '../twilio/Twilio/autoload.php';
/*
 * 
 * PHP MAILER
 * AUTOLOAD
 * 
 * 
 * 
 */
//php mailer
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

//php mailer class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
/*
 * 
 * 
 * validation queries
 * 
 * 
 */
if (!empty($_POST)) {

    if (isset($_POST['userid']) && $_POST['validation']) {


        //post variables
        $userid = $_POST['userid'];
        $validation = $_POST['validation'];


        //set number status
        $isValid = 1;

        //check the database if there are records matching the validation number
        $stmt_invalidatepass = $conn->prepare("SELECT validation_number FROM validation_numbers WHERE user_id=? AND isValid=? ORDER BY date_created DESC LIMIT 1");
        $stmt_invalidatepass->bind_param("ii", $userid, $isValid);
        $stmt_invalidatepass->execute();
        $resultvvvid = $stmt_invalidatepass->get_result();
        $rowvalida = $resultvvvid->fetch_assoc();
        $checkNumber = $rowvalida['validation_number'];


        //compare validation number 
        if (!password_verify($validation, $checkNumber)) {
            
            //display error message
            //redirect to validate identity to activate account
                header("Location: ../index.php?validate=$userid&error");
            
        } else {
            //if numbers are matching
            $isActivated = 1;
            //1. update user isActive = 1 to activate account
            $stmt_invalidateomp = $conn->prepare("UPDATE user SET isActive=? WHERE uid=?");
            $stmt_invalidateomp->bind_param("ii", $isActivated, $userid);
            $stmt_invalidateomp->execute();
            $stmt_invalidateomp->close();
            $stmt_invalidatefin = 1;

            if ($stmt_invalidatefin == 1) {//if statement executed and finish
                //2. invalidate all validation numbers set to 0    
                //set all records isValid to 0
                $isValidnow = 0;
                $stmt_invalidatepassw = $conn->prepare("UPDATE validation_numbers SET isValid=? WHERE user_id=?");
                $stmt_invalidatepassw->bind_param("ii", $isValidnow, $userid);
                $stmt_invalidatepassw->execute();
                $stmt_invalidatepassw->close();
                $stmt_invalidatepass->close();
                $stmt_invalidatepasswfinish = 1;
            }
            
            
            if($stmt_invalidatepasswfinish == 1){
                
                //redirect to confirmation page.
                header("Location: ../index.php?confirmation=$userid&success");
            }
        }
    }
}
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
include_once '../twilio/Twilio/autoload.php';
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
 * register queries
 * 
 * 
 */
if (!empty($_POST)) {
    if (isset($_POST['first_name']) 
            && $_POST['last_name'] && $_POST['mobilePhone'] 
            && $_POST['email'] && $_POST['username'] && $_POST['company']
            && $_POST['user_level']
    ) {

        /*
         * 
         * post the variables
         * 
         * 
         */
        $first_name = mysqli_escape_string($conn,$_POST['first_name']);
        $last_name = mysqli_escape_string($conn,$_POST['last_name']);
        $mobilePhone = $_POST['mobilePhone'];
        $company = mysqli_escape_string($conn,$_POST['company']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $username = mysqli_escape_string($conn,$_POST['username']);
        $agentid = mysqli_escape_string($conn,$_POST['agentid']);
        $user_level = mysqli_escape_string($conn,$_POST['user_level']);

            //insert into database
            $updateworkerpersonals = $conn->prepare("UPDATE user SET user_level=?, company=?, username=?, first_name=?,last_name=?,email=?,mobile=? where uid=?");
            $updateworkerpersonals->bind_param("ssssssss",$user_level,$company,$username,$first_name,$last_name,$email,$mobilePhone,$agentid);
            $updateworkerpersonals->execute();
            $ok = 1;
     

        if ($ok == 1) {
             //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updateagent=$agentid&validateIdentity");
        }
    }else{
          //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updateagent=$agentidt&errorPost");
    }
}else{
        //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updateagent=$agentid&errorPost");
}
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
     if(isset($_POST['campaignName']) && $_POST['campaignType']&& $_POST['campaignTarget']
             &&$_POST['periodStart']&&$_POST['periodEnd']
                && $_POST['campaignStatus'] && $_POST['campaignid']){

        /*
         * 
         * post the variables
         * 
         * 
         */
     $campaignName = $_POST['campaignName'];
     $campaignType = $_POST['campaignType'];
     $campaignTarget = $_POST['campaignTarget'];
     $campaignStatus = $_POST['campaignStatus'];
     $campaignid = $_POST['campaignid'];
     $periodStart = $_POST['periodStart'];
     $periodEnd = $_POST['periodEnd'];

            //insert into database
            $updateworkerpersonals = $conn->prepare("UPDATE campaigns SET campaign_name=?,campaign_status=?,campaign_type=?,campaign_target=?,period_start=?,period_end=? where campaignid=?");
            $updateworkerpersonals->bind_param('sssssss',$campaignName,$campaignStatus,$campaignType,$campaignTarget,$periodStart,$periodEnd,$campaignid);
            $updateworkerpersonals->execute();
            $ok = 1;
     

        if ($ok == 1) {
             //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updatecampaign=$campaignid&successCampaign");
        }
    }else{
          //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updatecampaign=$campaignid&errorCampaign");
    }
}else{
        //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&updatecampaign=$campaignid&errorCampaign");
}
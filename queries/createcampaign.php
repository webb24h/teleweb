<?php
/*
 * 
 * TWILIO
 * AUTOLOAD
 * 
 * 
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
 * campaign queries
 * 
 * 
 */
     if(isset($_POST['campaignName']) && $_POST['campaignType']&& $_POST['campaignTarget']
             &&$_POST['periodStart']&&$_POST['periodEnd']
                && $_POST['campaignStatus'] && $_POST['workerid']){
         
         
         
              //get variables
     $campaignName = $_POST['campaignName'];
     $campaignType = $_POST['campaignType'];
     $campaignTarget = $_POST['campaignTarget'];
     $campaignStatus = $_POST['campaignStatus'];
     $workerid = $_POST['workerid'];
     $periodStart = $_POST['periodStart'];
     $periodEnd = $_POST['periodEnd'];
     
     //insert into sales_campaigns
      $usernotif_stmt = $conn->prepare("INSERT INTO campaigns (updatedByWorkerID,campaign_name,campaign_status,campaign_type,campaign_target,period_start,period_end) VALUES (?,?,?,?,?,?,?)");
            $usernotif_stmt ->bind_param('sssssss',$workerid,$campaignName,$campaignStatus,$campaignType,$campaignTarget,$periodStart,$periodEnd);
            $usernotif_stmt ->execute();
            $usernotif_stmt ->close();
            $usernotif_stmt_finish = 1; 
         
     
            if($usernotif_stmt_finish==1){
                //redirect
                    header('Location: ../index.php?callcenter&createnewcampaign&successCampaign');
                     exit();
            }else{
                //redirect
                    header('Location: ../index.php?callcenter&createnewcampaign&errorCampaign');
                     exit();
            }
     
 }else{
            //redirect
                    header('Location: ../index.php?callcenter&createnewcampaign&errorCampaign');
                     exit();
 }
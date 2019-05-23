<?php ob_start();
/*************************************************************************
 * 
 * TELEWEB 
 * CURRENT VERSION : 1.0 \\ teleweb ultra light
 * 
 * LICENSE : GNU GENERAL PUBLIC LICENSE
 * Read More On GNU GENERAL PUBLIC LICENSE at https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Copyright (C) [2019] Teleweb Systems initiative of Webb24h Incorporated
 * All Rights Reserved.
 * 
 * Written by Marie-Eva BB Volmar <marie-eva@webb24h.com>, May 2019
 * Official launch date : May 17th 2019
 * For support contact us at teleweb@webb24h.com
 * 
 * Thanks for using Teleweb. 
 * No classes. No hassle. 
 * Pure procedural PHP. Haha YUP LOL!
 * Still, I followed a certain OOP logic to avoid repetition, so no worries. 
 * There is a method to the madness. 
 * Breathe, take your time and you will see magic.
 * 
 * I had fun and by the way... simplicity works ^^
 *
 * God bless and YOU ARE LOVED. I love you.
 **************************************************************************/
/*
 * 
 * HEADER_SENT
 * SET CONTENT TYPE
 * 
 */
header('Content-Type: text/html; charset=utf-8');
/*
 * 
 * Access-Control-Allow-Origin
 * 
 */
header("Access-Control-Allow-Origin: *");
/*
 * 
 * Software current version
 * 
 * This is currently Teleweb light or Teleweb 1.0
 * 
 * 
 */
$softwareversion = '1.0';
/*
 * 
 * application status parameters
 * set to 0 for development
 * set to 1 for production 
 * 
 * 
 */
$appstatus = 0;
/*
 * 
 * 
 * 
 ******************************
 * 
 * 
 * ERROR REPORTING
 * 
 * set 0 for off
 * set 1 for on
 * 
 ******************************
 * 
 */
$errorReporting = 0;
/*
 * 
 * 
 */
if($errorReporting==1){
/* 
 * 
 * 
 * ini_set 
 * display_errors
 * 
 * 
 * 
 */
ini_set('display_errors', 1); 
ini_set('display_errors', 'On');
/* 
 * 
 * 
 * ini_set 
 * html_errors
 * 
 * 
 * 
 */
ini_set('html_errors', 0);
/* 
 * 
 *
 * 
 * 
 * 
 * ini_set 
 * 
 * log_errors
 * 
 * 
 * 
 */
ini_set('log_errors',-1); 
/* 
 * 
 *
 * 
 * 
 * 
 * error_reporting 
 * 
 * E_ALL
 * 
 * 
 * 
 */
error_reporting(E_ALL); 
/* 
 * 
 *
 * 
 * 
 * 
 * Shutdown Handler 
 * Function
 * 
 * 
 * 
 */
function ShutdownHandler()
{
    if(@is_array($error = @error_get_last()))
    {
        return(@call_user_func_array('ErrorHandler', $error));
    };

    return(TRUE);
};

register_shutdown_function('ShutdownHandler');
/* 
 * 
 *
 * 
 * 
 * 
 * mysqli_report
 * 
 * MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT
 * 
 * 
 */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
}
/*
 * 
 * 
 * 
 ******************************
 * 
 * 
 * DATABASE PARAMETERS
 * 
 * 
 * 
 * 
 ******************************
 */
if($appstatus==0){
/*
 * 
 * database parameters
 * server name
 * development
 * 
 * 
 * 
 */
$s345='';
}else{
/*
 * 
 * database parameters
 * server name
 * production
 * 
 * 
 * 
 */    
$s345='';    
}
/*
 * 
 * database 
 * username
 * 
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * database 
 * username
 * development
 * 
 * 
 */    
$u345 = "";
}else{
/*
 * 
 * database 
 * username
 * production
 * 
 * 
 */      
$u345 = "";    
}
/*
 * 
 * database 
 * password
 * 
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * database 
 * password
 * development
 * 
 * 
 */    
$p345 = "";
}else{
/*
 * 
 * database 
 * password
 * production
 * 
 * 
 */    
$p345 = "";   
}
/*
 * 
 * database 
 * database name
 * 
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * database 
 * database name
 * development
 * 
 * 
 */    
$d345 = "";
}else{
/*
 * 
 * database 
 * database name
 * production
 * 
 * 
 */      
$d345 = "";    
}
/*
 * 
 * database 
 * connection parameters
 * 
 * 
 * servername
 */
$servername = $s345;
/*
 * 
 * database 
 * connection parameters
 * 
 * 
 * username
 */
$username = $u345;
/*
 * 
 * database 
 * connection parameters
 * 
 * 
 * password
 */
$password = $p345;
/*
 * 
 * database 
 * connection parameters
 * 
 * 
 * database name
 */
$dbname = $d345;
/*
 * 
 * database 
 * create connection
 * 
 * 
 * 
 */
$conn = new mysqli($servername, $username, $password, $dbname);
/*
 * 
 * database 
 * check connection
 * 
 * 
 * 
 */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
 * 
 * 
 * 
 ******************************
 * 
 * 
 * TWILIO ACCOUNT PARAMETERS
 * 
 * To be able to deploy this app online successfully
 * You need a twilio account
 * Sign up and get a twilio number for free
 * Visit Twilio : http://twilio.com/
 *
 * 
 * 
 ******************************/
/*
 * 
 * twilio account sid
 * 
 * 
 * 
 */
$TWILIO_ACCOUNT_SID = '';
/*
 * 
 * twilio account token
 * 
 * 
 * 
 */
$TWILIO_AUTH_TOKEN = '';
/*
 * 
 * twilio twiml app sid
 * 
 * 
 * 
 */
$TWILIO_TWIML_APP_SID = '';
/*
 * 
 * twilio workspace sid
 * 
 * Use this if you intend on using the Task Router
 * Otherwise leave it as is
 * 
 */
//$TWILIO_WORKSPACE_SID= '';
/*
 * 
 * twilio caller id
 * 
 * Your twilio caller id is the phone number you have purchased
 * The proper syntax is +16667778888
 * You must add the + and your area code
 * 
 */
$TWILIO_CALLER_ID = '';
/*
 * 
 * twilio call port status
 * set to 1 to open port
 * set to 0 to close port
 * 
 */
$twilioStatus = 1;
/*
 * 
 * 
 * 
 ******************************
 * 
 * 
 * PHP MAILER PARAMETERS
 * 
 * For all troubleshooting options
 * And all other options
 * Visit : https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting
 *
 * 
 * 
 ******************************/
/*
 * 
 * php mailer parameters
 * hostname
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * php mailer parameters
 * hostname
 * development
 * test or send using gmail
 */    
$smtphost = 'smtp.gmail.com';
}else{
/*
 * 
 * php mailer parameters
 * hostname
 * production
 * send using professional email
 * find your host provider smtp host name
 * example : send.one.com
 * 
 */       
$smtphost = '';   
}
/*
 * 
 * php mailer parameters
 * encryption
 * tls
 * leave that uncommented if using tls
 */
$smtpencryption = 'tls';
/*
 * 
 * php mailer parameters
 * smtp_username
 * smtp_email
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * php mailer parameters
 * smtp_username
 * smtp_email
 * development
 * This the email you use to send email for testing 
 * OR can use same one for production
 * Example : myemail@gmail.com
 * 
 */    
$smtpusername = '';
}else
 if($appstatus==0){
/*
 * 
 * php mailer parameters
 * smtp_username
 * smtp_email
 * production
 * eg : info@mycompany.com
 */       
$smtpusername = '';    
}
/*
 * 
 * php mailer parameters
 * password
 * your email password for testing
 * 
 */
if($appstatus==0){
/*
 * 
 * php mailer parameters
 * password
 * development
 * 
 * 
 * 
 */
$smtpPassword = '';
}else{
/*
 * 
 * php mailer parameters
 * password
 * production
 * your email password when live
 */
$smtpPassword = '';    
}
/*
 * 
 * php mailer parameters
 * port 587
 * 
 * 
 */
$smtpPort=587;
/*
 * 
 * php mailer parameters
 * port 465
 * If need this port uncomment
 * 
 */
//$smtpPort=465;
/*
 * 
 * php mailer parameters
 * port status
 * set to 1 to open
 * set to 0 to close
 * 
 */
$smtport = 1;
/*
 * 
 * php mailer parameters
 * smtp_email_from
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * php mailer parameters
 * smtp_email_from
 * development
 * This is the email the receiver will see
 * eg info@mycompany.com
 * 
 */
$smtpEmailFrom = '';
}else{
/*
 * 
 * php mailer parameters
 * smtp_email_from
 * production
 * 
 */
$smtpEmailFrom = '';    
}
/*
 * 
 * php mailer parameters
 * smtp_name_from
 * 
 * 
 */
if($appstatus==0){
/*
 * 
 * php mailer parameters
 * smtp_name_from
 * development
 * This is the name that will appear on headline 
 * eg John From Teleweb
 * 
 */
$smtpNameFrom = '';
}else{
/*
 * 
 * php mailer parameters
 * smtp_name_from
 * production
 */
 $smtpNameFrom = '';   
}
/*
 * 
 * php mailer parameters
 * debug mode
 * 0 = no debug
 * 2 = error reporting
 * 
 */
$smtpDebug = 0;
/*
 * 
 * php mailer parameters
 * authentication 
 * 
 * 
 */
$smtpAuth = true;
/*
 * 
 * php mailer parameters
 * default mail signature for every mail sent
 * Use this as a default mail signature 
 * to be included in all your mails
 * eg Regards, The Teleweb Team
 */
$mailsignature = '';

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
 * new agents queries
 * 
 * 
 */
    if(isset($_FILES['file']['name'])) {
        
        //get filename
        $filename = $_FILES['file']['name'];
    
         //rename file
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            //set path
            $path = '../upload/excel';

            //upload files in folder
            move_uploaded_file($_FILES['file']['tmp_name'], "$path/$newfilename");

            //set status
            $ok=1;
           
            
            if($ok==1){
    //upload file to database
    $query = <<<eof
     LOAD DATA LOCAL INFILE '$path/$newfilename'
     INTO TABLE user
            COLUMNS TERMINATED BY ','
            ENCLOSED BY '"' 
            LINES TERMINATED BY '\r\n' 
            IGNORE 1 LINES
    (@uid,@user_level,@username,@first_name,@middle_name,@last_name,@company,@industry,@website,@email,@mobile,@password,@isActive,@date_created,@last_update)
    SET uid = nullif(@uid,''),
        user_level = nullif(@user_level,''),
            username = nullif(@username,''),
                first_name = nullif(@first_name,''),
            middle_name = nullif(@middle_name,''),
            last_name = nullif(@last_name,''),
            company = nullif(@company,''),
            industry = nullif(@industry,''),
            website = nullif(@website,''),
            email = nullif(@email,''),
            mobile = nullif(@mobile,''),
            password = nullif(@password,''),
            isActive = nullif(@isActive,''),
            date_created = nullif(@date_created,''),
            last_update = nullif(@last_update,'')
eof;

$conn->query($query);
    

//redirect
    //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&createnewagent&validateIdentities");

            }
    }else{
          //redirect
    //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&createnewagent&errorUpload&postError");
    }
    

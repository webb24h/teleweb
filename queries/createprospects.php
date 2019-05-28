<?php ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
        
        //get campaign id
        $campaignid = $_POST['campaignid'];
    
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
     INTO TABLE prospects
            COLUMNS TERMINATED BY ','
            ENCLOSED BY '"' 
            LINES TERMINATED BY '\r\n' 
            IGNORE 1 LINES
    (@pid,@salesCampaignId,@referenceNumber,
        @dataEntryWorkerID,@isDev,@first_name,@last_name,
            @gender,@address,@city,@stateProvince,@postalZipeCode,
                @country,@countryCode,@phone,@cellphone,@email,@website,
                    @website2,@current_website_host,@registration_date,@expiry_date,
                        @last_host_update,@average_website_visits_month,@company,
                            @occupation,@industry,@facebookPage,@facebookLikes,
                                @facebookFollowers,@linkedinPage,@linkedinPageFollowers,
                                    @twitterPage,@twitterFollowers,@instagramPage,@instagramFollowers,
                                        @youtubePage,@youtubeSubscribers,@pinterestPage,@pinterestVisits,
                                            @pinterestFollowers,@googlePlusPage,@vimeoPage,@vimeoFollowers,
                                                @numberOfSocialMediaAccounts,@additionalDetails,@dateCreated,@lastUpdate)
            
   SET pid = nullif(@pid,''),
       salesCampaignId = nullif(@salesCampaignId,''),
          referenceNumber = nullif(@referenceNumber,''),
              dataEntryWorkerID = nullif(@dataEntryWorkerID,''),
            isDev = nullif(@isDev,''),
                first_name = nullif(@first_name,''),
                    last_name = nullif(@last_name,''),
                        gender = nullif(@gender,''),
                address = nullif(@address,''),
                    city = nullif(@city,''),
                        stateProvince = nullif(@stateProvince,''),
                            postalZipeCode = nullif(@postalZipeCode,''),
                country = nullif(@country,''),
                    countryCode = nullif(@countryCode,''),
                        phone= nullif(@phone,''),
                            cellphone= nullif(@cellphone,''),
                                email = nullif(@email,''),
                                    website= nullif(@website,''),
                    website2= nullif(@website2,''),
                        current_website_host= nullif(@current_website_host,''),
                            registration_date= nullif(@registration_date,''),
                                expiry_date= nullif(@expiry_date,''),
                        last_host_update= nullif(@last_host_update,''),
                            average_website_visits_month= nullif(@average_website_visits_month,''),
                                company= nullif(@company,''),
                            occupation= nullif(@occupation,''),
                                industry= nullif(@industry,''),
                                    facebookPage= nullif(@facebookPage,''),
                                        facebookLikes= nullif(@facebookLikes,''),
                                facebookFollowers= nullif(@facebookFollowers,''),
                                    linkedinPage= nullif(@linkedinPage,''),
                                        linkedinPageFollowers= nullif(@linkedinPageFollowers,''),
                                    twitterPage= nullif(@twitterPage,''),
                                        twitterFollowers= nullif(@twitterFollowers,''),
                                            instagramPage= nullif(@instagramPage,''),
                                                instagramFollowers= nullif(@instagramFollowers,''),
                                        youtubePage= nullif(@youtubePage,''),
                                            youtubeSubscribers= nullif(@youtubeSubscribers,''),
                                                pinterestPage= nullif(@pinterestPage,''),
                                                    pinterestVisits= nullif(@pinterestVisits,''),
                                            pinterestFollowers= nullif(@pinterestFollowers,''),
                                                googlePlusPage= nullif(@googlePlusPage,''),
                                                    vimeoPage= nullif(@vimeoPage,''),
                                                        vimeoFollowers= nullif(@vimeoFollowers,''),
                                                numberOfSocialMediaAccounts= nullif(@numberOfSocialMediaAccounts,''),
                                                    additionalDetails= nullif(@additionalDetails,''),
                                                        dateCreated= nullif(@dateCreated,''),
                                                            lastUpdate= nullif(@lastUpdate,'')
            
eof;

$conn->query($query);
    

//redirect
    //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&campaign=$campaignid&assignprospects&validateIdentities");

            }
    }else{
          //redirect
    //redirect to validate identity to activate account
            header("Location: ../index.php?callcenter&campaign=$campaignid&assignprospects&errorUpload&postError");
    }
    

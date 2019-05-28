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
 * new validation queries
 * 
 * 
 */
if (!empty($_POST)) {


    if (isset($_POST['userid']) && $_POST['email']) {


        //post variables
        $userid = $_POST['userid'];
        $email = $_POST['email'];


        //invalidate all validation numbers set to 0    
        //set all records isValid to 0
        $isValidnow = 0;
        $stmt_invalidatepassw = $conn->prepare("UPDATE validation_numbers SET isValid=? WHERE user_id=?");
        $stmt_invalidatepassw->bind_param("ii", $isValidnow, $userid);
        $stmt_invalidatepassw->execute();
        $stmt_invalidatepasswfinish = 1;


        if ($stmt_invalidatepasswfinish == 1) {


            //create new validation number
            //set random validaiton number
            $validationNumber = rand(999, 9999);

            //hash number
            $validationNumberHash = password_hash($validationNumber, PASSWORD_DEFAULT);

            //set validation to 1
            $isValidnew = 1;

            //insert into table user_password_validations
            $uservalida_stmt = $conn->prepare("INSERT INTO validation_numbers (date_created,user_id,validation_number,isValid) VALUES (?,?,?,?)");
            $uservalida_stmt->bind_param('sisi', $current_date, $userid, $validationNumberHash, $isValidnew);
            $uservalida_stmt->execute();
            $uservalida_stmt_finishs = 1;
        }


        //send new verification code
        if ($uservalida_stmt_finishs == 1) {

            //set activation link 
            if ($appstatus == 0) {

                $telewebActivationLink = "http://localhost/teleweb/index.php?validate=$userid&validateIdentity";
            } else {
                $telewebActivationLink = "https://teleweb.webb24h.com/index.php?validate=$userid&validateIdentity";
            }


            //get user infor
            $stmt_uppm = $conn->prepare("select email,mobile,first_name FROM user WHERE uid=?");
            $stmt_uppm->bind_param("i", $userid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $nameclientm = $resultstmt_uppm->fetch_assoc();
            $first_name = $nameclientm['first_name'];
            $emailAddress = $nameclientm['email'];
            $phoneNumber = $nameclientm['mobile'];



            //set mail subject
            $subject = 'Teleweb Verification Number';

            //set mail body
            $body = "
                Hi $first_name,    
                <br><br>
                In this email, you will find your validation number below.
                <br><br>
                Please activate your account now.
                <br><br>
                Verification code : $validationNumber
                <br><br>
                Click on this link : <a href='$telewebActivationLink' target='_blank'>Activate my Teleweb account</a>
                <br><br>
                If you have any question please feel free to get in touch. <br><br>";

            //send verification mail
            //php mailer
            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = $smtpDebug;
            //Set the hostname of the mail server
            $mail->Host = $smtphost;
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = $smtpPort;
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = $smtpencryption;
            //Whether to use SMTP authentication
            $mail->SMTPAuth = $smtpAuth;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = $smtpusername;
            //Password to use for SMTP authentication
            $mail->Password = $smtpPassword;
            //Set who the message is to be sent from
            $mail->setFrom($smtpEmailFrom, $smtpNameFrom);
            //Set an alternative reply-to address
            $mail->addReplyTo($smtpEmailFrom);
            //Set who the message is to be sent to
            //$mail->addAddress($mobilePhoneCode.'@'.$smsGateway);
            $mail->addAddress($email); //email fallback
            //Set the subject line
            $mail->Subject = $subject;
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
            //Replace the plain text body with one created manually
            $mail->Body = $body . $mailsignature;
            $mail->IsHTML(true);
            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');
            //send the message, check for errors
            if (!$mail->send()) {
                //echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                //echo "Message sent!";
                //Section 2: IMAP
                //Uncomment these to save your message in the 'Sent Mail' folder.
                #if (save_mail($mail)) {
                #    echo "Message saved!";
                #}
            }
        }


        //send verification to mobile
        if ($twilioStatus > 0) {

            $sms = "This is your Teleweb validation number : $validationNumber";

// Use the client to do fun stuff like send text messages!
            $client->messages->create(
                    // the number you'd like to send the message to
                    '+' . $phoneNumber, array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => $TWILIO_CALLER_ID,
                // the body of the text message you'd like to send
                'body' => $sms
                    )
            );
            $ok = 3;
        }

        if ($ok == 3) {
            //redirect to validate identity to activate account
            header("Location: ../index.php?validate=$userid&validateIdentity");
        }
    }
}
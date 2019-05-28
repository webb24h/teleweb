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
            && $_POST['email'] && $_POST['username'] && $_POST['password'] 
            && $_POST['countryCode'] && $_POST['company']
            && $_POST['user_level']
    ) {

        /*
         * 
         * post the variables
         * 
         * 
         */
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $mobilePhone = $_POST['mobilePhone'];
        $countryCode = $_POST['countryCode'];
        $company = $_POST['company'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_level = $_POST['user_level'];


        //get current date
        $current_date = date('Y-m-d');

        //get full phone number
        $phoneNumber = $countryCode . $mobilePhone;

        //first check if they hhave previously tried to register with same email
        $stmt_checkuser = $conn->prepare("SELECT email,isActive,uid FROM user WHERE email=? ORDER BY date_created DESC LIMIT 1");
        $stmt_checkuser->bind_param("s", $email);
        $stmt_checkuser->execute();
        $user_result = $stmt_checkuser->get_result();



        if ($user_result->num_rows > 0) {//there is a record
            //fetch user information
            $checkuser = $user_result->fetch_assoc();

            if ($checkuser['isActive'] == 1) {//account is active
                // 
                //redirect to login page with message
                header("Location: ../index.php?callcenter&createnewagent&errorRegistrationActive");
                
            } else {//redirect them to validation page
             
                //redirect to validate identity to activate account
                header("Location: ../index.php?callcenter&createnewagent&errorRegistrationActive");
            }
        } else {

            //hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            //insert into database
            $insertuserquery = $conn->prepare("INSERT INTO user (user_level, company,username,first_name,last_name,email,mobile,password,date_created) VALUES(?,?,?,?,?,?,?,?,?)");
            $insertuserquery->bind_param("sssssssss",$user_level,$company, $username, $first_name, $last_name, $email, $phoneNumber, $passwordHash, $current_date);
            $insertuserquery->execute();
            $ok = 1;
        }

        if ($ok == 1) {
            $last_id = $conn->insert_id;
            $ok = 2;
        }

        if ($ok == 2) {

            //set random validaiton number
            $validationNumber = rand(999, 9999);

            //hash number
            $validationNumberHash = password_hash($validationNumber, PASSWORD_DEFAULT);

            //set validation to 1
            $isValidnew = 1;

            //insert into table user_password_validations
            $uservalida_stmt = $conn->prepare("INSERT INTO validation_numbers (date_created,user_id,validation_number,isValid) VALUES (?,?,?,?)");
            $uservalida_stmt->bind_param('sisi', $current_date, $last_id, $validationNumberHash, $isValidnew);
            $uservalida_stmt->execute();
            $uservalida_stmt_finishs = 1;
        }


        if ($uservalida_stmt_finishs == 1) {

            //set mail subject
            $subject = 'Welcome to Teleweb!';

            //set mail body
            $body = "
                Hi $first_name,    
                <br><br>
                Welcome to Teleweb!
                <br><br>
                Your manager at $company, added you to the call center platform.
                <br><br>
                They require you to activate your worker account.
                <br><br>
                Your Password : $password
                <br><br>
                You will receive an email with further steps for you to take.
                <br><br>
                If you have any question please feel free to get in touch with us or contact your manager.";

            //send verification to email
            //check if smtp port open
            if ($smtport == 1) {
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
                $welcomemail = 1;





                if ($welcomemail == 1) {

                    //set activation link 
                    if ($appstatus == 0) {

                        $telewebActivationLink = "http://localhost/teleweb/index.php?validate=$last_id&validateIdentity";
                    } else {
                        $telewebActivationLink = "https://teleweb.webb24h.com/index.php?validate=$last_id&validateIdentity";
                    }


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
                If you have any question please feel free to get in touch with us or contact your manager. <br><br>";

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
            header("Location: ../index.php?callcenter&createnewagent&validateIdentity");
        }
    }else{
        echo 'oops something went wrong <br><br>';
    }
}
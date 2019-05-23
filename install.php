<!DOCTYPE html>
<!--
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
-->
<html>
    <!--HEAD BEGINS-->  
    <head>
        <!--CONFIG INCLUDE-->
        <?php include_once 'config.php' ?>

        <!--META TAGS BEGIN-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Teleweb is the only call center software that is completely wireless and hosted online">
        <meta name="author" content="Marie-Eva BB Volmar">
        <meta name="keywords" content="online telemareting cold call outbound telephone software">

        <!-- Favicon -->
        <link rel="shortcut icon" type="favicon" href="images/tau.png"/>


        <!--TITLE BEGIN-->
        <title>Teleweb</title>

        <!--JS FILES BEGIN-->

        <!-- main jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- jquery ui-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- jquery migrate -->
        <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>

        <!-- bootstrap javascript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <!-- bootstrap toggle -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


        <!-- Owl Carousel js --> 
        <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha256-251s88HEsEfGL2RufZmRwGohKTHDYr9T+aJAazDwlGY=" crossorigin="anonymous"></script>

        <!-- Twilio Client -->
        <script type="text/javascript" src="https://media.twiliocdn.com/sdk/js/client/v1.6/twilio.min.js"></script>

        <!-- login.js -->
        <script type="text/javascript" src="js/login.js"></script>


        <!-- twilio client callHandler-->
        <script type="text/javascript" src="js/callHandler.js"></script>

        <!-- Date picker -->
        <script src="js/datepicker.js"></script>

        <!-- dialpad.js-->
        <script type="text/javascript" src="js/dialpad.js"></script>


        <!--time picker -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

        <!--CSS BEGIN-->

        <!-- bootstrap css stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


        <!-- jquery ui-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


        <!-- Animate On Scroll -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <!-- owl carousel css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha256-qvCL5q5O0hEpOm1CgOLQUuHzMusAZqDcAZL9ijqfOdI=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha256-nXBV7Gr2lU0t+AwKsnS05DYtzZ81oYTXS6kj7LBQHfM=" crossorigin="anonymous" />

        <!-- google pie chart -->
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>

        <!-- Custom CSS StyleSheet -->
        <link rel="stylesheet" href="css/main.css"/>

        <!-- Custom CSS StyleSheet -->
        <link rel="stylesheet" href="css/api.css"/>

        <!-- add after bootstrap.min.css -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/afeld/bootstrap-toc/v1.0.1/dist/bootstrap-toc.min.css"/>

        <!-- add after bootstrap.min.js -->
        <script src="https://cdn.rawgit.com/afeld/bootstrap-toc/v1.0.1/dist/bootstrap-toc.min.js"></script>
    </head>
    <!--API BODY BEGINS-->    
    <body data-spy="scroll" data-target="#myScrollspy" data-offset="15">


        <!--
        /*************************************************************************
        TOP HEADER
        **************************************************************************/
        -->
        <div class="container">
            <header>
                <nav class="navbar navbar-fixed-top navbarordinary" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand loginlink" href="install.php">
                             <!-- <img class="logo" alt="logo" src=""> -->
                                <span class="logotext"><img style="width:10% !important;" src="images/tau.png">ELEWEB LIGHT</span><br>
                                <span style="font-size:smaller !important; display:none;"></span>
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav"></ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>

            </header>
        </div>
        <br>

        <!--
        /*************************************************************************
        TABLE OF CONTENT LEFT NAV
        **************************************************************************/
        -->

        <div class="container contentTable">
            <div class="row">
                <div class="col-sm-3">
                    <nav id="myScrollspy">
                        <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                            <li><a href="#section1">Introduction</a></li>
                            <li><a href="#section2">Downloads</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Requirements<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#section31">System</a></li>
                                    <li><a href="#section32">Browser</a></li>
                                    <li><a href="#section33">Dependencies</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Installation<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#section41">Twilio</a></li>
                                    <li><a href="#section42">Database</a></li>
                                    <li><a href="#section43">Php Mailer</a></li>
                                    <li><a href="#section44">Requests</a></li>
                                    <li><a href="#section45">Starting Teleweb</a></li>
                                </ul>
                            </li>
                            <li><a href="#section5">License</a></l
                        </ul>
                    </nav>
                </div>  

                <!--
                /*************************************************************************
                TABLE OF CONTENT RIGHT CONTENT
                **************************************************************************/
                -->
                <div class="col-sm-9">

                    <!--
                    /*************************************************************************
                    SECTION 1
                    **************************************************************************/
                    -->        


                    <div class="section" id="section1">    
                        <h1>Introduction</h1>
                        <p>
                            Welcome to Teleweb Light!
                        </p>
                        <p>
                            This API documentation will help you manually install and successfully get Teleweb version 1.0 working on your server.
                        </p>
                        <p>
                            Following all the instructions as mentionned in this documentation will get you up and running in no time.
                        </p>
                    </div>

                    <!--
                    /*************************************************************************
                    SECTION 2
                    **************************************************************************/
                    -->  
                    <div class="section" id="section2"> 
                        <h1>Downloads</h1>
                        <p>
                            Get started with Teleweb Light by downloading the application files online. Download from your favorite repository.
                        </p>
                        <p>
                            <a href=""><i class="fab fa-github"> Download Teleweb Light v1 On GitHub</i></a>
                        </p>
                        <p>
                            <a href=""><i class="fa fa-link"> Download Teleweb Light v1 On SourceForge</i></a>   
                        </p>
                    </div> 

                    <!--
                    /*************************************************************************
                    SECTION 3.1
                    **************************************************************************/
                    -->  
                    <div class="section" id="section31">
                        <h1>System Requirements</h1>
                        <p>Teleweb was developped and mainly tested in a Windows environment.
                            However, it may be used in any environment that can run following technologies :
                        </p>
                         <p>
                             PHP 5.6 or higher
                        </p>
                          <p>
                             Apache 2.0 or higher
                        </p>
                            <p>
                             Mysqli 5.0 or higher
                        </p>
                    </div>

                    <!--
                    /*************************************************************************
                    SECTION 3.2
                    **************************************************************************/
                    -->  
                    <div class="section" id="section32">
                        <h1>Browser Requirements</h1>
                        <p>
                            All the magic of Teleweb happens in your browser. 
                            Therefore it is really important to use the proper browser to benefit from all
                            the software advantages.  
                            Teleweb was mainly tested and built for Mozilla Firefox 3 and higher. 
                            The software was also extensively tested in Chrome 4.    
                            
                            </p>
                              <p>
                              Although it is recommended that you install Mozilla Firefox or Chrome on all computers intented 
                              to use Teleweb for optimal performance,
                              you may test and use the software in all other major browsers as well. 
                            </p>
                               <span class=''>
                <img src="https://img.icons8.com/color/52/000000/firefox.png">
                <img src="https://img.icons8.com/color/52/000000/chrome.png">
                <img src="https://img.icons8.com/color/52/000000/adventures.png">
                <img src="https://img.icons8.com/color/52/000000/opera.png">
                <img src="https://img.icons8.com/color/52/000000/internet-explorer.png">
             </span>
                            
                    </div>


                    <!--
                    /*************************************************************************
                    SECTION 3.3
                    **************************************************************************/
                    -->          
                    <div class="section" id="section33">
                        <h1>Dependencies</h1>
                        <p>
                            All dependencies necessited to successfully run Teleweb are already installed and ready to use.
                            Everything that is needed is built-in the application.
                            
                            
                        
                        
                        </p>
                    </div>

                    <!--
                    /*************************************************************************
                    SECTION 4.1
                    **************************************************************************/
                    -->          

                    <div class="section" id="section41">
                        <h1>Twilio Account</h1>
                        <p> Teleweb call center functionalities were built utilizing Twilio library.
                            In order to be able to use the call center functionalities,
                            you must acquire a free Twilio Account and purchase a number with voice and sms capabilities.
                             
                        </p>
                        <p>
                            1. Get a free Twilio account here : <a href="https://www.twilio.com/try-twilio" target="_blank">Sign up on Twilio</a>
                        </p>
                         <p>
                             2. <a href="https://support.twilio.com/hc/en-us/articles/223135247-How-to-Search-for-and-Buy-a-Twilio-Phone-Number-from-Console" target="_blank">Purchase a Twilio number</a> with voice and sms capabilities. <br>
                        </p>
                         <p>
                             3. Find your <a target="_blank" href="https://www.comm100.com/livechat/knowledgebase/where-do-i-find-the-twilio-account-sid-auth-token-and-phone-number-sid.html">Twilio Account SID</a> and Primary Auth Token.
                        </p>
                         <p>
                             4. <a target="_blank" href="https://www.twilio.com/console/voice/twiml/apps/create">Create a TwiML APP </a> and point the VOICE REQUEST URL to <pre>https://EXAMPLEmytelewebsite.com/view/voice.php</pre>
                         Point the MESSAGING REQUEST URL to <pre>https://EXAMPLEmytelewebsite.com/view/sms.php</pre> Click create and locate your TwiML APP SID.
                        </p>
                         <p>
                             5. In the Teleweb application, locate <strong>config.php</strong>. Navigate to TWILIO ACCOUNT PARAMETERS and fill up all twilio fields with your twilio credentials.
                         <pre>
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
                         </pre>
                        </p>
                        
                    </div>      
                    
                         <!--
                    /*************************************************************************
                    SECTION 4.2
                    **************************************************************************/
                    -->          

                    <div class="section" id="section42">
                        <h1>Database Configuration</h1>
                      
                          <p>
                            
                               1. Create a new database on your server.
                            
                        </p>
                           <p>
                            
                               2. In the Teleweb application, locate <strong>teleweb.sql</strong> inside the download folder.
                            
                        </p>
                          <p>
                            
                              3. Import the <strong>teleweb.sql</strong> in your MySQL database.
                            
                        </p>
                            <p>
                            
                                4. In the Teleweb application, locate <strong>config.php</strong>. 
                                Navigate to DATABASE PARAMETERS and fill up all database fields with your database credentials.
                            <pre>
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
                            </pre>
                        </p>
                    </div>    

                    <!--
                    /*************************************************************************
                    SECTION 4.3
                    **************************************************************************/
                    -->  
                    <div class="section" id="section43">
                        <h1>Php Mailer Configuration</h1>
                        <p>Teleweb allows its users to email prospects utilizing the PHP Mailer Library.</p>
                            
                        <p>   1. In the Teleweb app, locate <strong>config.php</strong></p>
                        
                        <p>
                            2. Navigate to PHP MAILER PARAMETERS and fill up all the fields with your mail credentials.
                        <pre>
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
                        </pre>
                        
                        </p>
                    </div>

                    <!--
                    /*************************************************************************
                    SECTION 4.4
                    **************************************************************************/
                    -->  
                    <div class="section" id="section44">
                        <h1>Controller & Session Requests</h1>
                       
                        <p>
                            For all Teleweb frontend requests, locate <strong>controller.php</strong>
                        </p>
                         <p>
                            For all Teleweb session requests, locate <strong>session.php</strong>
                        </p>
                    </div>
                    
                    
                      <!--
                    /*************************************************************************
                    SECTION 4.5
                    **************************************************************************/
                    -->  
                    <div class="section" id="section45">
                        <h1>Starting Teleweb</h1>
                        <p>
                          Bravo! You made it to the bottom of the API. 
                          If you have followed all instructions properly, you are ready to get this app going!
                        </p>
                        <p>
                            In the Teleweb application, locate <strong>index.php</strong>. 
                            Navigate in between the head tags and comment or delete following line 
                        <pre>window.location.replace("install.php");</pre>
                        </p>
                    </div>
                    
                    
                    <!--
                    /*************************************************************************
                    SECTION 5
                    **************************************************************************/
                    -->  

                    <div class="section" id="section5">
                        <h1>License</h1>
                        <p>
                        <pre>
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
 **************************************************************************/
                        </pre>
                            
                        </p>
                    </div>



                </div>
            </div>
        </div>

    </body>
    <!--END OF HTML-->
</html>


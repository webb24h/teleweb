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
        <?php include_once 'config.php';?>

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
        <title>Teleweb Light v1</title>

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

        <!-- INTL TEL INPUT JS -->
        <?php
            if ($appstatus == 0) {
                echo ' <script src="http://localhost/Teleweb/teleweb_light_v1/vendor/telephoneinput/build/js/intlTelInput.js"></script>';
                //echo ' <script src="http://localhost/teleweb/vendor/telephoneinput/build/js/utils.js"></script>';
            } else {

                echo ' <script src="https://teleweb.webb24h.com/vendor/telephoneinput/build/js/intlTelInput.js"></script>';
                //echo ' <script src="https://teleweb.webb24h.com/vendor/telephoneinput/build/js/utils.js"></script>';
            }
        ?>
        <!-- INTL TEL INPUT CSS -->
        <?php
            if ($appstatus == 0) {

                echo '<link rel="stylesheet" href="http://localhost/Teleweb/teleweb_light_v1/vendor/telephoneinput/build/css/intlTelInput.css">';
            } else {
                echo '<link rel="stylesheet" href="https://teleweb.webb24h.com/vendor/telephoneinput/build/css/intlTelInput.css">';
            }
      
        ?>
        <!-- GRAB COUNTRY CODE WITH INTL TEL INPUT -->
        <script src="JS/countrycode.js"></script>

        <!-- custom main css stylesheet -->
        <?php
        if (isset($_GET['callcenter'])) {
            echo '<link rel="stylesheet" href="css/callcenter.css" />';
        } else {
            echo '<link rel="stylesheet" href="css/main.css" />';
        }
        ?>
        
        <!-- install script -->
        <script src="js/install.js"></script>
        
    </head>
    <!--BODY BEGINS-->    
    <body>
        <?php
            /*
             * 
             * INCLUDE CONTROLLER
             * 
             */
            include_once 'controller.php';
        ?>

        <!--BODY ENDS-->
    </body>
    <!--END OF HTML-->
</html>
<!--INTL TEL SCRIPT -->
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input);
</script>

<!--TIME PICKER-->          
<script>

    $('.timepicker').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 15,
        minTime: '10',
        maxTime: '23',
        defaultTime: 'now',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });



</script>


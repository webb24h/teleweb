<?php
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
 * Written by Marie-Eva BB Volmar, May 2019
 * Official launch date : May 17th 2019
 * For support contact us at teleweb@webb24h.com
 * 
 * Thanks for using Teleweb. 
 * No classes. No hassle. 
 * Pure procedural PHP.
 * Still, I followed a certain OOP logic to avoid repetition, so no worries. 
 * There is a method to the madness. 
 * Breathe, take your time and you will see magic.
 * 
 * I had fun and by the way... simplicity works ^^
 *
 * God bless and YOU ARE LOVED.
 **************************************************************************/
/*
 * 
 * 
 * SESSION FILE
 * This file takes care of all the session queries 
 * Also takes care of views for sessions
 * 
 * 
 * 
 */
session_start();
 // Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
include_once 'twilio/Twilio/autoload.php';
include_once 'twilio_config.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
// Your Account SID and Auth Token from twilio.com/console
$client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
/*
 * 
 * 
 * check session variable
 * 
 * 
 * 
 */
if (!isset($_SESSION['user_id'])) {
    /*
     * 
     * 
     * if session not set redirect to login page
     * 
     * 
     * 
     */
    header("Location: index.php?login&error");
    /*
     * 
     * 
     * exit
     * 
     * 
     * 
     */
    exit();
    //
//
//
   //
} else {
    /*
     * 
     * handle all session queries here
     * 
     * 
     * 
     */
    //get user information
    $userID = $_SESSION['user_id'];

    //fetch information from database
    $stmt_uppm = $conn->prepare("select * FROM user WHERE uid=?");
    $stmt_uppm->bind_param("i", $userID);
    $stmt_uppm->execute();
    $resultstmt_uppm = $stmt_uppm->get_result();
    $userDetail = $resultstmt_uppm->fetch_assoc();
    /*
     * 
     * 
     * VIEW ACCOUNT
     * 
     * 
     */
    if (isset($_GET['account'])) {

        include 'view/account.php';
    }


    //build the dasboard card list
    $dash_cards_arr = array("Agents", "Campaigns", "Call Logs", "Settings");
    /*
     * 
     * AGENT QUERIES
     * 
     * 
     */
       if (isset($_GET['updateagent'])) {
             
               $agentid = $_GET['updateagent'];


            //get all from user
            $stmt_uppm = $conn->prepare("select * FROM user WHERE uid=?");
            $stmt_uppm->bind_param("i", $agentid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $userInfo = $resultstmt_uppm->fetch_assoc();
             
             include_once 'view/updateagent.php';
         }
        if (isset($_GET['viewagent'])) {

            $agentid = $_GET['viewagent'];


            //get all from user
            $stmt_uppm = $conn->prepare("select * FROM user WHERE uid=?");
            $stmt_uppm->bind_param("i", $agentid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $userInfo = $resultstmt_uppm->fetch_assoc();


            //get agent call logs
            $stmt_camp44 = $conn->prepare("select * from call_logs mkc "
                    . "left join prospects mkp "
                    . "on mkp.pid=mkc.cprospectid where mkc.cagentid=?");
            $stmt_camp44->bind_param("s", $agentid);
            $stmt_camp44->execute();
            $selectprospectsqueryResult = $stmt_camp44->get_result();

            //get total of calls
            $row_count = $selectprospectsqueryResult->num_rows;


            //campaign statistics for success calls
            $callstatsuccess = 'Success';
            $stmt_uppmsc = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmsc->bind_param('ss', $agentid, $callstatsuccess);
            $stmt_uppmsc->execute();
            $resultstmt_uppmsc = $stmt_uppmsc->get_result();
            //count success calls
            $success_calls_count = $resultstmt_uppmsc->num_rows;

            //campaign statistics for callback calls
            $callstatback = 'Callback';
            $stmt_uppmscc = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscc->bind_param('ss', $agentid, $callstatback);
            $stmt_uppmscc->execute();
            $resultstmt_uppmscc = $stmt_uppmscc->get_result();
            //count success calls
            $callback_calls_count = $resultstmt_uppmscc->num_rows;


            //campaign statistics for voicemail calls
            $callstatvoice = 'Voicemail';
            $stmt_uppmsccc = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmsccc->bind_param('ss', $agentid, $callstatvoice);
            $stmt_uppmsccc->execute();
            $resultstmt_uppmsccc = $stmt_uppmsccc->get_result();
            //count voicemail calls
            $voicemail_calls_count = $resultstmt_uppmsccc->num_rows;

            //campaign statistics for Busy Line
            $callstatbusy = 'Busy Line';
            $stmt_uppmscccb = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccb->bind_param('ss', $agentid, $callstatbusy);
            $stmt_uppmscccb->execute();
            $resultstmt_uppmscccb = $stmt_uppmscccb->get_result();
            //count busy line calls
            $busy_calls_count = $resultstmt_uppmscccb->num_rows;


            //campaign statistics for No Response
            $callstatnoresponse = 'No Response';
            $stmt_uppmscccn = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccn->bind_param('ss', $agentid, $callstatnoresponse);
            $stmt_uppmscccn->execute();
            $resultstmt_uppmscccn = $stmt_uppmscccn->get_result();
            //count no response calls
            $noresponse_calls_count = $resultstmt_uppmscccn->num_rows;


            //campaign statistics for Absent
            $callstatabsent = 'Absent';
            $stmt_uppmsccca = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmsccca->bind_param('ss', $agentid, $callstatabsent);
            $stmt_uppmsccca->execute();
            $resultstmt_uppmsccca = $stmt_uppmsccca->get_result();
            //count no absent calls
            $absent_calls_count = $resultstmt_uppmsccca->num_rows;


            //campaign statistics for Not Interested
            $callstatnotint = 'Not Interested';
            $stmt_uppmscccni = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccni->bind_param('ss', $agentid, $callstatnotint);
            $stmt_uppmscccni->execute();
            $resultstmt_uppmscccni = $stmt_uppmscccni->get_result();
            //count not interested calls
            $ni_calls_count = $resultstmt_uppmscccni->num_rows;


            //campaign statistics for Not In Service
            $callstatnis = 'Not In Service';
            $stmt_uppmscccnis = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccnis->bind_param('ss', $agentid, $callstatnis);
            $stmt_uppmscccnis->execute();
            $resultstmt_uppmscccnis = $stmt_uppmscccnis->get_result();
            //count not interested calls
            $nis_calls_count = $resultstmt_uppmscccnis->num_rows;



            //campaign statistics for Do Not Call
            $callstatdnc = 'Do Not Call';
            $stmt_uppmscccdnc = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccdnc->bind_param('ss', $agentid, $callstatdnc);
            $stmt_uppmscccdnc->execute();
            $resultstmt_uppmscccdnc = $stmt_uppmscccdnc->get_result();
            //count do not calls
            $dnc_calls_count = $resultstmt_uppmscccdnc->num_rows;


            //campaign statistics for Wrong Number
            $callstatwn = 'Wrong Number';
            $stmt_uppmscccwn = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccwn->bind_param('ss', $agentid, $callstatwn);
            $stmt_uppmscccwn->execute();
            $resultstmt_uppmscccwn = $stmt_uppmscccwn->get_result();
            //count wrong number calls
            $wn_calls_count = $resultstmt_uppmscccwn->num_rows;

            //campaign statistics for Hang Up
            $callstathu = 'Hang Up';
            $stmt_uppmsccchu = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmsccchu->bind_param('ss', $agentid, $callstathu);
            $stmt_uppmsccchu->execute();
            $resultstmt_uppmsccchu = $stmt_uppmsccchu->get_result();
            //count hang up calls
            $hu_calls_count = $resultstmt_uppmsccchu->num_rows;


            //campaign statistics for No Number
            $callstatnn = 'No Number';
            $stmt_uppmscccnn = $conn->prepare("select * FROM call_logs where cagentid=? and call_status=?");
            $stmt_uppmscccnn->bind_param('ss', $agentid, $callstatnn);
            $stmt_uppmscccnn->execute();
            $resultstmt_uppmscccnn = $stmt_uppmscccnn->get_result();
            //count no number calls
            $nn_calls_count = $resultstmt_uppmscccnn->num_rows;

            include 'view/agent.php';
        }
    if (isset($_GET['createnewagent'])) {

        include 'view/createagent.php';
    }
    if (isset($_GET['viewagentlist'])) {

        //get agent list
        $stmt_uppm = $conn->prepare("select * FROM user");
        $stmt_uppm->execute();
        $resultstmt_uppm = $stmt_uppm->get_result();



        include 'view/agents.php';
    }
    /*
     * 
     * CALL LOGS QUERIES
     * 
     * 
     */
        if (isset($_GET['viewcalllogs'])) {

            //get CALL LOGS
            $stmt_uppmsd = $conn->prepare("select * FROM call_logs");
            $stmt_uppmsd->execute();
            $resultstmt_uppmsd = $stmt_uppmsd->get_result();

            include 'view/logs.php';
        }
                if (isset($_GET['listencall'])) {
            
            $twilioCallSID = $_GET['listencall'];
            $agentid=$_GET['agent'];
            $recordsid = $_GET['recordsid'];
            
            //get agent information
            $stmt_uppm = $conn->prepare("select * FROM user WHERE uid=?");
            $stmt_uppm->bind_param("i", $agentid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $userInfo = $resultstmt_uppm->fetch_assoc();

            //get CALL information
            $stmt_uppmsds = $conn->prepare("select * FROM call_logs where twilioCallSid=?");
            $stmt_uppmsds->bind_param("s", $twilioCallSID);
            $stmt_uppmsds->execute();
            $resultstmt_uppmsds = $stmt_uppmsds->get_result();
            $callInfo = $resultstmt_uppmsds->fetch_assoc();
            

            include 'view/recording.php';
        }
  /*
     * 
     * PROSPECT QUERIES
     * ADD NEW PROSPECTS
     * 
     */
      if (isset($_GET['assignprospects'])) {

          $campaignid = $_GET['campaign'];
          
          //get campaign 
        $stmt_uppm = $conn->prepare("select * FROM campaigns where campaignid=?");
        $stmt_uppm->bind_param('s', $campaignid);
        $stmt_uppm->execute();
        $resultstmt_uppm = $stmt_uppm->get_result();
        $campaign = $resultstmt_uppm->fetch_assoc();
          
          //include file
        include 'view/createprospects.php';
    }
    /*
     * 
     * CAMPAIGN QUERIES
     * 
     * 
     */
    if (isset($_GET['createnewcampaign'])) {

        include 'view/createcampaign.php';
    }
    if (isset($_GET['viewcampaignslist'])) {

        //get campaign list
        $stmt_uppm = $conn->prepare("select * FROM campaigns");
        $stmt_uppm->execute();
        $resultstmt_uppm = $stmt_uppm->get_result();

        include 'view/campaigns.php';
    }
            if (isset($_GET['updatecampaign'])) {

            $campaignid =$_GET['updatecampaign'];
            
                        //get campaign 
            $stmt_uppm = $conn->prepare("select * FROM campaigns where campaignid=?");
            $stmt_uppm->bind_param('s', $campaignid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $campaign = $resultstmt_uppm->fetch_assoc();

            
            include 'view/updatecampaign.php';
        }
        if (isset($_GET['viewcampaign'])) {

            $campaignid = $_GET['viewcampaign'];

            //get campaign 
            $stmt_uppm = $conn->prepare("select * FROM campaigns where campaignid=?");
            $stmt_uppm->bind_param('s', $campaignid);
            $stmt_uppm->execute();
            $resultstmt_uppm = $stmt_uppm->get_result();
            $campaign = $resultstmt_uppm->fetch_assoc();


            //get CALL LOGS
            $stmt_uppms = $conn->prepare("select * FROM call_logs where ccampaignid=?");
            $stmt_uppms->bind_param('s', $campaignid);
            $stmt_uppms->execute();
            $resultstmt_uppms = $stmt_uppms->get_result();

            //count all calls
            $calls_count = $resultstmt_uppms->num_rows;


            //get all prospects associated with campaign
            //retrieve information from prospects
            $get_blog_posts_query = $conn->prepare("select * from prospects where salesCampaignId=? order by dateCreated desc");
            $get_blog_posts_query->bind_param("s", $campaignid);
            $get_blog_posts_query->execute();
            $get_prospect_results = $get_blog_posts_query->get_result();

            //campaign statistics for success calls
            $callstatsuccess = 'Success';
            $stmt_uppmsc = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmsc->bind_param('ss', $campaignid, $callstatsuccess);
            $stmt_uppmsc->execute();
            $resultstmt_uppmsc = $stmt_uppmsc->get_result();
            //count success calls
            $success_calls_count = $resultstmt_uppmsc->num_rows;

            //campaign statistics for callback calls
            $callstatback = 'Callback';
            $stmt_uppmscc = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscc->bind_param('ss', $campaignid, $callstatback);
            $stmt_uppmscc->execute();
            $resultstmt_uppmscc = $stmt_uppmscc->get_result();
            //count success calls
            $callback_calls_count = $resultstmt_uppmscc->num_rows;


            //campaign statistics for voicemail calls
            $callstatvoice = 'Voicemail';
            $stmt_uppmsccc = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmsccc->bind_param('ss', $campaignid, $callstatvoice);
            $stmt_uppmsccc->execute();
            $resultstmt_uppmsccc = $stmt_uppmsccc->get_result();
            //count voicemail calls
            $voicemail_calls_count = $resultstmt_uppmsccc->num_rows;

            //campaign statistics for Busy Line
            $callstatbusy = 'Busy Line';
            $stmt_uppmscccb = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccb->bind_param('ss', $campaignid, $callstatbusy);
            $stmt_uppmscccb->execute();
            $resultstmt_uppmscccb = $stmt_uppmscccb->get_result();
            //count busy line calls
            $busy_calls_count = $resultstmt_uppmscccb->num_rows;


            //campaign statistics for No Response
            $callstatnoresponse = 'No Response';
            $stmt_uppmscccn = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccn->bind_param('ss', $campaignid, $callstatnoresponse);
            $stmt_uppmscccn->execute();
            $resultstmt_uppmscccn = $stmt_uppmscccn->get_result();
            //count no response calls
            $noresponse_calls_count = $resultstmt_uppmscccn->num_rows;


            //campaign statistics for Absent
            $callstatabsent = 'Absent';
            $stmt_uppmsccca = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmsccca->bind_param('ss', $campaignid, $callstatabsent);
            $stmt_uppmsccca->execute();
            $resultstmt_uppmsccca = $stmt_uppmsccca->get_result();
            //count no absent calls
            $absent_calls_count = $resultstmt_uppmsccca->num_rows;


            //campaign statistics for Not Interested
            $callstatnotint = 'Not Interested';
            $stmt_uppmscccni = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccni->bind_param('ss', $campaignid, $callstatnotint);
            $stmt_uppmscccni->execute();
            $resultstmt_uppmscccni = $stmt_uppmscccni->get_result();
            //count not interested calls
            $ni_calls_count = $resultstmt_uppmscccni->num_rows;


            //campaign statistics for Not In Service
            $callstatnis = 'Not In Service';
            $stmt_uppmscccnis = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccnis->bind_param('ss', $campaignid, $callstatnis);
            $stmt_uppmscccnis->execute();
            $resultstmt_uppmscccnis = $stmt_uppmscccnis->get_result();
            //count not interested calls
            $nis_calls_count = $resultstmt_uppmscccnis->num_rows;



            //campaign statistics for Do Not Call
            $callstatdnc = 'Do Not Call';
            $stmt_uppmscccdnc = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccdnc->bind_param('ss', $campaignid, $callstatdnc);
            $stmt_uppmscccdnc->execute();
            $resultstmt_uppmscccdnc = $stmt_uppmscccdnc->get_result();
            //count do not calls
            $dnc_calls_count = $resultstmt_uppmscccdnc->num_rows;


            //campaign statistics for Wrong Number
            $callstatwn = 'Wrong Number';
            $stmt_uppmscccwn = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccwn->bind_param('ss', $campaignid, $callstatwn);
            $stmt_uppmscccwn->execute();
            $resultstmt_uppmscccwn = $stmt_uppmscccwn->get_result();
            //count wrong number calls
            $wn_calls_count = $resultstmt_uppmscccwn->num_rows;

            //campaign statistics for Hang Up
            $callstathu = 'Hang Up';
            $stmt_uppmsccchu = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmsccchu->bind_param('ss', $campaignid, $callstathu);
            $stmt_uppmsccchu->execute();
            $resultstmt_uppmsccchu = $stmt_uppmsccchu->get_result();
            //count hang up calls
            $hu_calls_count = $resultstmt_uppmsccchu->num_rows;


            //campaign statistics for No Number
            $callstatnn = 'No Number';
            $stmt_uppmscccnn = $conn->prepare("select * FROM call_logs where ccampaignid=? and call_status=?");
            $stmt_uppmscccnn->bind_param('ss', $campaignid, $callstatnn);
            $stmt_uppmscccnn->execute();
            $resultstmt_uppmscccnn = $stmt_uppmscccnn->get_result();
            //count no number calls
            $nn_calls_count = $resultstmt_uppmscccnn->num_rows;

            include 'view/campaign.php';
        }
    /*
     * 
     * 
     * 
     * VIEW PROSPECT
     * 
     * 
     * 
     * 
     */
    if (isset($_GET['viewprospect'])) {

        $prospectid = $_GET['viewprospect'];
        $campaignid = $_GET['campaignid'];

        //get prospect details for single fetch
        $selectprospectsquery_id = $conn->prepare("SELECT * FROM prospects where salesCampaignId=? and pid=?");
        $selectprospectsquery_id->bind_param("ss", $campaignid, $prospectid);
        $selectprospectsquery_id->execute();
        $selectprospectsquery_idResult = $selectprospectsquery_id->get_result();
        $thisprospect = $selectprospectsquery_idResult->fetch_assoc();
        $thisprospectid = $thisprospect['pid'];

        //get prospect call logs
        $stmt_camp445 = $conn->prepare("select * from call_logs mkc "
                . "left join prospects mkp "
                . "on mkp.pid=mkc.cprospectid where mkp.pid=? ORDER BY mkc.last_update DESC");
        $stmt_camp445->bind_param("s", $thisprospectid);
        $stmt_camp445->execute();
        $selectprospectsqueryResult5 = $stmt_camp445->get_result();

        //get total of prospect calls
        $row_count_p = $selectprospectsqueryResult5->num_rows;


        include_once 'view/prospect.php';
    }

    /*
     * 
     * 
     * ENTER CAMPAIGN
     * 
     * 
     * 
     */
    if (isset($_GET['entercampaign']) || (isset($_GET['outboundcampaign']) || (isset($_GET['myleads'])) || (isset($_GET['callbacks'])) || isset($_GET['callinglogs']))) {

        if (isset($_POST['agentid'])) {
            $agentid = $_POST['agentid'];
        }

        if (isset($_POST['campaignid'])) {
            $campaignid = $_POST['campaignid'];
        }

        if (isset($_GET['agent'])) {
            $agentid = $_GET['agent'];
        }

        if (isset($_GET['campaign'])) {
            $campaignid = $_GET['campaign'];
        }

        $campaignid = $_GET['entercampaign'];
        $agentid = $_GET['agent'];

        //get campaign 
        $stmt_uppm = $conn->prepare("select * FROM campaigns where campaignid=?");
        $stmt_uppm->bind_param('s', $campaignid);
        $stmt_uppm->execute();
        $resultstmt_uppm = $stmt_uppm->get_result();
        $campaign = $resultstmt_uppm->fetch_assoc();

        if (isset($_GET['prospect'])) {

            if (isset($_GET['prospect'])) {
                $prospectid = $_GET['prospect'];
            }

            //get prospect details for loop
            $selectprospectsquery = $conn->prepare("SELECT * FROM prospects where salesCampaignId=? and pid=?");
            $selectprospectsquery->bind_param("ss", $campaignid, $prospectid);
            $selectprospectsquery->execute();
            $selectprospectsqueryResult = $selectprospectsquery->get_result();

            //get total of prospects for loop
            $row_count = $selectprospectsqueryResult->num_rows;

            //get prospect details for single fetch
            $selectprospectsquery_id = $conn->prepare("SELECT * FROM prospects where salesCampaignId=? and pid=?");
            $selectprospectsquery_id->bind_param("ss", $campaignid, $prospectid);
            $selectprospectsquery_id->execute();
            $selectprospectsquery_idResult = $selectprospectsquery_id->get_result();
            $thisprospect = $selectprospectsquery_idResult->fetch_assoc();
            $thisprospectid = $thisprospect['pid'];

            //get prospect call logs
            $stmt_camp445 = $conn->prepare("select * from call_logs mkc "
                    . "left join prospects mkp "
                    . "on mkp.pid=mkc.cprospectid where mkp.pid=? ORDER BY mkc.last_update DESC");
            $stmt_camp445->bind_param("s", $thisprospectid);
            $stmt_camp445->execute();
            $selectprospectsqueryResult5 = $stmt_camp445->get_result();

            //get total of prospect calls
            $row_count_p = $selectprospectsqueryResult5->num_rows;
        } else {
            $prospectid = 0;
        }



        //get agent leads
        if (isset($_GET['myleads'])) {
            $callstatus = 'Success';
            $stmt_campmy = $conn->prepare("select * from call_logs mkc
                                        left join prospects mkp
                                        on mkp.pid=mkc.cprospectid
                                        where mkc.cagentid=? and mkc.call_status=?");
            $stmt_campmy->bind_param("ss", $agentid, $callstatus);
            $stmt_campmy->execute();
            $selectprospectsqueryResult = $stmt_campmy->get_result();

            //get total of leads
            $row_count = $selectprospectsqueryResult->num_rows;
        }


        //get callbacks
        if (isset($_GET['callbacks'])) {
            $stmt_campcall = $conn->prepare("select * from callbacks mkc
                                     left join prospects mkp
                                     on mkc.prospectid=mkp.pid
                                     where mkp.salesCampaignId=?");
            $stmt_campcall->bind_param("s", $campaignid);
            $stmt_campcall->execute();
            $selectprospectsqueryResult = $stmt_campcall->get_result();

            //get total of callbacks
            $row_count = $selectprospectsqueryResult->num_rows;
        }


        //get agent call logs
        if (isset($_GET['callinglogs'])) {
            $stmt_camp44 = $conn->prepare("select * from call_logs mkc "
                    . "left join prospects mkp "
                    . "on mkp.pid=mkc.cprospectid where mkc.cagentid=?");
            $stmt_camp44->bind_param("s", $agentid);
            $stmt_camp44->execute();
            $selectprospectsqueryResult = $stmt_camp44->get_result();

            //get total of calls
            $row_count = $selectprospectsqueryResult->num_rows;
        }

        //get all prospects from campaign id
        if (isset($_GET['outboundcampaign'])) {


            $selectprospectsquery = $conn->prepare("SELECT * FROM prospects where salesCampaignId=?");
            $selectprospectsquery->bind_param("s", $campaignid);
            $selectprospectsquery->execute();
            $selectprospectsqueryResult = $selectprospectsquery->get_result();

            //get total of prospects
            $row_count = $selectprospectsqueryResult->num_rows;
        }

        //create pagination
        /*
         * 
         * 
         * 
         * HANDLING PROSPECT PAGINATION
         * 
         * 
         * 
         */
        $page_count = 0;
        // make your LIMIT query here as shown above
        // determine page number from $_GET
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        // set the number of items to display per page
        $items_per_page = 50;

        if (0 === $row_count) {
            // maybe show some error since there is nothing in your table
        } else {
            // determine page_count
            $page_count = (int) ceil($row_count / $items_per_page);
            // double check that request page is in range
            if ($page > $page_count) {
                // error to user, maybe set page to 1
                $page = 1;
            }
        }
        // build query
        $offset = ($page - 1) * $items_per_page;
        
          if (isset($_GET['outboundcampaign'])) {
        //retrieve information from prospects
        $get_blog_posts_query = $conn->prepare("select * from prospects where salesCampaignId=? order by dateCreated desc LIMIT ?,?");
        $get_blog_posts_query->bind_param("sii", $campaignid,$offset, $items_per_page);
        $get_blog_posts_query->execute();
        $selectprospectsqueryResult = $get_blog_posts_query->get_result();
          }
        /*
         * 
         * 
         * 
         * HANDLING PROSPECT PAGINATION ENDS..
         * 
         * 
         * 
         */



        include 'view/outgoing_call.php';
    }
    /*
     * 
     * 
     * include dashboard
     * 
     * 
     * 
     */
    if (isset($_GET['dashboard'])) {
        include_once 'view/dashboard.php';
    }
}
?>
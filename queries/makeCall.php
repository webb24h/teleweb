<?php

include '../config.php';

if(isset($_POST['agentid']) && $_POST['phonenumber']
        && $_POST['prospectid'] && $_POST['campaignid'] && $_POST['twiliocallsid']){
    
    //get variables
    $agentid = $_POST['agentid'];
    $phonenumber = $_POST['phonenumber'];
    $prospectid = $_POST['prospectid'];
    $campaignid = $_POST['campaignid'];
    $twiliocallsid = $_POST['twiliocallsid'];
    $call_start = date('Y-m-d H:i:s');
    $call_type = 'Outbound';
    $call_status = 'Ongoing';
    
    //create unique call id
    $calluniqueid= 'outboundcall' . substr(sha1(mt_rand()), 17, 6).date('Y-m-d');
    
    //insert call
    $stmt_insertCall = $conn->prepare("INSERT INTO call_logs (twilioCallSid,ccampaignid,calluniqueid,cprospectid,call_type,call_status,cagentid,cnumbercall,call_start) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt_insertCall->bind_param("sssssssss", $twiliocallsid,$campaignid,$calluniqueid,$prospectid,$call_type,$call_status,$agentid,$phonenumber,$call_start);
    $stmt_insertCall->execute();
    $stmt_insertCall->close();
    
    //change agent status to "On Call"
    //when call ends change agent status to WrapUp
    $agentStatusOption = "On Call";
    
    //agent type
    $agent_type = 'inbound and outbound';
    
    $agentstatus_insertstmt = $conn ->prepare("INSERT INTO user_status (userid,agent_call_status,agent_type) VALUES (?,?,?)");
    $agentstatus_insertstmt ->bind_param('sss',$agentid,$agentStatusOption,$agent_type);
    $agentstatus_insertstmt ->execute();
    $agentstatus_insertstmt ->close();
    $agentstatus_insertstmt_finishs = 1; 
    
    //return unique callid
      if($agentstatus_insertstmt_finishs == 1){
              //create json
          $resulterr = array('message' => "success",
              'uniquecallid' => $calluniqueid,
              'agentid' => $agentid
              );
          header('Content-Type: application/json');
          echo json_encode($resulterr);
    }
}else{
    echo 'oops';
}
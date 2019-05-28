<?php

include '../config.php';

if(isset($_POST['agentid']) && $_POST['uniquephonecallid']){
    
    //post variables
    $agentid = $_POST['agentid'];
    $uniquephonecallid = $_POST['uniquephonecallid'];
    
    $call_end = date('Y-m-d H:i:s');
    
     //update call
    $stmt_updateCall = $conn->prepare("UPDATE call_logs SET call_end=? WHERE cagentid=? AND calluniqueid=?");
    $stmt_updateCall->bind_param("sss", $call_end,$agentid,$uniquephonecallid);
    $stmt_updateCall->execute();
    $stmt_updateCall->close();
    
    //update agent status
     $agentStatusOption = "Ready For Call";
    
    //agent type
    $agent_type = 'inbound and outbound';
    
    $agentstatus_insertstmt = $conn ->prepare("INSERT INTO user_status (userid,agent_call_status,agent_type) VALUES (?,?,?)");
    $agentstatus_insertstmt ->bind_param('sss',$agentid,$agentStatusOption,$agent_type);
    $agentstatus_insertstmt ->execute();
    $agentstatus_insertstmt ->close();
    $agentstatus_insertstmt_finishs = 1; 
    
    //convert to json and send back to ajax
         if($agentstatus_insertstmt_finishs == 1){
              //create json
          $resulterr = array('message' => "success");
          header('Content-Type: application/json');
          echo json_encode($resulterr);
    }
}
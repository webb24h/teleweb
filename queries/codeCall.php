<?php

include '../config.php';

if(isset($_POST['agentid']) && $_POST['uniquephonecallid'] && $_POST['call_status']){
    
    //post variables
    $agentid = $_POST['agentid'];
    $uniquephonecallid = $_POST['uniquephonecallid'];
    $call_status = $_POST['call_status'];
    
    
    //insert call as a training file
    if($call_status=='Not Interested'){
        
    }
    
     //update call
    $stmt_updateCall = $conn->prepare("UPDATE call_logs SET call_status=? WHERE cagentid=? AND calluniqueid=?");
    $stmt_updateCall->bind_param("sss", $call_status,$agentid,$uniquephonecallid);
    $stmt_updateCall->execute();
    $stmt_updateCall->close();
    
    $agentstatus_insertstmt_finishs = 1;
    
    
    //convert to json and send back to ajax
         if($agentstatus_insertstmt_finishs == 1){
              //create json
          $resulterr = array('message' => "success");
          header('Content-Type: application/json');
          echo json_encode($resulterr);
    }
}
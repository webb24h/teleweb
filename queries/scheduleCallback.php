<?php

include '../config.php';

if(isset($_POST['agentid']) && $_POST['uniquephonecallid'] 
        && $_POST['prospectid'] && $_POST['callbackdate'] && $_POST['callbacktime']){
    
    //post variables
    $agentid = $_POST['agentid'];
    $prospectid = $_POST['prospectid'];
    $callbackdate = $_POST['callbackdate'];
     $callbacktime = $_POST['callbacktime'];
    $uniquephonecallid = $_POST['uniquephonecallid'];
    $call_status = 'Callback';
    
     //update call
    $stmt_updateCall = $conn->prepare("UPDATE call_logs SET call_status=? WHERE cagentid=? AND calluniqueid=?");
    $stmt_updateCall->bind_param("sss", $call_status,$agentid,$uniquephonecallid);
    $stmt_updateCall->execute();
    $stmt_updateCall->close();
    
    
    //insert in call back
    $stmt_insertCall = $conn->prepare("INSERT INTO callbacks (callback_date,callback_time,prospectid) VALUES(?,?,?)");
    $stmt_insertCall->bind_param("sss",$callbackdate,$callbacktime,$prospectid);
    $stmt_insertCall->execute();
    $stmt_insertCall->close();
    
    $agentstatus_insertstmt_finishs = 1;
    
    //convert to json and send back to ajax
         if($agentstatus_insertstmt_finishs == 1){
              //create json
          $resulterr = array('message' => "success");
          header('Content-Type: application/json');
          echo json_encode($resulterr);
    }
}
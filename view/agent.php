<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
             <h3> Agent Information </h3>
               <hr>
                
                <h4 style=""> Member Since : <?=$userDetail['date_created']?></h4>
                
                 <h4 style="">User level : <?php 
                 if($userInfo['user_level']=='1'){
                     echo 'User';
                    }else{
                     echo 'Administrator';
                     
                     };?></h4>
                
            <h4 style="">User : <?=$userInfo['first_name'].' '.$userInfo['last_name']?></h4>
             
                <h4 style=""> phone number: <?=$userInfo['mobile']?></h4>

              <h4 style=""> email: <?=$userInfo['email']?></h4>
              
              <h4 style="">Username: <?=$userInfo['username']?></h4>
              
               <a class="btn btn-default" href="index.php?callcenter&viewagentlist">View Agents List</a>
               
               <a class="btn btn-primary" href="index.php?callcenter&updateagent=<?=$agentid?>">Update This Agent</a>
            </div>
       <div class="col-md-6"> 
                   <div id="piechart" style="height: 400px !important;"></div>
            
            </div>
             </div>
         
              
        <div class="col-md-12"> 
            <h3>Call Logs</h3>
          <?php if($selectprospectsqueryResult->num_rows>0){?>
            <div style="height:400px !important; overflow-y:scroll;">

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Recording</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>

                    </thead>
                    <?php while ($call = $selectprospectsqueryResult->fetch_assoc()) {
                        
                        $agentid =$call['cagentid'];
                        
                          //fetch call sid
                        $callsid = $call['twilioCallSid'];
                        
                         $stmt_uppm = $conn->prepare("select * FROM user where uid=?");
                        $stmt_uppm->bind_param("s", $agentid);
                        $stmt_uppm->execute();
                        $resultstmt_uppm = $stmt_uppm->get_result();
                        $agent = $resultstmt_uppm->fetch_assoc();
                        
                        $agentname =$agent['first_name'];
                        
                        ?>
                        <tr>
                            <td>
                              <?=$call['cnumbercall']?>
                            </td>
                             <td>
                              <?=$call['call_type']?>
                            </td>
                              <td>
                              <?=$call['call_status']?>
                            </td>
                               <td>
                                <?php 
                                $recordings = $client->recordings->read(array("callSid" => $callsid),1);

                                foreach ($recordings as $record) {
                                     echo' <a href="index.php?callcenter&listencall='.$callsid.'&agent='.$agentid.'&recordsid='.$record->sid.'">
                                      <i class="fa fa-play"></i> 
                                  </a>';
                                }
                                ?>
                            </td>
                              <td>
                              <?=$call['call_start']?>
                            </td>
                             <td>
                              <?=$call['call_end']?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>


            </div>
<?php }else{
                echo '<p class="alert-warning">This agent has not made any calls yet.</p>';
            }
            ?>

        </div>

    </div>
        
            
        </div>
               
<!--
/*
*
*
*
*
*
*
*
GOOGLE PIE CHART
*
*
*
*
*
*
*
*
*/
-->
<?php if($row_count>0){?>
<script>
google.setOnLoadCallback(drawChart);
      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Call', 'Statistics'],
          ['Callback',<?=$callback_calls_count?>],
          ['Voicemail',<?=$voicemail_calls_count?>],
          ['Busy Line',<?=$busy_calls_count?>],
          ['No Response',<?=$noresponse_calls_count?>],
          ['Absent',<?=$absent_calls_count?>],
          ['Not Interested',<?=$ni_calls_count?>],
          ['Not In Service',<?=$nis_calls_count?>],
          ['Do Not Call',<?=$dnc_calls_count?>],
          ['Wrong Number',<?=$wn_calls_count?>],
          ['Hang Up',<?=$hu_calls_count?>],
          ['No Number',<?=$nn_calls_count?>],
          ['Success',<?=$success_calls_count?>]
        ]);

        var options = {
          title: 'Agent Performance',
            pieHole: 0.4

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<?php }?>
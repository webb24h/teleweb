<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-12"> 
            
              <div class="col-md-6"> 
                
                          <h3> Campaign Information </h3>
               <hr>
                
            <h4>Name : <?=$campaign['campaign_name']?></h4>
            
            
            <h4>Type : <?=$campaign['campaign_type']?></h4>
            
            <h4>Target : <?=$campaign['campaign_target']?></h4>
            
            
            <h4>Status :  <?=$campaign['campaign_status']?></h4>
            
            
            <h4>Start :  <?=$campaign['period_start']?></h4>

           <h4>End :   <?=$campaign['period_end']?></h4>
           
             <a class="btn btn-primary" href="index.php?callcenter&updatecampaign=<?=$campaignid?>">Update This Campaign</a>
            </div>
            
            <div class="col-md-6"> 
                   <div id="piechart" style="height: 400px !important;"></div>
            
            </div>
            
            <hr>
        </div>
             
        <div class="col-md-12"> 
           
            <a class='btn btn-success' href='index.php?callcenter&outboundcampaign&entercampaign=<?=$campaign['campaignid']?>&agent=<?=$userDetail['uid']?>&page=1'>Enter Campaign To Make Calls</a>
            
               <?php  if($userDetail['user_level']>1){?>
            <a class='btn btn-default' href='index.php?callcenter&campaign=<?=$campaign['campaignid']?>&assignprospects'>Add Prospects To This Campaign</a>
               <?php }?>
            <hr>
            
        </div>
        
         <div class="col-md-12"> 
            <h3><?=$get_prospect_results->num_rows?> Prospects</h3>
            <?php if($get_prospect_results->num_rows>0){?>
            <div style="height:400px !important; overflow-y:scroll;">
                
                

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                             <th>Name</th>
                            <th>Position</th>
                            <th>Company</th>
                            
                        </tr>

                    </thead>
                    <?php while ($prospect = $get_prospect_results->fetch_assoc()) {?>
                        <tr>
                            <td>
                  <a href="index.php?callcenter&viewprospect=<?=$prospect['pid']?>&campaignid=<?=$campaign['campaignid']?>">
                   <?=$prospect['first_name'].' '.$prospect['last_name']?> </a></td>
                <td><?=$prospect['occupation']?></td>
                <td><?=$prospect['company']?></td>
                        </tr>
                    <?php } ?>

                </table>
                

            </div>
            <?php }else{
                echo '<p class="alert-warning">There seems to be no prospects assigned to this campaign.</p>';
            }
            ?>

            <hr>
        </div>
              
        <div class="col-md-12"> 
            <h3><?=$resultstmt_uppms->num_rows?> Calls Made</h3>
          <?php if($resultstmt_uppms->num_rows>0){?>
            <div style="height:400px !important; overflow-y:scroll;">

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Type</th>
                            <th>Status</th>
                               <th>Recording</th>
                            <th>Agent</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>

                    </thead>
                    <?php while ($call = $resultstmt_uppms->fetch_assoc()) {
                        
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
                              <?=$agentname?>
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
                echo '<p class="alert-warning">No calls were made in this campaign.</p>';
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
<?php if($calls_count>0){?>
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
          title: 'Campaign Performance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<?php }?>
<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-12"> 
            <h3>Call Logs</h3>

             <?php if($resultstmt_uppmsd->num_rows>0){?>
            <div style="height:600px !important; overflow-y:scroll;">

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Agent</th>
                            <th>Recording</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>

                    </thead>
                    <?php while ($call = $resultstmt_uppmsd->fetch_assoc()) {
                        
                        //fetch agent id
                        $agentid =$call['cagentid'];
                        
                        //fetch call sid
                        $callsid = $call['twilioCallSid'];
                        
                        //fetch agent names
                         $stmt_uppmrf = $conn->prepare("select * FROM user where uid=?");
                        $stmt_uppmrf->bind_param("s", $agentid);
                        $stmt_uppmrf->execute();
                        $resultstmt_uppmrf = $stmt_uppmrf->get_result();
                        $agent = $resultstmt_uppmrf->fetch_assoc();
                        
                        //fetch agent first name
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
                                    <a href="index.php?callcenter&viewagent=<?=$agentid?>">
                              <?=$agentname?>
                                    </a>
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
                echo '<p class="alert-warning">No call logs.</p>';
            }
            ?>
        </div>

    </div>
</div>
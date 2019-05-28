<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-12"> 
            <h3><?=$resultstmt_uppm->num_rows?> Agents</h3>
            <?php if(isset($_GET['activationSuccess'])){
                echo '<p style="padding:1%; font-size:small;" class="text-success text-center alert-success">All the agents with pending accounts have been sent an email to activate their account. They can activate their account by clicking on the link we sent to the email you have used to add them to the platform.</p>';
            }?>
            <hr>
            <?php  if($userDetail['user_level']>1){?>
            <form method="post" action="queries/activateagents.php">
            <a href="index.php?callcenter&createnewagent" class="btn btn-primary">Create New Agent</a>
            <input type="hidden" value="activateagent" name="activateagent">
              <button type="submit" class="btn btn-default">Activate New Agents</button>
                          <!--DATABASE NAME-->
        <?php if(isset($_SESSION['company_database'])){
            echo '<input id="myDatabaseName" name="myDatabaseName" type="hidden" value="'.$_SESSION['company_database'].'">';
        }?>
            </form>
           
            <hr>
             <?php }?>
            <div style="height:600px !important; overflow-y:scroll;">

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Names</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Date Created</th>
                        </tr>

                    </thead>
                    <?php while ($agent = $resultstmt_uppm->fetch_assoc()) {
                        
                        
                        //get agent status
                        $uid=$agent['uid'];
                        $getagentstatus = $conn->prepare("select * from user where uid=? order by last_update desc limit 1");
                        $getagentstatus->bind_param('s',$uid);
                        $getagentstatus->execute();
                        $result = $getagentstatus->get_result();
                        $agentstatus =  $result->fetch_assoc();
                        
                         if($agent['user_level']==1){
                        $level = 'Agent';
                        }
                        
                         if($agent['user_level']==2){
                        $level = 'Administrator';
                        }
                        
                        if($agentstatus['isActive']==0){
                            $agentStatus = 'Pending Activation';
                        }else{
                          $agentStatus = 'Active';
                        }
                        ?>
                        <tr>
                            <td>
                              <?=$agent['uid']?>
                            </td>
                             <td>
                                 <a href="index.php?callcenter&viewagent=<?=$agent['uid']?>">
                              <?=$agent['first_name'].' '.$agent['last_name']?>
                                 </a>
                            </td>
                             <td>
                             <?=$agentStatus?>
                            </td>
                              <td>
                              <?=$level?>
                            </td>
                             <td>
                             <?=$agent['date_created']?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>


            </div>


        </div>

    </div>
</div>
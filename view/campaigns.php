<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-12"> 
            <h3><?=$resultstmt_uppm->num_rows?> Campaigns</h3>
            <hr>
            <?php  if($userDetail['user_level']>1){?>
            <a href="index.php?callcenter&createnewcampaign" class="btn btn-primary">Create New Campaign</a>
            <hr>
            <?php }?>
            
            <?php if($resultstmt_uppm->num_rows>0){?>
            <div style="height:400px !important; overflow-y:scroll;">

                <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Prospects</th>
                            <th>Type</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Date Created</th>
                        </tr>

                    </thead>
                    <?php while ($campaign = $resultstmt_uppm->fetch_assoc()){
                        
                        //get this campaign id
                        $campaignIDD = $campaign['campaignid'];
                        
                        //count the number of calls for each campaign
                         $stmt_uppmscf = $conn->prepare("select * FROM prospects where salesCampaignId=?");
                            $stmt_uppmscf->bind_param('s', $campaignIDD);
                            $stmt_uppmscf->execute();
                            $resultstmt_uppmscf = $stmt_uppmscf->get_result();
                        
                        ?>
                        <tr>
                            <td>
                                <a href='index.php?callcenter&viewcampaign=<?=$campaign['campaignid']?>'>
                              <?=$campaign['campaign_name']?>
                                </a>
                            </td>
                             <td>
                              <?=$campaign['campaign_status']?>
                            </td>
                             <td>
                              <?=$resultstmt_uppmscf->num_rows?>
                            </td>
                             <td>
                              <?=$campaign['campaign_type']?>
                            </td>
                              <td>
                              <?=$campaign['period_start']?>
                            </td>
                              <td>
                              <?=$campaign['period_end']?>
                            </td>
                             <td>
                             <?=$campaign['last_update']?>
                            </td>
                        </tr>
                    <?php } ?>

                </table>


            </div>
            <?php }?>

        </div>

    </div>
</div>
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
           
           </div>
            
         <div class="col-md-6"> 
            <h3>Update Campaign</h3>
              <hr>
            <p class="text-danger">* Only update the fields that need to be changed.</p>
            <hr>
            <?php 
             if(isset($_GET['errorCampaign'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center"> Something went wrong. Please make sure you only update the fields that need to be updated.</p>';
            }
            if(isset($_GET['successCampaign'])){
            echo '<p style="padding:1%; font-size:small;" class="text-success text-center"> Your campaign has been successfully updated.</p>';
            }
            
            ?>
            <form method='post' action='queries/updatecampaign.php'>
                
                 <div class="row">
                <div class="col-md-12"> 
            <input class='form-control' value="<?=$campaign['campaign_name']?>" required type="text" name="campaignName" placeholder="Campaign Name"/>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
             <select class="form-control" name="campaignType" required="">
                        <option value="">Please choose campaign type...</option>
                        <option value="Acquisition">Acquisition</option>
                        <option value="Upsell">Upsell</option>
                        <option value="Survey">Survey</option>
                        <option value="Quality Control">Quality Control</option>
                    </select>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="campaignStatus" required="">
                        <option value="">Please choose campaign status...</option>
                        <option value="Active">Active</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Paused">Paused</option>
                        <option value="Finished">Finished</option>
                        <option value="Canceled">Canceled</option>
                    </select>
                </div>
                 </div>
            
                
                      <div class="row">
                <div class="col-md-12">
            <input class='form-control' value="<?=$campaign['campaign_target']?>" required style="" type="text" name="campaignTarget" placeholder="Campaign Target"/>
                </div>
                      </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control datepicker' value="<?=$campaign['period_start']?>" required type="text" name="periodStart" placeholder="Period Start"/>
                </div>
                 </div>
                
                   <div class="row">
                <div class="col-md-12">
            <input class='form-control datepicker' value="<?=$campaign['period_end']?>" required type="text" name="periodEnd" placeholder="Period End"/>
                </div>
                 </div>
                
            <input required type="hidden" name="campaignid" placeholder="" value="<?=$campaignid?>"/>
            
              <div class="row">
                <div class="col-md-12">
            <button type="submit" class="btn signup btn-primary">Update Campaign</button>
                </div>
              </div>
            </form>   
        </div>
            
        </div>
       
    </div>
        
            
        </div>

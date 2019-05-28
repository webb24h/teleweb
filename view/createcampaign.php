<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-6"> 
            <h3>New Campaign</h3>
            <?php 
             if(isset($_GET['errorCampaign'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center"> Something went wrong. Please make sure you fill up all the fields.</p>';
            }
            if(isset($_GET['successCampaign'])){
            echo '<p style="padding:1%; font-size:small;" class="text-success text-center"> Your campaign has been successfully added to your call center.</p>';
            }
            
            ?>
            <form method='post' action='queries/createcampaign.php'>
                
                 <div class="row">
                <div class="col-md-12"> 
            <input class='form-control' required type="text" name="campaignName" placeholder="Campaign Name"/>
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
                    <select class="form-control" name="campaignStatus" required>
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
            <input class='form-control' required style="" type="text" name="campaignTarget" placeholder="Campaign Target"/>
                </div>
                      </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control datepicker' required type="text" name="periodStart" placeholder="Period Start"/>
                </div>
                 </div>
                
                   <div class="row">
                <div class="col-md-12">
            <input class='form-control datepicker' required type="text" name="periodEnd" placeholder="Period End"/>
                </div>
                 </div>
                
            <input required type="hidden" name="workerid" placeholder="" value="<?=$userDetail['uid']?>"/>
            
              <div class="row">
                <div class="col-md-12">
            <button type="submit" class="btn signup btn-primary">Create Campaign</button>
                </div>
              </div>
            </form>   
        </div>
        
          <div style="display:none;" class="col-md-6"> 
            <h3>Multiple Campaign</h3>
            <p>You can upload multiple campaigns at a time with an excel sheet.</p>
            <form method='post' action='queries/createcampaigns.php'>
                
                  <div class="row">
                <div class="col-md-12"> 
            <input class='' required type="file" name="file" />
                </div>
                 </div>
                              <!--DATABASE NAME-->
        <?php if(isset($_SESSION['company_database'])){
            echo '<input id="myDatabaseName" name="myDatabaseName" type="hidden" value="'.$_SESSION['company_database'].'">';
        }?>

            </form>
          </div>
    </div>
</div>
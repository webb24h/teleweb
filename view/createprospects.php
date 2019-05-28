<div class="container container-main1 newformrow">
<form method='post' action='queries/createprospects.php' enctype= "multipart/form-data">
    <div class="row">
        <div class="col-md-6"> 
            <h3>Campaign</h3>
           You are about to add prospects to the <?=$campaign['campaign_name']?> campaign.
           <br><br>
           <p><input required name='confirmcampaign' type='checkbox'> Please check this box to confirm your choice</p>
           <br><br>
           If this is the wrong campaign, go back to previous page and select the right campaign.
        </div>
        
          <div class="col-md-6"> 
            <h3>Multiple Prospects</h3>
            <?php
            if(isset($_GET['validateIdentities'])){
                echo '<p style="padding:1%; font-size:small;" class="text-success text-center alert-success">All the prospects were added to the selecteed campaign successfully.</p>';}
            if(isset($_GET['errorUpload'])){
            echo '<p class="text-danger alert-danger text-center">Something went wrong. Please try again. Make sure you follow our guidelines to avoid errors.</p>';
            }
            ?>
            <p>You can upload multiple prospects at a time with an excel sheet.
            
                <br><br>
                 <span class='text-danger'>DO NOT modify nor delete the first line.</span>
                 <br><br>
                 
                 <span class='text-danger'>If a field does not correspond to your situation, leave it blank. </span>
                 <br><br>
                 
                 <span class='text-success'>IMPORTANT : enter the number <?=$campaignid?> in the column "salesCampaignId" for every prospect.</span>
                 <br><br>
                Please download and fill up our blank canva to avoid any conflicts or error.
                <br><br>
               
                <a class="btn btn-default" href="queries/download_prospects_excel_template.php">Download Prospects Excelsheet Template</a>
            
                
                <br><br>
                When your file is ready to be uploaded, click on the button below and select your file from your computer.
            </p>
            
                
                  <div class="row">
                <div class="col-md-12"> 
            <input class='' accept=".csv" required type="file" name="file" />
               <input type="hidden" name="campaignid" value="<?=$campaignid?>"/>
            <br><br>
            <button class="btn btn-success" type="submit">Upload Prospects File</button>
                </div>
                 </div>
            
          </div>
    </div>
    </form>
</div>
<div class="container container-main1 newformrow">

    <div class="row">
        <div class="col-md-6"> 
            <h3>New Agent</h3>
            <?php 
            if(isset($_GET['errorRegistrationActive'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center">We found an account with same email that is not activated. To be able to use their account, the agent has to activate their account by clicking on the link we sent to their email when you first added them to the platform.</p>';
            }
            if(isset($_GET['validateIdentity'])){echo '<p style="padding:1%; font-size:small;" class="text-success text-center">The agent has been added to the call center with success. They can activate their account by clicking on the link we sent to the email you have used to add them to the platform.</p>';}?>
            <form method='post' action='queries/createagent.php'>
                
                 <div class="row">
                <div class="col-md-12"> 
            <input class='form-control' required type="text" name="first_name" placeholder="First Name"/>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control' required type="text" name="last_name" placeholder="Last Name"/>
                </div>
                 </div>
                
                <div class="row">
                <div class="col-md-12">
                    <select required class="form-control" name="user_level" required="">
                        <option value="">Please choose user level...</option>
                        <option value="1">Agent</option>
                        <option value="2">Administrator</option>
                    </select>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control' required type="text" name="company" placeholder="Company" value='<?=$userDetail['company']?>'/>
                </div>
                 </div>
            
                
                      <div class="row">
                <div class="col-md-12">
            <input class='form-control' required style="" type="tel" id="phone" name="mobilePhone" placeholder="Mobile"/>
                </div>
                      </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control' required type="email" name="email" placeholder="Enter email"/>
                </div>
                 </div>
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control' required type="text" name="username" placeholder="Choose username"/>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input class='form-control' required type="password" name="password" placeholder="Create password"/>
                </div>
                 </div>
                
            <input required type="hidden" id="countryCode" name="countryCode" placeholder=""/>
            
              <div class="row">
                <div class="col-md-12">
            <button type="submit" class="btn signup btn-primary">Create Agent</button>
                </div>
              </div>
            </form>   
        </div>
        
          <div class="col-md-6"> 
            <h3>Multiple Agents</h3>
            <?php
            if(isset($_GET['validateIdentities'])){
                echo '<p style="padding:1%; font-size:small;" class="text-success text-center alert-success">All the agents were added to the database successfully. In order to activate their account please visit the <a href="index.php?callcenter&viewagentlist">agents list page</a> and click on "Activate Agents".</p>';}
            if(isset($_GET['errorUpload'])){
            echo '<p class="text-danger alert-danger text-center">Something went wrong. Please try again. Make sure you follow our guidelines to avoid errors.</p>';
            }
            ?>
            <p>You can upload multiple agents at a time with an excel sheet.
            
                
                <br><br>
                 <span class='text-danger'>DO NOT modify nor delete the first line.</span>
                 <br><br>
                 
                 <span class='text-danger'>If a field does not correspond to your situation, leave it blank. </span>
                 <br><br>
                Please download and fill up our blank canva to avoid any conflicts or error.
                <br><br>
               
                <a class="btn btn-default" href="queries/download_agent_excel_template.php">Download Agent Excelsheet Template</a>
            
                
                <br><br>
                When your file is ready to be uploaded, click on the button below and select your file from your computer.
            </p>
            <form method='post' action='queries/createagents.php' enctype= "multipart/form-data">
                
                  <div class="row">
                <div class="col-md-12"> 
            <input class='' accept=".csv" required type="file" name="file" />
            <br><br>
            <button class="btn btn-success" type="submit">Upload Agents File</button>
                </div>
                 </div>
            </form>
          </div>
    </div>
</div>
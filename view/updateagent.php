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
            
            </div>
       <div class="col-md-6"> 
            <h3>Update Agent</h3>
            <hr>
            <p class="text-danger">* Only update the fields that need to be changed.</p>
            <hr>
            <?php 
             if(isset($_GET['errorPost'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center"> Something went wrong. Please make sure you only fill up the fields that require changes.</p>';
            }
            if(isset($_GET['validateIdentity'])){echo '<p style="padding:1%; font-size:small;" class="text-success text-center">The agent has been updated with success.</p>';}?>
            <form method='post' action='queries/updateagent.php'>
                
                 <div class="row">
                <div class="col-md-12"> 
            <input value="<?=$userInfo['first_name']?>" class='form-control' required type="text" name="first_name" placeholder="First Name"/>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input value="<?=$userInfo['last_name']?>" class='form-control' required type="text" name="last_name" placeholder="Last Name"/>
                </div>
                 </div>
                
                 <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="user_level" required="">
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
            <input value="<?=$userInfo['mobile']?>" class='form-control' required style="" type="tel" id="phone" name="mobilePhone" placeholder="Mobile"/>
                </div>
                      </div>
                
                 <div class="row">
                <div class="col-md-12">
            <input value="<?=$userInfo['email']?>" class='form-control' required type="email" name="email" placeholder="Enter email"/>
                </div>
                 </div>
                 <div class="row">
                <div class="col-md-12">
            <input value="<?=$userInfo['username']?>" class='form-control' required type="text" name="username" placeholder="Choose username"/>
                </div>
                 </div>
                
              <div class="row">
                <div class="col-md-12">
                      <input value="<?=$userInfo['uid']?>" class='form-control' required type="hidden" name="agentid"/>
               
            <button type="submit" class="btn signup btn-primary">Update Agent Details</button>
                </div>
              </div>
            </form>   
        </div>
             </div>
     

    </div>
        
            
        </div>

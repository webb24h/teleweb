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
              
               <a class="btn btn-default" href="index.php?callcenter&viewagent=<?=$agentid?>">View Agent Calls</a>
            </div>
       <div class="col-md-6">
             <h3>Call Detail</h3>
               <hr>
                
                <h4 style=""> Number :   <?=$callInfo['cnumbercall']?></h4>
                  <h4 style=""> Call Type :   <?=$callInfo['call_type']?></h4>
                  <h4 style=""> Call Status :   <?=$callInfo['call_status']?></h4>
                   <h4 style=""> Campaign :   <?=$callInfo['ccampaignid']?></h4>
                   <h4 style=""> Started :   <?=$callInfo['call_start']?></h4>
                   <h4 style=""> Ended :   <?=$callInfo['call_end']?></h4>
                   <br><br>
                    <h4 style=""> Play Call :   
                        <br>
                        <?php 
                     $recording = $client->recordings($recordsid)
                    ->fetch();
                     echo '<audio controls>
                      <source src="https://api.twilio.com/'.$recording->uri.' type="audio/wav">
                        Your browser does not support the audio tag.
                      </audio>';
                        ?>
                    
                    </h4>
                   
                   <a class="btn btn-default" href="index.php?callcenter&viewcalllogs"><- Back to Calls</a>
            </div>
             </div>
         
  

    </div>
        
            
        </div>

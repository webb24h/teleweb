    <div class="container container-main4">
        
        
         <div class="row">
            <div class="col-md-12">
             <h3> Account Information </h3>
               <hr>
                
                <h4 style=""> Member Since : <?=$userDetail['date_created']?></h4>
                
                 <h4 style="">User level : <?php 
                 if($userDetail['user_level']=='1'){
                     echo 'User';
                    }else{
                     echo 'Administrator';
                     
                     };?></h4>
                
            <h4 style="">User : <?=$userDetail['first_name'].' '.$userDetail['last_name']?></h4>
             
                <h4 style=""> phone number: <?=$userDetail['mobile']?></h4>

              <h4 style=""> email: <?=$userDetail['email']?></h4>
              
              <h4 style="">Username: <?=$userDetail['username']?></h4>
               
               
            </div>
        </div>
    </div>
        
        
        
        
          <div class="container container-main4">
        <div class="row">
            <div class="col-md-12">
                <h3> Software General Information </h3>
               <hr>
               *************************************************************************<br>
                * <br>
                * TELEWEB LIGHT <br><br>
                * CURRENT VERSION : <?=$softwareversion?><br><br>
                * <br>
                * LICENSE : GNU GENERAL PUBLIC LICENSE<br><br>
                * Read More On GNU GENERAL PUBLIC LICENSE at https://www.gnu.org/licenses/gpl-3.0.en.html<br><br>
                *<br>
                * Copyright (C) [2019] Teleweb Systems and Webb24h Incorporated<br><br>
                * All Rights Reserved.<br><br>
                 *************************************************************************<br>
               
            </div>
        </div>
    </div>
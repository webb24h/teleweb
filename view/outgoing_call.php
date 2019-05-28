<div class="container container-main2 newformrow">
    <h2 style="padding:1%;">
        
          <?php 
                if(isset($_GET['myleads'])){
                    echo 'My Leads';
                    $variablelink = 'myleads';
                }
                
                
                if(isset($_GET['callbacks'])){
                    echo 'Callbacks';
                    $variablelink = 'callbacks';
                }
                
                
                 if(isset($_GET['callinglogs'])){
                    echo 'My Call Logs';
                    $variablelink= 'callinglogs';
                }
                
                 if(isset($_GET['outboundcampaign'])){
                    echo 'Prospect List';
                    $variablelink= 'outboundcampaign';
                }
                ?>
    </h2>
     <div class="col-md-12" style="">
     
          <div class="" style="margin-bottom: 1%;">
         <span class="sectionAgent"><a href="?callcenter&outboundcampaign&entercampaign=<?=$campaignid?>&agent=<?=$agentid?>&page=1"> Prospect List</a></span>
         <span class="sectionAgent"><a href="?callcenter&myleads&entercampaign=<?=$campaignid?>&agent=<?=$agentid?>&page=1">My Leads</a></span>
         <span class="sectionAgent"><a href="?callcenter&callbacks&entercampaign=<?=$campaignid?>&agent=<?=$agentid?>&page=1">Callbacks</a></span>
        <span class="sectionAgent"><a href="?callcenter&callinglogs&entercampaign=<?=$campaignid?>&agent=<?=$agentid?>&page=1">My Call Logs</a></span>     
  </div>
         
    <div style="height:300px !important; overflow-y:scroll;">
        <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">
             <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Company</th>
                <?php  if(isset($_GET['callbacks'])){
                  echo '<th>Date</th>'  ;
                   echo '<th>Time</th>'  ;
                }
                
                if(isset($_GET['callinglogs'])){
                     echo '<th>Status</th>'  ;
                  echo '<th>Date</th>'  ;
                }
                ?>
            </tr>
        </thead>
            
            <tbody>
           <?php 
           if($row_count>0){
           
           while($prospect = $selectprospectsqueryResult->fetch_assoc()){?>
               <tr>
           
                <td>
                     <?php if(isset($_GET['prospect'])){
                         
                         $prospect_id = $_GET['prospect'];
                         
                         if($prospect_id==$prospect['pid']){
                             echo '<i class="fa fa-arrow-right text-success"></i>';
                         }
                         
                     }?>
                     
                    <a href="?<?=$variablelink?>&callcenter&outboundcampaign&entercampaign=<?=$campaignid?>&agent=<?=$agentid?>&prospect=<?=$prospect['pid']?>&page=<?=$page?>">
                   <?=$prospect['first_name'].' '.$prospect['last_name']?> </a></td>
                <td><?=$prospect['occupation']?></td>
                <td><?=$prospect['company']?></td>
                
                  <?php  
                  
                  if(isset($_GET['callbacks'])){
                  echo '<td>'.$prospect['callback_date'].'</td>'  ;
                  echo '<td>'.$prospect['callback_time'].'</td>'  ;
                }
                 if(isset($_GET['callinglogs'])){
                      echo '<td>'.$prospect['call_status'].'</td>'  ;
                   echo '<td>'.$prospect['call_end'].'</td>'  ;
                }
                ?>
           
        </tr>
           <?php }
           
                         }else{
                             echo '<tr><td>No data here yet.</td><td></td><td></td></tr>';
                         }
           
           ?>
            </tbody>
        </table>
    </div>
     </div>
    <div class="col-md-12" style="">
     <pager><?php include 'view/pager.php';?></pager><br><br>
    </div>
    
    
    
    <?php if(isset($_GET['prospect'])){?>
     <!-- Map Column -->
            <div style="" class="col-md-12">
                <!-- Embedded Google Map -->
                <?php 
                if(isset($_GET['prospect'])){
                $address = $thisprospect['city'].',' .$thisprospect['country']; /* Insert address Here */
                
                }else{
                    $address = 'Toronto' ; /* Insert address Here */
                }
                echo '<iframe width="100%" height="300px" frameborder="0" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
              ?>
            </div>
 
     
    <div class="" style="">
          <div class="col-md-4" style="">
            <?php include 'view/dialpad.php';?>
        </div> 
        
        <div class="col-md-4" style="background:whitesmoke;">
          <div class="" style="padding: 1%; font-size: small;">
                <h4 style="">Prospect : <?=$thisprospect['first_name'].' '.$thisprospect['last_name']?></h4>
                <hr>
                <p><i class='fa fa-phone-square'></i> phone number: <?=$thisprospect['countryCode'].''.$thisprospect['phone']?></p>
             <p><i class='fa fa-globe'></i> website: <?=$thisprospect['website']?></p>
              <p><i class='fa fa-at'></i> email: <?=$thisprospect['email']?></p>
               <p><i class='fa fa-flag'></i> country: <?=$thisprospect['country']?></p>
               <p><i class='fa fa-map'></i> State/Province: <?=$thisprospect['stateProvince']?></p>
               <p><i class='fa fa-car'></i> city: <?=$thisprospect['city']?></p>
                <p><i class='fa fa-building'></i> address: <?=$thisprospect['address']?></p>
                 <p><i class='fa fa-map-marker'></i> Postal: <?=$thisprospect['postalZipeCode']?></p>
              <hr>
              <h4 style="">Social Media </h4>
              <hr>
               <p><i class='fab fa-facebook'></i> <?=$thisprospect['facebookPage']?></p>
                <p><i class='fab fa-twitter'></i> <?=$thisprospect['twitterPage']?></p>
                 <p><i class='fab fa-youtube'></i> <?=$thisprospect['youtubePage']?></p>
                  <p><i class='fab fa-instagram'></i> <?=$thisprospect['instagramPage']?></p>
                   <p><i class='fab fa-linkedin'></i> <?=$thisprospect['linkedinPage']?></p>
        </div> 
       </div> 
      
        <div class="col-md-4" style="">
     <?php include 'view/report.php';?>
    </div>
        
        <hr>
    </div>
   
     
     <div class="col-md-12" style="">
      <div class="panel-group" id="accordionABC">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionABC" href="#collapse1ABC">
        SCRIPTS</a>
      </h3>
    </div>
    <div id="collapse1ABC" class="panel-collapse collapse">
        <div class="panel-body">
           

<div id="rscript" class="collapse">
<?php include 'view/script.php';?>
</div> 
            
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionABC" href="#collapse2ABC">
        PROSPECT CALL LOGS</a>
      </h3>
    </div>
    <div id="collapse2ABC" class="panel-collapse collapse">
        <div class="panel-body">
            <?php include 'view/prospect_logs.php';?>
        </div>
    </div>
  </div>
</div> 
</div>      
</div>
     <?php }?>
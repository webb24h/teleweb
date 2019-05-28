<div class="container container-main1 newformrow">
    <div class="row">
         <div class="col-md-12"> 
               <div class="col-md-6" style="margin-bottom:2% !important;">
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
          </div>
               </div>
              
              <div class="col-md-6" style="margin-bottom:2% !important;">
              <h4 style="">Social Media </h4>
              <hr>
               <p><i class='fab fa-facebook'></i> <?=$thisprospect['facebookPage']?></p>
                <p><i class='fab fa-twitter'></i> <?=$thisprospect['twitterPage']?></p>
                 <p><i class='fab fa-youtube'></i> <?=$thisprospect['youtubePage']?></p>
                  <p><i class='fab fa-instagram'></i> <?=$thisprospect['instagramPage']?></p>
                   <p><i class='fab fa-linkedin'></i> <?=$thisprospect['linkedinPage']?></p>
        </div> 
       
       </div> 
            
            
         <div class="col-md-12">
        
        <div style="height:300px !important; overflow-y:scroll;">
        <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">
             <thead>
            <tr>
                <th>Agent</th>
                <th>Status</th>
                  <th>Recording</th>
               <th>Date</th>
            </tr>
        </thead>
            
            <tbody>
           <?php 
           if($row_count_p>0){
           
           while($prospect_c = $selectprospectsqueryResult5->fetch_assoc()){
               
               $agent_info = $prospect_c['cagentid'];
               
                    //fetch call sid
                        $callsid = $prospect_c['twilioCallSid'];
               
               //get agent names 
               $getagentinforquery = $conn->prepare("select first_name, last_name from user where uId=?");
               $getagentinforquery->bind_param('s',$agent_info);
               $getagentinforquery->execute();
               $agentresult = $getagentinforquery->get_result();
               $agentfetch = $agentresult->fetch_assoc();
               
               ?>
               <tr>
                <td><?=$agentfetch['first_name'].' '.$agentfetch['last_name']?> </td>
                <td><?=$prospect_c['call_status']?></td>
                    <td>
                                <?php 
                                $recordings = $client->recordings->read(array("callSid" => $callsid),1);

                                foreach ($recordings as $record) {
                                     echo' <a href="index.php?callcenter&listencall='.$callsid.'&agent='.$agent_info.'&recordsid='.$record->sid.'">
                                      <i class="fa fa-play"></i> 
                                  </a>';
                                }
                                ?>
                            </td>
                <td><?=$prospect_c['call_end']?></td>
               </tr>
           <?php }
           
                         }else{
                             echo '<tr><td>Nobody called this prospect before.</td><td></td><td></td></tr>';
                         }
           
           ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    
</div>
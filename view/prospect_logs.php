 <div style="height:300px !important; overflow-y:scroll;">
        <table style="margin: 0px !important;" id="" class="table table-bordered table-condensed table-striped table-hover" cellspacing="0" width="100%">
             <thead>
            <tr>
                <th>Agent</th>
                <th>Status</th>
               <th>Date</th>
            </tr>
        </thead>
            
            <tbody>
           <?php 
           if($row_count_p>0){
           
           while($prospect_c = $selectprospectsqueryResult5->fetch_assoc()){
               
               $agent_info = $prospect_c['cagentid'];
               
               //get agent names 
               $getagentinforquery = $conn->prepare("select first_name, last_name from user_details where customerId=?");
               $getagentinforquery->bind_param('s',$agent_info);
               $getagentinforquery->execute();
               $agentresult = $getagentinforquery->get_result();
               $agentfetch = $agentresult->fetch_assoc();
               
               ?>
               <tr>
                <td><?=$agentfetch['first_name'].' '.$agentfetch['last_name']?> </td>
                <td><?=$prospect_c['call_status']?></td>
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
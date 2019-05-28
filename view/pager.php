<?php
//pagination
echo '<div class="col-md-12" style="background:whitesmoke; font-size:small;"><ul class="pager" >';

        //blog.php pagination handling
        $next = ' Page ' . ($page+1);
        $prev = ' Page ' . ($page-1);
        
        if($page==1){
         $pagerVarPrevious = ''; 
         $hideprevious = 'style="visibility:hidden"';
        }else{
          $pagerVarPrevious =  $prev;  
           $hideprevious = 'style="visibility:visible"';
        }
          if($page==$page_count){
         $pagerVarNext = ''; 
         $hidenext= 'style="visibility:hidden"';
         
        }else{
          $pagerVarNext =  $next;   
           $hidenext= 'style="visibility:visible"';
        }
        
        $linkurlPrev='?callcenter&outboundcampaign&entercampaign='.$campaignid.'&agent='.$agentid.'&page='.($page-1);
        $linkurlNext='?callcenter&outboundcampaign&entercampaign='.$campaignid.'&agent='.$agentid.'&page='.($page+1);
        


        echo '<li class="previous">
                        <a title="' . $pagerVarPrevious . '" '.$hideprevious.' href="'. $linkurlPrev . '">&larr; ' . $pagerVarPrevious . '</a>
                    </li>
                    <li class="next">
                        <a title="' . $pagerVarNext . '" '.$hidenext.' href="' . $linkurlNext . '">' . $pagerVarNext . ' &rarr;</a>
                    </li>';


        echo '<span>Page ' . $page . '</span>/'.$page_count.'<br>';
        
       
        echo 'Jump to page <input id="jumptopagenumberinput" type="text"><a href="" class="jumptopagenumberbutton btn btn-default">Go</a> <br>';
        
        if( $row_count - $items_per_page * ($page - 1) > $items_per_page ) {
   echo '<span style="font-size:small">Showing results ' . $items_per_page * $page . '/' . $row_count.'</span>';
} else {
   echo '<span style="font-size:small">Showing results ' . $row_count . "/" . $row_count.'</span>';;
}
  
         echo '<input id="campaignID" type="hidden" value="'.$campaignid.'">';
        
         echo '<input id="agentID" type="hidden" value="'.$agentid.'">';
        
echo '</ul></div>';
?>





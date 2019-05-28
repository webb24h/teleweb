<div class="">
    <div class="container container-main3">
        <div class="text-center">
        <div class="row">
            <div class="col-md-4">
                Welcome to Teleweb, <?=$userDetail['first_name']?>
               
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">current version : <?=$softwareversion?> </div>
            <div class="col-md-3">Today : <?php echo date('Y-m-d')?></div>
               
        </div>
        </div></div>
    <?php 
    $z=0;
    foreach($dash_cards_arr as $single_card){$z++;
        
    //lower case the string
    $lowercase_cardname = strtolower($single_card);
    
    
    //remove whitespace characters for link
    $nospace_cardname = str_replace(' ', '', $lowercase_cardname);
                                    
        if($z==1){
            if($userDetail['user_level']>1){
            $single_card_opts = array("Create new agent","View agent list");
            }else{
              $single_card_opts = array("View agent list");   
            }
        }
        
         if($z==2){
            $single_card_opts = array("View campaigns list");
        }
        
         if($z==99){
              if($userDetail['user_level']>1){
           $single_card_opts = array("Create new script", "View scripts list");
              }else{
            $single_card_opts = array("View scripts list");       
              }
        }
        
         if($z==3){
           $single_card_opts = array("View call logs");
        }
        
         if($z==4){
            $single_card_opts = array("Account");
        }
        ?>
    
	<!--/***Content***/-->
	<div class="container container-main">
		<div class="row">
			<div class="col-md-4"> 
                            <img src="./images/<?=$nospace_cardname?>.jpg" alt="<?=$nospace_cardname?>.png" class="img-thumbnail"> </div>
			<div class="col-md-8">
				<h3><?=$single_card?></h3>
                                <hr class='hr'>
                                <?php
                                foreach($single_card_opts as $card_opt){
                                    
                                    //remove whitespace characters for link
                                    $newstringnospace = str_replace(' ', '',$card_opt);
                                    
                                    //lower case the string
                                    $lowercase = strtolower($newstringnospace);
                                    
                                    $fafa = '';
                                    
                                    if($card_opt=='Create new agent'){
                                        $fafa .='<i class="fa fa-user"></i> ';
                                    }
                                    if($card_opt=='View agent list'){
                                        $fafa .='<i class="fa fa-users"></i> ';
                                    }
                                     
                                     if($card_opt=='View campaigns list'){
                                        $fafa .='<i class="fa fa-list"></i> ';
                                    }
                                     if($card_opt=='Prospects List'){
                                        $fafa .='<i class="fa fa-users"></i> ';
                                    }
                                    
                                     if($card_opt=='Create new script'){
                                        $fafa .='<i class="fa fa-edit"></i> ';
                                    }
                                    if($card_opt=='View scripts list'){
                                        $fafa .='<i class="fa fa-file"></i> ';
                                    }
                                     if($card_opt=='View call logs'){
                                        $fafa .='<i class="fa fa-phone"></i> ';
                                    }
                                    if($card_opt=='Account'){
                                        $fafa .='<i class="fa fa-cog"></i> ';
                                    }
                                    
                                      if($card_opt=='Help'){
                                        $fafa .='<i class="fa fa-question"></i> ';
                                    }
                                     if($card_opt=='Billing'){
                                        $fafa .='<i class="fa fa-folder"></i> ';
                                    }
                                    echo '<p class="cardoptionname"><a href="index.php?callcenter&'.$lowercase.'">'.$fafa. ' '.$card_opt.'</a></p>';
                                }
				?>
			</div>
		</div>
        </div><br><br>
    <?php }?>
</div>
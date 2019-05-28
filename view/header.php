<header>
    <nav class="navbar navbar-fixed-top  <?=$headerclass?>" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand <?=$linkclass?>" href="<?=$homefile?>">
                 <!-- <img class="logo" alt="logo" src=""> -->
                    <span class="logotext"><img style="width:10% !important;" src="images/<?=$telelogo?>.png">ELEWEB LIGHT</span><br>
                    <span style="font-size:smaller !important; display:none;"></span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">

                    <!-- FRONT END TOOLS -->
                    <?php
                    if(isset($_GET['callcenter'])){
                        
                     echo '<!-- LOGOUT DETAILS-->
                           <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>
                        <span class="caret"></span></a>
                        <ul style="background:black !important;" class="dropdown-menu">
                          <li><a style="color:white !important;" href="queries/logout.php" class="">Logout</a></li>
                        </ul>
                      </li>
                    ';
                        
                    }else
                    if (isset($_GET['install'])) {
                    }
                    else{
                        
                        echo '
                    <!-- LOGIN DETAILS-->
                    <li><a href="index.php?login" class="'.$linkclass.'">Sign Up Free</a></li>
                    <!-- LOGIN DETAILS-->
                    <li><a href="index.php?login" class="'.$linkclass.'">Login</a></li>';
                    }
                    
                   ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</header>
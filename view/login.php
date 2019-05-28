<div class="container login-form-container">
<div class="form-modal">
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">log in</button>
        <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
    </div>

    <div id="login-form">
        <?php if(isset($_GET['error'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center">We could not find your account with those credentials.</p>';
        }
            if(isset($_GET['demo'])){
             echo '<p style="padding:1%; font-size:small;" class="text-success text-center">Email : userdemo@teleweb.com </p>';
              echo '<p style="padding:1%; font-size:small;" class="text-success text-center">Password : userdemo </p>';
            }
        ?>
        <form method="post" action="queries/login.php">
            <input required type="text" name="username" placeholder="Enter email"/>
            <input required type="password" name="password" placeholder="Enter password"/>
            <button type="submit" class="btn login">login</button>
            <p><a href="javascript:void(0)">Forgot password</a></p>
          <!--  <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign in with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign in with microsoft</button>
       -->
          </form>
    </div>

    <div id="signup-form">
          <?php if(isset($_GET['errorRegistrationActive'])){
            echo '<p style="padding:1%; font-size:small;" class="text-danger text-center">We found an account with same email. If you have forgotten your password click on forgot password.</p>';
        }?>
        <form id="registerform" method="post" action="queries/register.php">
            <input required type="text" name="first_name" placeholder="First Name"/>
            <input required type="text" name="last_name" placeholder="Last Name"/>
            <input required type="text" name="company" placeholder="Company"/>
            <select required name="industry" class="form-control">
                <?php include 'industries.php';?>
            </select>
            <input required type="text" name="website" placeholder="Website"/>
            <input required style="" type="tel" id="phone" name="mobilePhone" placeholder=""/>
            <input required type="email" name="email" placeholder="Enter your email"/>
            <input required type="text" name="username" placeholder="Choose username"/>
            <input required type="password" name="password" placeholder="Create password"/>
            <input required type="hidden" id="countryCode" name="countryCode" placeholder=""/>
            <button type="submit" class="btn signup">create account</button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
          <!--  <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign up with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign up with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign up with microsoft</button>
        -->
          </form>
    </div>

</div>
</div>
<br><br>
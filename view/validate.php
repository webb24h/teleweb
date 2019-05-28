<div class="container login-form-container">
<div class="form-modal">
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">Verification</button>
         <button id="signup-toggle" onclick="toggleSignup()">New Validation</button>
    </div>

    <div id="login-form">
        <?php if(isset($_GET['error'])){echo '<p style="padding:1%; font-size:small;" class="text-danger text-center">Wrong validation code. Please try again.</p>';}?>
         <?php if(isset($_GET['pleaseValidate'])){echo '<p style="padding:1%; font-size:small;" class="text-danger text-center">We found an account with your email that is not activated. Please click on new validation number to get a new verification code and activate your account.</p>';}?>
       <?php if(isset($_GET['validateIdentity'])){echo '<p style="padding:1%; font-size:small;" class="text-success text-center">Please enter the 4 digits code we sent to your email or mobile phone.</p>';}?>
        <form method="post" action="queries/validate.php">
            <input type="hidden" name="userid" placeholder="userid" value="<?=$id?>"/>
            <input type="validation" name="validation" placeholder="Enter 4 digits code"/>
            <button type="submit" class="btn login">Validate Identity</button>
          <!--  <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign in with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign in with microsoft</button>
       -->
          </form>
    </div>
    
       <div id="signup-form">
           <?php if(isset($_GET['validate'])){echo '<p style="padding:1%; font-size:small;" class="text-success text-center">If you did not receive any verification code, enter your email again and we will send you a new one.</p>';}?>
        <form method="post" action="queries/newvalidation.php">
            <input type="hidden" name="userid" placeholder="userid" value="<?=$id?>"/>
            <input type="text" name="email" placeholder="Enter email again"/>
            <button type="submit" class="btn signup">Send new number</button>
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
<br><br>
<br><br>

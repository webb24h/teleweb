<?php
/*
 * 
 * 
 * 
 * start session
 * 
 * 
 * 
 */
session_start();
/*
 * 
 * 
 * include config
 * 
 */
include_once '../config.php';
/*
 * 
 * 
 * login queries
 * 
 * 
 */
if (!empty( $_POST )) {
    
    
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        
        
         $username = $_POST['username'];
         $password = $_POST['password'];
        $isValid = 1;
        
        
        //check the database if there are records matching the email
        $stmt_invalidatepass = $conn->prepare("SELECT password,uid FROM user WHERE email=? AND isActive=? ORDER BY date_created DESC LIMIT 1");
        $stmt_invalidatepass->bind_param("ss",$username,$isValid); 
        $stmt_invalidatepass->execute(); 
        $resultvvvid = $stmt_invalidatepass->get_result();
        $rowvalida = $resultvvvid->fetch_assoc();
        $checkPassword = $rowvalida['password'];
        $userid = $rowvalida['uid'];
        
        //verify password
        $hash1_verified = password_verify($password, $checkPassword);
        
        
        // Verify user password and set $_SESSION
    	if( ($hash1_verified==false)){
             /*
             * 
             * set error message
             * 
             * 
             */
               $error = '<p style="padding:1%; font-size:small;" class="text-danger text-center">We could not find your account with those credentials.</p>';
            /*
             * 
             * redirect to login page
             * 
             */
            header("Location: ../index.php?login&error");
             /*
             * 
             * exit function
             * 
             */
             exit();
             //
             //
             //
        }else{
            /*
             * 
             * set session variable
             * user id
             * 
             */
             $_SESSION['user_id']= $userid;
            /*
             * 
             * redirect to call center dashboard
             * 
             */
             header("Location: ../index.php?callcenter&dashboard");
              /*
             * 
             * exit function
             * 
             */
             exit();
             //
             //
             //
            }
    }
    
    
    
}
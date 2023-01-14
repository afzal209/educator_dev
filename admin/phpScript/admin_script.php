<?php

if (isset($_POST['submit'])) {
    include('../db/connect.php');
    if( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
       header('location:../adminregistration.php?response=error&class=danger&message=All fields are mandatory.');
   }
   else{  
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $role='admin';
    $activation_code= md5(time() .$username);
    $email_status='0';
    $query=mysqli_query($con,"insert into user(username,email,password,role,activation_code,status) values('$username','$email','$password','$role','$activation_code','$email_status')");
    if($query){
        $user_permission=mysqli_query($con,"insert into user_permission(user_id) values(1)");
            //echo $user_permission;    
        if ($user_permission) {
            $to = $email;
            $subject = "Email Verification";
            $message = "<a href='https://educator.pk/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
            $headers = "From: danialjafri88@gmail.com";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to,$subject,$message,$headers);
                header('location:../login.php?response=success&class=success&message=Check Your email for verification');
            }
            else {
                header('location:../adminregistration.php?response=error&class=danger&message=User Permission Query Error');                   
            }    
        }
        else {
			header('location:../adminregistration.php?response=error&class=danger&message=Insert Query Error');                   
        }
    }
}

?>
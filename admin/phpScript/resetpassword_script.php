<?php 
if (isset($_POST['submit'])) {
    include '../db/connect.php';
    date_default_timezone_set('Asia/Karachi');
    $email=$_POST['email'];
    $token=$_POST['token'];
    $curDate = date("Y-m-d H:i:s");

    
    $new=$_POST['newpassword'];
    $confirm=$_POST['confirmpassword'];
    $curDate = date("Y-m-d H:i:s");
    $hash = password_hash($new ,PASSWORD_BCRYPT);

     if (password_verify($confirm,$hash)) {
        //  echo 'equal';
        //$hash = password_hash($new,PASSWORD_BCRYPT);
        //  echo header();
        //     die();
        $query=mysqli_query($con,"update user set password='$hash',created_at='$curDate' where email='$email'");
        // echo $query;
        // die();
        if ($query) {
            $password_reset = mysqli_query($con,"DELETE FROM password_reset_temp WHERE email='$email'");
        
            if ($password_reset) {
            //     # code...
        	    header('location: ../login.php?response=success&class=success&message=Password Change Successfully!');

            }
        } else {
            //echo $query;

        	header('location: ../forgetpassword.php?response=error&class=danger&message=Kindly forgot Password Again');
        }
        
     } 
    //  else {
    //      header('location: ../resetpassword.php?token='.$token.'&email='.$email.'&response=error&class=danger&message=Password not Match!');
    //  }

} 


?>
<?php
if(isset($_POST['submit'])){
    include('../db/connect.php');
    if(empty($_POST['email'])){
        header('location: ../forgetpassword.php?response=error&class=danger&message=Email fields are mandatory.');
    }
    else{
        $email=$_POST['email'];

        $select=mysqli_query($con,"select id from user where email='$email'");
    
        if(mysqli_num_rows($select) > 0){
            $str="0123456789qwasdjcdsrtny";
            $str_shu=str_shuffle($str);
            $str_sub=substr($str_shu,0 ,15);
            $subject="Reset Password";
            //$url="http://www.thepakdev.com/quiz/AlRazzak/resetpassword.php?token=$str_sub&email=$email";           
            $message="To reset your password,please visit this <a href='https://www.dashing.pk/resetpassword.php?token=$str_sub&email=$email'>Link</a>";
            
            $headers= "From: danialjafri88@gmail.com";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            //print_r($str_sub);
            mail($email,$subject,$message,$headers);
            $query=mysqli_query($con,"update user set token='$str_sub' where email='$email'");
            if ($query) {
            	 header('location: ../forgetpassword.php?response=success&class=success&message=Check email for forgot password!');
            } else {
            	 header('location: ../forgetpassword.php?response=error&class=danger&message=Error!');
            }
            
        }
        else{
            header('location: ../forgetpassword.php?response=error&class=danger&message=Email does not exists!');
        }
    }
}
else{
    mysqli_error(isset($_POST['submit']));
}


?>
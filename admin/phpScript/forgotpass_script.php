<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
if(isset($_POST['submit'])){
    include('../db/connect.php');
    if(empty($_POST['email'])){
        header('location: ../forgetpassword.php?response=error&class=danger&message=Email fields are mandatory.');
    }
    else{
        $email=$_POST['email'];

        $select=mysqli_query($con,"select id ,username from user where email='$email'");
    
        if(mysqli_num_rows($select) > 0){
            date_default_timezone_set('Asia/Karachi');
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $token = $key . $addKey;
            // $str="0123456789qwasdjcdsrtny";
            // $str_shu=str_shuffle($str);
            // $str_sub=substr($str_shu,0 ,15);
            $mail = new PHPMailer(true);
                //Server settings
                $row = mysqli_fetch_assoc($select);
                $username = $row['username'];
                // echo '<pre>'.print_r($username,true).'</pre>';
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.educator.pk';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'support@educator.pk';                     //SMTP username
                $mail->Password   = 'mail123!@#';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;   
                //Recipients
                $mail->setFrom('support@educator.pk', 'Educator.pk');
                $mail->addAddress($email, $username);     
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = 'To reset your password,please visit this <a href="https://educator.pk/admin/resetpassword.php?email='.$email.'&token='.$token.'">Link</a>';
                $mail->send();
                // $query=mysqli_query($con,"update user set token='$str_sub' where email='$email'");
                $query = mysqli_query($con,"INSERT INTO password_reset_temp (email, token, expDate) VALUES ('$email', '$token', '$expDate');");
                if ($query) {
            	 header('location: ../forgetpassword.php?response=success&class=success&message=Check email for forgot password!');
                } else {
                    header('location: ../forgetpassword.php?response=error&class=danger&message=Error!');
                }
            // $subject="Reset Password";
            // //$url="http://www.thepakdev.com/quiz/AlRazzak/resetpassword.php?token=$str_sub&email=$email";           
            // $message="To reset your password,please visit this <a href='https://educator.pk/admin/resetpassword.php?token=$str_sub&email=$email'>Link</a>";
            
            // $headers= "From: danialjafri88@gmail.com";
            // $headers .= "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // //print_r($str_sub);
            // mail($email,$subject,$message,$headers);
            // $query=mysqli_query($con,"update user set token='$str_sub' where email='$email'");
            // if ($query) {
            // 	 header('location: ../forgetpassword.php?response=success&class=success&message=Check email for forgot password!');
            // } else {
            // 	 header('location: ../forgetpassword.php?response=error&class=danger&message=Error!');
            // }
            
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
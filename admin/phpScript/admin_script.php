<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
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
            try {
                $mail = new PHPMailer(true);
                //Server settings
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
                $mail->addAddress($email, $username);     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email Verification';
                $mail->Body    = '<a href="http://localhost/educator_dev/admin/verifyEmail.php?activation_code='.$activation_code.'">Register Account</a>';
                $mail->send();
                header('location:../login.php?response=success&class=success&message=Check Your email for verification');

            } catch (\Throwable $th) {
                // header('location:../adminregistration.php?response=error&class=danger&message=Message could not be sent. Mailer Error: {$mail->ErrorInfo}');  
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";                 
            }
            // $to = $email;
            // $subject = "Email Verification";
            // $message = "<a href='http://localhost/educator_dev/admin/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
            // $headers = "From: danialjafri88@gmail.com";
            // $headers .= "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // mail($to,$subject,$message,$headers);
            //     header('location:../login.php?response=success&class=success&message=Check Your email for verification');
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
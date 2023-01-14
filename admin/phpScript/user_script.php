<?php

if (isset($_POST['submit'])) {

 	include('../db/connect.php');

 	if( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])  ){

        header('location:../adduser.php?response=error&class=danger&message=All fields are mandatory.');

    }

    else{
		$id=$_POST['id'];
    	$username=$_POST['username'];

    	$email=$_POST['email'];

    	$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    	$role = $_POST['role'];
		$activation_code= md5(time() .$username);
		$email_status= 0;
    	$assignacademic=$_POST['assignacademic'];
        $assignsubject =$_POST['assignsubject'];
        //$assign=implode(',', $assignacademic);
		$email_check=mysqli_query($con,"select * from user where email='$email'");
		$num_row=mysqli_num_rows($email_check);
		if($num_row >= 1){
		    $username = '';
			$email = '';
			$role = '';
			header('location:../adduser.php?response=error&class=danger&message=Email Already Exist');
		}
		else{
			$user_check=mysqli_query($con,"select * from user where username='$username'");
			$num_row_user=mysqli_num_rows($user_check);
			if($num_row_user >= 1){
			    $username = '';
				$email = '';
				$role = '';
				header('location:../adduser.php?response=error&class=danger&message=Username Already Exist');
			}
			else{
				$query=mysqli_query($con,"insert into user(username,email,password,role,activation_code,status) values('$username','$email','$password','$role','$activation_code','$email_status')");
				$last_id = mysqli_insert_id($con);
				if ($query) {
					if($assignacademic == ''){
						//echo "<script>alert('yes')</script>";
						//for($i=0 ; $i<sizeof($assignsubject); $i++){
						$user_permission=mysqli_query($con,"insert into user_permission(user_id,permission,permission_sub) values('$last_id','0','0')");
							if ($user_permission) {
									$to = $email;
									$subject = "Email Verification";
									$message = "<a href='https://educator.pk/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
									$headers = "From: danialjafri88@gmail.com";
									$headers .= "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
									mail($to,$subject,$message,$headers);
										header('location:../adduser.php?response=success&class=success&message=Check Your email for verification');
								}
							else {
									header('location:../adduser.php?response=error&class=danger&message=Permission error');		
							}
						//}
					}
					else{
						// echo "<script>alert('no')</script>";
						for($i=0 ; $i<sizeof($assignsubject); $i++){
							$user_permission=mysqli_query($con,"insert into user_permission(user_id,permission,permission_sub) values('$last_id','$assignacademic','$assignsubject[$i]')");
								if ($user_permission) {
										$to = $email;
										$subject = "Email Verification";
										$message = "<a href='https://educator.pk/verifyEmail.php?activation_code=$activation_code'>Register Account</a>";
										$headers = "From: danialjafri88@gmail.com";
										$headers .= "MIME-Version: 1.0" . "\r\n";
										$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
										mail($to,$subject,$message,$headers);
											header('location:../adduser.php?response=success&class=success&message=Check Your email for verification');
									}
								else {
										header('location:../adduser.php?response=error&class=danger&message=Permission error');		
								}
							}
					}
				}	
				else{
					header('location:../adduser.php?response=error&class=danger&message=error');		
				}
			}
		}
    }

 } 

?>



<?php 
if (isset($_POST['submit'])) {
    include '../db/connect.php';
    $email=$_POST['email'];
    $token=$_POST['token'];


    
    $new=$_POST['newpassword'];
    $confirm=$_POST['confirmpassword'];

    $hash = password_hash($new ,PASSWORD_DEFAULT);

     if (password_verify($confirm,$hash)) {
        //  echo 'equal';
        //$hash = password_hash($new,PASSWORD_BCRYPT);
        $query=mysqli_query($con,"update user set password='$hash',token='' where email='$email'");
        // echo $query;
        if ($query) {
            //echo $query;
        	header(' location: ../login.php?response=success&class=success&message=Password Change Successfully!');
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
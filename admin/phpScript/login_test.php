<?php 
include('../db/connect.php');



// error_reporting(0);



if(isset($_POST['submit'])){

	//echo 'test';



	$email=$_POST['email'];

    $password=$_POST['password'];
    
    $select=mysqli_query($con,"SELECT * FROM user");

    $row = mysqli_fetch_assoc($select);

    $hash = $row['password'];

    if (password_verify($password,$hash)) {
        echo 'login';
    }
    else {
        echo 'error';
    }

}




?>
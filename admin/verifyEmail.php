<?php 



if(isset($_GET['activation_code'])){

   

    

    $activation=$_GET['activation_code'];

 include('db/connect.php');

    $select=mysqli_query($con,"select status,activation_code from user where status= 0 and activation_code ='$activation'");

    if(mysqli_num_rows($select) == 1){

        $update=mysqli_query($con,"update user set status = 1 where activation_code='$activation'");

        if($update){

           echo "Your Account has been verified .You can <a href='login.php'>Login</a>";

        }

        else{

            echo mysqli_error($update);

        }

    }

    else{

        echo 'Account Already valid and invalid ';

    }

}

else{

    echo 'Something Went Wrong';

}



?>
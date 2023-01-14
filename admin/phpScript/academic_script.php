<?php 

if(isset($_POST['submit'])){
    include('../db/connect.php');

    if( empty($_POST['name'])){
        header('location:../addacademic.php?response=error&class=danger&message=Please fill the Record');
    }
    else
    {
       
            $name= $_POST['name'];
            $insert_type = $_POST['insert_type'];
            $query=mysqli_query($con,"insert into academic(academic_name,insert_type) values('$name','$insert_type')");
            if($query){
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addacademic.php?response=success&class=success&message=Record inserted Successfully');
            }
            else{
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addacademic.php?response=error&class=danger&message=error');
            }
    }

}
?>
<?php





if(isset($_POST['submit'])){

    include('../db/connect.php');

    if(empty($_POST['subject']) || empty($_POST['name']) ){

        header('location:../addchapter.php?response=error&class=danger&message=Please fill the Record');

    }

    else{
        $academic =$_POST['academic'];

        $subject=$_POST['subject'];

        $name=$_POST['name'];

   

        // $image=$_FILES['image']['tmp_name'];

        // $image_name=$_FILES['image']['name'];

        // $location="image/";



       

        $insert_by = $_POST['insert_by'];    
     

            $query=mysqli_query($con,"insert into chapter(academy_id,subject_id,chapter_name,insert_by) values('$academic','$subject','$name','$insert_by')");

            if($query){

                header('location:../addchapter.php?response=success&class=success&message=Record Has Been inserted');

            }

            else{

                header('location:../addchapter.php?response=error&class=danger&message=Error');

            }

        }
        

}



?>
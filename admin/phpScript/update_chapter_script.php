<?php



if(isset($_POST['submit'])){

    @include ('../db/connect.php');
    $name=$_POST['name'];
    

    
   

    $update=mysqli_query($con,"update chapter set chapter_name='$name' where id='$id'");

    if($update){
        header('location:viewchapter.php?response=success&class=success&message=Record has been updated Successfully');
        ob_end_flush();
    }

   

    
}
?>
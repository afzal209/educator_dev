<?php
include('../db/connect.php');
$id=$_GET['id'];
//$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
//if ($delete) {
    $delete_question=mysqli_query($con,"delete from test_question where id = '$id'");
    if($delete_question){
        
                header('location:../viewtestquestion.php'); 
    }
    else{
        echo 'error in delete question query';
    }
//}
// else{
//     echo 'error in delete  query';

// }


?>
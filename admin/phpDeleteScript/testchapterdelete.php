<?php
include('../db/connect.php');
$id=$_GET['id'];
//$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
//if ($delete) {
    $delete_question=mysqli_query($con,"delete from test_question where test_topic_id = '$id'");
    if($delete_question){
        $delete_topic = mysqli_query($con,"delete from test_topic where test_chapter_id ='$id' ");
        if ($delete_topic) {
            $delete_chapter=mysqli_query($con,"delete from test_chapter where id = '$id'");
            if($delete_chapter){
                header('location:../viewtestchapter.php');
            }
            else{
                echo 'error in delete chapter query';
            }
        }
        else{
            echo 'error in delete topic query';
        }    
    }
    else{
        echo 'error in delete question query';
    }
//}
// else{
//     echo 'error in delete  query';

// }


?>
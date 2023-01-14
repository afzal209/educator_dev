<?php
include('../db/connect.php');
$id=$_GET['id'];
$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
if ($delete) {
    $delete_question=mysqli_query($con,"delete from question where topic_id = '$id'");
    if($delete_question){
        $delete_topic = mysqli_query($con,"delete from topic where chapter_id ='$id' ");
        if ($delete_topic) {
            $delete_chapter=mysqli_query($con,"delete from chapter where id = '$id'");
            if($delete_chapter){
                header('location:../viewchapter.php');
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
}
else{
    echo 'error in delete  query';

}


?>
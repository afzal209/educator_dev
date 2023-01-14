<?php 

include '../db/connect.php';



$id = $_GET['id'];
$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");

if ($delete) {
    $delete_question = mysqli_query($con,"delete from question where topic_id = '$id'");

    if($delete_question){

        $delete_topic = mysqli_query($con,"delete from topic where id='$id'");

        if ($delete_topic) {

            header('location:../viewtopic.php');

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
    echo 'error in delete query';
}




?>
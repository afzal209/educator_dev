<?php

include('../db/connect.php');

$id=$_GET['id'];
    
$delete =  mysqli_query($con,"delete from questions_meta where question_id = '$id' ");

if ($delete) {
    $delete_question=mysqli_query($con,"delete from question where id='$id'");

    if($delete_question){

        header('location:../viewquestion.php');

        

        }

        else{

            echo 'error';

        }
    }
    else{
        echo 'Error in moke test';
    }







?>
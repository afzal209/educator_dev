<?php
include('../db/connect.php');
$id=$_GET['id'];
$embed = $_GET['embed'];
//$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
//if ($delete) {
    $query = mysqli_query($con,"select id,topic_embed from test_topic where id='$id' and topic_embed='$embed'");
    $row = mysqli_fetch_assoc($query);
    $image = $row['topic_embed'];
    $file =  $image;
    unlink($file);
    
    $delete_question=mysqli_query($con,"delete from test_question where test_topic_id = '$id'");
    if($delete_question){
        $delete_topic = mysqli_query($con,"delete from test_topic where id ='$id' ");
        if ($delete_topic) {   
                header('location:../viewtesttopic.php');
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
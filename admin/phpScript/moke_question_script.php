<?php

// if(isset($_POST['submit'])){
//     include('../connect.php');

//     if(empty($_POST['checkbox']) ){

//         header('location:../adminquestion.php?response=error&class=danger&message=Please fill the Record');

//     }
//     else{
//         $id=$_POST['id'];
//         $checkbox=$_POST['checkbox'];
//         $job=$_POST['job_title'];
//         $time = $_POST['time'];
//         $timezone = "Asia/Karachi";
//         date_default_timezone_set($timezone);
//         $today = date("d/m/y");
        
//         for($i=0 ; $i<sizeof($checkbox); $i++){
//             $query=mysqli_query($con,"insert into questions_meta(date,question_id,meta_key,meta_value,time) values('$today','$checkbox[$i]','job_type','$job','$time')");
//             if($query){
//                 $update=mysqli_query($con,"update question set status = 'active' where id= '$checkbox[$i]'");
//                 if($update){
//                     header('location:../adminquestion.php?id='.$id);
//                 }   
//             }
//             else{
//                 echo 'error';
//             }
//         }
//     }
// } 


if(isset($_POST['t_submit'])){
    include('../db/connect.php');

    if(empty($_POST['job_title']) ){

        header('location:../mokequestion.php?response=error&class=danger&message=Please fill the Record');

    }
    else{
        $t_id=$_POST['t_id'];
        $checkbox=$_POST['checkbox'];
        $job=$_POST['job_title'];
        $time = $_POST['time'];
        $timezone = "Asia/Karachi";
        date_default_timezone_set($timezone);
        $today = date("d/m/y");
        $insert_by = $_POST['insert_by'];
        for($i=0 ; $i<sizeof($checkbox); $i++){
            $query=mysqli_query($con,"insert into questions_meta(date,question_id,meta_key,meta_value,time,insert_by) values('$today','$checkbox[$i]','job_type','$job','$time','$insert_by')");
            if($query){
                  header('location:../mokequestion.php?id='.$t_id); 
            }
            else{
                echo 'error';
            }
        }
    }
} 

?>
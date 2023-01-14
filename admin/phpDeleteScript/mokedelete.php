<?php 
include '../db/connect.php';
$id =$_GET['id'];
$delete = mysqli_query($con,"delete from questions_meta where meta_value='$id'");
if ($delete = 1) {
     $delete_moke = mysqli_query($con,"delete from moke_title where id = '$id'");
     if ($delete_moke = 1) {
          header('location: ../mokelist.php');
     }
     else{
          echo 'error in delete moke query';
     }
}
else{
     echo 'error in delete query';
}




?>
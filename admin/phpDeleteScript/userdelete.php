<?php

include('../db/connect.php');

$id=$_GET['id'];

$delete=mysqli_query($con,"delete from user_permission where user_id = '$id'");

if($delete){

	$delete_chapter=mysqli_query($con,"delete from user where id = '$id'");

        if($delete_chapter){

            header('location:../viewuser.php');

        }

    }

    else{

        echo 'error';

    }





?>
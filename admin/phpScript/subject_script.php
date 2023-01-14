<?php

if (isset($_POST['submit'])) {
    include '../db/connect.php';

    if (empty($_POST['text'])) {
        header('location:../addsubject.php?response=error&class=danger&message=Please fill the Record');
    } elseif (!empty($_POST['text'])) {
        $image = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $location = '../img/';
        $name = $_POST['text'];
        $academic_name = $_POST['academicname'];

        // print_r($location.$image_name);
        if (move_uploaded_file($image, $location.$image_name)) {
            // print_r($location.$image_name);
            $query = mysqli_query($con, "insert into subject(academy_id,subject_image,subject_name) values('$academic_name','$location$image_name','$name')");
            if ($query) {
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addsubject.php?response=success&class=success&message=Record inserted Successfully');
            } else {
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addsubject.php?response=error&class=danger&message=error');
            }
        } else {
            header('location: ../addsubject.php?response=error&class=danger&message=Error In Image ');
        }
    }
}

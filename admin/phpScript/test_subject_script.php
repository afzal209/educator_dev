<?php 

if(isset($_POST['submit'])){
    include '../db/connect.php';

    if (empty($_POST['text'])) {
        header('location:../testsubject.php?response=error&class=danger&message=Please fill the Record');
    }
    else{
        $name = $_POST['text'];
        $insert_by = $_POST['insert_by'];

        $query = mysqli_query($con,"insert into test_subject(subject_name,insert_by) values('$name','$insert_by')");
        if ($query == 1) {
            header('location:../testsubject.php?response=success&class=success&message=Record Has Been inserted');
        }
        else{
            header('location:../testsubject.php?response=error&class=danger&message=Error');
        }
    }
}


?>
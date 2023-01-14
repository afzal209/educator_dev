<?php

if(isset($_POST['submit'])){
    include '../db/connect.php';

    if (empty($_POST['subject']) || empty($_POST['chapter'])) {
        header('location:../testchapter.php?response=error&class=danger&message=Please fill the Record');
    }
    else{
        $subject = $_POST['subject'];
        $chapter = $_POST['chapter'];
        $insert_by = $_POST['insert_by'];

        $query =mysqli_query($con,"insert into test_chapter(test_subject_id,chapter_name,insert_by) values('$subject','$chapter','$insert_by')");
        if($query == 1){
            header('location:../testchapter.php?response=success&class=success&message=Record Has Been inserted');
        }
        else{
            header('location:../testchapter.php?response=error&class=danger&message=Error');
        }
    }
}
?>
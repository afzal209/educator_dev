<?php



if(isset($_POST['submit'])){



@include ('../db/connect.php');

$question=$_POST['question'];

$option1=$_POST['option1'];

$option2=$_POST['option2'];

$option3=$_POST['option3'];

$option4=$_POST['option4'];

$correct=$_POST['correct'];



    $update=mysqli_query($con,"update test_question set question='$question', option1='$option1',option2='$option2' ,option3 = '$option3',option4='$option4' , correct = '$correct' where id='$id'");

    if($update){

        header('location:viewtestquestion.php?response=success&class=success&message=Record has been updated Successfully');
        ob_end_flush();
    }

}

?>
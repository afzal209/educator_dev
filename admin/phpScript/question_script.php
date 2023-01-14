<?php



if(isset($_POST['submit'])){

    include('../db/connect.php');



    if( empty($_POST['subject']) || empty($_POST['chapter']) || empty($_POST['question']) || empty($_POST['correct']) || empty($_POST['option1']) || empty($_POST['option2']) || empty($_POST['option3']) || empty($_POST['option4'])){

        header('location:../addquestion.php?response=error&class=danger&message=All fields are mandatory.');

    }

    else{
        $academic=$_POST['academic'];

        $subject=$_POST['subject'];

        $chapter=$_POST['chapter'];
        
        $topic=$_POST['topic'];

        $question=$_POST['question'];

        $correct=$_POST[$_POST['correct']];

        $option1=$_POST['option1'];

        $option2=$_POST['option2'];

        $option3=$_POST['option3'];

        $option4=$_POST['option4'];

        $new=str_replace("'","\'", $question); 

        $insert_by = $_POST['insert_by'];

        $query=mysqli_query(

            $con,"insert into question (academy_id,subject_id,chapter_id,topic_id,question,correct,option1,option2,option3,option4,status,insert_by)

                    values('$academic','$subject','$chapter','$topic','$new','$correct','$option1','$option2','$option3','$option4','inactive','$insert_by')

                ");

            if($query){

                header('location:../addquestion.php?response=success&class=success&message=Record has been added');

            }   

        }

    }

?>
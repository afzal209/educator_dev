<?php



if(isset($_POST['submit'])){

    include('../db/connect.php');



    if( empty($_POST['subject']) || empty($_POST['chapter']) || empty($_POST['topic']) || empty($_POST['question']) || empty($_POST['correct']) || empty($_POST['option1']) || empty($_POST['option2']) || empty($_POST['option3']) || empty($_POST['option4'])){

        header('location:../testquestion.php?response=error&class=danger&message=All fields are mandatory.');

    }

    else{

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

            $con,"insert into test_question(test_subject_id,test_chapter_id,test_topic_id,question,correct,option1,option2,option3,option4,insert_by)

                    values('$subject','$chapter',$topic,'$new','$correct','$option1','$option2','$option3','$option4','$insert_by')

                ");

            if($query == 1){

                header('location:../testquestion.php?response=success&class=success&message=Record has been added');

            }   
            else{
                header('location:../testquestion.php?response=error&class=danger&message=Error');
            }

        }

    }

?>
<?php

include('../db/connect.php');

if(@$_POST['submitQuestion'] == true){

    $correct = 0;

    $wrong = 0;

    $question_id = @$_POST['questionId'];

    $option = @$_POST['option'];

    //echo '<pre>'.print_r($_POST,true).'<pre>';

    /*    

    if(!isset($_POST['ans']) || empty($_POST['ans'])){

        echo 'Please choose any option.';

    }else{

        */

        //echo '<pre>'.print_r($_SESSION,true).'<pre>';

        if( !isset($_SESSION['quiz']) ){

            $_SESSION['quiz'] = array();

        }

        $_SESSION['quiz']['paper_id'] = $_POST['paperId'];

        if( !isset($_SESSION['quiz']['questions']) ){

            $_SESSION['quiz']['questions'] = array(); 

        }

        $_SESSION['quiz']['questions'][$question_id] = @$_POST['option'];

        

        //$query=mysqli_query($con,"select correct from question where correct = '$ans' and id ='$question_id' ");

        //$row=mysqli_fetch_row($query);

        // if($row){

        //    $correct++;

        // }

        // else{

        //     $wrong++;

        // }

        

        

        //echo '<pre>'.print_r($_SESSION,true).'<pre>';

    /*    

    }

    */



}



?>
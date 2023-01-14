<?php
include('../db/connect.php');
if(@$_POST['submitQuestion'] == true){
    $correct = null;
    //$wrong = null;
    $question_id = @$_POST['questionId'];
    $option = @$_POST['option'];
    $social_user_id = $_POST['social_user_id'];
    $paper = $_POST['paperId'];
    $correct_moke = $_POST['correct_answer'];
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
        
        $select = mysqli_query($con,"select id from social_users where social_id = '$social_user_id'");
        $row_select = mysqli_fetch_assoc($select);
        $social_row = $row_select['id'];

        if($correct_moke == $option){
            $correct = 'right' ;
        }   
        elseif ($option == 'undefined') {
            $correct = 'skip';
        }   
        else{
            $correct = 'wrong';
        }
        $query = mysqli_query($con,"insert moke_score(social_user_id,paper_id,question_id,option_id,right_wrong) values('$social_row','$paper','$question_id','$option','$correct')");
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
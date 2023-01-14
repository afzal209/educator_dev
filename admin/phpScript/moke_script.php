<?php

if(isset($_POST['submit'])){
    include('../db/connect.php');

    if( empty($_POST['job_title']) ){
        header('location:../addmoke.php?response=error&class=danger&message=All fields are mandatory.');
    }
    else{
        $job_title=$_POST['job_title'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $start_paper=$_POST['start_paper'];
        $end_paper = $_POST['end_paper'];
        $no_of_question=$_POST['no_of_question'];
        $convert_start = date("H:i:s",strtotime($start_paper));
        $convert_end = date("H:i:s",strtotime($end_paper));
        $insert_by = $_POST['insert_by'];
        // $time_in_24_hour_format_end  = date("H:i", strtotime($end_paper));
        // echo '<pre>';
        // print_r($job_title .'+'. $date .'+'. $time);
         $query=mysqli_query($con,"insert into moke_title(job_title,date,time,start_paper,end_paper,no_of_question,insert_by) values('$job_title','$date','$time','$convert_start','$convert_end','$no_of_question','$insert_by')");
        //print_r($query)
        if ($convert_start == $convert_end) {
			header('location:../addmoke.php?response=error&class=danger&message=Start time and End time cannot be same');		                                       
        }
        else {
            if($query){
                header('location:../mokeacademic.php');           
                $job_title= '';
                $date= '';
                $time= '';
                $start_paper= '';
                $end_paper = '';
                $no_of_question='';
            }
            else {
			    header('location:../addmoke.php?response=error&class=danger&message=Error in date');		                                        
            }
        }
    }
}


?>
<?php
if(isset($_POST['submit'])){
    include '../db/connect.php';
    if (empty($_POST['job_ads']) ||empty($_POST['job_designaiton']) ||empty($_POST['city']) ||empty($_POST['provinces']) ||empty($_POST['issue_date'])  ||empty($_POST['source']) ||empty($_POST['categories'])) {
        header('location:../addjobinfo.php?response=error&class=danger&message=Please fill the Record');
    }
    else{
        $organization_name =$_POST['organization_name'];
        $job_ads = $_POST['job_ads'];
        $job_designaiton = $_POST['job_designaiton'];
        $no_of_post =$_POST['no_of_post'];
        $department =$_POST['department'];
        $quota =$_POST['quota'];
        
        $city = $_POST['city'];
        $provinces = $_POST['provinces'];
        $issue_date = $_POST['issue_date'];
        $last_date = $_POST['last_date'];
        $source = $_POST['source'];
        $categories = $_POST['categories'];
        $insert_by = $_POST['insert_by'];
        
        //print_r($job_ads_id.'+'.$job_designaiton.'+'.$city.'+'.$provinces.'+'.$issue_date.'+'.$last_date.'+'.$source.'+'.$categories);  
                $query = mysqli_query($con,"insert into job_info(job_ads_id,job_designaiton,job_info_id,no_of_post,department,quota,city,provinces,issue_date,last_date,source,categories,insert_by) values('$job_ads','$job_designaiton','$organization_name','$no_of_post','$department','$quota','$city','$provinces','$issue_date','$last_date','$source','$categories','$insert_by')");
                //var_dump($query);
                if ($query) {
                    header('location:../addjobinfo.php?response=success&class=success&message=Record Has Been inserted');
                }
                else{
                    header('location:../addjobinfo.php?response=error&class=danger&message= Error ');
                }
            }
}

?>
<?php 
if(isset($_POST['submit_Organization'])){
    include '../db/connect.php';
    if (empty($_POST['organization'])) {
        header('location:../addjob.php?response1=error&class=danger&message=Please fill the Record');
    }
    else{
        $image = $_FILES['image_logo']['tmp_name'];
        $image_name =$_FILES['image_logo']['name'];
        $location = "assets/logo/";
        $organization = $_POST['organization'];
        $insert_by = $_POST['insert_by'];
        if (strlen($organization) > 10 ) {
            header('location:../addjob.php?response1=error&class1=danger&message1= organization name must be 8 charater only ');
        }
        else{
            //echo 'insert';
            if (move_uploaded_file($image, $location.$image_name)) {
                $query = mysqli_query($con,"insert into organization(organization_image,organization_name,insert_by) values('$location$image_name','$organization','$insert_by')");
                if ($query == 1) {
                    header('location:../addjob.php?response1=success&class1=success&message1=Record Has Been inserted');
                }
                else{
                    header('location:../addjob.php?response1=error&class1=danger&message1= Error ');
                }
            }
            else{
                header('location:../addjob.php?response1=error&class1=danger&message1= Error in Image ');
            }
        }
    }
}
elseif(isset($_POST['submit'])){

    include '../connect.php';

    if(empty($_POST['job_title']) || empty($_POST['content'])  || empty($_POST['issue_date']) || empty($_POST['source'])  ){
         header('location:../addjob.php?response=error&class=danger&message=Please fill the Record');
    }
    else{
        $choose_organization = $_POST['choose_organization'];
        $image = $_FILES['image']['tmp_name'];
        $image_name =$_FILES['image']['name'];
        $location = "assets/ads_pic/";
        $job_title = $_POST['job_title'];
        $content = $_POST['content'];
        //$job_designaiton =$_POST['job_designaiton'];
        //$city = $_POST['city'];
        //$provinces = $_POST['provinces'];
        $issue_date = $_POST['issue_date'];
        $issue_time = $_POST['issue_time'];
        //$last_date = $_POST['last_date'];
        $source = $_POST['source'];
        //$categories = $_POST['categories'];
        $insert_by = $_POST['insert_by'];

        //$organization_limit = substr($organization, 0,8);
        if (move_uploaded_file($image,$location.$image_name)) {
            $query = mysqli_query($con,"insert into job_ads(organization_id,image,job_title,content,issue_date,issue_time,source,insert_by) values('$choose_organization','$location$image_name','$job_title','$content','$issue_date','$issue_time','$source','$insert_by')");
            if ($query == 1) {
                header('location:../addjob.php?response=success&class=success&message=Record Has Been inserted');
            }
            else{
                header('location:../addjob.php?response=error&class=danger&message= Error ');
            }
        }
        else{
            header('location:../addjob.php?response1=error&class=danger&message= Error in Image ');
        }
                    
           
        
    }
}

?>
<?php 
if (isset($_POST['submit'])) {
    @include '../db/connect.php';
    //echo '<pre>'.print_r($_POST,true).'</pre>';
    $username=$_POST['username'];
    $email=$_POST['email'];
    // $assignsubject=$_POST['assignsubject'];
    // $assignacademic=$_POST['assignacademic'];
     $role=$_POST['changerole'];
    $update = mysqli_query($con, "UPDATE user u set u.username='$username', u.email='$email', u.role = '$role' WHERE u.id ='$id'");
    if ($update) {
        header("location:viewuser.php");
        ob_end_flush();
    }
    else{
        echo 'error';
    }
    // $deleteCurrentPermissions = "DELETE FROM user_permission WHERE user_id = '$id'";
    // if($assignacademic == ''){
    //     //$update_query=mysqli_query($con,$update);
    //     $deleteCurrentPermissions=mysqli_query($con,$deleteCurrentPermissions);
        
    //         $addUserPermissions = "INSERT INTO user_permission (id,user_id,type,permission,permission_sub) 
    //                                 VALUES (null,$id,'subject',0,0)";
    //         $addUserPermissions = mysqli_query($con,$addUserPermissions);
    //         if ($addUserPermissions) {
    //             header("location:viewuser.php");
    //         }
    //         else{
    //             echo 'error';
    //         }
        
    // }
    // else{
    //     //$update_query=mysqli_query($con,$update);
    //     $deleteCurrentPermissions=mysqli_query($con,$deleteCurrentPermissions);
    //     foreach($assignsubject as $key=>$subjectId){
    //         $addUserPermissions = "INSERT INTO user_permission (id,user_id,type,permission,permission_sub) 
    //                                 VALUES (null,$id,'subject',$assignacademic,$subjectId)";
    //         $addUserPermissions = mysqli_query($con,$addUserPermissions);
    //         if ($addUserPermissions) {
    //             header("location:viewuser.php");
    //         }
    //         else{
    //             echo 'error';
    //         }
    //     }
    // }
    
    //for($i=0 ; $i<sizeof($assignsubject); $i++){
        //$update = "UPDATE user join user_permission on user_permission.user_id = user.id SET user.username='$username', user.email='$email', user.role = '$role', user_permission.permission = '$assignsubject[$i]' WHERE  user_permission.user_id ='$id'";
         
        // echo '<pre>';     
        //print $update;
        //  $update_query=mysqli_query($con,$update);
        
        // if ($update_query) {
        // header("location:viewuser.php");
        
        // }
        // else{
        //     echo 'error';
        // }
    //}
}



?>
<?php

	

include('../db/connect.php');



// error_reporting(0);



if(isset($_POST['submit'])){

	//echo 'test';



	$email=$_POST['email'];

	$password=$_POST['password'];

	$select=mysqli_query($con,"SELECT * FROM user WHERE (username ='$email' OR email = '$email' ) AND status = 1 ");
	
	// echo '<pre>'.print_r(mysqli_fetch_assoc($select),true).'</pre>';


	
	
	
	// $result = $conn->query($sql);
	// $permissionQuery = [];
	
	// $page_permissions = mysqli_fetch_assoc($permissionQuery);
	// echo "<pre>";
	// print_r($row);
	
	// exit();
	$nemail = false; 

	$npass = false;
	$nacademic_id = false;
	$nsubject_id = false;
	while($row=mysqli_fetch_assoc($select)){
		// $user = mysqli_fetch_assoc($select);
	$user_id = $row['id'];
	// // $permissionQuery = mysqli_query($con,"SELECT * FROM user_permission where user_id = ". $user_id );
	$password_hash = $row['password'];
	if (password_verify($password,$password_hash)) {
		$select_query =mysqli_query($con,"SELECT permission as academic_id , group_concat( permission_sub ) as subject_id FROM user_permission WHERE type= 'subject' AND user_id = ". $user_id) ;
			while($subject_id = mysqli_fetch_assoc($select_query)){
			
				$_SESSION['user']['academic_id']  = $nacademic_id = $subject_id['academic_id'];
				$_SESSION['user']['subject_id'] = $nsubject_id = $subject_id['subject_id'];
			}
			
			$_SESSION['user']['email'] = $nemail = $row['email'];

			$_SESSION['user']['password'] = $npass = $row['password'];

			//$_SESSION = $row;

			foreach($row as $key=>$val){

				$_SESSION['user'][$key] = $val;

			}

		}

		// echo '<pre>'.print_r(@$_SESSION,true).'</pre>';

	}

	// while($row_query = mysqli_fetch_assoc($select_query)) {
	// 	//array_push($permissionQuery,$row);
	// 	echo "<pre>";
    //    print_r($row_query);
    // }

	

	if(isset($_SESSION['user']['email'])){

       if ($_SESSION['user']['role'] == 'admin') {
			header('location: ../adduser.php');
		}
		elseif($_SESSION['user']['role'] == 'editor'){
			header('location: ../addtopic.php');
		}
		elseif ($_SESSION['user']['role'] == 'subadmin') {
			header('location: ../addmoke.php');
		}
		
	}

	else{

		header('location: ../login.php?response=error&class=danger&message=Invalid Credentials!');

	}

			

}



?>


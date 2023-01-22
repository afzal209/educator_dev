<?php 
    include_once 'db/connect.php';
    $id=$_GET['id'];
    $query=mysqli_query($con,"select user.*,user_permission.*,subject.*,academic.*,academic.academic_name as academy, group_concat( subject.subject_name ) AS subject_concat from user left join user_permission on user.id = user_permission.user_id LEFT JOIN subject ON subject.id = user_permission.permission_sub LEFT JOIN academic ON academic.id = user_permission.permission where user.id = '$id'");

    
    $row=mysqli_fetch_assoc($query);

    //echo '<pre>'.print_r($row,true).'</pre>';
    $username = $row['username'];
    $email = $row['email'];
 
    $role = $row['role'];    # code...
   
    
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("Update User");
    include_once 'includeFile/navbar.php';
    ?>


            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Update User Page			
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
            </section>
            <div class="whole-wrap">
                <div class="container" >
                    <div class="section-top-border">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <h3 class="mb-30 text-center">Update User</h3>
                                <form  method="POST" action="">
                                    <div class="mt-10">
                                        <input type="text" name="username" id="username" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Username'" required class="single-input" value="<?php echo $username ?>">
                                    </div>
                                    <div class="mt-10">
                                        <input type="email" name="email" id="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'" required class="single-input"value="<?php echo $email ?>">
                                    </div>
                                    <!-- <div class="mt-10">
                                        <input type="text" name="" id="" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" required class="single-input" readonly value="<?php echo $role?>">
                                    </div> -->
                                    <div class="form-group mt-10">
                                            <select class="form-control" name="changerole" id="changerole" >
                                                <option value="">Type</option>
                                                <option value="subadmin"<?php if($role == 'subadmin') echo 'selected="selected"'; ?>>Sub Admin</option>
                                                <option value="editor"<?php if($role == 'editor') echo 'selected="selected"'; ?>>Editor</option>
                                                <option value="jobeditor"<?php if($role == 'jobeditor') echo 'selected="selected"'; ?>>Job Editor</option>
                                                <option value="testeditor"<?php if($role == 'testeditor') echo 'selected="selected"'; ?>>Test Editor</option>
                                                <option value="neweditor"<?php if($role == 'neweditor') echo 'selected="selected"'; ?>>New Editor</option>
                                            </select>
                                    </div>
                                    <div class="button-group-area mt-40">
                                        <input class="genric-btn success-border circle" type="submit" name="submit" value="Update">
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

    <?php
    include('includeFile/footer.php');
    include 'phpScript/update_user_script.php';
    ?>
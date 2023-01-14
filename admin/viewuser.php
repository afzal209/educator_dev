    <?php 
    include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("View User");
    include_once 'includeFile/navbar.php';
    ?>
        <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								View User Page			
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
            </section>
            
            <div class="whole-wrap">
                <div class="container">
                    <div class="section-top-border">
                            
                            <div class="progress-table-wrap">
                                <div class="progress-table">
                                    <div class="table-head ">
                                        <div class="country">Username</div>
                                        <div class="country">Email</div>
                                        <div class="country">Permission</div>
                                        <div class="country">Permission Subject</div>
                                        <div class="country">Role</div>
                                        <div class="country">Action</div>
                                    </div>
                                    <?php
                                    $query=mysqli_query($con,'select user.*,user_permission.*,subject.*,academic.*,group_concat( subject.subject_name ) as permission_con  from user left join user_permission on user.id = user_permission.user_id LEFT JOIN subject ON subject.id = user_permission.permission_sub LEFT JOIN academic ON academic.id = user_permission.permission where user.id != 1 Group By user.username');
                                    if(mysqli_num_rows($query) > 0){
                                        while($row=mysqli_fetch_assoc($query)){ 
                                    echo' 
                                    <div class="table-row">
                                        <div class="country">'.$row['username'].'</div>
                                        <div class="country">'.$row['email'].'</div>
                                        <div class="country">'.$row['academic_name'].'</div>
                                        <div class="country">'.$row['permission_con'].'</div>
                                        <div class="country">'.$row['role'].'</div>
                                        <div class="country"><a href="userpermission.php?id=' .$row['user_id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="userupdate.php?id='.$row['user_id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>/<a href="phpDeleteScript/userdelete.php?id='. $row['user_id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                    </div>
                                    ';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
    include('includeFile/footer.php');
    ?>
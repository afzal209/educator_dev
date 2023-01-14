<?php
    include 'db/connect.php';
    if (!isset($_SESSION['access_token'])) {
        header("location:sociallogin.php");
    }
	include_once 'includeFile/header.php'; 
	ch_title("Score List");
    include_once 'includeFile/navbar.php';
?>


            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Moke Log Page				
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
                                    <div class="table-head">
                                        <div class="country">User Name</div> 
                                        <div class="country">Moke Title</div>
                                        <div class="country">Moke Taken Date</div>
                                        <div class="country">Correct Answer</div>
                                    </div>
                                    <?php
                                    $id_user = $_SESSION['userData']['id'];
                                    $query = mysqli_query($con,"select * from social_users where social_id='$id_user'");
                                    $row=mysqli_fetch_assoc($query);
                                    $row_id = $row['id'];
                                    $query_log = mysqli_query($con,"SELECT  COUNT(CASE WHEN right_wrong LIKE 'right' THEN 1 END) AS r,moke_title.job_title  ,social_users.first_name ,moke_score.* FROM moke_title LEFT JOIN moke_score ON moke_title.id = moke_score.paper_id LEFT JOIN social_users ON social_users.id = moke_score.social_user_id WHERE social_users.id = '$row_id' group by social_users.first_name ,moke_title.job_title");
                                    if (mysqli_num_rows($query_log) > 0) {
                                        while($row_log = mysqli_fetch_assoc($query_log)){
                                        echo' 
                                        <div class="table-row">
                                            <div class="country">'.$row_log['first_name'].'</div>
                                            <div class="country">'.$row_log['job_title'].'</div>
                                            <div class="country">'.$row_log['date'].'</div>
                                            <div class="country">'.$row_log['r'].'</div>
                                        </div>
                                        ';
                                        }
                                    }
                                    else{
                                        echo '  <div class="table-row">
                                                    <div class="country">No Paper has Taken</div>
                                                </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php
    include_once 'includeFile/footer.php'; 
?>
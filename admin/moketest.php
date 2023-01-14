<?php 
    include_once 'db/connect.php';
    if (!isset($_SESSION['access_token'])) {
        header("location:sociallogin.php");
    }
?>

<?php
    
	include_once 'includeFile/header.php'; 
	ch_title("Social Login");
    include_once 'includeFile/navbar.php';
?>

            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Topic List Page				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
				<?php
							if(@$_GET['response'] != ''){
									echo '  <div class="alert alert-'.@$_GET['class'].'">
									   <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
								   </div>';
							   }
							   ?>
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<!-- <div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>									
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                     <h1 class="text-center" style="font-family: 'Times New Roman', Times, serif;font-size:30px">Moke Test</h1>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <ol class="cs">
                                        <?php
											$timezone = "Asia/Karachi";
											date_default_timezone_set($timezone);	
											$current_time = date("H:i");
											$current_date = date("d/m/y");
                                            $a=1;
                                            //$query=mysqli_query($con,"select * from chapter where subject_id='$id' limit $start_from,$num_per_page");
                                            $query=mysqli_query($con,"select * from moke_title where date = '$current_date' or end_paper = '$current_time' ORDER BY id DESC");                            
                                            if(mysqli_num_rows($query) > 0){
                                                while($row=mysqli_fetch_assoc($query)){
                                                    echo '<li class="cs-a">'.$a++.'.<a href= "mokepaper.php?id='.$row['id'].'" >'.$row['job_title'].'</a></li>';
                                                }
                                            }
                                            else{
                                                echo '<li>No Record Found</li>';
                                                } 
                                        ?>
                                    </ol>
                                </div>
							</div>	
							<?php 
							include_once 'includeFile/navigation-area.php';
							include_once 'includeFile/commect-area.php';
							include_once 'includeFile/commect-form.php';
							?>		
						</div>
					<?php include_once 'includeFile/slider-widget.php'?>
					</div>
				</div>	
			</section>


<?php
    include_once 'includeFile/footer.php'; 
?>

<?php
    include 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Jobs Ads");
    include_once 'includeFile/navbar.php';
?>



<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Jobs Ads Page				
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
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <?php
                                    //$query =mysqli_query($con,"SELECT job_ads.* ,job_info.* FROM job_ads INNER JOIN job_info ON job_ads.id = job_info.job_ads_id WHERE job_info.last_date < date_format(CURDATE() ,'%d-%M-%Y l') order by issue_time desc");
									$timezone = "Asia/Karachi";
									date_default_timezone_set($timezone);
									//$today = date("d/m/y h:i:sa");
									$today = strtotime(date("d-M-Y l"));
                                    $query =mysqli_query($con,"SELECT job_ads.* ,job_info.* FROM job_ads INNER JOIN job_info ON job_ads.id = job_info.job_ads_id WHERE job_info.last_date < date_format(CURDATE(),'%d-%M-%Y') order by issue_time DESC");
									if (mysqli_num_rows($query) > 0) {
										while($row=mysqli_fetch_assoc($query)){
										echo '<div class="jb_cis">
													<a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:25px;"><b>'.$row['job_title'].'</b><h1></a>
													<h1 class="jb_h1"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a><a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;margin-left:1%" >'.$row['source'].'</a> <a href="" style="font-size:30%;">'.$row['issue_time'].'</a></h1>    
											</div>'; 
										} 
									}
									else {
										echo '<div class="jb_cis">
														<h1 class="jb_h1">No Job Present</h1>    
												</div>';
									}
                                    ?>
                                </div>      
							</div>	
							<?php 
							include_once 'includeFile/navigation-area.php';
							include_once 'includeFile/commect-area.php';
							include_once 'includeFile/commect-form.php';
							?>		
						</div>
					<?php include_once 'includeFile/slider-job-widget.php'?>
					</div>
				</div>	
			</section>						
			<!-- End post-content Area -->


<?php
    include_once 'includeFile/footer.php'; 
?>
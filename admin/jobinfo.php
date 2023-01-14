<?php
    include 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Jobs Info");
    include_once 'includeFile/navbar.php';
?>


        <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Jobs Info Page				
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
                        
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        $query =mysqli_query($con,"select * from job_ads where organization_id = '$id' ");
                                        while($row=mysqli_fetch_assoc($query)){
                                        echo '<div>
                                                <a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].'</b><h1></a>
                                                <h1 style="margin-top:-3%"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a> <a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;" >'.$row['source'].'</a></h1>    
                                            </div>'; 
                                        }
                                    }
                                    elseif(isset($_GET['source'])){
                                        $source = $_GET['source'];
                                        $query =mysqli_query($con,"select * from job_ads where source = '$source' ");
                                        while($row=mysqli_fetch_assoc($query)){
                                        echo '<div>
                                                <a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].'</b><h1></a>
                                                <h1 style="margin-top:-3%"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a> <a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;" >'.$row['source'].'</a></h1>    
                                            </div>'; 
                                        }
                                    }
                                    elseif(isset($_GET['issue_date'])) {
                                        $issue_date = $_GET['issue_date'];
                                        $query =mysqli_query($con,"select * from job_ads where issue_date = '$issue_date' ");
                                        while($row=mysqli_fetch_assoc($query)){
                                        echo '<div>
                                                <a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].'</b><h1></a>
                                                <h1 style="margin-top:-3%"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a> <a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;" >'.$row['source'].'</a></h1>    
                                            </div>'; 
                                        }
                                    }
                                    elseif(isset($_GET['city'])) {
                                        $city = $_GET['city'];
                                        $query =mysqli_query($con,"select job_ads.*,job_info.* from job_ads inner join job_info on job_ads.id = job_info.job_ads_id where job_info.city = '$city' ");
                                        while($row=mysqli_fetch_assoc($query)){
                                        echo '<div>
                                                <a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].'</b><h1></a>
                                                <h1 style="margin-top:-3%"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a> <a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;" >'.$row['source'].'</a> <a href="jobinfo.php?city='.$row['city'].'" style="font-size: 30%;color:blue;" >'.$row['city'].'</a></h1>    
                                            </div>';    
                                        }
                                    }
                                    elseif(isset($_GET['provinces'])) {
                                        $provinces = $_GET['provinces'];
                                        $query =mysqli_query($con,"select job_ads.*,job_info.* from job_ads inner join job_info on job_ads.id = job_info.job_ads_id where job_info.provinces = '$provinces' ");
                                        while($row=mysqli_fetch_assoc($query)){
                                        echo '<div>
                                                <a href="jobdetail.php?id='.$row['id'].'"><h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].'</b><h1></a>
                                                <h1 style="margin-top:-3%"><a href="jobinfo.php?issue_date='.$row['issue_date'].'" style="font-size: 30% ;color:blue;">'.$row['issue_date'].'</a> <a href="jobinfo.php?source='.$row['source'].'" style="font-size: 30%;color:blue;" >'.$row['source'].'</a> <a href="jobinfo.php?provinces='.$row['provinces'].'" style="font-size: 30%;color:blue">'.$row['provinces'].'</a></h1>    
                                            </div>';    
                                        }
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
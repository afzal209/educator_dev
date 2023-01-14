<?php
    include 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Jobs Detail");
    include_once 'includeFile/navbar.php';
?>


<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Jobs Detail Page				
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
                                    $id=$_GET['id'];
                                    $query =mysqli_query($con,"select * from job_ads where id = '$id'");
                                    $row=mysqli_fetch_assoc($query);
									echo '
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<h1 style="font-family: "Times New Roman", Times, serif;font-size:15px;"><b>'.$row['job_title'].' </b></h1>
										<a href="" style="font-size: 85% ;color:blue;">'.$row['issue_date'].'</a>|<a href="" style="font-size: 85%; color:blue;">'.$row['source'].'</a>    
									</div>
									<div class="feature-img">
										<a href="viewpost.php?id='.$row['id'].'" target="_blank">
											<img class="img-fluid" src="ads_pic/'.$row['image'].'" alt="ads pic" style="width: 70%; height:70%; margin-left:14%;">
										</a>
									</div>
									<div class="col-lg-12">
										<div class="quotes">
											'.$row['content'].';
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive " style="padding-top: 2%;width: 70%;margin-left:13%;">';
									$id_s = $_GET['id'];
									$query_all = mysqli_query($con,"select organization.organization_name,job_info.* from organization left join job_info on organization.id = job_info.job_info_id  where job_ads_id = '$id_s'");
									while($row_all = mysqli_fetch_assoc($query_all)){
										echo'
										<table class="table table-bordered table-striped">
											<tr>
												<th colspan="3" style="text-align:center;">'.$row_all['job_designaiton'].'</th>
											</tr>
											<tr> 
												<td>Number of Post</td>
												<td>'.$row_all['no_of_post'].'</td>
											</tr>
											<tr>
												<td>Department</td>
												<td>'.$row_all['department'].'</td>
											</tr>
											<tr>
												<td>Quota</td>
												<td>'.$row_all['quota'].'</td>
											</tr>
											<tr>
												<td>City</td>
												<td>'.$row_all['city'].'</td>
											</tr>
											<tr>
												<td>Province</td>
												<td>'.$row_all['provinces'].'</td>
											</tr>
											<tr>
												<td>Organisation</td>
												<td>'.$row_all['organization_name'].'</td>
											</tr>
											<tr>
												<td>Job Category </td>
												<td>'.$row_all['categories'].'</td>
											</tr>
											<tr>
												<td>Annuance date </td>
												<td>'.$row_all['issue_date'].'</td>
											</tr>
											<tr>
												<td>Valid till</td>
												<td>'.$row_all['last_date'].'</td>
											</tr>
											<tr>
												<td colspan="3" style="text-align:center;">Image Given Above</td>
											</tr>
										</table>';
									}
									echo'
                        			</div>
									'; 
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


<?php
    include_once 'includeFile/footer.php'; 
?>
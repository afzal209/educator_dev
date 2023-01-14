<?php
    include_once 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Prepare Subject");
    include_once 'includeFile/navbar.php';
?>


<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Prepare Topic Page				
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
								<!-- <div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>									
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12" >
                                <?php
                                     @$id=$_GET['id'];
                                     $query=mysqli_query($con,"select chapter_name from test_chapter where id ='$id' ");
                                     $row=mysqli_fetch_assoc($query);
                                     echo '<h1 class="text-center" style="font-family: "Times New Roman", Times, serif;font-size:30px">'.$row['chapter_name'].'</h1>
                                           <h1 style="font-family: "Times New Roman", Times, serif;font-size:30px; ">Topic</h1>';
                                ?>
                                </div>
                                <div class="col-md-12 col-sm-12" style="margin-top: 4%;">
                                    <div class="container">
										<?php
										@$id=$_GET['id'];
										$query=mysqli_query($con,"select * from test_topic where id = '$id'");
										if(mysqli_num_rows($query) > 0){
                                            while($row=mysqli_fetch_assoc($query)){
										echo'
                                        <div class="row d-flex justify-content-center">
                                            <div class="menu-content pb-70 col-lg-8">
                                                <div class="title text-center">
                                                    <!-- <h1 class="mb-10">Goals to Achieve for the leadership</h1> -->
                                                    <p style="font-size:30px;" ><b>'.$row['topic_name'].'</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12  justify-content-center align-items-center d-flex relative" style="margin-top: -5%;">';
												if (preg_match('/youtube/',$row['topic_embed'])) {
													$youtube_link=str_replace("https://www.youtube.com/watch?v=" , "https://www.youtube.com/embed/", $row['topic_embed']);
													echo'			
													<iframe class="embed-responsive-item" width="600" height="310" src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
												}
												elseif (preg_match('/youtu.be/',$row['topic_embed'])) {
													$youtube_embed_link=str_replace("https://youtu.be/" , "https://www.youtube.com/embed/", $row['topic_embed']);
													echo'			
													<iframe class="embed-responsive-item" width="600" height="310" src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';	
												}
												elseif (preg_match('/dailymotion/',$row['topic_embed'])) {
													$dailymotion_link=str_replace("https://www.dailymotion.com/video","https://www.dailymotion.com/embed/video/" , $row['topic_embed']);
													echo'			
													<iframe class="embed-responsive-item" width="600" height="310" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
												}
												elseif (preg_match('/dai.ly/',$row['topic_embed'])) {
													$dailymotion_embed_link=str_replace("https://dai.ly/","https://www.dailymotion.com/embed/video/" , $row['topic_embed']);
													echo'			
													<iframe class="embed-responsive-item" width="600" height="310" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';	
												}
												else{
													echo '
													<div class="feature-img">
														<img class="img-fluid" src="'.$row['topic_embed'].'" alt="ads pic" style="margin-top: -5%;">
														<p style="float: right;">'.$row['topic_pic_description'].'</p>
													</div>';
												}
												echo'		
                                            </div>
										</div>
										';
										if($row['lang'] == 'english'){
										echo'
										<div  style="font-size:20px;font-family: ""Times New Roman", Times, serif;">
										';
											$rep_artile = str_replace(".","<br/>",$row['topic_article']);
												echo'<p>'.$rep_artile.'</p>
										</div>
										';
										}
										elseif($row['lang'] == 'urdu'){
										echo'
										<div class="quotes" style="font-size:20px;">
										';
											$rep_artile = str_replace(".","<br/>",$row['topic_article']);
											echo'<p style="text-align:right">'.$rep_artile.'</p>
										</div>
										';
										}
										echo'
										<div class="col-md-12" style="text-align: center; margin-top: 1%;">
											
											<a href="preparepaper.php?id='.$row['id'].'" class="genric-btn primary-border">Take A Question</a>
											</div>';
											}
											// <a href="about-us.php" class="genric-btn primary-border">Take A Question</a>																					
										}
										?>
										
                                    </div>
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
			<!-- End post-content Area -->

<?php
    include_once 'includeFile/footer.php'; 
?>
		  
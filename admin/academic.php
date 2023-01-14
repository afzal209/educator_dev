<?php
    include_once 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Academic");
    include_once 'includeFile/navbar.php';
?>


<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Academic Page				
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 class="text-center" style="font-family: 'Times New Roman', Times, serif;font-size:30px">Academic</h1>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <ol class="cs">
                                        <?php
                                            // if(isset($_GET['page'])){
                                            //     @$page = $_GET['page'];
                                            // }
                                            // else{
                                            //     $page = 1;
                                            // }
                                            // $num_per_page = 05;
                                            // $start_from = ($page-1)*05;
                                            //echo $start_from;

                                            @$id=$_GET['id'];
                                            $a=1;
                                            //$query=mysqli_query($con,"select * from chapter where subject_id='$id' limit $start_from,$num_per_page");
                                            $query=mysqli_query($con,"select * from academic  ");                            
                                            if(mysqli_num_rows($query) > 0){
                                                while($row=mysqli_fetch_assoc($query)){
                                                    echo '<li class="cs-a">'.$a++.'.<a href= "chapter.php?id='.$row['id'].'" >'.$row['academic_name'].'</a></li>';
                                                }
                                            }
                                            else{
                                                echo '<li>No Academic Found</li>';
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
			<!-- End post-content Area -->

<?php
    include_once 'includeFile/footer.php'; 
?>
		  
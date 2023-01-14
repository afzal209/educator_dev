<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        include_once 'includeFile/header.php'; 
        ch_title("Moke Subject");
        include_once 'includeFile/navbar.php';
        ?>
        <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Moke Subject				
                                </h1>	
                                <!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
                            </div>	
                        </div>
                    </div>
                </section>
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
                                <?php
                                $id=$_GET['id'];
                                $query=mysqli_query($con,"select * from test_subject where id=$id ");
                                $row=mysqli_fetch_assoc($query); 
                                echo'
                                    <h1 class="text-center" style="font-family: Arial, Helvetica, sans-serif;font-size:30px">Moke Test</h1>
                                    <h1 style="font-family: Arial, Helvetica, sans-serif;font-size:30px"><a href="mokeacademic.php">Test Subject</a>>'.$row['subject_name'].'</h1>
                                ';     
                                ?>    
                                    
                            
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <ol class="cs">
                                        <?php
                                            $id=$_GET['id'];
                                            $a=1;
                                            $query=mysqli_query($con,"select * from test_chapter where test_subject_id = '$id' ");                            
                                            if(mysqli_num_rows($query) > 0){
                                                while($row=mysqli_fetch_assoc($query)){
                                                    echo '<li class="cs-a">'.$a++.'.<a href= "mokechapter.php?id='.$row['id'].'" >'.$row['chapter_name'].'</a></li>';
                                                }
                                            }
                                            else{
                                                echo '<li>No Chapter Found</li>';
                                                } 
                                        ?>
                                    </ol>
                                </div>
							</div>	
						</div>
					</div>
				</div>	
			</section>
<?php
        include('includeFile/footer.php');
        ?>
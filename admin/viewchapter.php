<?php 
    include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("View Chapter");
    include_once 'includeFile/navbar.php';
    ?>
        <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								View Chapter Page			
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
                                        <div class="country">Subject</div>
                                        <div class="country">Chapter Name</div>
                                        <div class="country">Action</div>
                                    </div>
                                    <?php
                                    $query=mysqli_query($con,'select subject.subject_name,chapter.* from subject RIGHT JOIN chapter ON subject.id = chapter.subject_id where chapter.subject_id = subject.id');
                                    while($row=mysqli_fetch_assoc($query)){ 
                                    echo' 
                                    <div class="table-row">
                                        <div class="country">'.$row['subject_name'].'</div>
                                        <div class="country">'.$row['chapter_name'].'</div>
                                        <div class="country"><a href="chapterupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/chapterdelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                    </div>
                                    ';
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
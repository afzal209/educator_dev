<?php 
    include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("View Question");
    include_once 'includeFile/navbar.php';
    ?>
        <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								View Question Page			
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
                                    <?php
                                    if($_SESSION['user']['role'] == 'admin'){
                                    echo'
                                    <div class="table-head ">
                                        <div class="country">Topic Name</div>
                                        <div class="country">Question Name</div>
                                        <div class="country">Correct Answer</div>
                                        <div class="country">Option 1</div>
                                        <div class="country">Option 2</div>
                                        <div class="country">Option 3</div>
                                        <div class="country">Option 4</div>
                                        <div class="country">Insert By</div>
                                        <div class="country">Action</div>
                                    </div>
                                    ';                                    
                                    $user_name = @$_SESSION['user']['username']; 
                                    $query=mysqli_query($con,"select topic.topic_name,question.* from topic RIGHT JOIN question ON topic.id = question.topic_id where question.topic_id = topic.id and question.insert_by = '$user_name' ");
                                    while($row=mysqli_fetch_assoc($query)){ 
                                    echo' 
                                    <div class="table-row">
                                        <div class="country">'.$row['topic_name'].'</div>
                                        <div class="country">'.$row['question'].'</div>
                                        <div class="country">'.$row['correct'].'</div>
                                        <div class="country">'.$row['option1'].'</div>
                                        <div class="country">'.$row['option2'].'</div>
                                        <div class="country">'.$row['option3'].'</div>
                                        <div class="country">'.$row['option4'].'</div>
                                        <div class="country">'.$row['insert_by'].'</div>
                                        <div class="country"><a href="questionupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/questiondelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                    </div>
                                    ';
                                        }
                                    }
                                    else{
                                    echo'
                                    <div class="table-head ">
                                        <div class="country">Topic Name</div>
                                        <div class="country">Question Name</div>
                                        <div class="country">Correct Answer</div>
                                        <div class="country">Option 1</div>
                                        <div class="country">Option 2</div>
                                        <div class="country">Option 3</div>
                                        <div class="country">Option 4</div>
                                        <div class="country">Action</div>
                                    </div>
                                        ';                                    
                                    $query=mysqli_query($con,'select chapter.chapter_name,topic.* from chapter RIGHT JOIN topic ON chapter.id = topic.chapter_id where topic.chapter_id = chapter.id');
                                    while($row=mysqli_fetch_assoc($query)){ 
                                    echo' 
                                    <div class="table-row">
                                        <div class="country">'.$row['topic_name'].'</div>
                                        <div class="country">'.$row['question'].'</div>
                                        <div class="country">'.$row['correct'].'</div>
                                        <div class="country">'.$row['option1'].'</div>
                                        <div class="country">'.$row['option2'].'</div>
                                        <div class="country">'.$row['option3'].'</div>
                                        <div class="country">'.$row['option4'].'</div>
                                        <div class="country"><a href="questionupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
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
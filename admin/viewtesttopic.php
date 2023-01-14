<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }

        include_once 'includeFile/header.php'; 
        ch_title("View Test Topic");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    View Test Topic Page			
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
                                            <div class="country">Chapter Name</div>
                                            <div class="country">Topic Name</div>
                                            <div class="country">Topic Embed</div>
                                            <div class="country">Topic Article</div>
                                            <div class="country">Insert By</div>
                                            <div class="country">Action</div>
                                        </div>
                                        ';                                    
                                        $query=mysqli_query($con,'select chapter.chapter_name,topic.* from chapter RIGHT JOIN topic ON chapter.id = topic.chapter_id where topic.chapter_id = chapter.id');
                                        while($row=mysqli_fetch_assoc($query)){ 
                                        echo' 
                                        <div class="table-row">
                                            <div class="country">'.$row['chapter_name'].'</div>
                                            <div class="country">'.$row['topic_name'].'</div>
                                            <div class="country">'.$row['topic_embed'].'</div>
                                            <div class="country">'.$row['topic_article'].'</div>
                                            <div class="country">'.$row['insert_by'].'</div>
                                            <div class="country"><a href="testtopicupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/testtopicdelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                        </div>
                                        ';
                                            }
                                        }
                                        else{
                                        echo'
                                        <div class="table-head ">
                                            <div class="country">Chapter Name</div>
                                            <div class="country">Topic Name</div>
                                            <div class="country">Topic Embed</div>
                                            <div class="country">Topic Article</div>
                                            <div class="country">Action</div>
                                        </div>
                                            ';   
                                        $user_name = @$_SESSION['user']['username'];
                                        $query=mysqli_query($con,"select test_chapter.chapter_name,test_topic.* from test_chapter RIGHT JOIN test_topic ON test_chapter.id = test_topic.test_chapter_id where test_topic.test_chapter_id = test_chapter.id and test_topic.insert_by= '$user_name'");
                                        while($row=mysqli_fetch_assoc($query)){ 
                                        echo' 
                                        <div class="table-row">
                                            <div class="country">'.$row['chapter_name'].'</div>
                                            <div class="country">'.$row['topic_name'].'</div>
                                            <div class="country">'.$row['topic_embed'].'</div>
                                            <div class="country">'.$row['topic_article'].'</div>
                                            <div class="country"><a href="testtopicupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
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
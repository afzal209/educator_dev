<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }

        include_once 'includeFile/header.php'; 
        ch_title("View Test Question");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    View Test Question Page			
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
                                        $query=mysqli_query($con,'select test_topic.topic_name,test_question.* from test_topic RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id where test_question.test_topic_id = test_topic.id');
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
                                            <div class="country"><a href="testquestionupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/testquestiondelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
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
                                        $user_name = @$_SESSION['user']['username'];    
                                        $query=mysqli_query($con,"select test_topic.topic_name,test_question.* from test_topic RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id where test_question.test_topic_id = test_topic.id and test_question.insert_by = '$user_name'");
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
                                            <div class="country"><a href="testquestionupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
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
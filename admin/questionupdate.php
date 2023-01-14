<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        $id=$_GET['id'];

        $query=mysqli_query($con,"select * from question where id='$id'");

        $row=mysqli_fetch_assoc($query);

        $question=$row['question'];

        $option1=$row['option1'];

        $option2=$row['option2'];

        $option3=$row['option3'];

        $option4=$row['option4'];

        $correct=$row['correct'];
       
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Update Topic");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Topic				
                                </h1>	
                                <!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
                            </div>	
                        </div>
                    </div>
                </section>

                <div class="whole-wrap">
                    <div class="container" >
                        <div class="section-top-border">
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <h3 class="mb-30 text-center">Update Question</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="" >
                                        <div class="mt-10">
                                            <textarea name="question" id="question" class="single-textarea"  ><?php echo $question ?></textarea>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="correct" id="correct" value="<?php echo $correct ?>"   class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option1" id="option1" value="<?php echo $option1 ?>" class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option2" id="option2" value="<?php echo $option2 ?>" class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option3" id="option3" value="<?php echo $option3 ?>" class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option4" id="option4" value="<?php echo $option4 ?>" class="single-input">
                                        </div>
                                        <input type="hidden" name="insert_by" value="<?php echo @$_SESSION['user']['username']; ?>" >             
                                        <div class="button-group-area mt-40">
                                            <input class="genric-btn success-border circle" type="submit" name="submit" value="Add">
                                        </div>                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
        <?php
        include('includeFile/footer.php');
        include('phpScript/update_question_script.php');
        ?>
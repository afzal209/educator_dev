<?php 
        include_once 'db/connect.php';
        $id=$_GET['id'];

        $query=mysqli_query($con,"select * from chapter where id='$id'");
        $row=mysqli_fetch_assoc($query);
        $name=$row['chapter_name'];
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
    
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Update Chapter");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Update Chapter				
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
                                    <h3 class="mb-30 text-center">Update Chapter</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="" >
                                        <div class="mt-10">
                                            <input type="text" name="name" id="name" value="<?php echo $name;?>" class="single-input">
                                        </div>             
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
        include 'phpScript/update_chapter_script.php';
        include('includeFile/footer.php');
        ?>
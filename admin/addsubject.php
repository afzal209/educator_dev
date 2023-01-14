<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
    
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Subject");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Subject				
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
                                    <h3 class="mb-30 text-center">Add Subject</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="phpScript/subject_script.php" enctype="multipart/form-data">
                                        <div class="mt-10">
                                            <input type="file" name="image" id="image"  >
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="academicname" id="academicname" >
                                                    <option value="" selected>Academic Name</option>
                                                    <?php
                                                    $query=mysqli_query($con,"select * from academic");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['academic_name'];?></option>
                                                    <?php 
                                                        }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="text" id="text" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required class="single-input">
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
        include('includeFile/footer.php');
        ?>
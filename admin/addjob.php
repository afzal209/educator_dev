<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Job");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Job 				
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
                                    <h3 class="mb-30 text-center">Add Organization</h3>
                                  
                                    <form  method="POST" action="phpScript/job_ads_script.php" enctype="multipart/form-data">
                                    <?php 
                                        if(@$_GET['response1'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class1'].'">
                                                        <strong>'.ucfirst(@$_GET['response1']).'!</strong> '.@$_GET['message1'].'
                                                    </div>';
                                                }
                                    ?>
                                        <div class="mt-10">
                                            <input type="file" name="image_logo" id="image_logo" placeholder="Enter Option 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 1'" required>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="organization" id="organization" placeholder="Enter Organization" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Organization'" required class="single-input">
                                        </div>
                                        <input type="hidden" name="insert_by" value="<?php echo @$_SESSION['user']['username']; ?>" >             
                                        <div class="button-group-area mt-40">
                                            <input class="genric-btn success-border circle" type="submit" name="submit_Organization" value="Add">
                                        </div>                                   
                                    </form>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <h3 class="mb-30 text-center">Add Job</h3>
                                    <form  method="POST" action="phpScript/job_ads_script.php" enctype="multipart/form-data">
                                       <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                        $timezone = "Asia/Karachi";
                                        date_default_timezone_set($timezone);
                                        //$today = date("d/m/y h:i:sa");
                                        $today = date("d-M-Y l");
                                        $time = date("h:i:sa");
                                       ?>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="choose_organization" id="choose_organization" >
                                                    <option value="" selected>Choose Organization</option>
                                                    <?php
                                                    $query = mysqli_query($con,"select * from organization");
                                                    while($row=mysqli_fetch_assoc($query)){
                                                        echo '<option value="'.$row['id'].'">'.$row['organization_name'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="mt-10">
                                            <input type="file" name="image" id="image" placeholder="Enter Option 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 1'" required>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="job_title" id="job_title" placeholder="Enter Job Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Job Title'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <textarea name="content" id="content" class="single-textarea" placeholder="Enter Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Content'" required></textarea>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="issue_date" id="issue_date" value="<?php echo $today;?>" placeholder="Enter Issue Date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Issue Date'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="issue_time" id="issue_time" value="<?php echo $time;?>" placeholder="Enter Issue Time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Issue Time'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="source" id="source" placeholder="Enter Source" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Source'" required class="single-input">
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
        ?>
<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Moke");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Moke				
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
                                    <h3 class="mb-30 text-center">Add Moke</h3>
                                    
                                    <form  method="POST" action="phpScript/moke_script.php" >
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                            $timezone = "Asia/Karachi";
                                            date_default_timezone_set($timezone);
                                            $today = date("d/m/y");
                                    ?>
                                        <div class="mt-10">
                                            <input type="text" name="job_title" id="job_title" placeholder="Enter Moke Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Moke Title'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" value="<?php echo $today; ?>" name="date" id="date"  required class="single-input">
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="time" id="time" >
                                                    <option value="">Time</option>
                                                    <option value="01:00">1</option>
                                                    <option value="02:00">2</option>
                                                    <option value="03:00">3</option>
                                                    <option value="04:00">4</option>
                                                    <option value="05:00">5</option>
                                                    <option value="06:00">6</option>
                                                    <option value="07:00">7</option>
                                                    <option value="08:00">8</option>
                                                    <option value="09:00">9</option>
                                                </select>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="start_paper" id="start_paper" placeholder="Enter Start Paper Ex:06:00:00am" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Start Paper Ex:06:00:00am'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="end_paper" id="end_paper" placeholder="Enter End Paper Ex:06:00:00pm" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter End Paper Ex:06:00:00pm'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="number" name="no_of_question" id="no_of_question" placeholder="Enter No of Question" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter No of Question'" required class="single-input">
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
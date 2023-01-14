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
                                    Add Job Info				
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
                                    <h3 class="mb-30 text-center">Add Job Info</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="phpScript/job_ads_info_script.php" enctype="multipart/form-data">
                                       <?php 
                                        $timezone = "Asia/Karachi";
                                        date_default_timezone_set($timezone);
                                        //$today = date("d/m/y h:i:sa");
                                        $today = date("d-M-Y l");
                                        $time = date("h:i:sa");
                                       ?>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="organization_name" id="organization_name" >
                                                    <option value="" selected>Choose Organization</option>
                                                    <?php
                                                    $query = mysqli_query($con,"select * from organization");
                                                    while($row=mysqli_fetch_assoc($query)){
                                                        echo '<option value="'.$row['id'].'">'.$row['organization_name'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group mt-10">
                                            <select class="form-control" name="job_ads" id="job_ads" >
                                                <option value="" selected>Choose Title</option>
                                            </select>
                                        </div>
                                        <div class="mt-10">
                                            <input type="number" name="no_of_post" id="no_of_post" placeholder="Enter No of Post" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter No of Post'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="department" id="department" placeholder="Enter Department" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Department'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                        <input type="text" name="quota" id="quota"  placeholder="Number (urban) Number (rural)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Number (urban) Number (rural)'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="job_designaiton" id="job_designaiton"  placeholder="Enter Job Designaiton" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Job Designaiton'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="city" id="city"  placeholder="Enter City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter City'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="provinces" id="provinces" placeholder="Enter Provinces" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Provinces'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="issue_date" id="issue_date" placeholder="Enter Issue Date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Issue Date'" required class="single-input" readonly>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="last_date" id="last_date" placeholder="Enter Last Date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Last Date'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="source" id="source" placeholder="Enter Source" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Source'" required class="single-input" readonly>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="categories" id="categories" placeholder="Enter Categories" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Categories'" required class="single-input">
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script type="text/javascript">
                $(document).ready(function(e){
                        $('#organization_name').on('change', function(e){
                            //console.log(e);
                            var organization_name = e.target.value;
                            //console.log(job_ads_id);
                            $.get('ajax/organizationServer.php?id='+organization_name, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                $('#job_ads').empty();  
                                $('#job_ads').append('<option value = ""></option>');
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    $('#job_ads').append('<option value = "'+result[i].id+'">'+result[i].job_title+'</option>');
                                    // $('#issue_date').val(result[i].issue_date);
                                    // $('#source').val(result[i].source)
                                }
                            });
                        })
                        $('#job_ads').on('change', function(e){
                            //console.log(e);
                            var job_ads_id = e.target.value;
                            //console.log(job_ads_id);
                            $.get('ajax/jobServer.php?id='+job_ads_id, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                //$('#subject').empty();  
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    //$('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                    $('#issue_date').val(result[i].issue_date);
                                    $('#source').val(result[i].source)
                                }
                            });
                        });
                    });
                </script>

        <?php
        include('includeFile/footer.php');
        ?>
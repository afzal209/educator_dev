<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
    
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Chapter");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Chapter				
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
                                    <h3 class="mb-30 text-center">Add Chapter</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="phpScript/chapter_script.php" >
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="academic" id="academic" >
                                                    <option value="" selected>Academic Name</option>
                                                    <?php
                                                    $query = mysqli_query($con,"select * from academic");
                                                    if(mysqli_num_rows($query) > 0){
                                                        while($row=mysqli_fetch_assoc($query)){
                                                    echo '<option value="'.$row['id'].'" > '.$row['academic_name'].' </option>';
                                                        }                                          
                                                    }
                                                    else{
                                                        echo '<option>No academic Add</option>';
                                                    }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="subject" id="subject" >
                                                    <option value=""></option>
                                                </select>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="name" id="name" placeholder="Enter Chapter" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required class="single-input">
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
                        $('#academic').on('change', function(e){
                            //console.log(e);
                            var aca_id = e.target.value;
                            //console.log(aca_id);
                            $.get('ajax/chapterServer.php?id='+aca_id, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                $('#subject').empty();  
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    $('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                }
                            });
                        });
                    });
                </script>  
            
        <?php
        include('includeFile/footer.php');
        ?>
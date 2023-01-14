<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Test Question");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Test Question 				
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
                                    <h3 class="mb-30 text-center">Add Question</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="phpScript/test_question_script.php" >
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="subject" id="subject" >
                                                    <option value="">Subject Name</option>
                                                <?php
                                                $query = mysqli_query($con,"select * from test_subject");
                                                if(mysqli_num_rows($query) > 0){
                                                    while($row=mysqli_fetch_assoc($query)){
                                                    echo '<option value="'.$row['id'].'">'.$row['subject_name'].'</option>';
                                                    }
                                                }    
                                                else{
                                                    echo '<option value="">No Subject Added</option>';
                                                }
                                                ?>
                                                </select>
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="chapter" id="chapter" >
                                                    <option value="">Chapter Name</option>
                                                </select>
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="topic" id="topic" >
                                                    <option value="">Topic Name</option>
                                                </select>
                                        </div>
                                        <div class="mt-10">
                                            <textarea name="question" id="question" class="single-textarea" placeholder="Enter Article" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Article'" required></textarea>
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option1" id="option1" placeholder="Enter Option 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 1'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option2" id="option2" placeholder="Enter Option 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 2'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option3" id="option3" placeholder="Enter Option 3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 3'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="option4" id="option4" placeholder="Enter Option 4" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Option 4'" required class="single-input">
                                        </div>
                                        <div class="form-group mt-10">
                                            <select class="form-control" name="correct" id="correct">
                                                <option value="" selected>Correct Answer</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                                <option value="option4">Option 4</option>
                                            </select>
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
                    $('#subject').on('change', function(e){
                        //console.log(e);
                        var sub_id=e.target.value;
                    
                        //console.log(req_id);
                        $.get('ajax/testquestionServer.php?id='+sub_id, function(data){
                            //console.log(data);
                            var result = JSON.parse(data);
                            //console.log(result);
                            //$('#subject').empty();  
                            $('#chapter').empty();
                            $('#chapter').append('<option value = ""></option>'); 
                            for(var i=0; i<result.length; i++){
                                //console.log(result[i].id);
                                $('#chapter').append('<option value="'+ result[i].id+'">'+result[i].chapter_name+'</option>');
                            }
                        });
                    });
                    $('#chapter').on('change',function(e){
                        var cha_id = e.target.value;
                        //console.log(sub_id);
                        $.get('ajax/testquestionServer1.php?id='+cha_id , function(data_s){
                            //console.log(data_s);
                            var result = JSON.parse(data_s);
                            //console.log(result);
                            $('#topic').empty();
                            $('#topic').append('<option value = ""></option>'); 
                            for(var i=0; i<result.length; i++){
                                //console.log(result[i].id);
                                $('#topic').append('<option value="'+ result[i].id+'">'+result[i].topic_name+'</option>');
                            }
                        })
                    });
                    
                });
            </script>   

        <?php
        include('includeFile/footer.php');
        ?>
<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        
        $session_permission = $_SESSION['user']['academic_id'];
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        $session_permission_sub = $_SESSION['user']['subject_id'];
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        // //echo $session_var;
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        $session_permission_ex = explode(',' ,$session_permission_sub);
        //echo '<pre>'.print_r($session_permission_ex,true).'</pre>';
        $session_permission_im = "'".implode(",",$session_permission_ex)."'";
        //echo '<pre>'.print_r($session_permission_im,true).'</pre>';
        $session_role = $_SESSION['user']['role'];

        $session_role_ex = explode(',',$session_role);

        $session_role_im = "'".implode("",$session_role_ex)."'";
        //echo '<pre>'.print_r($session_permission,true).'</pre>';

        // //echo $session_permission;
        $where = "";
        if($_SESSION['user']['role'] == 'editor'){
            $where = "where id IN ($session_permission)";
        }
        $query=mysqli_query($con,"select * from academic $where");
        $resultAcademics = array();
        while($row=mysqli_fetch_assoc($query)){
            $resultAcademics[] = $row;
        }
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Add Question");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Add Question				
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
                                    <form  method="POST" action="phpScript/question_script.php" >
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="academic" id="academic" >
                                                    <option value="" selected>Academic Name</option>
                                                    <?php 
                                                        foreach($resultAcademics as $key=>$academic){
                                                            echo '<option value="'.$academic['id'].'" > '.$academic['academic_name'].' </option>';
                                                        }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="subject" id="subject" >
                                                    <option value="">Subject Name</option>
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
                        $('#academic').on('change', function(e){
                            //console.log(e);
                            var aca_id=e.target.value;
                            var sub_hd = <?php echo $session_permission_im?>;
                            var role_hd = <?php echo $session_role_im?>;
                            //console.log(req_id);
                            $.get('ajax/server.php?id='+aca_id+'&sub_hd='+sub_hd+'&role_hd='+role_hd, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                $('#subject').empty();  
                                $('#subject').append('<option value = ""></option>'); 
                                for(var i=0; i<result.length; i++){
                                    //console.log(result[i].id);
                                    $('#subject').append('<option value="'+ result[i].id+'">'+result[i].subject_name+'</option>');
                                }
                            });
                        });
                        $('#subject').on('change',function(e){
                            var sub_id = e.target.value;
                            //console.log(sub_id);
                            $.get('ajax/server1.php?id='+sub_id , function(data_s){
                                //console.log(data_s);
                                var result = JSON.parse(data_s);
                                //console.log(result);
                                $('#chapter').empty();
                                $('#chapter').append('<option value = ""></option>');
                                for(var i=0; i<result.length; i++){
                                    //console.log(result[i].id);
                                    $('#chapter').append('<option value="'+ result[i].id+'">'+result[i].chapter_name+'</option>');
                                }
                            })
                        });
                        $('#chapter').on('change',function(e){
                            var chap_id = e.target.value;
                            //console.log(sub_id);
                            $.get('ajax/server2.php?id='+chap_id , function(data_c){
                                //console.log(data_s);
                                var result = JSON.parse(data_c);
                                //console.log(result);
                                $('#topic').empty();
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
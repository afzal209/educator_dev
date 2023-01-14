<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        include_once 'includeFile/header.php'; 
        ch_title("Moke Question");
        include_once 'includeFile/navbar.php';
        ?>
        <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Moke Question				
                                </h1>	
                                <!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
                            </div>	
                        </div>
                    </div>
                </section>
                <section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<!-- <div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>									
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php
                                $id=$_GET['id'];
                                $query=mysqli_query($con,"select test_subject.* , test_chapter.* ,test_topic.*  from test_subject inner join test_chapter on test_subject.id = test_chapter.test_subject_id inner join test_topic on test_chapter.id = test_topic.test_chapter_id where test_topic.id='$id'");
                                $row=mysqli_fetch_assoc($query); 
                                echo'
                                    <h1 class="text-center" style="font-family: Arial, Helvetica, sans-serif;font-size:30px">Moke Test</h1>
                                    <h1 style="font-family: Arial, Helvetica, sans-serif;font-size:30px"><a href="mokeacademic.php">Test Subject</a>>'.$row['subject_name'].'><a href="mokesubject.php?id='.$row['test_subject_id'].'">'.$row['chapter_name'].'</a>><a href="mokechapter.php?id='.$row['test_chapter_id'].'">'.$row['topic_name'].'</a></h1>
                                ';     
                                ?>    
                                    
                            
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <form method="POST" action="phpScript/moke_question_script.php">
                                        <ol class="cs">
                                            <?php
                                            if(@$_GET['response'] != ''){
                                            echo ' <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                            }
                                            echo '
                                                <h1 class="text-center">Question</h1>
                                                <div class="col-md-12 col-sm-12 form-group">
                                                <select class="form-control" name="job_title" id="job_title">
                                                    <option></option>';
                                                $query1=mysqli_query($con,"select * from moke_title");
                                                if (mysqli_num_rows($query1) > 0) {
                                                    while($row1=mysqli_fetch_assoc($query1)){
                                                    echo'<option value="'.$row1['id'].'">'.$row1['job_title'].'</option>';
                                                        }
                                                    }
                                                else {
                                                    header("location: addmoke.php?response=error&class=danger&message=First Add moke Test");
                                                    }
                                                echo '
                                                </select>
                                                </div>';
                                                    
                                                $query=mysqli_query($con,"select * from test_question where test_topic_id='$id'");
                                                while($row=mysqli_fetch_assoc($query)){
                                                echo '
                                                    <div class="col-md-12 col-sm-12 form-group">
                                                        <li>
                                                            <input type="checkbox"  name="checkbox[]" value="'.$row['id'].'"> <h1 style="margin-left:4%; margin-top:-8%;" name="question">'.$row['question'].'</h1>
                                                            <input type="hidden" name="t_id" value="'.$row['test_topic_id'].'"/>
                                                        </li>
                                                    </div>    ';
                                                        } 
                                                        echo '<input type="hidden" name="time"  id="time"/>';
                                                    ?>
                                        </ol> 
                                         <input type="hidden" name="insert_by" value="<?php echo @$_SESSION['user']['username']; ?>" >
                                        <input type="submit" class="btn btn-primary" style="margin-left: 5%;"  name="t_submit" value="Add" >
                                    </form>
                                </div>
							</div>	
						</div>
					</div>
				</div>	
            </section>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script type="text/javascript">
            $(document).ready(function(e){
                    
                    $('#job_title').on('change', function(e){
                        //console.log(e);
                        var job_title = e.target.value;
                        //console.log(job_ads_id);
                        $.get('ajax/mokeServer.php?id='+job_title, function(data){
                            //console.log(data);
                            var result = JSON.parse(data);
                            //console.log(result);
                            //$('#subject').empty();  
                            for(var i=0 ;i<result.length ; i++ ){
                                //console.log(result[i].id);
                                //$('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                $('#time').val(result[i].time);
                                
                            }
                        });
                    });
                });
            </script>
<?php
        include('includeFile/footer.php');
        ?>
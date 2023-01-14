<?php
include_once 'db/connect.php';
ob_start();
if (!isset($_SESSION['access_token'])) {
    header('location:moketest.php');
}
include_once 'includes/body_start.php';
ch_title('Moke Paper');
include_once 'includes/header.php';
$id = $_GET['id'];
    $id_user = $_SESSION['userData']['id'];
    //echo $id_user;
    $query_time = mysqli_query($con, "select * from moke_title where id= '$id'");
    $row_time = mysqli_fetch_assoc($query_time);
    $start_paper = $row_time['start_paper'];
    $end_paper = $row_time['end_paper'];
    $date = $row_time['date'];
    $timezone = 'Asia/Karachi';
    date_default_timezone_set($timezone);
    $current_time = date('H:i:s');
    $current_date = date('d/m/y');
    //echo '<pre>'.print_r($row_score,true).'</pre>';
    if ($current_date == $date) {
        ?>
	
    <?php
    include_once 'includes/navbar.php'; ?>



<div class="all-title-box">
		<div class="container text-center">
			<h1>Moke Paper</h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
			
				
					<div class="blog-item">
						<!-- <div class="image-blog">
							<img src="images/blog_single.jpg" alt="" class="img-fluid">
						</div> -->
						<div class="post-content">
							<!-- <div class="post-date">
								<span class="day">30</span>
								<span class="month">Nov</span>
							</div>
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">May 11, 2015</a> </span>
								<span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
								<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
							</div>
							<div class="blog-title">
								<h2><a href="#" title="">perferendis doloribus asperiores.</a></h2>
							</div> -->
							<div class="blog-desc">
								<!-- <p>Lorem ipsum door sit amet, fugiat deicata avise id cum, no quo maiorum intel ogrets geuiat operts elicata libere avisse id cumlegebat, liber regione eu sit.... </p> -->
								<blockquote class="default">
									Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada. Ut lacus sapien, placerat a ornare nec, elementum sit amet felis. Maecenas pretium lorem hendrerit eros sagittis fermentum.
								</blockquote>
								<!-- <p>Phasellus tristique commodo libero, eget dignissim turpis dignissim quis. Morbi sit amet laoreet nibh, gravida scelerisque felis. Phasellus ultrices pellentesque ligula et viverra. Integer elementum, risus et tempor ultricies, libero turpis pellentesque massa, at facilisis erat nunc hendrerit erat. Praesent rhoncus, augue nec condimentum porta, magna dui volutpat augue, vitae blandit magna quam in massa. Fusce a rhoncus diam. Proin nec lacinia nibh. Praesent sed nisi sed purus dictum laoreet.</p> -->
								<!-- <p>Duis at tortor augue. Ut et justo consequat, facilisis lectus facilisis, tincidunt massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam vel vestibulum urna. Fusce sed magna posuere, vehicula odio vitae, tempor arcu. Pellentesque eget felis sed eros maximus elementum ultrices a elit. Sed ac sodales enim.</p> -->
							</div>							
						</div>
					</div>
					<div class="blog-item">
				
                             <?php
if ($current_time >= $start_paper) {
        if ($current_time <= $end_paper) {
            $query_check_data = mysqli_query($con, "select * from questions_meta where meta_value ='$id'");
            if (mysqli_num_rows($query_check_data) > 0) {
                $query = mysqli_query($con, "select id from social_users where social_id='$id_user'");
                $row = mysqli_fetch_assoc($query);
                $row_user = $row['id'];
                //echo $row_user;
                $query_meta = mysqli_query($con, "select count(question_id) from questions_meta where meta_value='$id'");
                $row_meta = mysqli_fetch_assoc($query_meta);
                $query_score = mysqli_query($con, "select count(question_id) from moke_score where social_user_id='$row_user' and paper_id='$id'");
                $row_score = mysqli_fetch_assoc($query_score);
                //echo '<pre>'.print_r($row_score,true).'</pre>';
                if ($row_meta == $row_score) {
                    header('location:moketest.php?response=error&class=danger&message=error');
                    ob_end_flush();
                } else {
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                    $questionPerPage = 1;
                    $startingQuestion = ($page * $questionPerPage) - $questionPerPage;
                    $id = $_GET['id'];
                    $a = 1;
                    // $query=mysqli_query($con,"SELECT moke_title.job_title , question.question,question.option1,question.option2,question.option3,question.option4,question.correct,test_question.question,test_question.option1,test_question.option2,test_question.option3,test_question.option4,test_question.correct,questions_meta.*
                    // FROM question
                    // INNER JOIN questions_meta ON question.id = questions_meta.question_id
                    // INNER JOIN test_question ON test_question.id = questions_meta.question_id
                    // INNER JOIN moke_title ON moke_title.id = questions_meta.meta_value
                    // where meta_value = '$id'
                    $query = mysqli_query($con, "SELECT moke_title.job_title , test_question.question,test_question.option1,test_question.option2,test_question.option3,test_question.option4,test_question.correct,questions_meta.* 
        FROM test_question
        RIGHT JOIN questions_meta ON test_question.id = questions_meta.question_id
        RIGHT JOIN moke_title ON moke_title.id = questions_meta.meta_value 
        where meta_value = '$id'
        ORDER BY questions_meta.meta_id ASC
        LIMIT $startingQuestion, $questionPerPage
    ");
                    @$totalCount = count($_SESSION['quiz']['questions']);
                    $correctCount = 0;
                    $query1 = mysqli_query($con, "select count(*) as total from questions_meta where meta_value = '$id'");
                    if (mysqli_num_rows($query) == 0) {
                        $query = mysqli_query($con, 'select * from moke_title ');
                        $row = mysqli_fetch_assoc($query);
                        $r = $row['id'];
                        echo ' 	<h1 class="text-center" style="font-family: "Times New Roman", Times, serif;">Notice</h1>
                    <h2 class="text-center" style="font-family: "Times New Roman", Times, serif;">Congratulations</h2>
                    <p class="text-center" style="margin-top:2%;font-size:20px;">Your Result will be shown .When paper time end .It will shown on Score Board</p>
                    <a href="session/mokepaper/moke_session_finish.php" class="genric-btn primary-border">Finish</a>';
                    } else {
                        $query_moke = mysqli_query($con, "select time from moke_title where id='$id'");
                        $time = '';
                        while ($row = mysqli_fetch_array($query)) {
                            // $time = $row['time'];
                            $row1 = mysqli_fetch_assoc($query1);
                            // $row_moke = mysqli_fetch_assoc($query_moke);
                            // $_SESSION['time'] = $time;
                            // $_SESSION['start_time'] =date("Y-m-d H:i:s");

                            // $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes',strtotime($_SESSION["start_time"])));
                            // //   print_r($end_time);
                            // $_SESSION['end_time'] = $end_time;
                            echo'
                
                            <div class="col-md-8 offset-md-2" style="text-align:center">
												<h3>'.$row['job_title'].'</h3>
												
                                            </div>
                                            <div class="col-md-8 offset-md-2" style="text-align:center">
												<h3 id="countdown">'.$row['time'].'</h3>
												
                                            </div>
                                            <div class="col-md-8 offset-md-2" style="text-align:center">
												<h3 >Date:'.$row['date'].'</h3>
												
                                            </div>
                                            
                
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <hr>
                </div>
                <div class="section-title row text-center">
					<div class="col-md-8 offset-md-2">
						<p class="lead">Question '.$page.' of '.$row1['total'].'</p>
					</div>
				</div>
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <hr>
                </div>
                <p style="font-size: 20px;">Q'.$page.' : '.$row['question'].'</p>
                <form id="quizForm" name="quizForm" >
                    <div class="row">
                            
                    ';
                            for ($i = 1; $i <= 4; ++$i) {
                                echo'
                                
                                <div class="col-md-6" style="margin-top:5px;">
													<div class="blog-button">
														<a class="hover-btn-new orange" href="javascript:void(0)" style="width: 91%; height: 48px;text-align:center" data-option="'.$row['option'.$i].'" id="option'.$i.'" name="option'.$i.'" onclick="SubmitQuestion(this,\'mokepaper.php?id='.@$id.'&page='.(@$page + 1).'\');"><span>'.$row['option'.$i].'</span></a>
													</div>
												</div>
                                ';
                            }
                            echo '
                            <input class="next_hd" type="submit" id="next" name="next" value="submit" onclick="SubmitQuestion(this,\'mokepaper.php?id='.@$id.'&page='.(@$page + 1).'\');"/>
                            <input type="hidden" value="'.@$row['correct'].'" id="correct_answer" name="correct_answer" />
                            <input type="hidden" id="paperId" name="paperId" value="'.@$_GET['id'].'"/>
                            <input type="hidden" id="questionId" name="questionId" value="'.@$row['question_id'].'"/> 
                            <input type="hidden" id="social_user_id" name="social_user_id" value="'.@$_SESSION['userData']['id'].'"/> 
                            <input type="hidden" id="end_time" name="end_time" value="'.@$end_time.'"/>
                    </div>
                </form>		
                ';
                        }
                    }
                }
            } else {
                header('location:moketest.php?response=error&class=danger&message=Paper Not prepare yet');
            }
        } else {
            header('location:moketest.php?response=error&class=danger&message=Paper has been finish');
        }
    } else {
        // header("location:moketest.php?response=error&class=danger&message=Paper Will Start Soon");
        $id = $_GET['id'];
        $query = mysqli_query($con, "select * from moke_title where id= '$id'");
        $row = mysqli_fetch_assoc($query);
        $row['time'];
        echo'

<div>
<div class="col-md-8 offset-md-2" style="text-align:center">
												<h1>Test Will start soon</h1>
												
                                            </div>
                                            <div class="col-md-8 offset-md-2" style="text-align:center">
												<h1 class="countdown_s"   style="text-align: center;"></h1>
												
											</div>

</div>

';
    } ?>
                                   
													
									
						
					</div>
					<div class="blog-author">
						<div class="author-bio">
							<h3 class="author_name"><a href="#">Tom Jobs</a></h3>
							<h5>CEO at <a href="#">SmartEDU</a></h5>
							<p class="author_det">
								Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt  ut aut reiciendise voluptat maiores alias consequaturs aut perferendis doloribus omnis saperet docendi nec, eos ea alii molestiae aliquand.
							</p>
						</div>
						<div class="author-desc">
							<img src="images/author.jpg" alt="about author">
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
							</ul>
						</div>
					</div>
					
					<!-- <div class="blog-comments">
						<h4>Comments (3)</h4>
						<div id="comment-blog">
							<ul class="comment-list">
								<li class="comment">
									<div class="avatar"><img alt="" src="images/avatar-01.jpg" class="avatar"></div>
									<div class="comment-container">
										<h5 class="comment-author"><a href="#">John Smith</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">February 22, 2015</a>
											<a class="comment-reply-link link-style3" href="#respond">Reply »</a>
										</div>
										<div class="comment-body">
											<p>Ne omnis saperet docendi nec, eos ea alii molestiae aliquand. Latine fuisset mele, mandamus atrioque eu mea, wi forensib argumentum vim an. Te viderer conceptam sed, mea et delenit fabellas probat.</p>
										</div>
									</div>
								</li>
								<li class="comment">
									<div class="avatar"><img alt="" src="images/avatar-02.jpg" class="avatar"></div>
									<div class="comment-container">
										<h5 class="comment-author"><a href="#">John Smith</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">February 22, 2015</a>
											<a class="comment-reply-link link-style3" href="#respond">Reply »</a>
										</div>
										<div class="comment-body">
											<p>Ne omnis saperet docendi nec, eos ea alii molestiae aliquand. Latine fuisset mele, mandamus atrioque eu mea, wi forensib argumentum vim an. Te viderer conceptam sed, mea et delenit fabellas probat.</p>
										</div>
									</div>
									<ul class="children">
										<li class="comment">
											<div class="avatar"><img alt="" src="images/avatar-03.jpg" class="avatar"></div>
											<div class="comment-container">
												<h5 class="comment-author"><a href="#">Thomas Smith</a></h5>
												<div class="comment-meta"><a href="#" class="comment-date link-style1">February 14, 2015</a><a class="comment-reply-link link-style3" href="#respond">Reply »</a></div>
												<div class="comment-body">
													<p>Labores pertinax theophrastus vim an. Error ditas in sea, per no omnis iisque nonumes. Est an dicam option, ad quis iriure saperet nec, ignota causae inciderint ex vix. Iisque qualisque imp duo eu, pro reque consequ untur. No vero laudem legere pri, error denique vis ne, duo iusto bonorum.</p>
												</div>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="comments-form">
						<h4>Leave a comment</h4>
						<div class="comment-form-main">
							<form action="#">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="commenter-name" placeholder="Name" id="commenter-name" type="text">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="commenter-email" placeholder="Email" id="commenter-email" type="text">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="commenter-url" placeholder="Website URL" id="commenter-url" type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="commenter-message" placeholder="Message" id="commenter-message" cols="30" rows="2"></textarea>
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<button class="hover-btn-new orange"><span>Post Comment</span></button>
									</div>
								</div>
							</form>
						</div>
					</div> -->
					
                </div><!-- end col -->
				<?php
                include_once 'includes/sidebar.php'; ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/snippets/mokepaper.js"></script>
    <script type="text/javascript" src="js/snippets/moketimer.js"></script>
    <script>

function updateStartpaper(){
    var time = '<?php echo $start_paper; ?>';
    var dt = new Date();
    var time_current =dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    //console.log(time_current);
    t = time.split(':');
    tc = time_current.split(':');

    min = t[1]-tc[1];
    sec = t[2]-tc[2];
    hour_carry =0;
    sec_carry =0;
    if (min < 0) {
        min += 60;
        hour_carry += 1;
    }
    if (sec < 0) {
        sec += 60;
        sec_carry +=1;
    }

    hour = t[0]-tc[0]-hour_carry;
    diff = hour + ":" + min + ":" + sec;
    $('.countdown_s').html(diff);
    if(hour == 0 && min == 00 && sec == 00){
        location.reload();
    }
}
$(document).ready(function(){
    setInterval(updateStartpaper, 1000);
});	
// setInterval(function() {
// 	var xmlhttp = new XMLHttpRequest();
// 	xmlhttp.open("GET", "response.php", false);
// 	xmlhttp.send(null);
// 	document.getElementById("countdown").innerHTML = xmlhttp.responseText;
// }, 100);
</script>	
	<?php include_once 'includes/footer.php'; ?>
	
    <?php
    } else {
        header('location:moketest.php?response=error&class=danger&message=Paper date will be'.' '.$date);
    }
     include_once 'includes/body_end.php';
     ?>
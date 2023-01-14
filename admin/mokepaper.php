<?php 
	include_once 'db/connect.php';
	ob_start();
    if (!isset($_SESSION['access_token'])) {
        header("location:sociallogin.php");
    }
?>

<?php
    
	include_once 'includeFile/header.php'; 
	ch_title("Moke Paper");
	include_once 'includeFile/navbar.php';
	$id = $_GET['id']; 
    $id_user = $_SESSION['userData']['id'];
    //echo $id_user;
	$query_time = mysqli_query($con,"select * from moke_title where id= '$id'");
	$row_time = mysqli_fetch_assoc($query_time);
	$start_paper = $row_time['start_paper'];
	$end_paper = $row_time['end_paper'];
	$date =$row_time['date'];
	$timezone = "Asia/Karachi";
    date_default_timezone_set($timezone);	
	$current_time = date("H:i:s");
	$current_date =date("d/m/y");
	//echo '<pre>'.print_r($row_score,true).'</pre>';
	if ($current_date == $date) {
		
?>

<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Moke Paper Page				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
								<?php
								if($current_time >= $start_paper ){
									if($current_time <= $end_paper){
									$query_check_data= mysqli_query($con,"select * from questions_meta where meta_value ='$id'");
									if(mysqli_num_rows($query_check_data) > 0){
						
										$query = mysqli_query($con,"select id from social_users where social_id='$id_user'");
										$row=mysqli_fetch_assoc($query);
										$row_user = $row['id'];
										//echo $row_user;
										$query_meta = mysqli_query($con,"select count(question_id) from questions_meta where meta_value='$id'");
										$row_meta = mysqli_fetch_assoc($query_meta);
										$query_score = mysqli_query($con,"select count(question_id) from moke_score where social_user_id='$row_user' and paper_id='$id'");
										$row_score = mysqli_fetch_assoc($query_score);
										//echo '<pre>'.print_r($row_score,true).'</pre>';
										if($row_meta == $row_score){
											header("location:moketest.php?response=error&class=danger&message=error");
											ob_end_flush();
										}
										else {
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
										$query=mysqli_query($con,"SELECT moke_title.job_title , test_question.question,test_question.option1,test_question.option2,test_question.option3,test_question.option4,test_question.correct,questions_meta.* 
										FROM test_question
										RIGHT JOIN questions_meta ON test_question.id = questions_meta.question_id
										RIGHT JOIN moke_title ON moke_title.id = questions_meta.meta_value 
										where meta_value = '$id'
										ORDER BY questions_meta.meta_id ASC
										LIMIT $startingQuestion, $questionPerPage
									");
										@$totalCount=count($_SESSION['quiz']['questions']);
										$correctCount=0;
										$query1=mysqli_query($con,"select count(*) as total from questions_meta where meta_value = '$id'");
										if(mysqli_num_rows($query) == 0){ 
											$query = mysqli_query($con,"select * from moke_title ");
											$row = mysqli_fetch_assoc($query);
											$r = $row['id'];
											echo ' 	<h1 class="text-center" style="font-family: "Times New Roman", Times, serif;">Notice</h1>
													<h2 class="text-center" style="font-family: "Times New Roman", Times, serif;">Congratulations</h2>
													<p class="text-center" style="margin-top:2%;font-size:20px;">Your Result will be shown .When paper time end .It will shown on Score Board</p>
													<a href="session/mokepaper/moke_session_finish.php" class="genric-btn primary-border">Finish</a>';
										}
										else{
											$query_moke =mysqli_query($con,"select time from moke_title where id='$id'");
											$time="";
											while($row=mysqli_fetch_array($query)){
												// $time = $row['time'];
												$row1=mysqli_fetch_assoc($query1); 
												// $row_moke = mysqli_fetch_assoc($query_moke); 
												// $_SESSION['time'] = $time;
												// $_SESSION['start_time'] =date("Y-m-d H:i:s");
												
												// $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["time"].'minutes',strtotime($_SESSION["start_time"])));
												// //   print_r($end_time);
												// $_SESSION['end_time'] = $end_time;
												echo'
												<h3 class="text-center" style="font-family: "Times New Roman", Times, serif;font-size:30px">Moke Paper</h3>
												<h3 style="text-align: right; font-family: "Times New Roman", Times, serif;" id="countdown">'.$row['time'].'</h3>
												<h3 style="text-align: right; font-family: "Times New Roman", Times, serif;">Date:'.$row['date'].'</h3>
												<h3 style="font-family: "Times New Roman", Times, serif;font-size:30px">'.$row['job_title'].'</h3>
												<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
													<hr>
												</div>
												<p style="text-align: center;font-size: 20px;" >Question '.$page.' of '.$row1['total'].' </p>
												<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
													<hr>
												</div>
												<p style="font-size: 20px;">Q'.$page.' : '.$row['question'].'</p>
												<form id="quizForm" name="quizForm" >
													<div class="row">
															
													';
															for ($i=1; $i<=4 ; $i++) { 
																echo'
																<div class="col-lg-6 col-md-12 col-sm-12">
																	<button type="button" class="genric-btn  e-large btn_size"  data-option="'.$row['option'.$i].'" id="option'.$i.'" name="option'.$i.'" onclick="SubmitQuestion(this,\'mokepaper.php?id='.@$id.'&page='.(@$page+1).'\');" >'.$row['option'.$i].'</button>	
																</div>	
																';	
															}
															echo '
															<input class="next_hd" type="submit" id="next" name="next" value="submit" onclick="SubmitQuestion(this,\'mokepaper.php?id='.@$id.'&page='.(@$page+1).'\');"/>
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
								}
								else {
									header("location:moketest.php?response=error&class=danger&message=Paper Not prepare yet");
								}
							}
							else{
								header("location:moketest.php?response=error&class=danger&message=Paper has been finish");	
							}
						}
						else{
							// header("location:moketest.php?response=error&class=danger&message=Paper Will Start Soon");
							$id = $_GET['id']; 
						$query = mysqli_query($con,"select * from moke_title where id= '$id'");
						$row = mysqli_fetch_assoc($query);
						$row['time'];
						echo'
						<h3 class="hidden" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" id="countdown">'.$row['time'].'</h3>
							<div>
								<h1>Test Will start soon</h1>
								<h1 class="countdown_s"   style="text-align: center;"></h1>
							</div>
						
						';
						}	
								?>
                                </div>      
							</div>	
							<?php 
							include_once 'includeFile/navigation-area.php';
							include_once 'includeFile/commect-area.php';
							include_once 'includeFile/commect-form.php';
							?>		
						</div>
					<?php include_once 'includeFile/slider-widget.php'?>
					</div>
				</div>	
			</section>
			<script type="text/javascript" src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    		<script type="text/javascript" src="assets/js/snippets/mokepaper.js"></script>
			<script type="text/javascript" src="assets/js/snippets/moketimer.js"></script>

			<script>

			function updateStartpaper(){
				var time = '<?php echo $start_paper?>';
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
			<!-- End post-content Area -->


<?php
			
	}
	else{
	header("location:moketest.php?response=error&class=danger&message=Paper date will be"." ".$date);
	}
    include_once 'includeFile/footer.php'; 
?>

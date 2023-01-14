<?php
    include_once 'db/connect.php';
    include_once 'includeFile/header.php';
    ch_title('paper');
    include_once 'includeFile/navbar.php';
?>
            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Paper Page				
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
                                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                    $questionPerPage = 1;
                                    $startingQuestion = ($page * $questionPerPage) - $questionPerPage;
                                    $id = $_GET['id'];
                                    $a = 1;
                                    $query = mysqli_query($con, "SELECT topic.topic_name, question.* 
									FROM topic
									RIGHT JOIN question ON topic.id = question.topic_id 
									where topic_id = '$id'
									ORDER BY question.id ASC
									LIMIT $startingQuestion, $questionPerPage
								");
                                    @$totalCount = count($_SESSION['quiz']['questions']);
                                    $correctCount = 0;
                                    $query1 = mysqli_query($con, "select count(*) as total from question where topic_id = '$id'");
                                    if (mysqli_num_rows($query) == 0) {
                                        echo ' 	<h1 class="text-center" style="font-family: "Times New Roman", Times, serif;">Result</h1>
												<h1 style="font-family: "Times New Roman", Times, serif;">Questions</h1>';
                                        $query = mysqli_query($con, "SELECT topic.topic_name, question.* 
												FROM topic
												RIGHT JOIN question ON topic.id = question.topic_id 
												where topic_id = '$id'");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            //  echo '<pre>'.print_r($_SESSION  ,true).'<pre>';
                                            //         //echo '<pre>'.print_r($row,true).'<pre>';
                                            //echo $row['correct'];
                                            if (@$row['correct'] == @$_SESSION['quiz']['questions'][$row['id']]) {
                                                ++$correctCount;
                                                $r = $row['id'];
                                            }
                                            echo '<div class="col-md-12 col-sm-12">
															<h3 style="margin-left:5%;">'.$a++.'. '.$row['question'].'?</h3>
														</div>
														<div>
															<h3 style="font-family: "Times New Roman", Times, serif;margin-left:8%;">Answers '.$row['correct'].'</h3>
														</div>';
                                        }
                                        echo'	<div  class="col-md-12 col-sm-12 table-responsive" style="margin-top:2%;">
														<table class="table table-bordered  table-striped">
															<tr>
																<th>Total Question</th>
																<th>Wrong Answer</th>
																<th>Correct Answer</th>
															</tr>
															<tr>
																<td>'.$totalCount.'</td>
																<td>'.(int) ($totalCount - $correctCount).'  </td>
																<td>'.$correctCount.'</td>
															</tr>
														</table>
													</div>
													<a href="session/paper/session_next.php?id='.$id.'" class="genric-btn primary">Next Topic</a> <a href="session/paper/session_finish.php" class="genric-btn primary-border">Finish</a>';
                                    } else {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $row1 = mysqli_fetch_assoc($query1);
                                            echo'
											<h3 class="text-center" style="font-family: "Times New Roman", Times, serif;font-size:30px">Paper</h3>
											<h3 style="font-family: "Times New Roman", Times, serif;font-size:30px">'.$row['topic_name'].'</h3>
											<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
												<hr>
											</div>
											<p style="text-align: center;font-size: 20px;" >Question'.$page.' of '.$row1['total'].' </p>
											<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
												<hr>
											</div>
											<p style="font-size: 20px;">Q'.$page.' : '.$row['question'].'</p>
											<form id="quizForm" name="quizForm" >
											<div class="row">
													
											';
                                            for ($i = 1; $i <= 4; ++$i) {
                                                echo'
														<div class="col-lg-6 col-md-12 col-sm-12">
															<button type="button" class="genric-btn primary-border e-large btn_size"  data-option="'.$row['option'.$i].'" id="option'.$i.'" name="option'.$i.'" onclick="SubmitQuestion(this,\'paper.php?id='.@$id.'&page='.(@$page + 1).'\');" >'.$row['option'.$i].'</button>	
														</div>
														';
                                            }
                                            echo '
													<input type="hidden" value="'.@$row['correct'].'" id="correct_answer" name="correct_answer" />
													<input type="hidden" id="paperId" name="paperId" value="'.@$_GET['id'].'"/>
													<input type="hidden" id="questionId" name="questionId" value="'.@$row['id'].'"/>
												
											</div>
											</form>		
											';
                                        }
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
					<?php include_once 'includeFile/slider-widget.php'; ?>
					</div>
				</div>	
			</section>
			<script type="text/javascript" src="assets/js/vendor/jquery.min.js"></script>
    		<script type="text/javascript" src="assets/js/snippets/papers.js"></script>
    
			<!-- End post-content Area -->

<?php
    include_once 'includeFile/footer.php';
?>
		  
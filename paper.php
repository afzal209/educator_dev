<?php
include_once 'db/connect.php';
ob_start();
include_once 'includes/body_start.php';
ch_title('Paper');
include_once 'includes/header.php';

 ?>
	
    <?php
    include_once 'includes/navbar.php'; ?>



<div class="all-title-box">
		<div class="container text-center">
			<h1>Paper</h1>
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
                                    // @$totalCount = count($_SESSION['quiz']['questions']);

                                    $query1 = mysqli_query($con, "select count(*) as total from question where topic_id = '$id'");
                                    if (mysqli_num_rows($query) == 0) {
                                        $_SESSION['correctCount'] = $correctCount = 0;
                                        $_SESSION['a'] = $a;
                                        $_SESSION['totalCount'] = count($_SESSION['quiz']['questions']);
                                        header('location:result.php?id='.$id);
                                        ob_end_flush();
                                    } else {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $row1 = mysqli_fetch_assoc($query1);
                                            echo'
											<div class="col-md-8 offset-md-2" style="text-align:center">
												<h3>Topic</h3>
												
											</div>
											<div class="col-md-8 offset-md-2">
												<h3>'.$row['topic_name'].'</h3>
											
											</div>
											<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
												<hr>
											</div>
											<div class="section-title row text-center">
												<div class="col-md-8 offset-md-2">
													<p class="lead">Question'.$page.' of '.$row1['total'].' </p>
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
														<a class="hover-btn-new orange" href="javascript:void(0)" style="width: 91%; height: 48px;text-align:center" data-option="'.$row['option'.$i].'" id="option'.$i.'" name="option'.$i.'" onclick="SubmitQuestion(this,\'paper.php?id='.@$id.'&page='.(@$page + 1).'\');"><span>'.$row['option'.$i].'<span></a>
													</div>
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
                include_once 'includes/sidebar.php';
                ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/snippets/papers.js"></script>

	<?php include_once 'includes/footer.php'; ?>
	
    <?php include_once 'includes/body_end.php'; ?>
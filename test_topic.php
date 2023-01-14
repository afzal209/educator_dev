<?php
include_once 'includes/body_start.php';
ch_title('Topic');
include_once 'db/connect.php';
include_once 'includes/header.php';
 ?>
	
    <?php
    include_once 'includes/navbar.php'; ?>



<div class="all-title-box">
		<div class="container text-center">
			<h1>Topic</h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    
					
                    <div class="blog-item">
                    <?php
                                @$id = $_GET['id'];

                                $query = mysqli_query($con, 'select * from test_topic where id = "'.$id.'"');
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        echo '
										<div class="section-title row text-center">
							<div class="col-md-8 offset-md-2">
								<h3>'.$row['topic_name'].'</h3>
								
							</div>
						</div>
										<div class="post-content">
									
										<div class="blog-desc">';
                                        if ($row['lang'] == 'english') {
                                            $rep_artile = str_replace('.', '<br/>', $row['topic_article']);
                                            echo '<blockquote class="default">
											'.$rep_artile.'
										</blockquote>';
                                        } elseif ($row['lang'] == 'urdu') {
                                            $rep_artile = str_replace('.', '<br/>', $row['topic_article']);
                                            echo '
											<blockquote class="default" style="text-align:right">
												'.$rep_artile.'
											</blockquote>
											';
                                        }
                                        echo'
										</div>							
									</div>	';
                                    }
                                 ?>
                        
						
						
						
					</div>
                    <div class="blog-item">
					<div class="row">
					<div class="col-md-12">
					<?php
                        @$id = $_GET['id'];

                        $query = mysqli_query($con, 'select * from test_topic where id = "'.$id.'"');
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<div class="image-blog">';
                            if (preg_match('/youtube/', $row['topic_embed'])) {
                                $youtube_link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $row['topic_embed']);
                                echo'			
                            <iframe class="embed-responsive-item" width="100%" height="200px" src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-fluid"></iframe>';
                            } elseif (preg_match('/youtu.be/', $row['topic_embed'])) {
                                $youtube_embed_link = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $row['topic_embed']);
                                echo'			
                            <iframe class="embed-responsive-item" width="100%" height="200px" src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-fluid"></iframe>';
                            } elseif (preg_match('/dailymotion/', $row['topic_embed'])) {
                                $dailymotion_link = str_replace('https://www.dailymotion.com/video', 'https://www.dailymotion.com/embed/video/', $row['topic_embed']);
                                echo'			
                            <iframe class="embed-responsive-item" width="100%" height="200px" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-fluid"></iframe>';
                            } elseif (preg_match('/dai.ly/', $row['topic_embed'])) {
                                $dailymotion_embed_link = str_replace('https://dai.ly/', 'https://www.dailymotion.com/embed/video/', $row['topic_embed']);
                                echo'			
                            <iframe class="embed-responsive-item" width="100%" height="200px" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-fluid"></iframe>';
                            } else {
                                echo '
                                <div class="image-blog">
							            <img src="'.$row['topic_embed'].'" alt="" class="img-fluid">
						        </div> ';
                            }
                            echo '</div>';
                        }
                        ?>
					</div>
                    </div>
                    <div class="post-content">
							<!-- <div class="post-date">
								<span class="day">30</span>
								<span class="month">Nov</span>
							</div> -->
							<?php
                        @$id = $_GET['id'];

                            $query = mysqli_query($con, 'select * from test_topic where id = "'.$id.'"');
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo '
							<div class="blog-title">
								<h2><a href="#" title="">'.$row['topic_pic_description'].'</a></h2>
							</div>
							<div class="blog-desc">
								
												
												<div class="col-md-12 blog-button" style="text-align:center">
								
													<a href="test_paper.php?id='.$row['id'].'" class="hover-btn-new orange"><span>Take A Question</span></a>
												</div>
									
									';
                                }
                        ?>
								
								<!-- <blockquote class="default">
									Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada. Ut lacus sapien, placerat a ornare nec, elementum sit amet felis. Maecenas pretium lorem hendrerit eros sagittis fermentum.
								</blockquote>
								<p>Phasellus tristique commodo libero, eget dignissim turpis dignissim quis. Morbi sit amet laoreet nibh, gravida scelerisque felis. Phasellus ultrices pellentesque ligula et viverra. Integer elementum, risus et tempor ultricies, libero turpis pellentesque massa, at facilisis erat nunc hendrerit erat. Praesent rhoncus, augue nec condimentum porta, magna dui volutpat augue, vitae blandit magna quam in massa. Fusce a rhoncus diam. Proin nec lacinia nibh. Praesent sed nisi sed purus dictum laoreet.</p>
								<p>Duis at tortor augue. Ut et justo consequat, facilisis lectus facilisis, tincidunt massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam vel vestibulum urna. Fusce sed magna posuere, vehicula odio vitae, tempor arcu. Pellentesque eget felis sed eros maximus elementum ultrices a elit. Sed ac sodales enim.</p> -->
							</div>							
						</div>
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

   
<?php include_once 'includes/footer.php'; ?>
    <?php include_once 'includes/body_end.php'; ?>
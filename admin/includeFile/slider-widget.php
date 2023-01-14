<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<!-- <div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
									<img src="img/blog/user-info.png" alt="">
									<a href="#"><h4>Charlie Barber</h4></a>
									<p>
										Senior blog writer
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
										Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.
									</p>
								</div> -->
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Latest Job</h4>
									<div class="popular-post-list">
										<?php
										include_once 'db/connect.php';

										$query = mysqli_query($con,"select * from organization order by id desc");
		
										while($row=mysqli_fetch_assoc($query)){
										echo'
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img class="img-fluid" src="logo/'.$row['organization_image'].'" alt="error" >
											</div>
											<div class="details">
												<a href="jobinfo.php?id='.$row['id'].'"><h6>'.$row['organization_name'].'</h6></a>
												<p>02 Hours ago</p>
											</div>
										</div>';
										}
										?>														
									</div>
								</div>
								<div class="single-sidebar-widget ads-widget">
									<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
								</div>
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Moke Test</h4>
									<div class="popular-post-list">
										<?php
										include_once 'db/connect.php';

										$query = mysqli_query($con,"select * from moke_title order by id desc");
		
										while($row=mysqli_fetch_assoc($query)){
										echo'
										<div class="single-post-list d-flex flex-row align-items-center">
											
											<div class="details">
												<a href="mokepaper.php?id='.$row['id'].'"><h6>'.$row['job_title'].'</h6></a>
											</div>
											<div class="details">
												<h6>'.$row['date'].'</h6>
											</div>
											<div class="details">
												<h6>'.$row['time'].'</h6>
											</div>
										</div>';
										}
										?>														
									</div>
								</div>
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Moke Schedule</h4>
									<div class="popular-post-list">
										<div class="single-post-list d-flex flex-row align-items-center">
											<div class="details">
												<h6>Industry Test</h6>
												<h6>Applied industry Test</h6>
											</div>
											<div class="details">
												<h6>09/01/2020</h6>
												<h6>10/01/2020</h6>
											</div>
										</div>													
									</div>
								</div>
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Moke Score</h4>
									<div class="popular-post-list">
										<?php
										include_once 'db/connect.php';

										$query = mysqli_query($con,"select * from moke_title order by id desc");
		
										while($row=mysqli_fetch_assoc($query)){
										echo'
										<div class="single-post-list d-flex flex-row align-items-center">
											
											<div class="details">
												<a href="scorelist.php?id='.$row['id'].'"><h6>'.$row['job_title'].'</h6></a>
											</div>
											
										</div>';
										}
										?>														
									</div>
								</div>
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Technology</p>
												<p>37</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Lifestyle</p>
												<p>24</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Fashion</p>
												<p>59</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Art</p>
												<p>29</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Food</p>
												<p>15</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Architecture</p>
												<p>09</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Adventure</p>
												<p>44</p>
											</a>
										</li>															
									</ul>
								</div>	
								<div class="single-sidebar-widget newsletter-widget">
									<h4 class="newsletter-title">Newsletter</h4>
									<p>
										Here, I focus on a range of items and features that we use in life without
										giving them a second thought.
									</p>
									<div class="form-group d-flex flex-row">
									   <div class="col-autos">
									      <div class="input-group">
									        <div class="input-group-prepend">
									          <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
									        </div>
									        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >
									      </div>
									    </div>
									    <a href="#" class="bbtns">Subcribe</a>
									</div>	
									<p class="text-bottom">
										You can unsubscribe at any time
									</p>								
								</div>
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tag Clouds</h4>
									<ul>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Architecture</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Art</a></li>
										<li><a href="#">Adventure</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Adventure</a></li>
									</ul>
								</div>								
							</div>
						</div>
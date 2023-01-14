<?php
ob_start();
?>
<header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
			  				<a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+953 012 3654 896</span></a>
			  				<a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">support@colorlib.com</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			         
						
					  <!-- <li><a href="about-us.php">About</a></li> -->
					  <?php
                      if (@$_SESSION['userData']['email'] != '') {
                          echo
                          '
						  <li class="menu-has-children"><a href="#"> '.@$_SESSION['userData']['first_name'].'</a>
							<ul>
								<li><a href="mokelog.php">Moke Log</a></li>
								<li><a href="facebookLogin/logout.php">Logout</a></li>
							</ul>
						</li>	
						  ';
                      }
                      if (@$_SESSION['user']['email'] != '' && @$_SESSION['user']['password'] != '') {
                          echo
                        '
						<li class="menu-has-children"><a href="#"> '.@$_SESSION['user']['username'].'</a>
							<ul>';
                          if (@$_SESSION['user']['role'] == 'admin') {
                              echo'
								<li class="menu-has-children"><a href="">User </a>
									<ul>
										<li><a href="viewuser.php">View User</a></li>
										<li><a href="adduser.php">Add User</a></li>
									</ul>
								</li>
								<li><a href="addacademic.php">Add Academic</a></li>
								<li><a href="addsubject.php">Add Subject</a></li>
								<li class="menu-has-children"><a href="">Chapter </a>
									<ul>
										<li><a href="viewchapter.php">View Chapter</a></li>
										<li><a href="addchapter.php">Add Chapter</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Topic </a>
									<ul>
										<li><a href="viewtopic.php">View Topic</a></li>
										<li><a href="addtopic.php">Add Topic</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Question </a>
									<ul>
										<li><a href="viewquestion.php">View Question</a></li>
										<li><a href="addquestion.php">Add Question</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Moke </a>
									<ul>
										<li><a href="addmoke.php">Add Moke Test</a></li>
										<li><a href="mokeacademic.php">Moke Academic</a></li>
										<li><a href="mokelist.php">Moke List</a>
									</ul>
								</li>
								<li><a href="testsubject.php">Test Subject</a></li>
								<li class="menu-has-children"><a href="">Test Chapter </a>
									<ul>
										<li><a href="viewtestchapter.php">View Chapter</a></li>
										<li><a href="testchapter.php">Add Chapter</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Test Topic </a>
									<ul>
										<li><a href="viewtesttopic.php">View Topic</a></li>
										<li><a href="testtopic.php">Add Topic</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Test Question </a>
									<ul>
										<li><a href="viewtestquestion.php">View Question</a></li>
										<li><a href="testquestion.php">Add Question</a></li>
									</ul>
								</li>
								<li><a href="addjob.php">Add Job</a></li>
								<li><a href="addjobinfo.php">Add Job Info</a></li>
								<li><a href="logout.php">Logout</a></li>';
                          } elseif (@$_SESSION['user']['role'] == 'subadmin') {
                              echo'
								<li class="menu-has-children"><a href="">Moke </a>
									<ul>
										<li><a href="addmoke.php">Add Moke Test</a></li>
										<li><a href="mokeacademic.php">Moke Academic</a></li>
										<li><a href="mokelist.php">Moke List</a>
									</ul>
								</li>
								<li><a href="logout.php">Logout</a></li>
								';
                          } elseif (@$_SESSION['user']['role'] == 'editor') {
                              echo'
									<li class="menu-has-children"><a href="">Topic </a>
										<ul>
											<li><a href="viewtopic.php">View Topic</a></li>
											<li><a href="addtopic.php">Add Topic</a></li>
										</ul>
									</li>
									<li class="menu-has-children"><a href="">Question </a>
										<ul>
											<li><a href="viewquestion.php">View Question</a></li>
											<li><a href="addquestion">Add Question</a></li>
										</ul>
									</li>
									<li><a href="logout.php">Logout</a></li>
									';
                          } elseif (@$_SESSION['user']['role'] == 'jobeditor') {
                              echo'
									<li><a href="addjob.php">Add Job</a></li>
									<li><a href="addjobinfo.php">Add Job Info</a></li>
									<li><a href="logout.php">Logout</a></li>
									';
                          } elseif (@$_SESSION['user']['role'] == 'testeditor') {
                              echo'
								<li class="menu-has-children"><a href="">Test Topic </a>
									<ul>
										<li><a href="viewtesttopic.php">View Topic</a></li>
										<li><a href="testtopic.php">Add Topic</a></li>
									</ul>
								</li>
								<li class="menu-has-children"><a href="">Test Question </a>
									<ul>
										<li><a href="viewtestquestion.php">View Question</a></li>
										<li><a href="testquestion.php">Add Question</a></li>
									</ul>
								</li>
								<li><a href="logout.php">Logout</a></li>
								';
                          }
                          echo'</ul>
					  </li>	
						';
                      }
                      ?>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
</header><!-- #header -->
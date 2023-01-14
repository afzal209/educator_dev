<!-- Start header -->
<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #17a43b !important;">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo6.png" alt="" width="150" height="45" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Course </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="course-grid-2.html">Course Grid 2 </a>
								<a class="dropdown-item" href="course-grid-3.html">Course Grid 3 </a>
								<a class="dropdown-item" href="course-grid-4.html">Course Grid 4 </a>
							</div>
						</li> -->
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="blog.html">Blog </a>
								<a class="dropdown-item" href="blog-single.html">Blog single </a>
							</div>
						</li> -->
						<li class="nav-item"><a class="nav-link" href="academic.php">Academic</a></li>
						<li class="nav-item"><a class="nav-link" href="entry_test.php">Entry Test</a></li>						
						<li class="nav-item"><a class="nav-link" href="test_subject.php">Jobs Test Preparation</a></li>
						<li class="nav-item"><a class="nav-link" href="moketest.php">Daily Tests</a></li>
						<li class="nav-item"><a class="nav-link" href="course-grid-4.html">Scholarship </a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">News </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="course-grid-2.html">Current Affairs </a>
								<a class="dropdown-item" href="course-grid-3.html">Science </a>
								<a class="dropdown-item" href="course-grid-4.html">Technology </a>

							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="course-grid-4.html">Jobs ad </a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">More </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="course-grid-2.html">Contact us </a>
								<a class="dropdown-item" href="course-grid-2.html">About us </a>
								<a class="dropdown-item" href="course-grid-2.html">Privacy Policy</a>
								<a class="dropdown-item" href="course-grid-2.html">Disclaimer </a>

							</div>
						</li>
						<li class="nav-item dropdown">
					<?php
                      if (@$_SESSION['userData']['email'] != '') {
                          echo '
						  <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">'.@$_SESSION['userData']['first_name'].' </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
							  <a class="dropdown-item" href="mokelog.php">Moke Log </a>
							  <a class="dropdown-item" href="facebookLogin/logout.php">Logout </a>
							 

						  </div>
					  ';
                      }
                          ?>
					</li>
					</ul>
					<!-- <ul class="nav navbar-nav navbar-right"> -->
					
                        <!-- <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li> -->
                    <!-- </ul> -->
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
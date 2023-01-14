<?php 
    require_once 'facebookLogin/config.php';

    if (isset($_SESSION['access_token'])) {
            header("location: moketest.php");
    }

    $redirectUrl= "http://localhost/peekay112/facebookLogin/fb-callback.php";
    $permission = ['email'];
    $loginUrl  = $helper->getLoginUrl($redirectUrl,$permission);
?>
<?php
    include_once 'db/connect.php';
	  include_once 'includeFile/header.php'; 
	  ch_title("Social Login");
    include_once 'includeFile/navbar.php';
?>

<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Social Login				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="sociallogin.php">Social Login</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<form>
								<div class="row">	
                  <div class="col">
                    <a href="#" class="fb btn" onclick="window.location = '<?php echo $loginUrl?>';"  >
                      <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                    </a>
                    <a href="#" class="google btn">
                      <i class="fa fa-google fa-fw"></i> Login with Google+
                    </a>
                    <a href="#" class="twitter btn">
                      <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                    </a>
                  </div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>



<?php
    include_once 'includeFile/footer.php'; 
?>


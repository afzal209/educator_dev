<?php
	include_once 'includeFile/header.php'; 
	ch_title("Forget Password");
    include_once 'includeFile/navbar.php';
?>

            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
                                Forget Password Page				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
						</div>	
					</div>
				</div>
			</section>
            <div class="whole-wrap">
                <div class="container" >
                    <div class="section-top-border">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <h3 class="mb-30 text-center">Forget Password Form</h3>
                                <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                <form  method="POST" action="phpScript/forgotpass_script.php">
                                    <div class="mt-10">
                                        <input type="email" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'" required class="single-input">
                                    </div>
                                    <div class="button-group-area mt-40">
                                        <input class="genric-btn success-border circle" type="submit" name="submit" value="Forget Password">     
                                        <!-- <button class="genric-btn success-border circle arrow">Login<span class="lnr lnr-arrow-right"></span></button> -->
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
<?php
    include_once 'includeFile/footer.php'; 
?>
<?php
    include 'db/connect.php';
    if(isset($_GET['email']) && isset($_GET['token'])){
        
    $email=$_GET['email'];
    $token=$_GET['token'];
    $select=mysqli_query($con,"select id from user where email='$email' and token='$token'");
    if(mysqli_num_rows($select) > 0){
        include_once 'includeFile/header.php'; 
        ch_title("Reset Password");
        include_once 'includeFile/navbar.php';
        include 'phpScript/resetpassword_script.php';
?>

            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Reset Password Page				
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
                                <h3 class="mb-30 text-center">Reset Password Form</h3>
                                
									<form class="contactform" method="post">
                                    <?php
									if(@$_GET['response'] != ''){
                                        echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                    <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                </div>';
                                            }
									   ?>   
                                    <div class="mt-10">
                                        <input type="password" name="newpassword" placeholder="Enter New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter New Password'" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="password" name="confirmpassword" placeholder="Enter Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password'" required class="single-input">
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                                    <div class="button-group-area mt-40">
                                        <input class="genric-btn success-border circle" type="submit" name="submit" value="Login">
                                        <!-- <button class="genric-btn success-border circle arrow">Login<span class="lnr lnr-arrow-right"></span></button> -->
                                    </div>                          
                                </form>
                                <?php
									//    if (isset($_POST['submit'])) {
                                    //     include 'db/connect.php';
                                    //     $email=$_POST['email'];
                                    //     $token=$_POST['token'];
                                    
                                    
                                        
                                    //     $new=$_POST['newpassword'];
                                    //     $confirm=$_POST['confirmpassword'];
                                    
                                    //     $hash = password_hash($new ,PASSWORD_DEFAULT);
                                    
                                    //      if (password_verify($confirm,$hash)) {
                                    //         //  echo 'equal';
                                    //         //$hash = password_hash($new,PASSWORD_BCRYPT);
                                    //         $query=mysqli_query($con,"update user set password='$hash',token='' where email='$email'");
                                    //         // echo $query;
                                    //         if ($query) {
                                    //             //echo $query;
                                    //             header(' location: login.php?response=success&class=success&message=Password Change Successfully!');
                                    //         } else {
                                    //             //echo $query;
                                    
                                    //             header('location:forgetpassword.php?response=error&class=danger&message=Kindly forgot Password Again');
                                    //         }
                                            
                                    //      } 
                                    //     //  else {
                                    //     //      header('location: ../resetpassword.php?token='.$token.'&email='.$email.'&response=error&class=danger&message=Password not Match!');
                                    //     //  }
                                    
                                    // } 
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
<?php
    include_once 'includeFile/footer.php'; 
    }
    else {
        header('location: forgetpassword.php?response=error&class=danger&message=Link expired');
    } 
        }
        else {
        header("location: login.php");
        exit();
    }
?>
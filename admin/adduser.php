<?php 
    include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }
    
    if ($_SESSION['user']['role'] == 'admin') {
        
    ?>



    <?php
    include_once 'includeFile/header.php'; 
	ch_title("Add User");
    include_once 'includeFile/navbar.php';
    ?>
        <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Add User				
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
                                <h3 class="mb-30 text-center">Add User</h3>
                                <?php 
                                    if(@$_GET['response'] != ''){
                                        echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                    <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                </div>';
                                            }
                                ?>
                                <form  method="POST" action="phpScript/user_script.php">
                                    <div class="mt-10">
                                        <input type="text" name="username" id="username" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Username'" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="email" name="email" id="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="password" name="password" id="password" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" required class="single-input">
                                    </div>
                                    <div class="form-group mt-10">
                                            <select class="form-control" name="role" id="role" onchange="ck_type()">
                                                <option value="" selected>Type</option>
                                                <option value="subadmin">Sub Admin</option>
                                                <option value="editor">Editor</option>
                                                <option value="jobeditor">Job Editor</option>
                                                <option value="testeditor">Test Editor</option>
                                                <option value="neweditor">New Editor</option>
                                            </select>
                                    </div>
                                    <div class="form-group mt-10">
                                            <select class="form-control" name="assignacademic" id="assignacademic">
                                                <option value="" selected>Assign Academic</option>
                                            <?php
                                                    $query=mysqli_query($con,"select * from academic");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['academic_name'];?></option>
                                            <?php 
                                                }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="form-group mt-10">
                                        <select class="form-control selectpicker" multiple data-live-search="true" name="assignsubject[]" id="assignsubject">
                                            <option value=""></option>
                                        </select>                                                
                                    </div>
                                    <div class="button-group-area mt-40">
                                        <input class="genric-btn success-border circle" type="submit" name="submit" value="Add">
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(e){
                $('#assignacademic').on('change', function(e){
                    //console.log(e);
                    var aca_id = e.target.value;
                    //console.log(aca_id);
                    $.get('ajax/userServer.php?id='+aca_id, function(data){
                    // console.log(data);
                        var result = JSON.parse(data);
                        //var str = '';
                        //console.log(result);
                        $('#assignsubject').empty();  
                        for(var i=0 ;i<result.length ; i++ ){
                            //console.log(result[i].id);
                            // if(result[i].selected){
                            //     str +=result[i].value + ',';
                            // }
                            $('#assignsubject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                            $('.selectpicker').selectpicker('refresh');    
                        }
                    });
                });
            });
            function ck_type(){
            //alert('tested');
                var user_type = document.getElementById('role').value;
                var assignacademic = document.getElementById('assignacademic');
                var assignsubject = document.getElementById('assignsubject');
                if (user_type == 'editor') {
                    assignacademic.disabled = false;
                    assignsubject.disabled = false;
                }   
                else{
                    assignacademic.disabled = true;
                    assignsubject.disabled = true;
                    assignacademic.value = '';
                    $('.selectpicker option:selected').remove();
                    $('.selectpicker').selectpicker('refresh');
                }
            }
            </script>
    <?php
    include('includeFile/footer.php');
        }
    ?>
    <?php 
    include_once 'db/connect.php';
    $id=$_GET['id'];
    $query=mysqli_query($con,"select user.*,user_permission.*,subject.*,academic.*,academic.academic_name as academy, group_concat( subject.subject_name ) AS subject_concat from user left join user_permission on user.id = user_permission.user_id LEFT JOIN subject ON subject.id = user_permission.permission_sub LEFT JOIN academic ON academic.id = user_permission.permission where user.id = '$id'");    
    $row=mysqli_fetch_assoc($query);
        //echo '<pre>'.print_r($row,true).'</pre>';
        // $username = $row['username'];
        // $email = $row['email'];
    $permission = $row['academic_name'];
    $permission_sub = $row['subject_concat'];
        // $role = $row['role'];    # code...
    $permissionArray = explode(",", $row['subject_concat']);
    $permissionArr = explode(",",$row['academy']);
    
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("Update User");
    include_once 'includeFile/navbar.php';
    ?>

            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Update Permission Page			
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
                                <h3 class="mb-30 text-center">Update User Permission</h3>
                                <form  method="POST" action="">
                                    <div class="form-group mt-10">
                                        <select class="form-control" name="assignacademic" id="assignacademic" onchange="ck_type()">
                                            <option value=""></option>
                                            <?php
                                                $query = mysqli_query($con,"select * from academic");
                                                while ($row=mysqli_fetch_assoc($query)) {
                                                    if(in_array($row['academic_name'],$permissionArr)){
                                                    echo "<option value=".$row['id']." selected  >".$row['academic_name']."</option>";
                                                    }
                                                    else{
                                                    echo "<option value=".$row['id']." >".$row['academic_name']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="mt-10">
                                            <input type="text" name="" id="" value="<?php echo $permission_sub?>" readonly class="single-input">
                                        </div>
                                        <div class="form-group mt-10">
                                            <select class="form-control selectpicker" multiple data-live-search="true" name="assignsubject[]" id="assignsubject">
                                                <option value=""></option>
                                            </select>                                                
                                        </div>
                                        <div class="button-group-area mt-40">
                                            <input class="genric-btn success-border circle" type="submit" name="submit" value="Update">
                                        </div>      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script type="text/javascript">

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
            </script>

    <?php
    include('includeFile/footer.php');
    include 'phpScript/permission_user_script.php';
    ?>
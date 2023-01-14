<?php
    include 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }
	include_once 'includeFile/header.php'; 
	ch_title("Moke List");
    include_once 'includeFile/navbar.php';
?>
<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Moke List Page
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="scoreboard.php">Score Board</a></p>
                </div>
            </div>
        </div>
    </section>

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
                
                <div class="progress-table-wrap">
                    <div class="progress-table">
                    <?php
                   if($_SESSION['user']['role'] == 'admin'){
                    ?>    
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="country">Moke Title</div>
                            <div class="country">Date</div>
                            <div class="country">Timer</div>
                            <div class="country">Start Paper</div>
                            <div class="country">End Paper</div>
                            <div class="country">No of Question</div>
                            <div class="country">Insert By</div>
                            <div class="country">Action</div>
                        </div>
                        <?php
                            $a =1;
                            $query = mysqli_query($con,"select * from moke_title");
                            while ($row=mysqli_fetch_assoc($query)) {
                                echo'        
                        <div class="table-row">
                                <div class="serial">'.$a++.'</div>
                                <div class="country"><a href="mokeselected.php?id='.$row['id'].'">'.$row['job_title'].'</a></div>
                                <div class="country">'.$row['date'].'</div>
                                <div class="country">'.$row['time'].'</div>
                                <div class="country">'.$row['start_paper'].'</div>
                                <div class="country">'.$row['end_paper'].'</div>
                                <div class="country">'.$row['no_of_question'].'</div>
                                <div class="country">'.$row['insert_by'].'</div>
                                <div class="country"><a href="phpDeleteScript/mokedelete.php?id='. $row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div> 
                        </div>
                        ';
                            } 
                        }
                        else {
                            ?>
                            <div class="table-head">
                            <div class="serial">#</div>
                            <div class="country">Moke Title</div>
                            <div class="country">Date</div>
                            <div class="country">Timer</div>
                            <div class="country">Start Paper</div>
                            <div class="country">End Paper</div>
                            <div class="country">No of Question</div>
                        </div>
                        <?php
                            $user_name = @$_SESSION['user']['username'];
                            $a =1;
                            $query = mysqli_query($con,"select * from moke_title where insert_by ='$user_name'");
                            while ($row=mysqli_fetch_assoc($query)) {
                                echo'        
                        <div class="table-row">
                                <div class="serial">'.$a++.'</div>
                                <div class="country"><a href="mokeselected.php?id='.$row['id'].'">'.$row['job_title'].'</a></div>
                                <div class="country">'.$row['date'].'</div>
                                <div class="country">'.$row['time'].'</div>
                                <div class="country">'.$row['start_paper'].'</div>
                                <div class="country">'.$row['end_paper'].'</div>
                                <div class="country">'.$row['no_of_question'].'</div>
                        </div>
                        ';
                            } 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</div>


<?php
    include_once 'includeFile/footer.php'; 
?>

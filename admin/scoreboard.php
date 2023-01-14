<?php
    include 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Score Board");
    include_once 'includeFile/navbar.php';
?>
<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Score Board Page
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
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="country">Moke Title</div>
                        </div>
                        <?php
                            $timezone = "Asia/Karachi";
                            date_default_timezone_set($timezone);	
                            $current_date = date("d/m/y");
                            $a = 1;
                            $query = mysqli_query($con,"SELECT * FROM moke_title WHERE DATEDIFF(CURDATE(), STR_TO_DATE(date,'%d/%m/%y')) <= 15 ORDER BY id DESC");
                            while ($row=mysqli_fetch_assoc($query)) {
                                echo'        
                        <div class="table-row">
                            
                                <div class="serial">'.$a++.'</div>
                                <div class="country"><a href="scorelist.php?id='.$row['id'].'">'.$row['job_title'].'</a></div>
                                
                        </div>
                        ';
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

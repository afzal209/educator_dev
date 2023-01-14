<?php
    include 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }
	include_once 'includeFile/header.php'; 
	ch_title("Moke Selected");
    include_once 'includeFile/navbar.php';
?>
<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Moke Selected Page
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
                            <div class="country">Question</div>
                        </div>
                        <?php
                            $id= $_GET['id'];
                            $a =1;
                            $query = mysqli_query($con,"select test_question.question,questions_meta.* from test_question RIGHT JOIN questions_meta on test_question.id = questions_meta.question_id where meta_value='$id'");
                            while ($row=mysqli_fetch_assoc($query)) {
                                echo'        
                        <div class="table-row">
                            
                                <div class="serial">'.$a++.'</div>
                                <div class="country">'.$row['question'].'</div>
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

<?php
    include 'db/connect.php';
	include_once 'includeFile/header.php'; 
	ch_title("Score List");
    include_once 'includeFile/navbar.php';
?>
<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Score List  Page
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="scorelist.php">Score List</a></p>
                </div>
            </div>
        </div>
    </section>

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
                
                <div class="progress-table-wrap ">
                    <div class="progress-table ">
                        <div class="table-head ">
                            
                            <div class="country">Username</div>
                            <div class="country">Correct Answer</div>
                            <div class="country">Wrong Answer</div>
                            <div class="country">Total Question</div>
                            <div class="country">Percentage</div>
                            <div class="country">Rank</div>

                        </div>
                        <?php
                            $id = $_GET['id']; 
                            $query_time = mysqli_query($con,"select * from moke_title where id= '$id'");
                            $row_time = mysqli_fetch_assoc($query_time);
                            $end_paper = $row_time['end_paper'];
                            $timezone = "Asia/Karachi";
                            $date =strtotime($row_time['date']);
							date_default_timezone_set($timezone);	
                            $current_time = date("H:i:s");
                            $current_date =strtotime(date("d/m/y"));
                            if ($current_date > $date && $current_time < $end_paper) {
                                $id= $_GET['id'];
                                $query = mysqli_query($con,"SELECT COUNT(CASE WHEN right_wrong LIKE 'wrong' THEN 1 END) AS w, COUNT(CASE WHEN right_wrong LIKE 'right' THEN 1 END) AS r,COUNT(CASE WHEN paper_id  THEN 1 END) AS p,  social_users.id as social_id, social_users.first_name,social_users.last_name,social_users.picture, moke_score.* from social_users left join moke_score on social_users.id = moke_score.social_user_id where moke_score.paper_id ='$id' group by social_users.id");
                                $number = array();
                                while ($row=mysqli_fetch_assoc($query)) {
                                    $mark = $row['r'];                                                                                                                          
                                    $total = $row['p'];
                                    $number[] = array(
                                        
                                    'picture' =>  $row['picture'],
                                    'first_name' => $row['first_name'],
                                    'last_name' => $row['last_name'],
                                    'right' => $row['r'],
                                    'wrong' => $row['w'],
                                    'total' => $row['p'],
                                    'percentage' => round(($mark*100)/$total,2),
                                    );
                                } 
                                arsort($number);
                                $old_score = 0;
                                $ranking   = 1;
                                $counter   = 0;
                                foreach ($number as $index => $right_ans) {
                                    //echo '<pre>'.print_r($right_ans['right'],true).'</pre>';
                                    $counter++;
                                    if ($old_score != $right_ans['right'])
                                    {
                                        $ranking = $counter;
                                    }
                                    // echo '<pre>'.print_r($old_score = $right_ans,true).'</pre>';
                                    $old_score = $right_ans['right'];

                                    // echo PHP_EOL
                                    // . 'RANKING='
                                    // . $ranking
                                    // ;
                                echo'
                                <div class="table-row">
                                    <div class="country"><img src="'.$right_ans['picture'].'" alt="flag" width=30% height=90%>'.$right_ans['first_name'].''.$right_ans['last_name'].'</div>
                                    <div class="visit">'.$right_ans['right'].'</div>  
                                    <div class="visit">'.$right_ans['wrong'].'</div>  
                                    <div class="visit">'.$right_ans['total'].'</div>  
                                    <div class="visit">'.$right_ans['percentage'].'</div>  
                                    <div class="visit">'.$ranking.'</div>  

                                </div>';
                                }
                            }
                            else {
                                header("location:scoreboard.php?response=errors&class=danger&message=Paper is not ended yet");
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

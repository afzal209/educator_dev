<?php 
        include_once 'db/connect.php';
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        $id = $_GET['id'];

        //echo $id;
    
        $query = mysqli_query($con,"select * from test_topic where id = '$id'");
    
        $row = mysqli_fetch_assoc($query);
    
        $name = $row['topic_name'];
    
        $embed = $row['topic_embed'];
        
        $description = $row['topic_pic_description'];
        
        $article = $row['topic_article'];  
        
        $lang = $row['lang'];
        ?>



        <?php
        include_once 'includeFile/header.php'; 
        ch_title("Update Test Topic ");
        include_once 'includeFile/navbar.php';
        ?>
            <section class="banner-area relative" id="home">	
                    <div class="overlay overlay-bg"></div>
                    <div class="container">				
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="about-content col-lg-12">
                                <h1 class="text-white">
                                    Update Test Topic 				
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
                                    <h3 class="mb-30 text-center">Update Test Chapter</h3>
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form  method="POST" action="" >
                                        <div class="mt-10">
                                            <input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Enter Chapter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Chapter Name'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                        <?php 
                                                    if(preg_match('/youtube/',$embed)){
                                                        $youtube_link=str_replace("https://www.youtube.com/watch?v=" , "https://www.youtube.com/embed/", $embed);
                                                        echo' <iframe class="embed-responsive-item" width="407" height="310" src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                                //print_r($youtube_link);
                                                    }
                                                    elseif(preg_match('/youtu.be/',$embed)){
                                                        $youtube_embed_link=str_replace("https://youtu.be/" , "https://www.youtube.com/embed/", $embed);
                                                        echo' <iframe class="embed-responsive-item" width="407" height="310" src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                    }
                                                    elseif(preg_match('/dailymotion/',$embed)){
                                                        $dailymotion_link=str_replace("https://www.dailymotion.com/video","https://www.dailymotion.com/embed/video/" , $embed);
                                                        echo'  <iframe class="embed-responsive-item" width="480" height="270" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                   elseif(preg_match('/dai.ly/',$embed)){
                                                        $dailymotion_embed_link=str_replace("https://dai.ly/","https://www.dailymotion.com/embed/video/" , $embed);
                                                        echo'  <iframe class="embed-responsive-item" width="480" height="270" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                    else{
                                                        echo '
                                                        <image src="'.$embed.'" alt ="error">
                                                         ';
                                                    }
                                            ?> 
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="video" id="video"  placeholder="Enter Chapter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Chapter Name'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="file" name="image" id="image"  placeholder="Enter Chapter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Chapter Name'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <input type="text" name="description" id="description" value="<?php echo $description;?>" placeholder="Enter Chapter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Chapter Name'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <textarea name="article" id="article" class="single-textarea" placeholder="Enter Article" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Article'" required><?php echo $article ?></textarea>
                                        </div>
                                        <div class="form-group mt-10">
                                                <label>Current Language<?php echo $lang?></label>
                                                <select class="form-control" name="lang" id="lang" >
                                                    <option value="" selected>Choose Language</option>
                                                    <option value="english">English</option>
                                                    <option value="urdu">Urdu</option>
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
        <?php
        include('includeFile/footer.php');
        include('phpScript/update_test_topic_script.php');
        ?>
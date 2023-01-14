    <?php







    if(isset($_POST['submit'])){



        @include ('../db/connect.php');

        $name=$_POST['name'];

        $video=$_POST['video'];

        $image=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        

        $description = $_POST['description'];

        $article=$_POST['article'];
        $lang=$_POST['lang'];
        

        if ($image_name == "") {
            if(preg_match('/youtube/',$video)){
                $youtube_link=$video;
                $update=mysqli_query($con,"update test_topic set topic_name='$name', topic_embed='$youtube_link',topic_article='$article' ,lang='$lang' where id='$id'");
                    if($update){
                        header('location:viewtesttopic.php?response=success&class=success&message=Record has been updated Successfully');
                        ob_end_flush();
                    }
            }
            elseif(preg_match('/youtu.be/',$video)){
                $youtube_embed_link=$video;
                $update=mysqli_query($con,"update test_topic set topic_name='$name', topic_embed='$youtube_embed_link',topic_article='$article' ,lang='$lang' where id='$id'");
                    if($update){
                        header('location:viewtesttopic.php?response=success&class=success&message=Record has been updated Successfully');
                        ob_end_flush();
                    }
            }
            elseif(preg_match('/dailymotion/',$video)){
                $dailymotion_link=$video;
                $update=mysqli_query($con,"update test_topic set topic_name='$name', topic_embed='$dailymotion_link',topic_article='$article' ,lang='$lang' where id='$id'");
                if($update){
                    header('location:viewtesttopic.php?response=success&class=success&message=Record has been updated Successfully');
                    ob_end_flush();
                }
            }
            elseif(preg_match('/dai.ly/',$video)){
                $dailymotion_embed_link=$video;
                $update=mysqli_query($con,"update test_topic set topic_name='$name', topic_embed=' $dailymotion_embed_link',topic_article='$article' ,lang='$lang' where id='$id'");
                if($update){
                    header('location:viewtesttopic.php?response=success&class=success&message=Record has been updated Successfully');
                    ob_end_flush();
                }
            }
            // else {
        
            //     echo "<script>alert('This Link is not Allowed')</script>";
        
            // }
        
        }
        elseif ($video == "") {
            $query = mysqli_query($con,"select id,topic_embed from test_topic where id='$id' and topic_embed='$embed'");
            $row = mysqli_fetch_assoc($query);
            $image_old = $row['topic_embed'];
            $location="assets/test_pic/";
            $path =$location.$image_name;
            rename($image_old,$path);
            if(move_uploaded_file($image,$path)){
                $update=mysqli_query($con,"update test_topic set topic_name='$name', topic_embed='$path',topic_pic_description='$description',topic_article='$article' ,lang='$lang' where id='$id'");
                if ($update) {
                    header('location:viewtesttopic.php?response=success&class=success&message=Record has been updated Successfully');
                    ob_end_flush(); 
                }
            }
            else{
                echo '<script>alert("no image")</script>';
            }
        
        }

        


        

    }

    ?>
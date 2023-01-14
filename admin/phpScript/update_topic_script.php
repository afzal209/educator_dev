<?php







if(isset($_POST['submit'])){



    @include ('../db/connect.php');

    $name=$_POST['name'];

    $video=$_POST['video'];

    $article=$_POST['article'];



    

    if(preg_match('/youtube/',$video)){



        //echo 'youtube';



    $youtube_link=$video;



    $update=mysqli_query($con,"update topic set topic_name='$name', topic_embed='$youtube_link',topic_article='$article' where id='$id'");



        if($update){

            header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');

            ob_end_flush();

        }



    }

    elseif(preg_match('/youtu.be/',$video)){



        //echo 'youtube';



    $youtube_embed_link=$video;



    $update=mysqli_query($con,"update topic set topic_name='$name', topic_embed='$youtube_embed_link',topic_article='$article' where id='$id'");



        if($update){

            header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');

            ob_end_flush();

        }



    }

    elseif(preg_match('/dailymotion/',$video)){



        //echo 'dailymotion';



        $dailymotion_link=$video;



        $update=mysqli_query($con,"update topic set topic_name='$name', topic_embed='$dailymotion_link',topic_article='$article' where id='$id'");



        if($update){

            header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');

            ob_end_flush();

        }



    }

    elseif(preg_match('/dai.ly/',$video)){



        //echo 'dailymotion';



        $dailymotion_embed_link=$video;



        $update=mysqli_query($con,"update topic set topic_name='$name', topic_embed=' $dailymotion_embed_link',topic_article='$article' where id='$id'");



        if($update){

            header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');

            ob_end_flush();

        }

    }



    else {

        echo "<script>alert('This Link is not Allowed')</script>";

    }



    

}

?>
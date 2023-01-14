<?php











if(isset($_POST['submit'])){



    include('../db/connect.php');



    if(empty($_POST['subject']) || empty($_POST['chapter']) || empty($_POST['article'])){



        header('location:../testtopic.php?response=error&class=danger&message=Please fill the Record');



    }



    else{

       



        $subject=$_POST['subject'];



        $chapter=$_POST['chapter'];



        $topic=$_POST['topic'];



        $video=$_POST['video'];

        $image=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        $location="assets/test_pic/";

        $description = $_POST['description'];
        $lang = $_POST['lang'];
        

        // $image=$_FILES['image']['tmp_name'];



        // $image_name=$_FILES['image']['name'];



        // $location="image/";







        $article=$_POST['article'];



        $insert_by = $_POST['insert_by'];    

        if ($image == "") {
            if(preg_match('/youtube/',$video)){



                //echo 'youtube';



            $youtube_link=$video;



            $query=mysqli_query($con,"insert into test_topic(test_subject_id,test_chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$topic','$youtube_link','$article','$lang','$insert_by')");



            if($query){



                header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



            }



            else{



                header('location:../testtopic.php?response=error&class=danger&message=Error');



            }



            }

            elseif(preg_match('/youtu.be/',$video)){



                //echo 'youtube';



            $youtube_embed_link=$video;



            $query=mysqli_query($con,"insert into test_topic(test_subject_id,test_chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$topic','$youtube_embed_link','$article','$lang','$insert_by')");



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }

            elseif(preg_match('/dailymotion/',$video)){



                //echo 'dailymotion';



                $dailymotion_link=$video;



                $query=mysqli_query($con,"insert into test_topic(test_subject_id,test_chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$topic','$dailymotion_link','$article','$lang','$insert_by')");



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }

            elseif(preg_match('/dai.ly/',$video)){



                //echo 'dailymotion';



                $dailymotion_embed_link=$video;



                $query=mysqli_query($con,"insert into test_topic(test_subject_id,test_chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$topic','$dailymotion_embed_link','$article','$lang','$insert_by')");



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }



            else{



                header('location:../testtopic.php?response=error&class=danger&message=This Video link is not supported');



            }

        }
        else {
            if(move_uploaded_file($image, $location.$image_name)){
                $query=mysqli_query($con,"insert into test_topic(test_subject_id,test_chapter_id,topic_name,topic_pic_description,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$topic','$description','$location$image_name','$article','$lang','$insert_by')");
                if($query){
                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');
                }
                else{
                    header('location:../testtopic.php?response=error&class=danger&message=This Video link is not supported');
                }
            }
        }

        


        //$link=substr($video,32);



        // if($_FILES["image"]["size"] > 5000000){



        //     header('location:addchapter.php?response=error&class=danger&message=File size is to large');



        // }



        // else{



        //     if(move_uploaded_file($image ,$location.$image_name)){



        // $query=mysqli_query($con,"insert into topic(subject_id,chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$name','$link','$article','$lang','$insert_by')");



        // if($query){



        //     header('location:addchapter.php?response=success&class=success&message=Record Has Been inserted');



        // }



        // else{



        //     header('location:addchapter.php?response=error&class=danger&message=Error');



        // }



        //     }



        // }



    }



}







?>
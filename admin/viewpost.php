<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prephut | View Post</title>

    <style>
    body, html {
        height: 100%;
        margin: 0;
        }
    .full-image{
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    @media screen and (max-width: 500px){
        body, html {
        height: 100%;
        margin: 0;
        }
        .full-image{
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    }
    </style>
    <?php
        include 'db/connect.php';
        include_once 'includeFile/css.php'; 
        include_once 'includeFile/script.php';
    ?>
</head>
<body>
<?php

$id = $_GET['id'];

$query = mysqli_query($con,"select * from job_ads where id = '$id'");

while($row=mysqli_fetch_assoc($query)){

    echo'
        <div class="col-md-12">

            <h1  style="font-family: Arial, Helvetica, sans-serif;">'.$row['job_title'].'</h1>

        </div>

        <div class="full-image">

            <img  src="ads_pic/'.$row['image'].'" width="100%" height="100%">

        </div>

    ';

} 

?>
</body>
</html>



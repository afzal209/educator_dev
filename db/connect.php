<?php

ob_start();
@session_start();
// $con=mysqli_connect('sdb-c.hosting.stackcp.net','peekay-3137311ee4','peekay123!@#','peekay-3137311ee4');
$con = mysqli_connect('localhost', 'root', '', 'peekay-3137311ee4');

// $con=mysqli_connect('localhost','root','','educator');

// if($con){
//     echo "<script>alert('connect')</script>";
// }
// else{
//     echo "<script>alert('not connect')</script>";
// }

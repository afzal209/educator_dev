<?php







include_once '../db/connect.php';



$job_title = @$_GET['id'];



//echo '<pre>'.print_r($_GET,true).'</pre>';



$query = mysqli_query($con,"select * from moke_title where id = '$job_title'");

//echo '<pre>'.print_r(mysqli_fetch_array($query),true).'</pre>';



$result = array();



while ($row = mysqli_fetch_assoc($query)) {

     array_push($result,$row);

}





echo json_encode($result,true)

//echo '<pre>'.print_r($result,true).'</pre>';



?>
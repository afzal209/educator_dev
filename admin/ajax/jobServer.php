<?php







include_once '../db/connect.php';



$job_ads_id = @$_GET['id'];



//echo '<pre>'.print_r($_GET,true).'</pre>';



$query = mysqli_query($con,"select * from job_ads where id = '$job_ads_id'");

//echo '<pre>'.print_r(mysqli_fetch_array($query),true).'</pre>';



$result = array();



while ($row = mysqli_fetch_assoc($query)) {

     array_push($result,$row);

}





echo json_encode($result,true)

//echo '<pre>'.print_r($result,true).'</pre>';



?>
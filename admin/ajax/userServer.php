<?php

include_once '../db/connect.php';



$aca_id = @$_GET['id'];

//echo '<pre>'.print_r($_GET,true).'</pre>';

$query = mysqli_query($con,"select * from subject where academy_id = '$aca_id'");

$result = array();
    
while($row = mysqli_fetch_assoc($query)){

    array_push($result, $row);

}

//return $query; 

echo json_encode($result,true);

//echo '<pre>'.print_r($result,true).'</pre>';



?>
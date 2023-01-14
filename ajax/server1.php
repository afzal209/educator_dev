<?php

include_once '../db/connect.php';

$sub_id = @$_GET['id'];

// echo '<pre>'.print_r($sub_id,true).'</pre>';

$query = mysqli_query($con,"select * from chapter where subject_id = '$sub_id'");

$result = array();

while($row = mysqli_fetch_assoc($query)){

    array_push($result, $row);

}

//return $query; 

echo json_encode($result,true);
?>
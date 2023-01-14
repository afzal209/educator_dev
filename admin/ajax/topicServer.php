<?php



include_once '../db/connect.php';

$aca_id = @$_GET['id'];
$sub_hd = @$_GET['sub_hd'];
$role_hd = @$_GET['role_hd'];

$where = "";
if($role_hd == "editor"){
     $where = "where id IN ($sub_hd)";
     
}
else{
     $where = "where academy_id IN ($aca_id)";
     
}
     $query = mysqli_query($con,"select * from subject $where");
     //echo '<pre>'.print_r(mysqli_fetch_array($query),true).'</pre>';
     
     $result = array();
     
     while ($row = mysqli_fetch_assoc($query)) {
          array_push($result,$row);
     }
     
     
     echo json_encode($result,true);
//echo '<pre>'.print_r($result,true).'</pre>';

?>
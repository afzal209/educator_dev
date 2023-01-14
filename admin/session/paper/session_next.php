<?php 
// session_start();
// session_destroy();

$id= $_GET['id'];
header('location: ../../topiclist.php?id='.$id);

exist();
?>
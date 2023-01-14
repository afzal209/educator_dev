<?php 
// session_start();
// session_destroy();

unset($_SESSION['quiz']['questions']);
header('location:../../preparesubject.php');
exist();
?>
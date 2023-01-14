<?php

session_start();

if (isset($_SESSION['access_token'])) {
    session_destroy();

    header('location: ../moketest.php');
}

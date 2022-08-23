<?php 
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("location: /labtask6/view/login.php");
}
else {
    header("location: /labtask6/view/login.php");
}

 ?>
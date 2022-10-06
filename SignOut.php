<?php 
include ('home.html');
session_start();
date_default_timezone_set('Asia/Yangon');
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL & ~E_WARNING);
$connection = mysqli_connect("localhost","root","","gaget_store");
session_destroy();
echo "<script>alert('You have already signed out.')</script>";
echo "<script>alert('location='ProductDiaplay.php')</script>";
?>

<?php
session_start();
session_destroy();
setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
unset($_SESSION['uname']);
header('location:https://articlesharing.co.in/ArtiShare/User_info/login.php');
die();
?>
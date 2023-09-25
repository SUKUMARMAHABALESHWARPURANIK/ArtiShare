<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "articles_demo_user";
$password = "UBPZ7VZ4W2YR";
$dbname = "articles_demo_connect";

// Create connection
$conn =  mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>
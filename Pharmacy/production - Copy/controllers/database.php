<?php
session_start();
if(!isset($_SESSION["name"])){
	header("Location: http://localhost/Pharmacy/production/index.php?status=Please login");
}
$server='localhost';
$username='root';
$password='';
$database='pharmacy';
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
	die('connect error'.mysql_connect_error());
}


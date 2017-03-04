<?php
require_once('database.php');

$username=$_POST['username'];
$password=md5($_POST['password']);

$checkUserQuery = "select count(*) as count,name,id from users where username = '$username' and password ='$password'";
$result = mysqli_query($conn,$checkUserQuery);
$row = mysqli_fetch_assoc($result);
if($row['count']){
	$_SESSION["name"] = $row['name'];
	$_SESSION["user_id"] = $row['id'];
	header("Location: http://localhost/Pharmacy/production/home.php");
}else{
	header("Location: http://localhost/Pharmacy/production/index.php?status=Please check your username and password");
	session_destroy(); 
}
?>
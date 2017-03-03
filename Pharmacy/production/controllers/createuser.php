<?php
require_once('database.php');

$name = $_POST['name'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$email=$_POST['email'];

$insertUserQuery = "INSERT INTO users(name, username, password, email) VALUES ('$name','$username','$password','$email')";
mysqli_query($conn,$insertUserQuery);
header("Location: http://localhost/Pharmacy/production/index.php?status=User Created Successfully");
?>
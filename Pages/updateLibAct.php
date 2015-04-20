<?php 
	require "conn.php";
	
	$user_id = $_GET['user_id'];
	$username = $_GET['username'];
	$full_name = $_GET['full_name'];
	$address = $_GET['address'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$sql = "UPDATE users SET username = '$username', full_name = '$full_name', address = '$address', email = '$email', phone = '$phone' WHERE user_id = '$user_id';";
	$result = mysqli_query($mysqli, $sql);
	header("location:librarian_list.php");
?>
<?php 
	session_start();
	require "conn.php";
	
	$user_id = $_GET['user_id'];
	$username = $_GET['username'];
	$full_name = $_GET['full_name'];
	$address = $_GET['address'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$sql = "UPDATE users SET username = '$username', full_name = '$full_name', address = '$address', email = '$email', phone = '$phone' WHERE user_id = '$user_id';";
	$result = mysqli_query($mysqli, $sql);
	$log_user = $_SESSION['loggedInUser'];
	$log_sql = "INSERT INTO data_log (action, user, details) VALUES ('Update', '$log_user', 'User: $username Name: $full_name Address: $address E-mail: $email Phone: $phone');";
	$result2 = mysqli_query($mysqli, $log_sql);
	
	header("location:user_list.php");
?>

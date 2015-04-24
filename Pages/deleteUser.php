<?php 
	session_start();
	require "conn.php";
	
	$id = $_GET['user_id'];
	$sql1 = "SELECT * FROM users WHERE user_id = '$id'";
	$r1 = mysqli_query($mysqli, $sql1);
	while($row = mysqli_fetch_array($r1))
	{
		$username = $row["username"];
	}
	$sql = "DELETE FROM users WHERE user_id = '$id'";
	$result = mysqli_query($mysqli, $sql);
	$log_user = $_SESSION['loggedInUser'];
	$log_sql = "INSERT INTO data_log (action, user, details) VALUES ('Delete', '$log_user', 'Name: $username');";
	$result2 = mysqli_query($mysqli, $log_sql);
	
	header("location:user_list.php");
?>
<?php 
	require "conn.php";
	
	$id = $_GET['user_id'];
	$sql = "DELETE FROM users WHERE user_id = '$id'";
	$result = mysqli_query($mysqli, $sql);
	
	header("location:librarian_list.php");
?>
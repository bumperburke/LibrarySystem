<?php 
	session_start();
	require "conn.php";
	
	$id = $_GET['book_id'];
	$sql1 = "SELECT * FROM books WHERE book_id = '$id'";
	$r1 = mysqli_query($mysqli, $sql1);
	while($row = mysqli_fetch_array($r1))
	{
		$title = $row["title"];
	}
	$sql = "DELETE FROM books WHERE book_id = '$id'";
	$result = mysqli_query($mysqli, $sql);
	$log_user = $_SESSION['loggedInUser'];
	$log_sql = "INSERT INTO data_log (action, user, details) VALUES ('Delete', '$log_user', 'Title: $title');";
	$result2 = mysqli_query($mysqli, $log_sql);
	
	header("location:books.php");
?>
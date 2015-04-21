<?php 
	require "conn.php";
	
	$id = $_GET['book_id'];
	$sql = "DELETE FROM books WHERE book_id = '$id'";
	$result = mysqli_query($mysqli, $sql);
	
	header("location:books.php");
?>
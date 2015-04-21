<?php 
	require "conn.php";
	
	$id = $_GET['book_id'];
	$ISBN = $_GET['ISBN'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	$publish_date = $_GET['publish_date'];
	$publisher = $_GET['publisher'];
	$pages = $_GET['pages'];
	$quantity = $_GET['quantity'];
	$date_added= $_GET['date added'];
	$sql = "UPDATE books SET isbn = '$ISBN', title = '$title', author = '$author', publish_date = '$publish_date', publisher = '$publisher', pages = '$pages', quantity = '$quantity', date_added = '$date_added' WHERE book_id = '$id';";
	$result = mysqli_query($mysqli, $sql);
	header("location:books.php");
?>
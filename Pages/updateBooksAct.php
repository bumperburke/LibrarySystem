<?php 
	session_start();
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
	$log_user = $_SESSION['loggedInUser'];
	$log_sql = "INSERT INTO data_log (action, user, details) VALUES ('Update', '$log_user', ISBN: $ISBN Title: $title Author: $author Publish Date: $publish_date Publisher: $publisher Pages: $pages Quantity: $quantity Date Added: $date_added);";
	$result2 = mysqli_query($mysqli, $log_sql);
	header("location:books.php");
?>
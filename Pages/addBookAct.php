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
	$sql = "INSERT INTO books (isbn, title, author, publish_date, publisher, pages, quantity, date_added)  VALUES ('$ISBN',  '$title',  '$author',  '$publish_date',  '$publisher',  '$pages',  '$quantity',  '$date_added');";
	$result = mysqli_query($mysqli, $sql);
	$log_user = $_SESSION['loggedInUser'];
	$log_sql = "INSERT INTO data_log (action, user, details) VALUES ('INSERT', '$log_user', ISBN: $ISBN Title: $title Author: $author Publish Date: $publish_date Publisher: $publisher Pages: $pages Quantity: $quantity Date Added: $date_added);";
	$result2 = mysqli_query($mysqli, $log_sql);
	header("location:books.php");
?>
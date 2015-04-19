<?php
	require "conn.php";
	session_start();
	
	$isbn = mysqli_real_escape_string($mysqli, $_GET['isbn']);
	
	
	$isbnMatched = mysqli_query($mysqli, "SELECT isbn FROM books WHERE ISBN='{$isbn}'");
	$matched = mysqli_fetch_array($isbnMatched);
	
	if($matched["isbn"] == $isbn)
	{	
		$ammendHistory = mysqli_query($mysqli, "UPDATE history SET status='Returned', returned='Y' WHERE isbn='{$isbn}'");
		$incrementQuantity = mysqli_query($mysqli, "UPDATE books SET quantity=quantity+1 WHERE ISBN='{$isbn}'");
		header("refresh:0; url=home.php");
	}
	
	else
	{
		header("refresh:2; url=home.php");
		echo '<h3 style="color:red">Invalid ISBN, Please Try Again.</h3>';
	}
?>
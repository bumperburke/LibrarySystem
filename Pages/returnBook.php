<?php
	require "conn.php";
	session_start();
	
	$isbn = mysqli_real_escape_string($mysqli, $_GET['isbn']);
	$username = mysqli_real_escape_string($mysqli, $_GET['user']);
	
	
	$isbnMatched = mysqli_query($mysqli, "SELECT ISBN FROM books WHERE ISBN='{$isbn}'");
	$Imatched = mysqli_fetch_array($isbnMatched);
	
	$userMatched = mysqli_query($mysqli, "SELECT username FROM users WHERE username='{$username}'");
	$Umatched = mysqli_fetch_array($userMatched);
	
	
	if($Imatched["ISBN"] == $isbn && $Umatched["username"] == $username)
	{	
		$ammendHistory = mysqli_query($mysqli, "UPDATE history SET status='Returned', returned='Y' WHERE isbn='{$isbn}' AND username='{$username}'");
		$incrementQuantity = mysqli_query($mysqli, "UPDATE books SET quantity=quantity+1 WHERE ISBN='{$isbn}'");
		header("refresh:0; url=home.php");
	}
	
	if($isbn == "" || $username == "")
	{
		header("refresh:2; url=home.php");
		echo '<h3 style="color:red">No ISBN/Username Entered, Please Try Again.1</h3>';
	}
	
	if($Imatched["ISBN"] != $isbn || $Umatched["username"] != $username)
	{
		header("refresh:2; url=home.php");
		echo '<h3 style="color:red">Invalid ISBN/Username, Please Try Again.2</h3>';
	}
	
?>
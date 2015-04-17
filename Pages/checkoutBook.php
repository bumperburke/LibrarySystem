<?php
	require "conn.php";
	session_start();

	$username = mysqli_real_escape_string($mysqli, $_GET['userCheckout']);
	$book = mysqli_real_escape_string($mysqli, $_GET['book']);

	$getQuantity = mysqli_query($mysqli, "SELECT quantity FROM books WHERE title='{$book}'");
	$row = mysqli_fetch_array($getQuantity);
	$quantity = (int) $row["quantity"];
	
	$insertHistory = mysqli_query($mysqli, "INSERT INTO history (username, book, status, date) VALUES ('{$username}', '{$book}', 'On Loan', SYSDATE())") or die (mysqli_error($mysqli));
	if($quantity < 1)
	{
			header("refresh:0; url=search.php?query={$book}");
	}
	else
	{
		$updateBookQuantity = mysqli_query($mysqli, "UPDATE books SET quantity=quantity-1 WHERE title='{$book}'");
		header( "refresh:0; url=home.php" );
	}
?>
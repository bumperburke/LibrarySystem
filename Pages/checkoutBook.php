<?php
	require "conn.php";
	session_start();

	$username = mysqli_real_escape_string($mysqli, $_GET['userCheckout']);
	$book = mysqli_real_escape_string($mysqli, $_GET['book']);

	$getQuantity = mysqli_query($mysqli, "SELECT quantity, ISBN FROM books WHERE title='{$book}'");
	$row = mysqli_fetch_array($getQuantity);
	$isbn = $row["ISBN"];
	$quantity = (int) $row["quantity"];
	
	$checkHistory = mysqli_query($mysqli, "SELECT username FROM history WHERE username='{$username}' AND status='Overdue'");
	$resHist = mysqli_fetch_array($checkHistory);
	$usernameDB = $resHist["username"];
	
	if($quantity < 1 || $usernameDB == $username)
	{
			header("refresh:3; url=search.php?query={$book}");
			echo '<h3 style="color:red">Sorry, Please Ensure You Have No Overdue Books and That Book Is In Stock!</h3>';
	}
	else
	{
		$insertHistory = mysqli_query($mysqli, "INSERT INTO history (username, book, isbn, status, date, date_due, returned) VALUES ('{$username}', '{$book}', '{$isbn}', 'On Loan', SYSDATE(), SYSDATE()+ INTERVAL '7' DAY, 'N')") or die (mysqli_error($mysqli));
		$updateBookQuantity = mysqli_query($mysqli, "UPDATE books SET quantity=quantity-1 WHERE title='{$book}'");
		header( "refresh:0; url=home.php" );
	}
	
?>
<?php
	
	function librarianTableOverdue()
	{
		require "conn.php";
		
		$sql = "SELECT * FROM history WHERE status='Overdue' AND returned='N'" or die(mysqli_error($mysqli));
		$result = mysqli_query($mysqli, $sql);
		$todaysDate = date("Y-m-d");
		
		echo '<table border="1"><caption>Books Overdue</caption><thead><tr><th>Username</th><th>Book</th><th>ISBN</th><th>Status</th><th>Recieved</th><th>Due</th><th>Returned</th></tr></thead><tbody>';
		while($row = mysqli_fetch_array($result))
		{
			if($todaysDate > $row["date_due"] && $row["status"] != "Overdue")
			{
				mysqli_query($mysqli, "UPDATE history SET status='Overdue'");
			}
			
			echo '<tr><td>'.$row["username"].'</td>';
		    echo '<td>'.$row["book"].'</td>';
		    echo '<td>'.$row["isbn"].'</td>';
		    echo '<td>'.$row["status"].'</td>';
		    echo '<td>'.$row["date"].'</td>';
		    echo '<td>'.$row["date_due"].'</td>';
		    echo '<td>'.$row["returned"].'</td></tr>';
		}
		echo '</tbody></table>';

	}
	
	function librarianBooksOut()
	{
		require "conn.php";
		
		$sql = "SELECT * FROM history WHERE status='On Loan' AND returned='N'" or die(mysqli_error($mysqli));
		$result = mysqli_query($mysqli, $sql);
		$todaysDate = date("Y-m-d");
		
		echo '<table border="1"><caption>Books On Loan</caption><thead><tr><th>Username</th><th>Book</th><th>ISBN</th><th>Status</th><th>Recieved</th><th>Due</th><th>Returned</th></tr></thead><tbody>';
		while($row = mysqli_fetch_array($result))
		{
			if($todaysDate > $row["date_due"] && $row["status"] != "Overdue")
			{
				mysqli_query($mysqli, "UPDATE history SET status='Overdue'");
			}
			
			echo '<tr><td>'.$row["username"].'</td>';
		    echo '<td>'.$row["book"].'</td>';
		    echo '<td>'.$row["isbn"].'</td>';
		    echo '<td>'.$row["status"].'</td>';
		    echo '<td>'.$row["date"].'</td>';
		    echo '<td>'.$row["date_due"].'</td>';
		    echo '<td>'.$row["returned"].'</td></tr>';
		}
		echo '</tbody></table>';

	}
	
	function userTable()
	{
		require "conn.php";
		
		$user = $_SESSION['loggedInUser'];
		
		$sql = "SELECT * FROM history WHERE username='{$user}'" or die(mysqli_error($mysqli));
		$result = mysqli_query($mysqli, $sql);
		$todaysDate = date("Y-m-d");
		
		echo '<table border="1"><caption>My History</caption><thead><tr><th>Book</th><th>ISBN</th><th>Status</th><th>Recieved</th><th>Due</th><th>Returned</th></tr></thead><tbody>';
		while($row = mysqli_fetch_array($result))
		{
			if($todaysDate > $row["date_due"] && $row["status"] != "Overdue")
			{
				mysqli_query($mysqli, "UPDATE history SET status='Overdue'");
			}
			
			echo '<tr><td>'.$row["book"].'</td>';
		    echo '<td>'.$row["isbn"].'</td>';
		    echo '<td>'.$row["status"].'</td>';
		    echo '<td>'.$row["date"].'</td>';
		    echo '<td>'.$row["date_due"].'</td>';
		    echo '<td>'.$row["returned"].'</td></tr>';
		}
		echo '</tbody></table>';

	}
	
?>
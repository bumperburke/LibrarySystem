<?php
	
	function librarianTableOverdue()
	{
		require "conn.php";
		
		$sql = "SELECT * FROM history WHERE date_due < SYSDATE() AND returned='N'" or die(mysqli_error($mysqli));
		$result = mysqli_query($mysqli, $sql);
				
		echo '<table border="1"><caption>Books Overdue</caption><thead><tr><th>Username</th><th>Book</th><th>ISBN</th><th>Status</th><th>Recieved</th><th>Due</th><th>Returned</th></tr></thead><tbody>';
		while($row = mysqli_fetch_array($result))
		{
			if($row["date_due"] >= $row["date"])
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
				
		echo '<table border="1"><caption>My History</caption><thead><tr><th>Book</th><th>ISBN</th><th>Status</th><th>Recieved</th><th>Due</th><th>Returned</th></tr></thead><tbody>';
		while($row = mysqli_fetch_array($result))
		{
			if($row["date_due"] >= $row["date"])
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
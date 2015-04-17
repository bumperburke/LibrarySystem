<?php
	
	function librarianSearch()
	{
		require "conn.php";
		$search = mysqli_real_escape_string($mysqli, $_GET['query']);
		$row = null;
					
		$sql = "SELECT cover, title, author, ISBN, quantity FROM books WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%'";
		$result = mysqli_query($mysqli, $sql);
					
		//var_dump($search);
		//var_dump($sql);
		//var_dump($result);
					
					
		echo '<table class="search" border="3" id="search"><thead><tr><th>Cover</th><th>Title</th><th>Author</th><th>ISBN</th><th>Quantity</th><th>Checkout</th></tr></thead>';
		// output data of each row
		while($row = mysqli_fetch_array($result))
		{
			$bookTitle = $row["title"];
			//var_dump($bookTitle);
		    echo '<tbody><tr><td> <img src="data:image/jpeg;base64,'.base64_encode($row["cover"]).'" width="70" height="60" /> </td>';
		    echo '<td>'.$row["title"].'</td>';
		    echo '<td>'.$row["author"].'</td>';
		    echo '<td>'.$row["ISBN"].'</td>';
		    echo '<td>'.$row["quantity"].'</td>';
		    echo '<td><form name="checkout" id="checkout" action="checkoutBook.php" method="GET">
		    			<input type="hidden" name="book" value="'.$bookTitle.'">
		    			<input type="text" name="userCheckout" form="checkout" size="20" placeholder="Enter Username....">
	  						<input type="submit" value="Checkout"></form></td></tr></tbody>';
		}
			 
		echo "</div></table>";
	}
	
 	function userSearch()
 	{
 		require "conn.php";
 		$search = mysqli_real_escape_string($mysqli, $_GET['query']);
		$row = null;
					
		$sql = "SELECT cover, title, author, ISBN, quantity FROM books WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%'";
		$result = mysqli_query($mysqli, $sql);
					
		//var_dump($search);
		//var_dump($sql);
		//var_dump($result);
					
					
		echo '<table class="search" border="3" id="search"><thead><tr><th>Cover</th><th>Title</th><th>Author</th><th>ISBN</th><th>Quantity</th></tr></thead>';
		// output data of each row
		while($row = mysqli_fetch_array($result))
		{
			//var_dump($row);
		    echo '<tbody><tr><td> <img src="data:image/jpeg;base64,'.base64_encode($row["cover"]).'" width="70" height="60" /> </td>';
		    echo '<td>'.$row["title"].'</td>';
		    echo '<td>'.$row["author"].'</td>';
		    echo '<td>'.$row["ISBN"].'</td>';
		    echo '<td>'.$row["quantity"].'</td></tr></tbody>';
		}
			 
		echo "</div></table>"; 
 	}
?>

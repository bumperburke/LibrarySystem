<?php
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
		//var_dump($row);
	    echo '<tbody><tr><td> <img src="data:image/jpeg;base64,'.base64_encode($row["cover"]).'" width="70" height="60" /> </td>';
	    echo '<td>'.$row["title"].'</td>';
	    echo '<td>'.$row["author"].'</td>';
	    echo '<td>'.$row["ISBN"].'</td>';
	    echo '<td>'.$row["quantity"].'</td></tr></tbody>';
	}
		 
	echo "</div></table>"; 
?>

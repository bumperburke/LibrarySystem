<?php
session_start();
if( !isset($_SESSION['loggedInUser']) && !empty($_SESSION['loggedInUser']) )
{
	header("location:index.html");
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DIT Kevin Street Library</title>
<link href="home.css" type="text/css" rel="stylesheet" />
</head>
<style>
@import url("booksTable.css");
/*tr {
	font-size:15pt;
	font-style:bold;
}*/
form {
	margin-left:200px;
	margin-top: 300px;
}
</style>
<body>
	<div id="container">
    	<div id="header">
        	<h1>DIT Kevin Street Library Service</h1>
            <img src="book.png" width="100" height="100" alt="Book" class="book"/>
            <p>Welcome, <?php echo $_SESSION['loggedInUser']; ?></p>
        </div>
        <div id="main">
        	<div id="cssmenu">
            	<ul>
                	<li><a href="home.php">Home</a></li>
                	<?php
                		if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                		{
                			echo '<li><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li class="active"><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
            <div id="stats">
            <?php
				require "conn.php";
		
				$sql = "SELECT book_id, cover, title, author, quantity, ISBN, date_added FROM books";
				$result = mysqli_query($mysqli, $sql);
			?>
            	<table border="2">
            	<thead>
            		<tr>
            			<th>ID</th>
            			<th>Cover</th>
            			<th>Title</th>
            			<th>Author</th>
            			<th>Quantity</th>
            			<th>ISBN</th>
            			<th>Date Added</th>
						<?php
						if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                		{
							echo '<th>Actions</th>';
						}
						?>
            		</tr>
            	</thead>
            	<tbody>
            		<?php
            			while($row = mysqli_fetch_array($result))
						{
							echo '<tr><td>'.$row["book_id"].'</td>';
							echo '<td> <img src="data:image/jpeg;base64,'.base64_encode($row["cover"]).'" width="70" height="60" /> </td>';
				    		echo '<td>'.$row["title"].'</td>';
				    		echo '<td>'.$row["author"].'</td>';
				    		echo '<td>'.$row["quantity"].'</td>';
				    		echo '<td>'.$row["ISBN"].'</td>';
				    		echo '<td>'.$row["date_added"].'</td>';
							if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
							{
								echo "<td><a href='updateBooks.php?book_id=" . $row["book_id"] . "'> Update </a>";
								echo "<a href='deleteBook.php?book_id=" . $row["book_id"] . "'> Delete </a></td></tr> ";
							}
						}
            		?>
            	</tbody>
            	</table>   
            </div>
						<?php
			if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
            {           
            	echo'<form method="post" action="addBook.php" id="addBook">';
        		echo'<input type="submit" value="Add Book"></form>';
            }
            ?> 
            <form class="search" id="search" name="search" action="search.php" method="GET">
                <input type="text" name="query" size="50" placeholder="Search Title/Author...">
            	<input type="submit" value="Search">
            </form>
            
            <form method="post" action="logout.php" id="logout">
        		<input type="submit" value="Logout">
        	</form>
 
                
            <img src="dit.png" width="200" height="200" alt="DIT" class="displayed"/>
        </div>
    </div>
</body>
</html>
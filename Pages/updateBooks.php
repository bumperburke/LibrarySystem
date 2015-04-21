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
<link href="home.css" type="text/css" rel="stylesheet">

</head>
<style>
#search{
	position:absolute;
	bottom:70px;
	right:500px;
}

#form1{
	position:absolute;
	line-height:15px;
	left:380px;
	font-size:18px;
    font-style: normal;
	text-align: left;
}
h3{
    text-align: center;
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
                			echo '<li  class="active"><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
			
			<div id="form1">

                   <h3>Edit Book Details Below</h3>
                    <?php 
						require "conn.php";
	
						$id = $_GET['book_id'];
						$sql = "SELECT * FROM books WHERE book_id LIKE '$id'";
						$result = mysqli_query($mysqli, $sql);
						while($row = mysqli_fetch_array($result))
						{
							echo '<form method="get"  action="updateBooksAct.php">';
							echo '<input type="hidden" value="'.$row['book_id'].'" name="book_id">';
							echo '<table>';
							echo '<tr>';
							echo '<td align="right">ISBN:</td>';
							echo '<td align="left"><input type="text" name="ISBN" value="'.$row['ISBN'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Title:</td>';
							echo '<td align="left"><input type="text" name="title" value="'.$row['title'].'""></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Author:</td>';
							echo '<td align="left"><input type="text" name="author" value="'.$row['author'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Publish Date:</td>';
							echo '<td align="left"><input type="text" name="publish_date" value="'.$row['publish_date'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Publisher:</td>';
							echo '<td align="left"><input type="text" name="publisher" value="'.$row['publisher'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Pages:</td>';
							echo '<td align="left"><input type="text" name="pages" value="'.$row['pages'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Quantity:</td>';
							echo '<td align="left"><input type="text" name="quantity" value="'.$row['quantity'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Date Added:</td>';
							echo '<td align="left"><input type="text" name="date_added" value="'.$row['date_added'].'"></td>';
							echo '</tr>';
							echo '</table>';
							echo'<input type="submit" value="Submit"/></form>';
						}
					?>
			</div>
			    <form class="search" id="search" name="search" action="search.php" method="GET">
                    <input type="text" name="search" size="50" placeholder="Enter Search Term Here....">
                    <input type="submit" value="Search">
                </form> 
                
                <form method="post" action="logout.php" id="logout">
        			<input type="submit" value="Logout">
        		</form>
        		
			<img src="dit.png" width="200" height="200" alt="DIT" class="displayed">               
        </div>
	</div>
</body>
</html>
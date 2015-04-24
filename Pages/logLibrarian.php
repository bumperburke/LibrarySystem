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
                			echo '<li class="active"><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
            <div id="stats">
            <?php
				require "conn.php";
				$id = $_GET['username'];
				$sql = "SELECT * FROM data_log WHERE user LIKE '$id'";
				$result = mysqli_query($mysqli, $sql);
			?>
            	<table border="2">
            	<thead>
            		<tr>
            			<th>Action</th>
            			<th>User</th>
            			<th>Timestamp</th>
            			<th>Details</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php
            			while($row = mysqli_fetch_array($result))
						{
							echo '<tr><td>'.$row["action"].'</td>';
				    		echo '<td>'.$row["user"].'</td>';
				    		echo '<td>'.$row["timestamp"].'</td>';
				    		echo '<td>'.$row["details"].'</td></tr>';
						}
            		?>
            	</tbody>
            	</table>
            </div>
                <form class="search" id="search" name="search" action="search.php" method="GET">
                    <input type="text" name="search" size="50" placeholder="Enter Search Term Here....">
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
<?php
session_start();
if( !isset($_SESSION['loggedInUser']) || empty($_SESSION['loggedInUser']) )
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
@import url("booksTable.css");
#Table1 {
	position:fixed;
	left: 220px;
    top: 210px;
}

#return{
	position:fixed;
	right: 400px;
	top:0px;
}

caption
{
	font-size:15pt;
	font-style:bold;
}
td
{
	font-size:13pt;
}

tr {
	font-size:16pt;
	font-style:bold;
}
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
                	<li class="active"><a href="">Home</a></li>
                	<?php
                		if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                		{
                			echo '<li><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
            <div id="Table1">
            	<?php
            		include "homeTables.php";
            		if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                	{
            			librarianTableOverdue();
            		}
            		
            		else
            		{
            			userTable();
            		}
            	?>
            </div>
            <?php
            	if($_SESSION['userLevel'] == "a" || $_SESSION['userLevel'] == "l")
                {		
	            	echo '<form class="return" id="return" name="return" action="returnBook.php" method="GET">
	                	<legend>Return a Book</legend>
	                	<input type="text" name="isbn" size="30" placeholder="Enter Book ISBN..."><br>
	                	<input type="text" name="user" size="30" placeholder="Enter Username..."><br>
	            		<input type="submit" value="Return Book">
	            	</form>';
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

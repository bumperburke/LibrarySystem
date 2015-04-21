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
<style type="text/css">
@import url("booksTable.css");
#results{
	position:fixed;
	left: 300px;
    top: 110px;
}

table.search
{
	position:fixed;
	top:220px;
}


checkout
{
	padding: 0;
}

#searchBar
{
	position: fixed;
	bottom: 70px;
	right: 500px;
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
                    <li><a href="books.php">Books</a></li>
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
            <div id="results">
            	<?php
					include "searchTypes.php";
					
					$userLevel = $_SESSION['userLevel'];
					
					if($userLevel == 'u')
					{
						userSearch();
					}
					
					else
					{
						librarianSearch();
					} 
				?>
            </div>
            
            <form id="searchBar" name="searchBar" action="search.php" method="GET">
                <input type="text" name="query" size="50" placeholder="Enter Search Term Here....">
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

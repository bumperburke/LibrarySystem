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
#contents {
	margin-top:100px;
}
tr {
	font-size:20pt;
	font-style:bold;
}
td {
	text-align:center;
}
form {
	margin-left:200px;
	margin-top: 50px;
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
                    <li class="active"><a href="manage.php">Manage</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
            <div id="contents">
            	<table style="width:70%">
                  <tr>
                    <th><u>Librarian Accounts</u></th>
                    <th><u>User Accounts</u></th>		
                    <th><u>Books</u></th>
                  </tr>
                  <tr>
                    <td><a href="librarian_list.php"><img src="librarian.png" width="100" height="100" alt="Librarian Accounts"/></a></td>
                    <td><a href="user_list.php"><img src="user.png" width="100" height="100" alt="User Accounts"/></a></td>
                    <td><a href="books.php"><img src="bookIcon.png" width="100" height="100" alt="Book Accounts"/></a></td>
                  </tr>
                </table>
            	
                <form id="search">
                    <input type="text" name="search" size="50" placeholder="Enter Search Term Here....">
                    <input type="submit" value="Search">
                </form> 
                
                <form method="post" action="logout.php" id="logout">
        			<input type="submit" value="Logout">
        		</form>

                
            	<img src="dit.png" width="200" height="200" alt="DIT" class="displayed"/>
        	</div>
        </div>
	</div>
</body>
</html>

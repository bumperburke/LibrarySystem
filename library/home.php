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
#stats {
	margin-top:30px;
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
                    <li><a href="manage.php">Manage</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">About</a></li>
                </ul>
           	</div>
            <div id="stats">
            	<table style="width:70%">
                  <tr>
                    <th><u>Current Loans</u></th>
                    <th><u>Recent History</u></th>		
                    <th><u>New Books</u></th>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
                
            </div>
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
</body>
</html>

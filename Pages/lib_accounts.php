<?php
session_start();
if( !isset($_SESSION['loggedInUser']) && !empty($_SESSION['loggedInUser']) )
{
	header("location:index.html");
	exit();
}
	// include DB manager and UsersDAO
	//include_once 'bootstrap/css/bootstrap.min.css';
	include_once "DB/DBManager.php";
	include_once 'DB/DAO/LibrariansDAO.php';
	
	$dbManager = new DBManager (); // create a new instance of DBManager
	$dbManager->openConnection ();
	$LibrariansDAO = new LibrariansDAO ( $dbManager ); // create e new instance of the Users DAO (database access object)
	$arrayOfUsers = $LibrariansDAO->getUsers (); // retrieve an associative array of the users in the DB (in table users)
	$dbManager->closeConnection (); // close the connection
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
                    <li><a href="">Contact</a></li>
                    <li><a href="">About</a></li>
                </ul>
           	</div>
            <div id="contents">
				<?php
            	$HTMLListOfUsers = "<div> ";
				foreach ( $arrayOfUsers as $value ) {
					$HTMLListOfUsers .= "<li>" . $value["username"] . " " . $value["password"] . " " . $value["firstname"] . " " . $value["surname"] . " " . $value["email"] . " " .
					"<a href='deleteUser.php?username=" . $value["username"] . "'> Delete </a> " .
					"&nbsp <a href='updateUser.php?username=" . $value["username"] . "&username=" . $value["username"] . "&password=" . $value["password"] .
					"&firstname=" . $value["firstname"] . "&surname=" . $value["surname"] . "&email=" . $value["email"] . 						
					"'> Update </a> </li>";
				}
				$HTMLListOfUsers = "<ol>" . $HTMLListOfUsers . "</ol>";
				$HTMLListOfUsers .= "</div>";
				echo $HTMLListOfUsers;
            	?>
            	
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
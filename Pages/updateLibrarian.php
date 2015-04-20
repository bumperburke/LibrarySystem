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
                    <li><a href="">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
			
			<div id="form1">

                   <h3>Edit User Details Below</h3>
                    <?php 
						require "conn.php";
	
						$id = $_GET['user_id'];
						$sql = "SELECT * FROM users WHERE user_id LIKE '$id'";
						$result = mysqli_query($mysqli, $sql);
						while($row = mysqli_fetch_array($result))
						{
							echo '<form method="get"  action="updateLibAct.php">';
							echo '<input type="hidden" value="'.$row['user_id'].'" name="user_id">';
							echo '<table>';
							echo '<tr>';
							echo '<td align="right">User:</td>';
							echo '<td align="left"><input type="text" name="username" value="'.$row['username'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Name:</td>';
							echo '<td align="left"><input type="text" name="full_name" value="'.$row['full_name'].'""></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Address:</td>';
							echo '<td align="left"><input type="text" name="address" value="'.$row['address'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Email:</td>';
							echo '<td align="left"><input type="text" name="email" value="'.$row['email'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td align="right">Phone:</td>';
							echo '<td align="left"><input type="text" name="phone" value="'.$row['phone'].'"></td>';
							echo '</tr>';
							echo '</table>';
							echo'<input type="submit" value="Submit"/>';
						}
					?>
			</div>
			
            <div id="contents">
   	
                <form id="search">
                    <input type="text" name="search" size="50" placeholder="Enter Search Term Here....">
                    <input type="submit" value="Search">
                </form> 
                
                <form method="post" action="logout.php" id="logout">
        			<input type="submit" value="Logout">
        		</form>               
            	
        	</div>
        </div>
	</div>
</body>
</html>
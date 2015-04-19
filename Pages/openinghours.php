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

form {
	margin-left:200px;
	margin-top: 50px;
}

#table{
	position:absolute;
	line-height:15px;
	left:380px;
	top: 300px;
	font-size:18px;
	text-align: left;

}
#para1{
	position:absolute;
	line-height:15px;
	left:600px;
	font-size:18px;
}
#para2{
	position:absolute;
	top:230px; 
	left:200px;
	font-size:15px;
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
                			echo '<li><a href="manage.php">Manage</a></li>';
                		}
                    ?>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                </ul>
           	</div>
			<div id = "para1">		
                   <h3>Opening Hour</h3>
				   <h3>Kevin Street</h3>
				   <br>
				   <br>
				   </div>
				   
			
			<div >

                    <table id ="table" border="1">
					<tr>
					<td>Academic Year 2014-2015 </td>
					<td>15 Sep 2014 - 05 June 2015</td>
					<td>08 June 2015 - 11 Sep 2015</td>
					</tr>
					
					<tr>
					<td>Monday - Thursday</td>
					<td>09.00 - 21.30</td>
					<td>09.00 - 17.15</td>
					</tr>
					
					<tr>
					<td>Friday</td>
					<td>09.00 - 17.15</td>
					<td>09.00 - 17.15</td>
					</tr>
					
					<tr>
					<td>Saturday</td>
					<td>09.00 - 16.30</td>
					<td>Closed</td>
					</tr>
					
                    </table>									  
			</div>
			
            <div id="para2">
			<ul class="links"><li><a href="profile.php">Profile</a></li></ul>
			<ul class="links"><li><a href="how_to_study.php">How to Study</a></li></ul>
			<ul class="links"><li><a href="openinghours.php">Opening Hours</a></li></ul>
			<ul class="links"><li><a href="ourlibrary.php">Our Libraries</a></li></ul>

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

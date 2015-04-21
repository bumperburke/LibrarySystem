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


#para1{
	position:absolute;
	line-height:15px;
	left:380px;
	font-size:18px;
	text-align: left;

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
                    <li><a href="contactStaff.php">Contact</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                </ul>
           	</div>
			
			<div id="para1">
                    <h3>DIT Profile</h3>
                    <br>Dublin Institute of Technology (DIT) has been an integral part of the</br>
                    <br>Irish Higher Education system for more than a century.  In that time</br>	
					<br>it has continued to adapt and expand its provision to reflect a changing</br>
					<br>society and the wider economic environment. DIT is now one of Irelands </br>
					<br>largest and most innovative university-level institutions.  A comprehensive,</br>
					<br>dual-sector doctoral-awarding  institution, DIT combines the academic excellence</br>
					<br>of a traditional university with professional, career-oriented learning,</br>	
				    <br>preparing graduates for productive leadership roles.</br>	
				  
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

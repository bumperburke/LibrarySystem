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
    font-style: normal;
	text-align: left;

}
#para2{
	position:absolute;
	top:230px; 
	left:200px;
	font-size:15px;
	font-style:normal;
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

                   <h3>Welcome to Dublin Institute of Technology (DIT)</h3>
                    <br>Dublin Institute of Technology is distinguished by commitment to our students' </br>
                    <br>success.  To this my colleagues bring creativity, experience, expertise and </br>	
					<br>scholarship, combining the academic excellence of a traditional university with </br>
					<br>career-focused learning.  Studying with us, you will gain the knowledge and </br>
					<br>abilities to contribute successfully to a complex and ever-changing world.  When </br>
					<br>you graduate you will be among the thinkers, doers and leaders who can navigate </br>
					<br>a globally interdependent and technologically-advanced society.</br>		
				  
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

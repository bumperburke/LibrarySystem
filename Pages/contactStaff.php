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
h2{
    text-align: center;
}

div.scroll
{
    width: 780px;
    height: 385px;
    overflow: scroll;
	overflow-x: hidden;
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
                    <li class="active"><a href="contactStaff.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
           	</div>
			
			<div id="para1" class = "scroll">
                   <h2>Library Staff Contact Details</h2>
				   <hr>
				   <ul><li><h4> Head of Library Services: Dr Philip Cohen </h4>
				   DIT Library Services, Rathmines Rd., Dublin 6, Ireland.
				   <blockquote> Tel: +353 1 4027803 </blockquote>
				   <blockquote> Fax: +353 1 4027859 </blockquote>
				   <hr>
				   </li><li><h4> Sub Librarian, Systems Development: Ursula Gavin </h4>
				   DIT Library Services, Rathmines Rd., Dublin 6, Ireland. </strong>
				   <blockquote> Tel: +353 1 4027805 </blockquote>
				   <blockquote> Fax: +353 1 4027859 </blockquote>
				   <hr>
				   </li><li><h4> Sub Librarian, Collection Development: Ann McSweeney </h4>
				   DIT Library Services, Rathmines Rd., Dublin 6, Ireland. </strong>
				   <blockquote> Tel: +353 1 4027804 </blockquote>
				   <blockquote> Fax: +353 1 4027859 </blockquote>
				   </li></ul>
				   
			</div>
			
            <div id="para2">
			<ul class="links"><li><a href="contactStaff.php">Contact Staff</a></li></ul>
			<ul class="links"><li><a href="contactLibraries.php">Contact Libraries</a></li></ul>
			<ul class="links"><li><a href="contactLocations.php">Locate Us</a></li></ul>
            </div>
			
        </div>
	</div>
</body>
</html>
<?php session_start();
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
<title>Login Success</title>
<link href="registerPage.css" type="text/css" rel="stylesheet" >
</head>

<body>

	<div id="container">
    	<div id="pic">
			<img src="logo.jpg" width="300" height="300" alt="DIT" class="displayed"/>
        </div>
        
        <div id="register">
			<h2>You have successfully registered to this service. <br>
				You will now be redirected to your homepage.</h2>
				
				<img src="success.png" width="100" height="100" alt="Success" />
				<?php header( "refresh:5; url=home.php" ); ?>
		</div>
        
    </div>

</body>

</html>

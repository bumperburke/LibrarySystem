<?php
require_once "conn.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
$rows = mysql_num_rows($result);
if($rows == 1)
	{
		$_SESSION['loggedInUser'] = $username;
		$_SESSION['loggedPass'] = $password;
		header("location:home.php");
	}

    else 
    {
    	echo "No user found!";
		die(mysql_error());
    }

?>
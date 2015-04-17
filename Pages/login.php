<?php
require "conn.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$userData = mysqli_fetch_array($result);

$rows = mysqli_num_rows($result);

if($rows == 1)
	{
		$_SESSION['loggedInUser'] = $username;
		$_SESSION['loggedPass'] = $password;
		$_SESSION['userLevel'] = $userData['user_level'];
		
		/*$cookie_name = "user";
		$cookie_value = $userData['user_level'];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");*/
		
		header("location:home.php");
		
		/*if($userData['user_level'] == 'a')
		{
			$_SESSION['userLevel'] = $userData['user_level'];
			header("location:home.php");
		}
		
		if($userData['user_level'] == 'l')
		{
			$_SESSION['userLevel'] = $userData['user_level'];
			echo "Librarian";
		}
		
		if($userData['user_level'] == 'u')
		{
			$_SESSION['userLevel'] = $userData['user_level'];
			header("location:userHome.php");
		}*/
	}

    else 
    {
    	echo "No user found!";
		die(mysql_error());
    }

?>
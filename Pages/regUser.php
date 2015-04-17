<?php
require_once "conn.php";

function newUser()
{
	$uname = $_POST['username'];
	$password = $_POST['password'];
	$userLevel = 'u';
	$fullname = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	$query = "INSERT INTO users (username, password, user_level, full_name, address, email, phone) VALUES ('$uname', '$password', '$userLevel', '$fullname', '$address', '$email', '$phone')";
	$data = mysql_query($query) or die (mysql_error());
	
	if($data)
	{
		header("location:loginSuccess.php");
	}
	
}

function SignUp()
{
	if(!empty($_POST['username']))
	{
		$query = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_erroe());
		
		if(!$row = mysql_fetch_array($query) or die(mysql_error()))
		{
			newUser();
		}
		
		else
		{
			echo "Sorry...Username Already Exists!";
		}
	}
}

SignUp();

 ?>
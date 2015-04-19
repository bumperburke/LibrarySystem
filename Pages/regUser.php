<?php

function newUser()
{
	require "conn.php";

	$uname = $_POST['username'];
	$password = $_POST['password'];
	$userLevel = 'u';
	$fullname = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	$data = mysqli_query($mysqli, "INSERT INTO users (username, password, user_level, full_name, address, email, phone) VALUES ('$uname', '$password', '$userLevel', '$fullname', '$address', '$email', '$phone')") or die (mysqli_error($mysqli));
	
	if($data)
	{
		header("location:loginSuccess.php");
	}
	
}

function SignUp()
{
	require "conn.php";
	
	$username = $_POST['username'];

	if($username != NULL)
	{
		
		$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username = '{$username}'") or die(mysqli_error($mysqli));
		
		if(!$query)
		{
			newUser();
		}
		
		else
		{
			echo '<h3 style="color:red">Sorry, Username Already Exists!</h3>';
			header("refresh:2; url=register.html");
		}
	}
}

SignUp();

 ?>
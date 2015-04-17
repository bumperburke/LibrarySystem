<?php
//connect to database 
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'library_system';

$mysqli = new mysqli($host,$user,$password,$db);

    if($mysqli->connect_error)
    {
        die('Connect Error');
    }
?> 
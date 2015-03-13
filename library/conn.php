<?php
//connect to database 
mysql_connect('localhost', '', '') or die(mysql_error());
mysql_select_db("library_system") or die(mysql_error());

if(mysqli_connect_errno())
{
    printf("Connection failed: %s\n",mysqli_connect_error());   
    exit(); 
}
?> 
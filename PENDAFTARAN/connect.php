<?php
$username="root";
$password="";
$hostname="localhost";
$dbname="register";
//connection string with database  
$dbhandle = mysqli_connect($hostname, $username, $password, $dbname)  
or die("Unable to connect to MySQL");  
echo "";  
// connect with database  
$selected = mysqli_select_db($dbhandle, "register")  
or die("Could not select examples");  

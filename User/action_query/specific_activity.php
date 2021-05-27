<?php
$username="root";  
$password="";  
$hostname = "localhost";  
//connection string with database  
$dbhandle = mysqli_connect($hostname, $username, $password)  
or die("Unable to connect to MySQL");  
echo "";  
// connect with database  
$selected = mysqli_select_db($dbhandle, "kindergarten")  
or die("Could not select examples");

$id = $_POST['id'];

$result = mysqli_query($dbhandle, "SELECT * FROM class_activity WHERE id='$id'");

$row = mysqli_fetch_assoc($result);	

echo json_encode($row);
?>
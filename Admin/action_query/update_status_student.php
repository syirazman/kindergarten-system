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

$id = $_POST['stud_id'];
$class = $_POST['class'];
$status = $_POST['status'];

$update = mysqli_query($dbhandle, "UPDATE students SET kelas = '$class', status = '$status' WHERE id = '$id'");

if($update===TRUE)
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/Admin/status%20pendaftaran.php');
}						
else
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/Admin/status%20pendaftaran.php');
}




?>
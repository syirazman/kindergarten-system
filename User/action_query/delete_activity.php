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

$id = $_POST['userid'];
echo $id;

$query = mysqli_query($dbhandle, "DELETE FROM class_activity WHERE id = '$id'");

if($query===TRUE)
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/User/activity.php');
	exit;
	echo "Data Successfully Save";
}						
else
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/User/activity.php');
	exit;
  	echo"The query did not run";
} 

?>
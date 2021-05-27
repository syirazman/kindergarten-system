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
$topic = $_POST['edit_tajuk'];
$time - $_POST['edit_masa'];
$date = $_POST['edit_tarikh'];
$class = $_POST['edit_kelas'];
$remarks = $_POST['edit_cacatan'];


$update = mysqli_query($dbhandle, "UPDATE class_activity SET class = '$class', topic = '$topic', date = '$date', remarks = '$remarks' WHERE id = '$id'");

if($update===TRUE)
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/User/activity.php');
    exit;
}						
else
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/User/activity.php');
  	echo"The query did not run";
}




?>
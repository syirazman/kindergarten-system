<?php include("User/db_conn.php");

$id = $_POST['userid'];
echo $id;

$query = mysqli_query($dbhandle, "DELETE FROM class_activity WHERE id = '$id'");

if($query===TRUE)
{
	header('Location: /User/activity.php');
	exit;
	echo "Data Successfully Save";
}						
else
{
	header('Location: /User/activity.php');
	exit;
  	echo"The query did not run";
} 

?>

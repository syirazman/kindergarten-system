<?php include("/User/db_conn.php");

$id = $_POST['userid'];
echo $id;

$query = mysqli_query($dbhandle, "DELETE FROM profile WHERE id = '$id'");

if($query===TRUE)
{
	header('Location: /Admin/Maklumatguru.php');
	exit;
	echo "Data Successfully Save";
}						
else
{
	header('Location: /Admin/Maklumatguru.php');
	exit;
  	echo"The query did not run";
} 

?>

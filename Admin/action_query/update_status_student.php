<?php include("/User/db_conn.php");

$id = $_POST['stud_id'];
$class = $_POST['class'];
$status = $_POST['status'];

$update = mysqli_query($dbhandle, "UPDATE students SET kelas = '$class', status = '$status' WHERE id = '$id'");

if($update===TRUE)
{
	header('Location: /Admin/status%20pendaftaran.php');
}						
else
{
	header('Location: /Admin/status%20pendaftaran.php');
}




?>

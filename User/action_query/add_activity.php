<?php include("User/db_conn.php");

$tajuk = $_POST['tajuk'];
$time - $_POST['masa'];
$tarikh = $_POST['tarikh'];
$kelas = $_POST['kelas'];
$remarks = $_POST['remarks'];

$insert = mysqli_query($dbhandle, "INSERT INTO class_activity (class,topic,time,date,remarks) VALUES ('$kelas','$tajuk','$masa','$tarikh','$remarks')");

// echo json_encode($_POST);
if($insert===TRUE)
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
// ?>

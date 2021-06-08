<?php include("/User/db_conn.php");

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$tel = $_POST['notelefon'];
$alamat = $_POST['alamat'];


$update = mysqli_query($dbhandle, "UPDATE profile SET name = '$nama', email = '$email', phone = '$tel', alamat = '$alamat' WHERE id = '$id'");

if($update===TRUE)
{
	header('Location: Admin/Maklumatguru.php');
    exit;
}						
else
{
	header("location: index.php");
  	echo"The query did not run";
}




?>

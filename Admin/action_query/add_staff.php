<?php include("/User/db_conn.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$tel = $_POST['notelefon'];
$alamat = $_POST['alamat'];

$insert = mysqli_query($dbhandle, "INSERT INTO users (username,password,user_level) VALUES ('$email','$email','2')");

if($insert === TRUE){
	$data = mysqli_query($dbhandle, "SELECT * FROM users Order by id DESC LIMIT 1");
	$result = mysqli_fetch_assoc($data);
	$id = $result['id'];
	$insert = mysqli_query($dbhandle, "INSERT INTO profile (users_id,name,email,phone,jawatan,alamat) VALUES ('$id','$nama','$email','$tel','Guru','$alamat')");
}

if($insert===TRUE)
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

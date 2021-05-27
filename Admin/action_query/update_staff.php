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
$nama = $_POST['nama'];
$email = $_POST['email'];
$tel = $_POST['notelefon'];
$alamat = $_POST['alamat'];


$update = mysqli_query($dbhandle, "UPDATE profile SET name = '$nama', email = '$email', phone = '$tel', alamat = '$alamat' WHERE id = '$id'");

if($update===TRUE)
{
	header('Location: http://'.$_SERVER['SERVER_NAME'].'/kindergarten-system/Admin/Maklumatguru.php');
    exit;
}						
else
{
	header("location: index.php");
  	echo"The query did not run";
}




?>
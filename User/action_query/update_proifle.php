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
$username = $_POST['username'];
$nama = $_POST['nama'];
$tel = $_POST['telefon'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
echo $id;
$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE users_id='$id'");

if(mysqli_num_rows($result) != 1){

	$insert = mysqli_query($dbhandle, "INSERT INTO profile (users_id,name,email,phone,alamat,jawatan) VALUES ('$id','$nama','$email','$tel','$alamat','Guru')");
	if($insert===TRUE)
	{
		echo "Data Successfully Save";
	}						
	else
	{
	  	echo"The query did not run";
	} 

}else{
	$update = mysqli_query($dbhandle, "UPDATE profile SET name = '$nama', email = '$email', phone = '$tel', alamat = '$alamat' WHERE users_id = '$id'");

	if($update === TRUE){
		echo "Data update successfully";
	}else{
		echo "The query did not run";
	}
}



?>
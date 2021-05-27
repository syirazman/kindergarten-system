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
$tadika = $_POST['tadika'];
$tel = $_POST['telefon'];
$email = $_POST['email'];
$nopend = $_POST['nopendaftaran'];
$jawatan = $_POST['jawatan'];
echo $id;
$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE users_id='$id'");

if(mysqli_num_rows($result) != 1){

	$insert = mysqli_query($dbhandle, "INSERT INTO profile (users_id,name,email,phone,nama_tadika,no_tadika,jawatan) VALUES ('$id','$nama','$email','$tel','$tadika','$nopend','$jawatan')");
	if($insert===TRUE)
	{
		echo "Data Successfully Save";
	}						
	else
	{
	  	echo"The query did not run";
	} 

}else{
	$update = mysqli_query($dbhandle, "UPDATE profile SET name = '$nama', email = '$email', phone = '$tel', nama_tadika = '$tadika', no_tadika = '$nopend', jawatan = '$jawatan' WHERE users_id = '$id'");

	if($update === TRUE){
		echo "Data update successfully";
	}else{
		echo "The query did not run";
	}
}



?>
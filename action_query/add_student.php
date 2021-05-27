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

$nama = $_POST['std_nama'];
$umur = $_POST['std_umur'];
$tarikh_lahir = $_POST['std_tarikh_lahir'];
$jantina = $_POST['std_jantina'];
$no_sijil = $_POST['std_no_sijil'];
$warganegara = $_POST['std_kewarganegaraan'];
$agama = $_POST['std_agama'];
$others = $_POST['std_comment'];
$alamat = $_POST['std_alamat'];
$bandar = $_POST['std_bandar'];
$negeri = $_POST['std_negeri'];
$std_poskod = $_POST['std_poskod'];
$penjaga_name = $_POST['penjaga'];
$no_ic = $_POST['no_ic'];
$status = $_POST['status'];
$no_tel = $_POST['no_telefon'];
$work = $_POST['pekerjaan'];
$date = date("d M Y");
$mykid = $_POST['mykid'];

$insert = mysqli_query($dbhandle, "INSERT INTO students (name,mykid,idNo,age,dob,gender,nationality,religion,address,city,state,postal_code,guardian,noic,phone,work,date_register) VALUES ('$nama','$mykid','$no_sijil','$umur','$tarikh_lahir','$jantina','$warganegara','$agama','$alamat','$bandar','$negeri','$std_poskod','$penjaga_name','$no_ic','$no_tel','$work','$date')");

if($insert===TRUE)
{
	// header('Location: http://'.$_SERVER['SERVER_NAME'].'/pendaftaran_pelajar');
	// exit;
	return "success";
}						
else
{
	// header('Location: http://'.$_SERVER['SERVER_NAME'].'/pendaftaran_pelajar');
	// exit;
  	return "error";
} 


?>
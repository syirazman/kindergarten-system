<?php include("/User/db_conn.php");

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

$insert = mysqli_query($dbhandle, "INSERT INTO students (name,idNo,age,dob,gender,nationality,religion,address,city,state,postal_code,guardian,noic,phone,work,date_register) VALUES ('$nama','$no_sijil','$umur','$tarikh_lahir','$jantina','$warganegara','$agama','$alamat','$bandar','$negeri','$std_poskod','$penjaga_name','$no_ic','$no_tel','$work','$date')");

if($insert===TRUE)
{
	header('Location: /Admin/maklumat%20murid.php');
	exit;
	echo "Data Successfully Save";
}						
else
{
	header('Location: /Admin/maklumat%20murid.php');
	exit;
  	echo"The query did not run";
} 


?>

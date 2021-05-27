<?php
include("connects.php");
$tbl_name="adminprofile";

$Nama = $_POST['Nama'];
$namatadika = $_POST['namatadika'];
$notelefon = $_POST['notelefon'];
$email = $_POST['email'];
$jawatan = $_POST['jawatan'];
$nopendfttadika = $_POST['nopendfttadika'];

$Nama = stripslashes($Nama);
$namatadika = stripslashes($namatadika);
$notelefon = stripslashes($notelefon);
$email = stripslashes($email);
$jawatan = stripslashes($jawatan);
$nopendfttadika = stripslashes($nopendfttadika);
$Nama = mysqli_real_escape_string($dbhandle,$Nama);
$namatadika = mysqli_real_escape_string($dbhandle,$namatadika);
$notelefon = mysqli_real_escape_string($dbhandle,$notelefon);
$email = mysqli_real_escape_string($dbhandle,$email);
$jawatan = mysqli_real_escape_string($dbhandle,$jawatan);
$nopendfttadika = mysqli_real_escape_string($dbhandle,$nopendfttadika);

$result = mysqli_query($dbhandle, "INSERT INTO $tbl_name (Nama, namatadika, notelefon, email, jawatan, nopendfttadika) VALUES ($Nama, $namatadika, $notelefon, $email, $jawatan, $nopendfttadika)");

if($result===TRUE)
{
echo "<script>alert('User Account has been saved in the database.');
                        window.location='Adminprofile.php';
                        </script>";
}
else
{
    echo"The query did not run";
}
mysqli_close($result);

?>
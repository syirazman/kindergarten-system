<?php

// define variables and set to empty values
$name = $IdNo = $age = $dob = $birth = $gender = $nationality = $religion =  $address = $city = $state = $postal_code = $guardian = $noic = $phone = $work = $relate = $email ="";

include("connect.php"); 
$tbl_name="admin"; 


$name=$_POST['name']; 
$IdNo=$_POST['IdNo']; 
$age = $_POST['age']; 
$dob = $_POST['dob'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$religion = $_POST['religion'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postal_code'];
$guardian = $_POST['guardian'];
$noic = $_POST['noic'];
$phone = $_POST['phone'];
$work = $_POST['work'];
$relate = $_POST['relate'];
$email = $_POST['email'];

$name=$_POST['name']; 
$result = mysqli_query($dbhandle, "INSERT INTO $tbl_name (name, IdNo, age, dob, birth, gender, nationality, religion, address, city, state, postal_code, guardian, noic, phone, work, relate, email) VALUES ('$name','$IdNo','$age',$dob,$birth,$gender,$nationality,$religion,$address,$city,$state,$postal_code,$guardian,$noic,$phone,$work,$relate,$email)");
$data + mysqli_query($conn,$query);

if ($data){
	echo "data insert successfully";
}else{
	echo "data not insert";
}

?>


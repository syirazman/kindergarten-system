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

$action = $_POST['action'];
$id = $_POST['id'];
$status = $_POST['status'];
$date = date('d-M-Y');

if($action == 'update'){
	$update = mysqli_query($dbhandle, "UPDATE kehadiran_pelajar SET status = '$status' student_id = '$id'");

} else {
    $insert = mysqli_query($dbhandle, "INSERT INTO kehadiran_pelajar (student_id, date_time, status) VALUES ('$id','$date','$status')");
}
// $result = mysqli_query($dbhandle, "SELECT * FROM students WHERE students.kelas='$kelas' LEFT JOIN kehadiran_pelajar ON students.id = kehadiran_pelajar.student_id");

// $row = mysqli_fetch_all($result);	

// echo json_encode($row);
?>


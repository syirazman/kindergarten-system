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

// $kelas = $_POST['class'];
// $date = $_POST['date'];

// $result = mysqli_query($dbhandle, "SELECT * FROM students WHERE students.kelas='$kelas' LEFT JOIN kehadiran_pelajar ON students.id = kehadiran_pelajar.student_id");

// $row = mysqli_fetch_all($result);	

// echo json_encode($row);
?>


<?php include("/User/db_conn.php");

$id = $_POST['id'];

$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE id='$id'");

$row = mysqli_fetch_assoc($result);	

echo json_encode($row);
?>

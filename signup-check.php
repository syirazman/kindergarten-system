<?php

include("User/db_conn.php"); 
$tbl_name="users"; 

$username=$_POST['username']; 
$password=$_POST['password']; 
$user_level = $_POST['user_level']; 

$result = mysqli_query($dbhandle, "INSERT INTO $tbl_name (username,password,user_level) VALUES ('$username','$password','$user_level')");


if($result===TRUE)
{
echo "Data Successfully Save";
}						
else
{
  echo"The query did not run";
} 
mysqli_close($result);

?>
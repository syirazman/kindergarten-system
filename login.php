<?php
include("User/db_conn.php"); 
$tbl_name="users"; 

$username=$_POST['username']; 
$password=$_POST['password']; 

$username = stripslashes($username);
$pssword = stripslashes($password);
$usearname = mysqli_real_escape_string($dbhandle,$username);
$password = mysqli_real_escape_string($dbhandle,$password);

$result = mysqli_query($dbhandle, "SELECT * FROM $tbl_name WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($result) != 1){
						echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
						window.location='index.php';
						</script>";
					}else{
						$row = mysqli_fetch_assoc($result);	
						if($row['user_level'] == 1){
							session_start();
							$_SESSION['id'] = $row['id'];
							$_SESSION['name'] = $row['username'];
							header('location: Admin/user.php');
						}else if($row['user_level'] == 2 ){
							session_start();
							$_SESSION['id'] = $row['id'];
							$_SESSION['name'] = $row['username'];
							header("Location: User/dashboard.php");
						}
						else{
							echo "<script>alert('Wrong Username or Password Access Denied !!! Try Again');
						window.location='index.php';
						</script>";
						}
					}

?>
<?php
require_once('index.php');
if(isset($_POST['btn-login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
        echo 'Please Fill in the Blank';
    }
    else
    {
        $query = " select * from user where username= '$username'";
        $result = mysqli_query($conn,$query);

        if($row=mysqli_fetch_assoc($result))
        {
            $db_password = $row['password'];

            if(md5($password == $db_password))
            {
                header("location: index.php");
            }
            else
            {
                echo 'Incorrect Password';
            }
        }
        else
        {
            echo 'Please Check Your Query';
        }
    }
}

?>
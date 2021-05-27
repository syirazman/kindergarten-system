<?php 
include "db_conn.php";

//if the form's update button is clicked, we need to process the form
    if (isset($_POST['update'])) 
      {
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['code']))
        {
          echo ' Please Fill in the Blanks ';
        }
        else
        {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $code = $_POST['code'];

          $query = "INSERT INTO 'profile' (name, email, phone, address, city, state, code) VALUES ('$name','$email','$phone','$address','$city','$state','$code')";
          $result = mysqli_query($dbhandle,$query);

          if($result)
          {
            header("Location: viewprofile.php");
          }
          else
          {
            echo 'Please Check Your Query';
          }
        }
      }
      else
      {
        header("Location:profile.php");
      }

?>
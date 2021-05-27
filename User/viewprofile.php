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

session_start();

$userid = $_SESSION['id'];

$result = mysqli_query($dbhandle, "SELECT * FROM users WHERE id='$userid'");

$value = mysqli_fetch_assoc($result);

$profile = mysqli_query($dbhandle, "SELECT * FROM profile WHERE users_id='$userid'");

$profilegotVal = mysqli_num_rows($profile);

  $val = mysqli_fetch_assoc($profile);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <title>Profile Guru</title>
    </head>
    <body> 

    <?php include 'navbar.php' ?>
      

    <h1>Profile</h1>
  <div class="container">
    <div class="card">
      <div class="card-header">
            <h4>Edit Profile</h4>
      </div>
      <div class="card-body">
              <form id="updatedata">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>ID Staf</label>
                      <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo str_pad($value['id'], 4, '0', STR_PAD_LEFT) ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Username</label>
                      <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo str_pad($value['username'], 4, '0', STR_PAD_RIGHT) ?>" readonly>
                      </div>
                    </div>
                  </div>
              <br>
                  <input type="hidden" class="form-control" id="data_id" name="id" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-row">
                      <label>Nama</label>
                      <input type="text" name="name" id="data_nama" class="form-control" placeholder="Name" value="<?php echo $val['name'] ?>" required>
                    </div>
                  <br>
                  <div class="form-row">
                      <div class="col-md-6">
                        <label>Email</label>
                        <div class="input-group">
                          <input type="text" name="email" id="data_email" class="form-control"  placeholder="Email" value="<?php echo $val['email'] ?>" aria-describedby="inputGroupPrepend" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Nombor Telefon</label>
                        <div class="input-group">
                          <input type="tel" name="phone" id="data_tel" class="form-control" placeholder="XXX-XXXXXXX" value="<?php echo $val['phone'] ?>" aria-describedby="inputGroupPrepend" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" required>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="form-row">
                      <label>Alamat</label>
                      <input type="text" name="address" id="data_alamat" class="form-control" value="<?php echo $val['alamat'] ?>" placeholder="Alamat" required>
                  </div>
                  <br><br>
                  <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="update">Update</button>
                  </div>
                </form>
      </div>
    </div>
  </div>

  <script>
  
  $(document).ready(function(){
    
    $("#updatedata").on('submit',function(e){
        e.preventDefault();
        let id = $("#data_id").val();
        let nama = $("#data_nama").val();
        let tel = $("#data_tel").val();
        let email = $("#data_email").val();
        let alamat = $("#data_alamat").val();
        $.ajax({
            type: "POST",
            url: "action_query/update_proifle.php",
            data: {
                id: id,
                nama: nama,
                telefon: tel,
                email: email,
                alamat: alamat,
            },
            success: function(resultData){
                Swal.fire(
                    'Success!',
                    'Registration Successfully!',
                    'success'
                )
            },
            error: function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    });
})

  </script>
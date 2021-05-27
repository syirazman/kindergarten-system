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

$val = mysqli_fetch_assoc($profile);

$newStud = mysqli_query ($dbhandle, "SELECT * FROM students WHERE status = 'processing'");

$ttlStudent = mysqli_num_rows($newStud);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/text.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <!-- THEME -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/text.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <title>Admin Profile</title>
    </head>
    <body id="body-pd"> 
        <header class="header" id="header">
            <div class="header__toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
			</div>

            <div class="header__toggle notification_toggle">
              <i class="fas fa-bell" id="header-notification"></i>
              <?= $ttlStudent ?>
              
            </div>
        </header> 
            <div class="shadow-lg p-3 mb-5 bg-body rounded" id="boxNoti" style="position:absolute;right:0;background-color:#F7F6FB;height: 100px;width: 250px;padding: 0px 10px 0 10px;box-shadow: 5px 5px 5px 5px grey;">
                <h4 style="line-height: 20px">You have <?= $ttlStudent ?> new pending student</h4>
                <a href="status%20pendaftaran.php" style="position:absolute;bottom: 10%">View All</a>
            </div>

        <!----navigation bar side--->
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class="fas fa-chalkboard-teacher nav__logo-icon"></i>
                        <span class="nav__logo-name">ADMIN</span>
                    </a>
                    <div class="nav__list">
                        <a href="user.php" class="nav__link">
                        <i class="fas fa-tachometer-alt"></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="Adminprofile.php" class="nav__link active">
                        <i class="fas fa-user"></i>
                            <span class="nav__name">Admin Profile</span>
                        </a>
                        <a href="Maklumatguru.php" class="nav__link">
                            <i class="far fa-calendar-check"></i>
                            <span class="nav__name">Maklumat Guru</span>
                        </a>
                        <div class="nav__link dropdown-btn">
                            <i class="fas fa-clipboard-list"></i>
                            <span class="nav__name">Laporan Kehadiran</span>
                        </div>
                        <div class="dropdown-container">
                            <a href="Laporankehadiran.php" class="nav__link">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="nav__name">Guru</span>
                            </a>
                            <a href="kehadiran_murid.php" class="nav__link">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="nav__name">Murid</span>
                            </a>
                        </div>
                        <a href="status pendaftaran.php" class="nav__link">
                            <i class="fas fa-address-book"></i>
                            <span class="nav__name">Status Pendaftaran Murid</span>
                        </a>
                    </div>
                    <a href="maklumat murid.php" class="nav__link">
                            <i class="fas fa-address-card"></i>
                            <span class="nav__name">Maklumat Murid</span>
                        </a>
                </div>
                <a href="logout.php" class="nav__link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

<!----admin profile section--->
    <h1>Admin Profile</h1>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="row g-3 needs-validation" id="updatedata" action="action_query/update_profile.php">

                    <input type="hidden" class="form-control" id="data_id" name="id" value="<?php echo $_SESSION['id'] ?>">

                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="data_nama" name="nama" value="<?php echo $val['name'] ?>"required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nama Tadika</label>
                        <input type="text" class="form-control" id="data_tadika" name="namatadika" value="<?php echo $val['nama_tadika']; ?>" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">No Telefon</label>
                        <div class="input-group has-validation">
                          <input type="tel" value="<?php echo $val['phone']; ?>" class="form-control" id="data_tel" aria-describedby="inputGroupPrepend" name="notelefon" placeholder="XXX-XXXXXXX" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" required>
                          <div class="invalid-feedback">
                            Sila lengkapkan No Telefon anda.
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" value="<?php echo $val['email']; ?>" class="form-control" id="data_email" name="email" required>
                        <div class="invalid-feedback">
                          Sila isi email anda.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Jawatan</label>
                        <select class="form-select" id="data_jawatan" name="jawatan" required>
                          <option value="">Pilih Jawatan</option>
                          <option value="Guru" <?php ($val['jawatan'] == 'Guru') ? "selected" : '' ?>>Guru</option>
                          <option value="Guru Besar" <?php ($val['jawatan'] == 'Guru Besar') ? "selected" : '' ?>>Guru Besar</option>
                        </select>
                        <div class="invalid-feedback">
                          Sila pilih Jawatan anda 
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <label for="validationCustom05" class="form-label">No Pendaftaran Tadika</label>
                        <input type="text" class="form-control" id="data_nopend" name="nopendfttadika" value="<?php echo $val['no_tadika']; ?>" required>
                        <div class="invalid-feedback">
                          Sila lengkapkan No Pendaftaran Tadika.
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">           
                          <div class="invalid-feedback">
                            You must agree before submitting.
                          </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                       Update
                    </button> 

                </form>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="Adminmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
$(document).ready(function(){
    $('#boxNoti').hide();

    $("#updatedata").on('submit',function(e){
        e.preventDefault();
        let id = $("#data_id").val();
        let nopend = $("#data_nopend").val();
        let nama = $("#data_nama").val();
        let tadika = $("#data_tadika").val();
        let tel = $("#data_tel").val();
        let email = $("#data_email").val();
        let jawatan = $("#data_jawatan").val();
        $.ajax({
            type: "POST",
            url: "action_query/update_profile.php",
            data: {
                id: id,
                nama: nama,
                tadika: tadika,
                telefon: tel,
                email: email,
                jawatan: jawatan,
                nopendaftaran: nopend,
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

    $(document).ready(function(){
        $(".dropdown-btn").on('click', function(){
            $(".dropdown-container").toggleClass('show-menu');
        });
$('.notification_toggle').on('click', function(){
                        // alert('dwa');
                        $('#boxNoti').toggle();
                    });
    })
})

</script>
        <!--===== MAIN JS =====-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/main.js"></script>

    </body>
</html>
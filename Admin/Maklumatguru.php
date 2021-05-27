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

$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE jawatan ='GURU'");

$value = mysqli_fetch_all($result);

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

        <!-- Datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

        
        <title>Maklumat Guru</title>
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
                        <a href="Adminprofile.php" class="nav__link">
                        <i class="fas fa-user"></i>
                            <span class="nav__name">Admin Profile</span>
                        </a>
                        <a href="Maklumatguru.php" class="nav__link active">
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
        <!----Maklumat Guru section--->
        <h1>Maklumat Guru</h1>
            <br>
        <div class="container">
            <div class="row clearfix">
            	<div class="col-md-12 table-responsive">

                    <p>
                      <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Add New
                      </a>
                    </p>
                    <div class="collapse" id="collapseExample" style="width:100%;">
                      <div class="card card-body">
                        <form class="row g-3 needs-validation" id="updatedata" action="action_query/add_staff.php" method="POST">

                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="data_nama" name="nama" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Email</label>
                                <input type="email" class="form-control" id="data_email" name="email" required>
                                <div class="invalid-feedback">
                                  Sila isi email anda.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="phone" class="form-label">No Telefon</label>
                                <div class="input-group has-validation">
                                  <input type="tel" class="form-control" id="data_tel" aria-describedby="inputGroupPrepend" name="notelefon" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" required>
                                  <div class="invalid-feedback">
                                    Sila lengkapkan No Telefon anda.
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustomUsername" class="form-label">Alamat</label>
                                <div class="input-group has-validation">
                                  <input type="text" class="form-control" id="data_tel" aria-describedby="inputGroupPrepend" name="alamat" required>
                                  <div class="invalid-feedback">
                                    Sila lengkapkan Alamat anda.
                                  </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                               Add New
                            </button> 

                        </form>
                      </div>
                      <br>
                    </div>

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ID Staff</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telefon</th>
                                <th>Jawatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($value as $data){
                                    if($data[1] == ''){
                                      $staffID = str_pad($data[0], 4, '0', STR_PAD_RIGHT);
                                    } else{
                                      $staffID = str_pad($data[1], 4, '0', STR_PAD_LEFT);
                                    }
                                    echo "<tr>";
                                    echo "<td>".$staffID."</td>";
                                    echo "<td>".$data[2]."</td>";
                                    echo "<td>".$data[3]."</td>";
                                    echo "<td>".$data[4]."</td>";
                                    echo "<td>".$data[7]."</td>";
                                    echo '<td>
                                            <button class="btn btn-success btn-sm rounded-0 edit_data" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" data-user-id="'.$data[0].'"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm rounded-0 delete_data" type="button" data-toggle="tooltip" data-placement="top" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="'.$data[0].'"><i class="fa fa-trash"></i></button>
                                        </td>';
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="action_query/update_staff.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Maklumat Guru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="edit_id" name="id" required>

                                    <label for="validationCustom01" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="edit_nama" name="nama" required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="email" required>
                                    <div class="invalid-feedback">
                                      Sila isi email anda.
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="phone" class="form-label">No Telefon</label>
                                    <div class="input-group has-validation">
                                      <input type="tel" class="form-control" id="edit_tel" aria-describedby="inputGroupPrepend" name="notelefon" pattern="[0-9]{3}-[0-9]{3}[0-9]{4}" required>
                                      <div class="invalid-feedback">
                                        Sila lengkapkan No Telefon anda.
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Alamat</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="edit_alamat" aria-describedby="inputGroupPrepend" name="alamat" required>
                                      <div class="invalid-feedback">
                                        Sila lengkapkan Alamat anda.
                                      </div>
                                    </div>
                                </div>

                                <br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="action_query/delete_staff.php" method="POST">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" class="user_id" name="userid" value="">
                                    Are you sure you want to delete your staff?
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>

                            </form>

                        </div>
                      </div>
                    </div>

        		</div>
        	</div>
        </div>

<script>
$(document).ready(function() {
  $('#boxNoti').hide();

    $('#table_id').DataTable();

    $('.delete_data').on('click', function(){
        $('.user_id').val();
        let id = $(this).data('user-id');
        $('.user_id').val(id);
    });

    $('.edit_data').on('click', function(){
        let id = $(this).data('user-id');

        $.ajax({
            type: "POST",
            url: "action_query/specific_staff.php",
            data: {
                id: id,
            },
            dataType: 'JSON',
            success: function(resultData){
                $('#edit_id').val(resultData['id']);
                $('#edit_nama').val(resultData['name']);
                $('#edit_email').val(resultData['email']);
                $('#edit_tel').val(resultData['phone']);
                $('#edit_alamat').val(resultData['alamat']);
            },
            error: function(){
            }
        });
    });

    $(".dropdown-btn").on('click', function(){
        $(".dropdown-container").toggleClass('show-menu');
    });
    $('.notification_toggle').on('click', function(){
                        // alert('dwa');
                        $('#boxNoti').toggle();
                    });

});

</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/main.js"></script>
        
    </body>
</html>
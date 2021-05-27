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

$result = mysqli_query($dbhandle, "SELECT * FROM students");

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

        
        <title>Maklumat Murid</title>
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
                    <a href="maklumat murid.php" class="nav__link active">
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
        <h1>Maklumat Murid</h1>
            <br>
        <div class="container">
            <div class="row clearfix">
            	<div class="col-md-12 table-responsive">

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>MyKid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($value as $data){
                                    echo "<tr>";
                                    echo "<td>".ucwords($data[1])."</td>";
                                    echo "<td>".$data[2]."</td>";
                                    echo '<td>
                                            <button class="btn btn-primary btn-sm rounded-0 preview_data" type="button" data-toggle="tooltip" data-placement="top" title="Preview" data-bs-toggle="modal" data-bs-target="#previewModal" data-user-id="'.$data[0].'"><i class="fa fa-eye"></i></button>
                                        </td>';
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                     <!-- Preview Modal -->
                     <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="action_query/update_staff.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Butiran Pelajar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="edit_id" name="id" readonly>

                                    <label for="validationCustom01" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Umur</label>
                                    <input type="email" class="form-control" id="umur" name="email" readonly>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">No.MyKid</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="mykid" aria-describedby="inputGroupPrepend" name="notelefon" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Tarikh Lahir</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="tarikh_lahir" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Jantina</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="jantina" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">No Sijil Lahir</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="sijil_lahir" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Kewarganegaraan</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="kewarganegaraan" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Agama</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="agama" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Alamat</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="alamat" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Maklumat Penjaga</h5>
                                </div>

                                <!-- Penjaga section -->

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Nama</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="penjaga_nama" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">No Tel</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="penjaga_no" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Pekerjaan</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="penjaga_pekerjaan" aria-describedby="inputGroupPrepend" name="alamat" readonly>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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
    $('#table_id').DataTable();


    $('.preview_data').on('click', function(){
        let id = $(this).data('user-id');

        $.ajax({
            type: "POST",
            url: "action_query/specific_student.php",
            data: {
                id: id,
            },
            dataType: 'JSON',
            success: function(resultData){
                $('#nama').val(resultData['name']);
                $('#umur').val(resultData['age']);
                $('#mykid').val(resultData['mykid']);
                $('#tarikh_lahir').val(resultData['dob']);
                $('#jantina').val(resultData['gender']);
                $('#sijil_lahir').val(resultData['idNo']);
                $('#kewarganegaraan').val(resultData['nationality']);
                $('#agama').val(resultData['religion']);
                $('#alamat').val(resultData['address']);
                $('#penjaga_nama').val(resultData['guardian']);
                $('#penjaga_no').val(resultData['phone']);
                $('#penjaga_pekerjaan').val(resultData['work']);
                console.log(resultData);
            },
            error: function(){
            }
        });
    });

    $(".dropdown-btn").on('click', function(){
        $(".dropdown-container").toggleClass('show-menu');
    });

    $('.notification_toggle').on('click', function(){
                        $('#boxNoti').toggle();
                    });

                  $('#boxNoti').hide();

});

</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/main.js"></script>
        
    </body>
</html>
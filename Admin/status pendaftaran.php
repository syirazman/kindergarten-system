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

        
        <title>Status Pendaftaran</title>
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
                        <a href="status pendaftaran.php" class="nav__link active">
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
        <h1>Status Pendaftaran</h1>
            <br>
        <div class="container">
            <div class="row clearfix">
            	<div class="col-md-12 table-responsive">

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tarikh Daftar</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($value as $data){
                                    if($data[21] == 'processing'){
                                        $status = "<span class='badge warning'>".ucwords($data[21])."</span>";
                                    } else if ($data[21] == 'rejected'){
                                        $status = "<span class='badge warning' style='background-color:red; color:white;'>".ucwords($data[21])."</span>";
                                    } else {
                                        $status = "<span class='badge success'>Enrollment</span>";
                                    }
                                    
                                    echo "<tr>";
                                    echo "<td>".ucwords($data[1])."</td>";
                                    echo "<td>".$data[20]."</td>";
                                    echo "<td>".$data[22]."</td>";
                                    echo "<td>".$status."</td>";
                                    echo '<td>
                                            <button class="btn btn-primary btn-sm rounded-0 edit_status" type="button" data-toggle="tooltip" data-placement="top" title="Preview" data-bs-toggle="modal" data-bs-target="#editModal" data-user-id="'.$data[0].'"><i class="fa fa-edit"></i></button>
                                        </td>';
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                     <!-- Preview Modal -->
                     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="edit_id" name="id" readonly>
                                    <label for="validationCustom01" class="form-label label_name">Nama : <span class="stud_name"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label label_daftar">Tarikh Daftar : <span class="tarikh_daftar"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="validationCustom01" class="form-label">
                                                Kelas :
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-select" id="classStud" required>
                                                <option label="Please Select" value=""></option>
                                                <option value="Aman">Aman</option>
                                                <option value="Cerdas">Cerdas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="validationCustom01" class="form-label">
                                                Status :
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-select" id="status" required>
                                                <option label="Please Select" value=""></option>
                                                <option value="enroll" style="background-color:green; color:white;">Enroll</option>
                                                <option value="rejected" style="background-color:red; color:white;">Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-primary">Submit</button>
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


    $('.edit_status').on('click', function(){
        let id = $(this).data('user-id');
        $('#edit_id').val(id);

        $( ".stud_name" ).remove();
        $( ".tarikh_daftar" ).remove();
        $.ajax({
            type: "POST",
            url: "action_query/specific_student.php",
            data: {
                id: id,
            },
            dataType: 'JSON',
            success: function(resultData){
                $(".label_name").append("<span class='stud_name'>"+resultData['name']+"</span>");
                $(".label_daftar").append("<span class='tarikh_daftar'>"+resultData['date_register']+"</span>");
                console.log(resultData);
            },
            error: function(){
            }
        });
    });

    $('#status').on('change', function(){
        if($(this).val() == 'rejected'){
            $('#classStud').prop('required',false);
        } else {
            $('#classStud').prop('required',true);
        }
    });

    $('form').on('submit', function(e){
        e.preventDefault();
        let id = $('#edit_id').val();
        let classStud = $('#classStud').val();
        let status = $('#status').val();

        if(status == 'rejected'){
            classStud = '';
        }

        $.ajax({
            type: "POST",
            url: "action_query/update_status_student.php",
            data: {
                stud_id: id,
                class: classStud,
                status: status,
            },
            dataType: 'JSON',
            success: function(resultData){
                // console.log(resultData);
                location.reload();
            },
            error: function(){
                location.reload();
            }
        });
        // console.log(id)
    })

    $('#boxNoti').hide();

    
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
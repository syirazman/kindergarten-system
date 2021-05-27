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

$muridAtt = mysqli_query($dbhandle, "SELECT * FROM kehadiran_pelajar");

$muridAtts = mysqli_fetch_all($muridAtt);

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
        <!-- Button print function -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js "></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

        
        <title>Laporan Kehadiran Murid</title>
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

        <!----Laporan Kehadiran(guru) section--->
        <h1>Laporan Kehadiran Murid</h1>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ID Murid</th>
                                <th>Nama</th>
                                <th>Tarikh</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($muridAtts as $murid) { 
                            $IDMurid = $murid[1];
                            $dataMurid = mysqli_query($dbhandle, "SELECT * FROM students WHERE id='$IDMurid' LIMIT 1");
                            $murid2 = mysqli_fetch_assoc($dataMurid);
                        ?>
                            <tr>
                                <td><?= str_pad($IDMurid, 4, '0', STR_PAD_LEFT) ?></td>
                                <td><?= ucfirst($murid2['name']) ?></td>
                                <td><?= $murid[2] ?></td>
                                <td><?= $murid[3] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <script>
              $(document).ready(function(){
                $('#boxNoti').hide();

                $(".dropdown-btn").on('click', function(){
                    $(".dropdown-container").toggleClass('show-menu');
                });

                $('#table_id').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf', 'print'
                    ]
                });

                $('.notification_toggle').on('click', function(){
                        // alert('dwa');
                        $('#boxNoti').toggle();
                    });
              })
        </script>
         <!--===== MAIN JS =====-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>/kindergarten-system/src/main.js"></script>
    </body>
</html>
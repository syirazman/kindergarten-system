<?php <?php include("/User/db_conn.php");

session_start();

$userid = $_SESSION['id'];

$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE jawatan='Guru'");

$value = mysqli_num_rows($result);

$datamuridlatest = mysqli_query($dbhandle, "SELECT * FROM students WHERE status = 'processing' order by id DESC LIMIT 5");


$bilmurid = mysqli_query($dbhandle, "SELECT * FROM students");
$ttlmurid = mysqli_num_rows($bilmurid);

$valuemurid = mysqli_fetch_all($datamuridlatest);

$class = mysqli_query($dbhandle, "SELECT * FROM classes");

$ttlClass = mysqli_num_rows($class);

$parent = mysqli_query ($dbhandle, "SELECT * FROM parent");

$ttlparent = mysqli_num_rows($parent);

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
        <link rel="stylesheet" href="/src/text.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <title>Admin Dashboard</title>
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
                        <a href="user.php" class="nav__link active">
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
		
<!----dashboard section--->
<div class="card">
        <h1>Dashboard</h1>
                  <h2>My account</h2>
                  <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Bilangan Guru</h5>
                            <h4><?php echo $value; ?> orang</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="Maklumatguru.php">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-reload"></span>
                        <div>
                            <h5>Bilangan Murid</h5>
                            <h4><?php echo $ttlmurid; ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="maklumat%20murid.php">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-check-box"></span>
                        <div>
                            <h5>Bilangan Kelas</h5>
                            <h4><?php echo $ttlClass ?></h4>
                        </div>
                    </div>
                </div>
            </div>
</div>
            <section class="recent">
                    <div class="activity-card">
                        <h3>Senarai Murid Baharu</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Murid</th>
                                        <th>Tarikh Daftar</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                        foreach($valuemurid as $murid){
                                            echo "<tr>";
                                                echo "<td>".$i."</td>";
                                                echo "<td>".$murid[1]."</td>";
                                                echo "<td>".$murid[20]."</td>";
                                                echo "<td><span class='badge warning'>".ucwords($murid[21])."</span></td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        <script>
              $(document).ready(function(){
                  $('#boxNoti').hide();
                    $(".dropdown-btn").on('click', function(){
                        $(".dropdown-container").toggleClass('show-menu');
                    });

                    $('.notification_toggle').on('click', function(){
                        // alert('dwa');
                        $('#boxNoti').toggle();
                    });

              })
        </script>
        <!--===== MAIN JS =====-->
        <script src="/src/main.js"></script>
    </body>
</html>


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

$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE jawatan='Guru'");

$value = mysqli_num_rows($result);

$bilmurid = mysqli_query($dbhandle, "SELECT * FROM students");

$ttlmurid = mysqli_num_rows($bilmurid);

$valuemurid = mysqli_fetch_all($bilmurid);

$class = mysqli_query($dbhandle, "SELECT * FROM classes");

$ttlClass = mysqli_num_rows($class);

$parent = mysqli_query ($dbhandle, "SELECT * FROM parent");

$ttlparent = mysqli_num_rows($parent);

$KelasAman = mysqli_query($dbhandle, "SELECT * FROM students WHERE kelas='Aman'");
$ttlKelasAman = mysqli_num_rows($KelasAman);

$KelasCerdas = mysqli_query($dbhandle, "SELECT * FROM students WHERE kelas='Cerdas'");
$ttlKelasCerdas = mysqli_num_rows($KelasCerdas);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="src/css/dashboard.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    </head>
    <body>
    <?php include 'navbar.php' ?>
<!----profile section--->
    <h1>Dashboard <?php echo $_SESSION['name']; ?></h1>
              <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <span class="ti-clipboard"></span>
                    <div>
                        <h5>Jumlah Subjek</h5>
                        <h4>10 Subjek</h4>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="ti-user"></span>
                    <div>
                        <h5>Bilangan Murid</h5>
                        <h4><?php echo $ttlmurid; ?></h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="maklumat_murid.php">View all</a>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="ti-blackboard"></span>
                    <div>
                        <h5>Bilangan Kelas</h5>
                        <h4><?php echo $ttlClass ?></h4>
                    </div>
                </div>
            </div>
        </div>

<section class="recent">
        <div class="activity-card">
            <h3>Senarai Kelas</h3>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kelas</th>
                            <th>Jumlah Murid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Aman</td>
                            <td><?php echo $ttlKelasAman; ?> Orang</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Cerdas</td>
                            <td><?php echo $ttlKelasCerdas; ?> Orang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</section>

       
    </body>
</html>
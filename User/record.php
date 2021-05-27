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

$cikguAtt = mysqli_query($dbhandle, "SELECT * FROM kehadiran_cikgu WHERE users_id = '$userid'");

$cikguAtts = mysqli_fetch_all($cikguAtt);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="src/js/jquery-3.2.1.min.js"></script>

        <!-- ===== BOX ICONS ===== -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- ===== CSS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script src="src/js/bootstrap.js"></script>
        <!-- <script src="src/js/main.js"></script> -->
        <!-- Button print function -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js "></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

        <title>Rekod Kehadiran</title>
    </head>
    <body>
        <?php include 'navbar.php' ?> 
        <h1>Rekod Kehadiran</h1>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ID Staf</th>
                                <th>Nama</th>
                                <th>Tarikh</th>
                                <th>Daftar Masuk</th>
                                <th>Daftar Keluar</th>
                                <th>Jumlah Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($cikguAtts as $cikgu) { 
                            $IDCikgu = $cikgu[1];
                            $dataCIkgu = mysqli_query($dbhandle, "SELECT * FROM profile WHERE users_id='$IDCikgu' LIMIT 1");
                            $cikgu2 = mysqli_fetch_assoc($dataCIkgu);
                        ?>
                            <tr>
                                <td><?= str_pad($IDCikgu, 4, '0', STR_PAD_LEFT) ?></td>
                                <td><?= ucfirst($cikgu2['name']) ?></td>
                                <td><?= $cikgu[2] ?></td>
                                <td><?= $cikgu[3] ?></td>
                                <td><?= $cikgu[4] ?></td>
                                <td><?= $cikgu[5] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
		<!--===== MAIN JS =====-->
    <script>
      $(document).ready(function(){
          $('#table_id').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf', 'print'
                    ]
                });
      })
    </script>
</body>
</html>

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

$result = mysqli_query($dbhandle, "SELECT * FROM profile WHERE users_id = '$userid'");

$userLogin = mysqli_fetch_array($result);


$amanData = mysqli_query($dbhandle, "SELECT * FROM students WHERE kelas = 'Aman'");

$cerdasData = mysqli_query($dbhandle, "SELECT * FROM students WHERE kelas = 'Cerdas'");



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
    <title>Kehadiran Murid</title>
</head>
<body> 
        <?php include 'navbar.php' ?>
        
        <h1>Kehadiran Murid</h1>

    <div class="container">

    <div class="row" style="font-size:20px;">
            <div class="col-lg-2">
                Nama Guru :
            </div>
            <div class="col-lg-10">
                <?= $userLogin['name'] ?>
            </div>
        </div>
        <br>
        <div class="row" style="font-size:20px;">
            <div class="col-lg-2">
                Kelas :
            </div>
            <div class="col-lg-5">
                <select class="form-control" aria-label="Default select example" id="class_select" style="width:100%;">
                    <option value="Aman">Aman</option>
                    <option value="Cerdas">Cerdas</option>
                </select>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <br>
        <div class="row" style="font-size:20px;">
            <div class="col-lg-2">
                Tarikh :
            </div>
            <div class="col-lg-5">
                <!-- <input type="date" class="form-control" id="tarikh_attd" name="tarikh" required> -->
                <?= date('d M Y') ?>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <br>
        
        <div class="row class_aman">
            <div class="col-md-12 table-responsive">
            <form action="" method="post" id="form_aman">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>ID Murid</th>
                            <th>Nama Murid</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($amanData as $aman){ 
                        $userID = $aman['id'];
                        $date = date('d M Y');
                        $lol = mysqli_query($dbhandle, "SELECT * FROM kehadiran_pelajar WHERE student_id ='$userID' AND date_time = '$date' LIMIT 1");
                        $test = mysqli_fetch_assoc($lol);   
                        // echo json_encode($test);

                        if($test['status'] == ''){
                            $status = '
                            <select class="form-control aman_data" name="status[]">
                                <option value="">Select Attandenace</option>
                                <option value="insert/'.$userID.'/attend" style="background-color:green">Attend</option>
                                <option value="insert/'.$userID.'/absent" style="background-color:red; color:white;">Absent</option>
                            </select>';
                        } else if($test['status'] == 'attend'){
                            $status = '
                            <select class="form-control aman_data" name="status[]">
                                <option value="update/'.$userID.'/attend" selected style="background-color: green">Attend</option>
                                <option value="update/'.$userID.'/absent" style="background-color: red; color:white;">Absent</option>
                            </select>';
                        } else {
                            $status = '
                            <select class="form-control aman_data" name="status[]">
                                <option value="update/'.$userID.'/attend" style="background-color:green;" >Attend</option>
                                <option value="update/'.$userID.'/absent" selected style="background-color:red;color:white;">Absent</option>
                            </select>';
                        }
                        ?>
                        <tr>
                            <td><?= str_pad($aman['id'], 4, '0', STR_PAD_LEFT);; ?></td>
                            <td><?= $aman['name'] ?></td>
                            <td><?= $status ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <center>
                <button type="submit" class="button btn-primary">Submit Attendance</button>
                </center>
                </form>
            </div>
        </div>

        <div class="row class_cerdas" style="display:none;">
            <div class="col-md-12 table-responsive">
                <form action="" method="post" id="form_cerdas">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>ID Murid</th>
                            <th>Nama Murid</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($cerdasData as $cerdas){ 
                        $userID = $cerdas['id'];
                        $date = date('d-m-Y');
                        $lol = mysqli_query($dbhandle, "SELECT * FROM kehadiran_pelajar WHERE student_id ='$userID' AND date_time = '$date' LIMIT 1");
                        $test = mysqli_fetch_assoc($lol);   
                        
                        if($test['status'] == ''){
                            $status = '
                            <select class="form-control cerdas_data" name="status[]">
                                <option value="">Select Attandenace</option>
                                <option value="insert/'.$userID.'/attend" style="background-color:green">Attend</option>
                                <option value="insert/'.$userID.'/absent" style="background-color:red; color:white">Absent</option>
                            </select>';
                        } else if($test['status'] == 'atend'){
                            $status = '
                            <select class="form-control cerdas_data" name="status[]">
                                <option value="update/'.$userID.'/attend" selected style="background-color:green">Attend</option>
                                <option value="update/'.$userID.'/absent" style="background-color:red; color:white">Absent</option>
                            </select>';
                        } else {
                            $status = '
                            <select class="form-control cerdas_data" name="status[]">
                                <option value="update/'.$userID.'/attend"  style="background-color:green">Attend</option>
                                <option value="update/'.$userID.'/absent" selected style="background-color:red; color:white;">Absent</option>
                            </select>';
                        }
                        ?>
                        <tr>
                            <td><?= str_pad($cerdas['id'], 4, '0', STR_PAD_LEFT);; ?></td>
                            <td><?= $cerdas['name'] ?></td>
                            <td><?= $status ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <center>
                <button type="submit" class="button btn-primary">Submit Attendance</button>
                </center>
                </form>
            </div>
        </div>


    </div>

    <!--===== MAIN JS =====-->
    <script>
      $(document).ready(function(){
        //   alert('dwa');
        $('#class_select').on('change',function(){
            // console.log($(this).val());

            if($(this).val() == 'Aman'){
                $('.class_aman').show();
                $('.class_cerdas').hide();
            }else{
                $('.class_aman').hide();
                $('.class_cerdas').show();
            }
        });

        $('#form_aman').on('submit', function(e){
            e.preventDefault();
            $('.aman_data').each(function(){
                let value = $(this).val();
                let arrayData = value.split('/');

                console.log(arrayData);
                $.ajax({
                    type: "POST",
                    url: "action_query/submit_attandence.php",
                    data: {
                        action: arrayData[0],
                        id: arrayData[1],
                        status: arrayData[2],
                    }
                });
            });
            location.reload();
        });

        $('#form_cerdas').on('submit', function(e){
            e.preventDefault();
            $('.cerdas_data').each(function(){
                let value = $(this).val();
                let arrayData = value.split('/');

                console.log(arrayData);
                $.ajax({
                    type: "POST",
                    url: "action_query/submit_attandence.php",
                    data: {
                        action: arrayData[0],
                        id: arrayData[1],
                        status: arrayData[2],
                    }
                });
            });
            location.reload();
        });

      });
    </script>
</body>
</html>

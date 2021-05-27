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

$result = mysqli_query($dbhandle, "SELECT * FROM class_activity");

$value = mysqli_fetch_all($result);


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

        
        <title>Rekod Aktiviti</title>
    </head>
<body id="body-pd">  
    <?php include 'navbar.php' ?>

        <!----Maklumat Guru section--->
        <h1>Rekod Aktiviti</h1>
            <br>
        <div class="container">
            <div class="row clearfix">
            	<div class="col-md-12 table-responsive">

                    <p>
                      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add New
                      </a>
                    </p>

                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Tajuk</th>
                                <th>Kelas</th>
                                <th>Tarikh</th>
                                <th>Masa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($value as $data){
                                    echo "<tr>";
                                    echo "<td>".$data[3]."</td>";
                                    echo "<td>".$data[1]."</td>";
                                    echo "<td>".$data[4]."</td>";
                                    echo "<td>".$data[2]."</td>";
                                    echo '<td>
                                            <button class="btn btn-success btn-sm rounded-0 edit_data" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal" data-user-id="'.$data[0].'"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm rounded-0 delete_data" type="button" data-toggle="tooltip" data-placement="top" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="'.$data[0].'"><i class="fa fa-trash"></i></button>
                                        </td>';
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Add New Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="action_query/add_activity.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rekod Aktiviti</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Tajuk</label>
                                    <input type="text" class="form-control" id="add_tajuk" name="tajuk" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Masa</label>
                                    <input type="text" class="form-control" id="add_masa" name="masa" required>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Tarikh</label>
                                    <input type="date" class="form-control" id="add_tarikh" name="tarikh" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Kelas</label>
                                    <div class="input-group has-validation">
                                    <select class="form-select" aria-label="Default select example" name="kelas" required>
                                      <option label="Please select class" selected></option>
                                      <option value="Aman">Aman</option>
                                      <option value="Cerdas">Cerdas</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Catatan</label>
                                    <div class="input-group has-validation">
                                    <textarea class="form-control" id="add_cacatan" name="remarks" rows="3"></textarea>
                                    </div>
                                </div>

                                <br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="action_query/update_activity.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rekod Aktiviti</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="edit_id" name="id" required>

                                    <label for="validationCustom01" class="form-label">Tajuk</label>
                                    <input type="text" class="form-control" id="edit_tajuk" name="edit_tajuk" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Masa</label>
                                    <input type="text" class="form-control" id="edit_masa" name="edit_masa" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Tarikh</label>
                                    <input type="date" class="form-control" id="edit_tarikh" name="edit_tarikh" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Kelas</label>
                                    <div class="input-group has-validation">
                                      <select class="form-select" aria-label="Default select example" id="edit_kelas" name="edit_kelas" required>
                                        <option label="Please select class" selected></option>
                                        <option value="Aman">Aman</option>
                                        <option value="Cerdas">Cerdas</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Catatan</label>
                                    <div class="input-group has-validation">
                                    <textarea class="form-control" id="edit_cacatan" rows="3" name="edit_cacatan"></textarea>
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

                            <form action="action_query/delete_activity.php" method="POST">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" class="user_id" name="userid" value="">
                                    Are you sure you want to delete this activity?
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
                    url: "action_query/specific_activity.php",
                    data: {
                        id: id,
                    },
                    dataType: 'JSON',
                    success: function(resultData){
                        $('#edit_id').val(resultData['id']);
                        $('#edit_tajuk').val(resultData['topic']);
                        $('#edit_masa').val(resultData['time']);
                        $('#edit_tarikh').val(resultData['date']);
                        $('#edit_kelas').val(resultData['class']);
                        $('#edit_cacatan').val(resultData['remarks']);
                        console.log(resultData);
                    },
                    error: function(){
                    }
                });
            });

            $(".dropdown-btn").on('click', function(){
                $(".dropdown-container").toggleClass('show-menu');
            });


        });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
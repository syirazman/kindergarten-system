<html>
 <?php include("User/header.php"); ?>
  <body style="background-color: whitesmoke">
  <center><img src="User/img/258425.svg" alt="tadika" style="padding-top: 30px; width: 150x; height: 150px"></center>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Registration Page</div>
                      
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="signup-check.php" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value=""  placeholder="username"  autofocus required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
									
								  <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user-friends"></i></span>
                                        <input id="login-user_level" type="number" class="form-control" name="user_level" placeholder="user level" required>
                                        </div>
                                        <h1 style="font-size: 13px">please choose number 2 for user-level.</h1>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                
									<input type="button" class="btn btn-success pull-right" style='margin-left:25px' value="Cancel" 
									 title="Click to return to main page." onclick="location.href = 'index.php';">            															
									  <button type="submit" class="btn btn-success pull-right" title="Click here to save the records in the database." >
									  <span class="fas fa-check"></span> Ok</button>
								     
                                 	  							  
									   </div>
								</div>
							</form>
                         </div>
					</div>
				</div> 
			</div> <!-- /container -->

 <script>
    $(document).ready(function(){
        $('form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "signup-check.php",
                data: {
                    username: $('#login-username').val(),
                    password: $('#login-password').val(),
                    user_level: $('#login-user_level').val()
                },
                success: function(resultData){
                    $('form').trigger("reset");
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
        })
    })
 </script>
 </html>
 





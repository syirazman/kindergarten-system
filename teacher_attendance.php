<?php include("User/header.php"); ?>
  <body style="background-color: whitesmoke">
  <center><img src="User/img/258425.svg" alt="tadika" style="padding-top: 30px; width: 150x; height: 150px"></center>
    <div class="container">    

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                             <center><h4>Attandence for <?= date('d-m-Y')?></h4></center>       
                            
                        <form action="" method="post" id="form_checkin">
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

									  <button type="submit" class="btn btn-success pull-right" title="Click here to Login in the system." >
                                            Submit
                                      </button>
								</div>
							</form>
                         </div>
					</div>
				</div> 
			</div> <!-- /container -->
<script>
$(document).ready(function(){
    // alert('dwa');
    $("#form_checkin").on('submit',function(e){
        e.preventDefault();
        let username = $('#login-username').val();
        let password = $('#login-password').val();
        $.ajax({
                type: "POST",
                url: "action_query/attendance_teacher.php",
                data: {
                    username:username,
                    password:password
                },
                dataType: "json",
                success: function(response){
                    console.log(response.status);
                    if(response.status == 'error'){
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    } else{
                        $('form').trigger("reset");
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        );
                    }
                },
            });
    });
})
</script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>




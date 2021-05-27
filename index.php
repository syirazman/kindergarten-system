<?php include("User/header.php"); ?>
  <body style="background-color: whitesmoke">
  <center><img src="User/img/258425.svg" alt="tadika" style="padding-top: 30px; width: 150x; height: 150px"></center>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login Security Page</div>
                      
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="login.php" method="post">
                                    
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

                                    <div class="col-sm-12 controls">
                                
									<input type="button" class="btn btn-success pull-right" style='margin-left:25px' 
									  value="Register"  title="Click here to register to the system." onclick="location.href = 'signup.php';">            															
									  <button type="submit" class="btn btn-success pull-right" title="Click here to Login in the system." >
									  <span class="fas fa-check"></span> Login</button>
								     
                                 	  							  
									   </div>
								</div>
							</form>
                         </div>
					</div>
				</div> 
			</div> <!-- /container -->

    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>




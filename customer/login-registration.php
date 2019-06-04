<!DOCTYPE html>
<html lang="en">

  <head>
	<?php require("include/head.php"); ?>
  </head>

  <body id="page-top" style="font-family: 'Merriweather', serif;">

	<?php require("include/nav.php"); ?>
	
    <!-- Header -->
    <header class="masthead d-flex" style="height: 100%;">
      <div class="container text-center my-auto">
        <h1 class="mb-1" style="font-size: 3em;">Shake Mart</h1>
		<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
				<div class="panel-heading">
					<div class="panel-title">Sign In</div>
					<div style="float:right; font-size: 50%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
				</div>     

				<div style="padding-top:30px" class="panel-body" >

					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
					<form id="loginform" class="form-horizontal" role="form" action="login_process.php" method="POST">
								
						<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" required>                                        
								</div>
							
						<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
								</div>
				

							<div style="margin-top:10px" class="form-group">
								<!-- Button -->

								<div class="col-sm-12 controls">
								  <a id="btn-login" href="#" class="btn btn-success" onclick="document.getElementById('loginform').submit()">Login</a>

								</div>
							</div>


							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Don't have an account! <br>
									<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
										Sign Up Here
									</a>
									</div>
								</div>
							</div>    
						</form>     
					</div>                     
				</div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" action="register_process.php" method="POST">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="gender" class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="gender">
                                            <option value='' selected> --- </option>
                                            <option value='Male'> Male </option>
                                            <option value='Female'> Female </option>
                                        </select>    
                                    </div>
                                </div>
                                                                                                     
								<div class="form-group">
                                    <label for="age" class="col-md-3 control-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="age">
                                    </div>
                                </div>                                    

								<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>                                    
								
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    </header>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

  </body>

</html>

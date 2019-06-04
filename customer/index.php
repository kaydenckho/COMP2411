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
        <h3 class="mb-5" style="font-size: 0.9em;">
          <em>Free Coupon Everyday, Why not?</em>
        </h3>
		<div style="margin: 20px;">
			<h2 style="color: #CD853F; font-size: 1.5em;">Today's Grand Prize:</h2>
			<img src="img/free_coupon.jpg" style="width:250px;">
		</div>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="draw.php">Draw Now!</a>
      </div>
      <div class="overlay"></div>
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

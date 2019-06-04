<?php
/*
    if (!isset($_COOKIE["token"])) {
        header("Location: login-registration.php");
    }
    */
?>
<html lang="en">

  <head>
		<?php require("include/head.php"); ?>
  </head>

  <body id="page-top" style="font-family: 'Merriweather', serif;">

	<?php require("include/nav.php"); ?>
	
    <!-- Header -->
    <header class="masthead d-flex" style="height: 100%">
      <div class="container text-center my-auto">
        <h1 class="mb-1" style="font-size: 3em;">Shake Mart</h1>
        <h3 class="mb-5" style="font-size: 0.9em;">
          <em>Click Target Button to get your daily coupon</em>
        </h3>
		<div style="margin: 20px;">
			<h2 id="message" style="color: #CD853F; font-size: 1.5em;"></h2>
			<button id="share" class="btn btn-xl js-scroll-trigger" style="margin: 10px auto; padding: 10px 15px; display: none; background-color: #45A147; color: #FFF;" onclick="geturl();" data-toggle="modal" data-target="#modalSubscriptionForm">Share</button>
			<img name="canvas" src="img/gift_animation.gif" style="width:250px;">
			<span id="prize" style="display: none;"></span>
		</div>
		<div id="timer" style="color: red;"></div>
        <i class="btn btn-primary js-scroll-trigger fas fa-bullseye" style="font-size: 20px;" onclick="randomprize(); this.onclick = null;"></i>
      </div> 
      <div class="overlay"></div>
    </header>
	
	<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">Share Link</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3">
					<div class="md-form mb-5">
						<i class="fas fa-link prefix grey-text"></i>
						<label data-error="wrong" data-success="right" for="form3">Get URL</label>
						<textarea class="form-control" rows="5" id="sharelink"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

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
	
	<script>
		function randomprize() {
			var prize = document.getElementById("prize");
			prize.innerHTML = Math.floor((Math.random() * 10) + 1);
			document.canvas.src = "img/" + prize.innerHTML +".jpeg";
			
			var sharelink = "https://tinycrate.ddns.net/shakemart/" + "coupons/" + prize.innerHTML + ".jpeg";
			document.getElementById('sharelink').value = sharelink;
						
			var message = document.getElementById("message");
			message.innerHTML = "Congratulation!";
			
			var count = 43200;
			var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

			function timer() {
				count = count - 1;
				if (count == -1) {
					clearInterval(counter);
					return;
				}

				var seconds = count % 60;
				var minutes = Math.floor(count / 60);
				var hours = Math.floor(minutes / 60);
				minutes %= 60;
				hours %= 60;

				document.getElementById("timer").innerHTML = "Next Discount Arrival in " + hours + ":" + minutes + ":" + seconds; // watch for spelling
			}
			
			//document.getElementById('share').style.display="block"; 

		}
		
		
	</script>
	
	<script type="text/javascript" src="https://cdn.rawgit.com/alexgibson/shake.js/master/shake.js"></script>
	<script>  
		//listen to shake event
		var shakeEvent = new Shake({threshold: 15});
		shakeEvent.start();
		window.addEventListener('shake', function(){
			var prize = document.getElementById("prize");
			prize.innerHTML = Math.floor((Math.random() * 10) + 1);
			document.canvas.src = "img/" + prize.innerHTML +".jpeg";
			
			var sharelink = "https://tinycrate.ddns.net/shakemart/" + "coupons/" + prize.innerHTML + ".jpeg";
			document.getElementById('sharelink').value = sharelink;
						
			var message = document.getElementById("message");
			message.innerHTML = "Congratulation!";
			
			var count = 43200;
			var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

			function timer() {
				count = count - 1;
				if (count == -1) {
					clearInterval(counter);
					return;
				}

				var seconds = count % 60;
				var minutes = Math.floor(count / 60);
				var hours = Math.floor(minutes / 60);
				minutes %= 60;
				hours %= 60;

				document.getElementById("timer").innerHTML = "Next Discount Arrival in " + hours + ":" + minutes + ":" + seconds; // watch for spelling
			}
			
			//document.getElementById('share').style.display="block"; 

		}, false);

		//stop listening
		function stopShake(){
			shakeEvent.stop();
		}

		//check if shake is supported or not.
		if(!("ondevicemotion" in window)){alert("Not Supported");}
	</script>

  </body>

</html>

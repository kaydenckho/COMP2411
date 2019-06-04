<?php require_once "validate_login.php"; ?>

<html lang="en">
<head>
    <!-- Library dependencies -->
    <?php require_once "html_head.php"; ?>

    <!-- Title Page-->
    <title>ShakeMart - Manage Restaurant</title>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- Header -->
        <?php
        require_once "html_navbar.php";
        require_once "html_sidebar.php";
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php require_once "html_searchbar.php"; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content" style="margin-bottom: -16px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- DATA TABLE-->
						<section class="p-t-20">
							<div class="container">
								<center><h1>Advertising Plan Order</h1></center>
								<br>
								<hr>
								<br>
								<form action="order_processing.php" method="POST" enctype="multipart/form-data">
								  <div class="form-group row">
									<label for="title" class="col-sm-3 col-form-label">Advertising Campaign Title</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="title" name="title" placeholder="Please name a title for your new advertising plan" required>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="type" class="col-sm-3 col-form-label">Promotion Type</label>
									<div class="col-sm-9">
										<select class="form-control" id="type" name="type" onchange="calculate_budget()" required>
										  <option value="">---</option>
										  <option value="sweet">Sweet</option>
										  <option value="prize">Prize</option>
										  <option value="jackpot">Jackpot</option>
										</select>
										<small class="form-text text-muted">E.g. Sweet: HK$0.95 each, Prize: HK$0.9 each, Jackpot: HK$0.85 each</small>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="quantity" class="col-sm-3 col-form-label">Coupon Distribution</label>
									<div class="col-sm-9">
									  <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="How many coupon do you want to distribute?" onchange="calculate_budget()" required>
									<!--
										<input type="range" class="custom-range" id="quantity" min="100" max="10000" onchange="calculate_budget()">
									-->
									</div>
								  </div>
								  <div class="form-group row">
									<label for="coupon_title" class="col-sm-3 col-form-label">Coupon Title</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="coupon_title" name="coupon_title" placeholder="Please name a title for your coupon" required>
									  <small class="form-text text-muted">E.g. Free / 20% OFF / $5 OFF</small>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="coupon_content" class="col-sm-3 col-form-label">Coupon Content</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="coupon_content" name="coupon_content" placeholder="Please write a description for your coupon" required>
									  <small class="form-text text-muted">E.g. Cup Cake (Original Price: HK$15)</small>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="image" class="col-sm-3 col-form-label">Image Upload</label>
									<div class="col-sm-9">
										<div class="custom-file">
										  <input type="file" class="custom-file-input" id="image" name="image" required>
										  <label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="budget" class="col-sm-3 col-form-label">Budget Total</label>
									<div class="col-sm-9" style="margin-top: 4px;">
										<span>HKD $</span><span id="output"></span>
										<!--
										<div class="input-group mb-3">
										  <div class="input-group-prepend">
											<span class="input-group-text">$</span>
										  </div>
											  <input type="number" class="form-control" id="output" aria-label="Amount (to the nearest dollar)" style="height: 40px;">
										  <div class="input-group-append">
											<span class="input-group-text">.00</span>
										  </div>
										</div>	
										-->					
									</div>
								  </div>
								  <div class="form-group row">
									<label for="cardno" class="col-sm-3 col-form-label">Card Number</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="cardno" name="cardno" placeholder="" required>
									</div>
								  </div>
								  <div class="form-group row">
									<label for="cardno" class="col-sm-3 col-form-label">Expiration Date</label>
									<div class="col-sm-9">
									
									  <select class="custom-select" id="expirationDateMonth" name="expirationDateMonth" style="width: 40%;" required>
										<option value="01">January - 01</option>
										<option value="02">February - 02</option>
										<option value="03">March - 03</option>
										<option value="04">April - 04</option>
										<option value="05">May - 05</option>
										<option value="06">June - 06</option>
										<option value="07">July - 07</option>
										<option value="08">August - 08</option>
										<option value="09">September - 09</option>
										<option value="10">October - 10</option>
										<option value="11" selected="selected">November - 11</option>
										<option value="12">December - 12</option>
									  </select>
									  
									  
									  <select class="custom-select" id="expirationDateYear" name="expirationDateYear" style="width: 30%;" required>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021" selected="selected">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
										<option value="2030">2030</option>
										<option value="2031">2031</option>
										<option value="2032">2032</option>
										<option value="2033">2033</option>
										<option value="2034">2034</option>
										<option value="2035">2035</option>
										<option value="2036">2036</option>
										<option value="2037">2037</option>
										<option value="2038">2038</option>
									  </select>
									  
									</div>
								  </div>
								  
								  <div class="form-group row">
									<label for="cw" class="col-sm-3 col-form-label">Security Code (CW)</label>
									<div class="col-sm-9">
									  <input type="password" class="form-control" id="cw" name="cw" placeholder="" required>
									</div>
								  </div>


								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-success">Submit</button>

									  <button type="reset" class="btn btn-primary">Reset</button>
									</div>
								  </div>
								</form>
							</div>							
						</section>
						<!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- JavaScript dependencies-->
    <?php require_once "html_footer.php"; ?>

	<!-- Custom JS -->
	<script>
		function calculate_budget() {
			var type = document.getElementById("type").value;
			var quantity = document.getElementById("quantity").value;
			var calculation = 0;
			
			if (type == "sweet") {
				calculation = quantity * 0.95;
			}
			else if (type == "prize") {
				calculation = quantity * 0.9;
			}
			else if (type == "jackpot") {
				calculation = quantity * 0.85;
			}
			
			document.getElementById("output").innerHTML = calculation;
		}
	</script>
</body>
</html>

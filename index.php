<!DOCTYPE html>
<html lang="en">

  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ShakeMart - Your Advertising Agent</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/loginform.css" rel="stylesheet">
    <link href="css/signupform.css" rel="stylesheet">
    <!-- Internal CSS -->
    <style>
    </style>


  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ShakeMart</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Instruction</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To ShakeMart</div>
			<div class="intro-heading text-uppercase" style="font-size: 18px; font-weight: 100;">
			  <?php
            $cookie_name = "msg";
            if(!isset($_COOKIE[$cookie_name])) {
                echo "Start &nbspcreating &nbspcoupons &nbspfor &nbspyour &nbsprestaurant &nbsptoday!";
            }
            else {
                echo $_COOKIE[$cookie_name];
            }
            ?>
        </div>
		  <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" onclick="document.getElementById('id02').style.display='block'">Sign Up</a>
          <a id="loginBtn" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" onclick="document.getElementById('id01').style.display='block'">Login</a>
<!-- The Modal login form -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="POST" action="login.php">

    <div class="container">
      <label for="uname"><b><span class="columnname">Username</span></b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b><span class="columnname">Password</span></b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#" style="color:#f44336;">password?</a></span>
    </div>
  </form>
</div>

<!-- The Modal signup form -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="POST" action="registration_action.php">

    <div class="container">
      <label for="uname"><b><span class="columnname">Username</span></b></label>
      <input type="text" placeholder="Your Username" name="uname" required>

      <label for="psw"><b><span class="columnname">Password</span></b></label>
      <input type="password" placeholder="Your Password" name="psw" required>

      <label for="Name"><b><span class="columnname">Restaurant Name</span></b></label>
      <input type="text" placeholder="Restaurant Name" name="Name" required>

      <label for="Email"><b><span class="columnname">Contact Email</span></b></label>
      <input type="email" placeholder="Email Address" name="Email" required>

      <label for="Type"><b><span class="columnname">Type of Restaurant</span></b></label>
      <input type="text" placeholder="Type of Restaurant" name="Type" required>

      <label for="Address"><b><span class="columnname">Address</span></b></label>
      <input type="text" placeholder="Address" name="Address" required>

      <label for="Description"><b><span class="columnname">Description</span></b></label>
      <input type="text" placeholder="Description" name="Description" required>

      <br></br>
      <label for="Opening time"><b><span class="columnname">Opening Time</span></b></label>
      <input type="time" name="openingTime" required>
      <br><br>
      <label for="Closing time"><b><span class="columnname">Closing time</span></b></label>
      <input type="time" name="closingTime" required>
      <br>

      <br></br>
      <label for="District"><b><span class="columnname">District</span></b></label>
      <select name="district">
        <option value="Islands">Islands</option>
        <option value="Kwai Tsing">Kwai Tsing</option>
        <option value="North">North</option>
        <option value="Sai Kung">Sai Kung</option>
        <option value="Sha Tin">Sha Tin</option>
        <option value="Tai Po">Tai Po</option>
        <option value="Tsuen Wan">Tsuen Wan</option>
        <option value="Tuen Mun">Tuen Mun</option>
        <option value="Yuen Long">Yuen Long</option>
        <option value="Kowloon City">Kowloon City</option>
        <option value="Kwun Tong">Kwun Tong</option>
        <option value="Sham Shui Po">Sham Shui Po</option>
        <option value="Wong Tai Sin">Wong Tai Sin</option>
        <option value="Yau Tsim Mong">Yau Tsim Mong</option>
        <option value="Central & Western">Central & Western</option>
        <option value="Eastern">Eastern</option>
        <option value="Southern">Southern</option>
        <option value="Kwun Tong">Kwun Tong</option>
        <option value="Wan Chai">Wan Chai</option>
      </select>
      <br></br>

      <label>
        <input type="checkbox" checked="checked" name="agree"><span style="color:black"> I agree with the <a href="#services" style="color:#f44336;">terms and conditions</a> </span>
      </label>

      <button type="submit">sign up</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Instruction</h2>
            <br><br><br>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-pen-fancy fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">1. Design Your Coupon</h4>
            <p class="text-muted">This requires some artwork & paperwork...</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">2. Select Advertising Plan</h4>
            <p class="text-muted">Sweet, Prize, or Jackpot
              <table class="text-muted" style="text-align: left; margin: 0 auto;">
                <tr>
                  <td>Sweet: &nbsp</td>
                  <td>Value Discount Type</td>
                </tr>
                <tr>
                  <td>Prize: &nbsp</td>
                  <td>% Discount Type</td>
                </tr>
                <tr>
                  <td>Jackpot: &nbsp</td>
                  <td>Free Discount Type</td>
                </tr>
              </table>
            </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">3. Leave the advertising hard work to us!</h4>
            <p class="text-muted">Surrounding potential customers<br>will soon visit your restaurants<br>& use the distributed E-Coupon.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <br><br><br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p>
                ShakeMart aims to provide restaurants which are in growing scales with preferential opportunities to promote their businesses and attract more potential customers. Our project focuses on 2 types of target audiences including customers who might consider dining in new restaurants they have never went before and restaurants which are currently in small to medium scale.
                Citizens using our application could have a chance to draw/shake a random restaurant coupon in their mobile phones everyday, but they are only allowed to use it after the lottery within the same day. The coupons involve 3 different categories which are "sweet", "prize", and "jackpot".
                Example details are as follows.
                "$10 OFF" is regarded as "sweet" (Based on the discount value),
                "30% OFF" is regarded as "prize" (Based on the discount percentage),
                "FREE" is regarded as "jackpot".
                Restaurants could decide the coupon category for their specific promotion activities each time.
                Also, our application would distribute the randomly drawn coupons according to their current location so as to facilitate tailor-made trials to visit new restaurants nearby which they have never visited before.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients -->
    <section class="py-5" id="team">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
              <br><br><br>
              <h2 class="section-heading text-uppercase">Our Clients</h2>
              <br><br><br>
            </div>

          <div class="col-md-3 col-sm-2">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/restaurants/CafeDeCoral_logo.png" width="300px" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-2">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/restaurants/HKeatery_logo.png" width="115px" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-2">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/restaurants/BunHui_logo.png" width="116px" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-2">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="img/restaurants/Yuan_logo.png" width="160px" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; ShakeMart 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="https://comp2411.tsytang.pro/Privacy_Policy.php">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="https://comp2411.tsytang.pro/TOU.php">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script src="js/loginform.js"></script>
    <script src="js/signupform.js"></script>

  </body>

</html>

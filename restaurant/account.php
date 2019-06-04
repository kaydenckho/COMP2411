<?php require_once "validate_login.php"; ?>
<?php $url="https://". $_SERVER['HTTP_HOST']."/api/restaurant/getInfo/";

$data['token'] = $_COOKIE['token'];

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$resultJson = json_decode($result, true);

?>
<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Library dependencies -->
    <?php require_once "html_head.php"; ?>

    <link href="css/account.css" rel="stylesheet">
    <script src="js/account.js"></script>

    <!-- Title Page-->
    <title>ShakeMart - Account</title>
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
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- DATA TABLE-->
                        <section class="p-t-20">
                            <div class="container">
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                                  <div class="panel panel-info">
                                      <form action="account_edit.php" method="POST" id="account_update">
                                          <input type="hidden" name="name" value="<?php echo $resultJson['name']; ?>">
                                    <div class="panel-heading">
                                      <h3 class="panel-title"><?php echo $resultJson['name']; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class=" col-md-9 col-lg-9" style="margin: 0 auto;">
                                          <table class="table table-user-information">
                                            <tbody>
                                                <col width="45%">
                                                <col width="55%">
                                              <tr>
                                                <td>Targeted District:</td>
                                                <td>
                                                    <!--<input type="text" class="form-control" value="<?php echo $resultJson['targetedDistrict']; ?>" required>-->
                                                    
                                                    <?php $selected = $resultJson['targetedDistrict'] ?>
                                                    <select name="targetedDistrict">
                                                        
                                                        <option value="Islands" <?php if($selected == 'Islands'){echo("selected");}?> >Islands</option>
                                                        <option value="Kwai Tsing" <?php if($selected == 'Kwai Tsing'){echo("selected");}?> >Kwai Tsing</option>
                                                        <option value="North" <?php if($selected == 'North'){echo("selected");}?> >North</option>
                                                        <option value="Sai Kung" <?php if($selected == 'Sai Kung'){echo("selected");}?> >Sai Kung</option>
                                                        <option value="Sha Tin" <?php if($selected == 'Sha Tin'){echo("selected");}?> >Sha Tin</option>
                                                        <option value="Tai Po" <?php if($selected == 'Tai Po'){echo("selected");}?> >Tai Po</option>
                                                        <option value="Tsuen Wan" <?php if($selected == 'Tsuen Wan'){echo("selected");}?> >Tsuen Wan</option>
                                                        <option value="Tuen Mun" <?php if($selected == 'Tuen Mun'){echo("selected");}?> >Tuen Mun</option>
                                                        <option value="Yuen Long" <?php if($selected == 'Yuen Long'){echo("selected");}?> >Yuen Long</option>
                                                        <option value="Kowloon City" <?php if($selected == 'Kowloon City'){echo("selected");}?> >Kowloon City</option>
                                                        <option value="Kwun Tong" <?php if($selected == 'Kwun Tong'){echo("selected");}?> >Kwun Tong</option>
                                                        <option value="Sham Shui Po" <?php if($selected == 'Sham Shui Po'){echo("selected");}?> >Sham Shui Po</option>
                                                        <option value="Wong Tai Sin" <?php if($selected == 'Wong Tai Sin'){echo("selected");}?> >Wong Tai Sin</option>
                                                        <option value="Yau Tsim Mong" <?php if($selected == 'Yau Tsim Mong'){echo("selected");}?> >Yau Tsim Mong</option>
                                                        <option value="Central & Western" <?php if($selected == 'Central & Western'){echo("selected");}?> >Central & Western</option>
                                                        <option value="Eastern" <?php if($selected == 'Eastern'){echo("selected");}?> >Eastern</option>
                                                        <option value="Southern" <?php if($selected == 'Southern'){echo("selected");}?> >Southern</option>
                                                        <option value="Kwun Tong" <?php if($selected == 'Kwun Tong'){echo("selected");}?> >Kwun Tong</option>
                                                        <option value="Wan Chai" <?php if($selected == 'Wan Chai'){echo("selected");}?> >Wan Chai</option>
                                                      </select>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>Address:</td>
                                                <td><textarea name="address" class="form-control" rows="3" required><?php echo $resultJson['address']; ?></textarea></td>
                                              </tr>
                                              <tr>
                                                <td>Description:</td>
                                                <td><textarea name="description" class="form-control" rows="3" required><?php echo $resultJson['description']; ?></textarea></td>
                                              </tr>

                                                 <tr>
                                                     <tr>
                                                <td>Opening Time:</td>
                                                <td><input type="time" name="openingTime" value="<?php echo $resultJson['openingTime']; ?>" required></td>
                                              </tr>
                                                <tr>
                                                <td>Closing Time:</td>
                                                <td><input type="time" name="closingTime" value="<?php echo $resultJson['closingTime']; ?>" required></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                     <div class="panel-footer" style="padding-bottom: 45px;">
                                        <span class="pull-right">
                                            <input type="submit" class="form-control" value="Update">
                                        </span>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
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
</body>
</html>

<?php require_once "validate_login.php"; 
$url="https://". $_SERVER['HTTP_HOST']."/api/restaurant/getInfo/";
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

$url="https://". $_SERVER['HTTP_HOST']."/api/restaurant/getPlans/";
$data['token'] = $_COOKIE['token'];
$data['restaurantId'] = $resultJson['id'];
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

if(isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $resultJsonRaw = $resultJson['plans'];
    $resultJson = array('plans' => array());

    foreach($resultJsonRaw as $key => $plan) {
        if(strpos($plan['campaignTitle'], $_GET['search']) !== false) {
            $resultJson['plans'][$key] = $plan;
        }
    }
}

?>

<html lang="en">
<head>
    <!-- Library dependencies -->
    <?php require_once "html_head.php"; ?>

    <!-- Title Page-->
    <title>ShakeMart - Dashboard</title>
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
									<div class="col-md-12">
										<h3 class="title-5 m-b-35">Ordered Advertising Plan</h3>
										<div class="table-data__tool">
											<div class="table-data__tool-left">
												<div class="rs-select2--light rs-select2--sm">
													<button class="au-btn-filter" style="color: #4272d7;">
														<i class="zmdi zmdi-filter-list"></i>filters
													</button>
												</div>
												<div class="rs-select2--light rs-select2--md">
													<select class="js-select2" name="property">
														<option selected="selected">Latest Order</option>
														<option value="">Oldest Order</option>
													</select>
													<div class="dropDownSelect2"></div>
												</div>
												<div class="rs-select2--light rs-select2--md">
													<select class="js-select2" name="time">
														<option selected="selected">All Timestamp</option>
														<option value="">This Month</option>
														<option value="">This Year</option>
													</select>
													<div class="dropDownSelect2"></div>
												</div>
											</div>
											<div class="table-data__tool-right">
												<a href="add-advertisingplan.php">
													<button class="au-btn au-btn-icon au-btn--green au-btn--small">
														<i class="zmdi zmdi-plus"></i>Add Plan
													</button>
												</a>
											</div>
										</div>
										<div class="table-responsive table-responsive-data2">
											<table class="table table-data2">
												<thead>
													<tr>
														<th>Campaign&nbsp Title</th>
														<th>Promotion&nbsp Type</th>
														<th>Distribution&nbsp Quantity</th>
														<th>Starting Date</th>
														<th>Price</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    foreach ($resultJson['plans'] as $plan){
                                                        $title = $plan['campaignTitle'];
                                                        $type = $plan['promotionType'];
                                                        $distributed = $plan['distributedCoupons'];
                                                        $total = $plan['distributionQuantity'];
                                                        switch ($type) {
                                                            case "Sweet":
                                                                $factor = 0.95;
                                                                break;
                                                            case "Prize":
                                                                $factor = 0.9;
                                                                break;
                                                            case "Jackpot":
                                                                $factor = 0.85;
                                                                break;
                                                        }                                                        
                                                        $price = '$'.($total * $factor);
                                                        $startingDate = $plan['startingDate'];
                                                        $status = $distributed.' / '.$total.' ( '.($total-$distributed).' remaining )';
                                                        echo <<< EX
                                                        <tr class="tr-shadow">
                                                            <td>{$title}</td>
                                                            <td>
                                                                <span class="block-email">{$type}</span>
                                                            </td>
                                                            <td class="desc">{$status}</td>
                                                            <td>{$startingDate}</td>
                                                            <td>{$price}</td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Online Receipt">
                                                                        <i class="zmdi zmdi-download"></i>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Coupon Sample">
                                                                        <i class="zmdi zmdi-file"></i>
                                                                    </button>
                                                                        <form action="deleteplan.php" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" id="restartantId" value="{$data['restaurantId']}"/>
                                                                        <input type="hidden" id="planId" value="{$plan['id']}"/>		                                                                        
                                                                        <button type= "submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="zmdi zmdi-delete"></i>
                                                                        </form>
                                                                    </button>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                                        <i class="zmdi zmdi-more"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
EX;
                                                    }
                                                    ?>
												</tbody>
											</table>
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

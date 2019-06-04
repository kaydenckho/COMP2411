<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../common/restaurantIdRequiredResponse.php';

// Note:
// This api call adds an advertising plan.

// Usage: 
// $_POST['token']: Token for authentication
// $_POST['restaurantId']: Which restaurant should be added too
// $_POST['campaignTitle']: The title of the campaign
// $_POST['promotionType']: 'Sweet', 'Prize', 'Jackpot'
// $_POST['distributionQuantity']: Number of coupons to be distributed
// $_POST['couponTitle']: The title of the coupon
// $_POST['couponContent']: The content of the coupon
// $_POST['couponImageUrl']: The image of the coupon

// Result:
// $response['successful']: Whether the operation is successful

if (!isset($_POST['campaignTitle']) || !isset($_POST['promotionType']) || !isset($_POST['distributionQuantity']) || !isset($_POST['couponTitle']) || !isset($_POST['couponContent']) || !isset($_POST['couponImageUrl'])) {
    returnError("Some fields are empty");
}

if ($stmt = $mysqli->prepare("INSERT INTO `advertisingPlans` (`restaurantId`, `campaignTitle`, `promotionType`) VALUES (?, ?, ?)")) {
    $stmt->bind_param("iss", $_POST['restaurantId'], $_POST['campaignTitle'], $_POST['promotionType']);
    if(!$stmt->execute()) {
        $stmt->close();
        returnError("Advertising plan creation failed, incorrect parameters");    
    }
    $planId = $stmt->insert_id;
    $stmt->close();
} else {
    returnError("Internal Error: Advertising plan creation failed");    
}  

$successful = true;

if ($stmt = $mysqli->prepare("INSERT INTO `coupons` (`planId`, `distributionQuantity`, `title`, `content`, `image`) VALUES (?, ?, ?, ?, ?)")) {
    $stmt->bind_param("iisss", $planId, $_POST['distributionQuantity'], $_POST['couponTitle'], $_POST['couponContent'], $_POST['couponImageUrl']);
    $successful = $stmt->execute();
    $stmt->close();
} else {
    $successful = false;
}  

if (!$successful) {
    $delstmt = $mysqli->prepare("DELETE FROM `advertisingPlans` WHERE `id` = ?");
    $delstmt->bind_param("i", $planId);
    $delstmt->execute();
    $delstmt->close();
    returnError("Advertising plan creation failed, incorrect parameters for coupons");
}

returnSuccessful(array("message"=>"Advertising plan created"));

?>
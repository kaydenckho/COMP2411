<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../common/restaurantIdRequiredResponse.php';

// Note:
// This api call gets all the plan related to a restaurant that the user own.

// Usage: 
// $_POST['token']: Token for authentication
// $_POST['restaurantId']: The restaurant we're looking at

// Result:
// $response['plans']: An array of plans
// $response['plans'][0]['id']: The id of the plan
// $response['plans'][0]['campaignTitle']: The title of the campaign
// $response['plans'][0]['promotionType']: 'Sweet', 'Prize', 'Jackpot'
// $response['plans'][0]['distributionQuantity']: Total number of coupons to be distributed
// $response['plans'][0]['distributedCoupons']: Number of coupons distributed
// $response['plans'][0]['startingDate']: The date the which the campaign started
// $response['plans'][0]['allDistributed']: Whether all coupons have been distributed

if ($stmt = $mysqli->prepare("SELECT `id`, `campaignTitle`, `promotionType`, `timestamp` FROM `advertisingPlans` WHERE `restaurantId` = ?")) {
    $stmt->bind_param("i", $_POST['restaurantId']);
    $stmt->execute();
    $stmt->bind_result($id, $campaignTitle, $promotionType, $startingDate);
    $stmt->store_result();
    for ($i = 0; $stmt->fetch(); $i++) {
        $response['plans'][$i]['id'] = $id;
        $response['plans'][$i]['campaignTitle'] = $campaignTitle;
        $response['plans'][$i]['promotionType'] = $promotionType;   
        $response['plans'][$i]['startingDate'] = $startingDate;
        $coupon_stmt = $mysqli->prepare("SELECT SUM(`distributionQuantity`) FROM `coupons` WHERE `planId` = ?");
        $coupon_stmt->bind_param("i", $id);
        $coupon_stmt->execute();
        $coupon_stmt->bind_result($response['plans'][$i]['distributionQuantity']);
        $coupon_stmt->fetch();
        $coupon_stmt->close();
        $gencoupon_stmt = $mysqli->prepare("SELECT COUNT(*) FROM `generatedCoupons` WHERE `couponId` IN ( SELECT `id` FROM `coupons` WHERE `planId` = ? )");
        $gencoupon_stmt->bind_param("i", $id);      
        $gencoupon_stmt->execute();
        $gencoupon_stmt->bind_result($response['plans'][$i]['distributedCoupons']);
        $gencoupon_stmt->fetch();
        $gencoupon_stmt->close();       
    }
    $stmt->close();
    returnSuccessful($response);
} else {
    returnError("Internal Error: Unable to receive advertisingPlans entry");
}  

?>
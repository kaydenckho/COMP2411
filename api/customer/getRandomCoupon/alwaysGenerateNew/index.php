<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../../include/adminOnlyResponse.php'; // Customer only Json response
require_once __DIR__.'/../../../include/getCouponDetails.php'; // Get coupon details

/* THIS API CALL IS FOR ADMIN ACCOUNT ONLY FOR DEMONSTRATING AND TESTING PURPOSES */

// Note:
// This api call generates a new random coupon for a user

// Usage: 
// $_POST['token']: Token for authentication
// $_POST['uid']: The user who will receive a generated coupon. If not set, the value defaults to the admin themselves

// Result:
// $response['coupon']: The coupon obtained

if (!isset($_POST['uid'])) {
    $uid = getVerifiedUid();
    $response['message'] = "New coupon has been generated for an admin user";   
} else {
    $uid = $_POST['uid'];
    $response['message'] = "New coupon has been generated for a specified user";      
}

// Generate a new coupon
$sql = "INSERT INTO `generatedCoupons` (`couponId`, `ownerUid`, `expiryDate`)
        SELECT `couponId`, ?, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 DAY) FROM 
        (
            SELECT `coupons`.`id` AS `couponId`, `coupons`.`distributionQuantity` - COUNT(`generatedCoupons`.`id`) AS `remaining` 
            FROM `coupons` 
            LEFT JOIN `generatedCoupons` 
            ON `coupons`.`id` = `generatedCoupons`.`couponId` 
            GROUP BY `coupons`.`id`
            HAVING `remaining` > 0
            ORDER BY RAND()
            LIMIT 1
        ) AS randomCoupon";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $uid);
    if (!$stmt->execute()) {
        $stmt->close();
        returnError("Unable to generate coupons, invalid uid");        
    }
    $generatedId = $stmt->insert_id;
    $stmt->close();
    $response['coupon'] = getCouponDetails($generatedId);    
    returnSuccessful($response);    
} else {
    returnError("Internal Error: Unable to generate coupons");
} 
        
?>
<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/customerOnlyResponse.php'; // Customer only Json response
require_once __DIR__.'/../../include/getCouponDetails.php'; // Get coupon details

// Note:
// This api call gets a random coupon for the customer

// Usage: 
// $_POST['token']: Token for authentication

// Result:
// $response['coupon']: The coupon obtained, returns the most recently generated coupon if a coupon has already been generated and hasn't been expired yet
// $response['freshlyGenerated']: True if the coupon is freshly generated instead of using an existing one

$uid = getVerifiedUid();

// If a coupon has already been generated, return it instead
if ($stmt = $mysqli->prepare("SELECT `id` FROM `generatedCoupons` WHERE `ownerUid` = ? AND `expiryDate` > CURRENT_TIMESTAMP ORDER BY `generatedDate` DESC")) {
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($generatedId);
    if ($stmt->fetch()) {
        $stmt->close();
        $response['coupon'] = getCouponDetails($generatedId);
        $response['freshlyGenerated'] = false;
        $response['message'] = "Coupon has already been generated for today. Returning an existing one";        
        returnSuccessful($response);
    }
    $stmt->close();
} else {
    returnError("Internal Error: Unable to retrieve generated coupons");
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
    $stmt->execute();
    $generatedId = $stmt->insert_id;
    $stmt->close();
    $response['coupon'] = getCouponDetails($generatedId);
    $response['freshlyGenerated'] = true;
    $response['message'] = "New coupon has been generated";       
    returnSuccessful($response);    
} else {
    returnError("Internal Error: Unable to generate coupons");
} 
        
?>
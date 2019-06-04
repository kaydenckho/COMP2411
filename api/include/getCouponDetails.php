<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}
	
require_once __DIR__.'/connectDB.php'; // Connect to database

function getAllCouponsSQL() { // This SQL statement return all the information about all coupons
    return "SELECT `generatedCoupons`.`id` AS `id`, 
                   `coupons`.`title` AS `couponTitle`, `coupons`.`content` AS `couponContent`, `coupons`.`image` AS `couponImageUrl`, 
                   `generatedCoupons`.`generatedDate` AS `couponGeneratedDate`, `generatedCoupons`.`expiryDate` AS `couponExpiryDate`, 
                   `advertisingPlans`.`promotionType` AS `promotionType`, `restaurants`.`name` AS `restaurantName`, 
                   `restaurants`.`address` AS `restaurantAddress`, `restaurants`.`description` AS `restaurantDescription`, 
                   `restaurants`.`openingTime` AS `restaurantOpeningTime`, `restaurants`.`closingTime` AS `restaurantClosingTime`
            FROM `generatedCoupons`
            JOIN `coupons` ON `generatedCoupons`.`couponId` = `coupons`.`id`
            JOIN `advertisingPlans` ON `coupons`.`planId` = `advertisingPlans`.`id`
            JOIN `restaurants` ON `advertisingPlans`.`restaurantId` = `restaurants`.`id` ";
}

function getCouponDetails($generatedId) {
    global $mysqli;
    $sql = getAllCouponsSQL();
    $sql .= "WHERE `generatedCoupons`.`id` = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $generatedId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    } else {
        return null;
    }
}

?>
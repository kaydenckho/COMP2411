<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/restaurantOnlyResponse.php'; // Restaurant only Json response

// Note:
// This api call gets the restaurant info of a retaurent user

// Usage: 
// $_POST['token']: Token for authentication

// Result:
// $response: Restaurant info of the user

if ($stmt = $mysqli->prepare("SELECT * FROM `restaurants` WHERE `belongedUser` = ?")) {
    $uid = getVerifiedUid();
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $response = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    returnSuccessful($response);
} else {
    returnError("Internal Error: Unable to receive restaurant entry");
}  

?>
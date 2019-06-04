<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/customerOnlyResponse.php'; // Customer only Json response

// Note:
// This api call gets the account info of the customer

// Usage: 
// $_POST['token']: Token for authentication

// Result:
// $response: The user info in Json format

if ($stmt = $mysqli->prepare("SELECT * FROM `customers` WHERE `userId` = ?")) {
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
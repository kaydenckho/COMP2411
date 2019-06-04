<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}

require_once __DIR__.'/../../include/restaurantOnlyResponse.php'; // Extension to restaurantOnlyResponse

if (!isset($_POST['restaurantId'])) {
    returnError("Missing 'restaurantId'");
}

$uid = getVerifiedUid();

if ($stmt = $mysqli->prepare("SELECT `belongedUser` FROM `restaurants` WHERE `id` = ?")) {  
    $stmt->bind_param("i", $_POST['restaurantId']);
    $stmt->execute();
    $stmt->bind_result($belongedUser);
    if (!$stmt->fetch()) {
        $stmt->close();
        returnError("Missing or invalid 'restaurantId'");
    }
    $stmt->close();
} else {
    returnError("Internal Error: Failed to retrieve restaurants from database");
}

if ($uid != $belongedUser) {
    returnError("The restaurant specified might not exist or does not belong to the current user");    
}

?>
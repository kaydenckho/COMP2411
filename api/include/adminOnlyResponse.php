<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}

require_once __DIR__.'/tokenRequiredResponse.php'; // Extension to tokenRequiredResponse

// Usage: 
// Include this file if your api call is only available to admin
// Api endpoints which include this file must reply as Json

if ($stmt = $mysqli->prepare("SELECT `accountType` FROM `users` WHERE `uid` = ?")) {
    
    $uid = getVerifiedUid();
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($accountType);
    $stmt->fetch();
    $stmt->close();    
    if ($accountType != "admin") {
        returnError("This operation is only available to system admins");
    }
    
} else {
    returnError("Internal Error: Failed to retrieve users from database");
}

?>
<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../include/tokenRequiredResponse.php'; // Token required

if ($stmt = $mysqli->prepare("DELETE FROM `sessions` WHERE `sessionId` = ?")) {
    
    $token = getVerfiedToken();    
    $stmt->bind_param("s", $token['sid']);
    $stmt->execute();
    $stmt->close();
    returnSuccessful(array("message"=>"User successfully logged out"));
    
} else {
    returnError("Internal Error: Failed to retrieve sessions from database");
}

?>
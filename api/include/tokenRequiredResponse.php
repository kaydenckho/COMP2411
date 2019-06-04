<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}
	
require_once __DIR__.'/connectDB.php'; // Connect to database
require_once __DIR__.'/jsonResponse.php'; // Reply as Json
require_once __DIR__.'/validateToken.php'; // Validate token

// Usage: 
// Include this file if your api call needs to have a valid token that hasn't yet expired
// Api endpoints which include this file must reply as Json

if(!validateToken($_POST['token'])){
    returnError("Token is not valid");
}

$_token = json_decode(base64_decode($_POST['token']), true);

if ($stmt = $mysqli->prepare("SELECT `userId` FROM `sessions` WHERE `sessionId` = ?")) {
    
    $stmt->bind_param("s", $_token['sid']);
    $stmt->execute();

    $stmt->bind_result($_uid);

    if (!$stmt->fetch()) {
        $stmt->close();
        returnError("Token has expired");
    }

    $stmt->close();
    
} else {
    returnError("Internal Error: Failed to retrieve sessions from database");
}

function getVerifiedUid(){
    global $_uid;
    return $_uid;
}

function getVerfiedToken(){
    global $_token;
    return $_token;
}

?>
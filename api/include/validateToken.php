<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
	header("HTTP/1.1 403 Forbidden", 403); 
	exit;
}

require_once __DIR__.'/connectDB.php'; //Connect to database   

// TODO: Store this externally if we're seriois about it
$SECERTKEY = "UVep6YLnaJtMK5npezcVckT7";

function validateToken($token){
    global $SECERTKEY;
    $token = json_decode(base64_decode($token), true);
    if(json_last_error() != JSON_ERROR_NONE){
        return false;
    }
    return hash_equals($token['sig'], hash_hmac('sha256', $token['sid'], $SECERTKEY));
}

?>

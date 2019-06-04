<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../include/connectDB.php'; // Connect to database
require_once __DIR__.'/../include/jsonResponse.php'; // Reply as Json

// Usage: 
// $_POST['username']: Username
// $_POST['password']: Password

// Result:
// $response['token']:          Token for future api calls (Wont' expire unless being logged out / revoked by client)
// $response['accountType']:    Account type of the user

// TODO: Store this externally if we're seriois about it
$SECERTKEY = "UVep6YLnaJtMK5npezcVckT7";

/* Verify password */

if ($stmt = $mysqli->prepare("SELECT uid, passwordHash, accountType FROM `users` WHERE username = ?")) {

    /* Bind parameters */
    $stmt->bind_param("s", $_POST['username']);

    /* Execute */
    $stmt->execute();

    /* Bind result */
    $stmt->bind_result($uid, $passwordHash, $response['accountType']);

    /* Fetch one */
    if (!$stmt->fetch()) {
        $stmt->close();
        returnError("Invalid username or password");
    }

    /* Close */
    $stmt->close();
    
    /* Compare hash */
    if(!password_verify($_POST['password'], $passwordHash)){
        returnError("Invalid username or password");
    }
    
} else {
    returnError("Internal Error: Failed to retrieve users from database");
}

/* Generate session */

if ($stmt = $mysqli->prepare("INSERT INTO `sessions` (`userId`, `dateGenerated`) VALUES (?, CURRENT_TIMESTAMP)")) {

    /* Bind parameters */
    $stmt->bind_param("i", $uid);

    /* Execute */
    $stmt->execute();

    /* Get session id */
    $token['sid'] = $stmt->insert_id;

    /* Close */
    $stmt->close();
    
    /* Generate signature */
    $token['sig'] = hash_hmac('sha256', $token['sid'], $SECERTKEY);
    
    /* Generate token */
    $response['token'] = base64_encode(json_encode($token));
    
    /* Done */
    returnSuccessful($response);

} else {
    returnError("Internal Error: Failed to generate token");
}


?>
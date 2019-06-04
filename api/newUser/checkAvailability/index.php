<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);
require_once __DIR__.'/../common/checkAvailability.php'; // Check username availability
require_once __DIR__.'/../../include/jsonResponse.php'; // Reply as Json

// Usage: 
// $_GET['username']: Username to be checked

// Result:
// $response['available']: Whether a username is available

if (!isset($_GET['username'])){
    returnError("Username is empty");
}

$response['available'] = checkAvailability($_GET['username']);
returnSuccessful($response);

?>
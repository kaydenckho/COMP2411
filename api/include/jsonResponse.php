<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}

// Reply as JSON response
header('Content-Type: application/json');

function returnSuccessful($data) {
    $data['successful'] = true;
    echo json_encode($data);
    exit;
}

function returnError($errorMessage) {
    $data = array();
    $data['successful'] = false;
    $data['error'] = $errorMessage;
    echo json_encode($data);
    exit;
}

function returnErrorWithData($data, $errorMessage) {
    $data['successful'] = false;
    $data['error'] = $errorMessage;
    echo json_encode($data);
    exit;
}

?>

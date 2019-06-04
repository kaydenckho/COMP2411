<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/connectDB.php'; // Connect to database
require_once __DIR__.'/../../include/jsonResponse.php'; // Reply as Json
require_once __DIR__.'/../common/checkAvailability.php'; // Check username availability
require_once __DIR__.'/../common/newUser.php'; // Create new user

// Usage: 
// $_POST['username']: Username
// $_POST['password']: Password
// $_POST['gender']: Gender (Male, Female, Others)
// $_POST['age']: Age
// $_POST['email']: Email Address

// Result:
// $response['successful']: Whether account creation is successful

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['age']) || !isset($_POST['email'])) {
    returnError("Some fields are empty");
}

if (!checkAvailability($_POST['username'])) {
    returnError("Username is not available");
}

$uid = newUser($_POST['username'], $_POST['email'], $_POST['password'], "customer");

if (!$uid){
    returnError("Internal Error: User creation failed");
}

$successful = true;

if ($stmt = $mysqli->prepare("INSERT INTO `customers` (`userId`, `gender`, `age`) VALUES (?, ?, ?)")) {
    $stmt->bind_param("iss", $uid, $_POST['gender'], $_POST['age']);
    $successful = $stmt->execute();
    $stmt->close();
} else {
    $successful = false;
}  

if (!$successful) {
    $delstmt = $mysqli->prepare("DELETE FROM `users` WHERE `users`.`uid` = ?");
    $delstmt->bind_param("i", $uid);
    $delstmt->execute();
    $delstmt->close();
    returnError("Customer entry creation failed, incorrect parameters");    
}

returnSuccessful(array("message"=>"User created"));

?>
<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/jsonResponse.php'; // Reply as Json
require_once __DIR__.'/../common/checkAvailability.php'; // Check username availability
require_once __DIR__.'/../common/newUser.php'; // Create new user

// Note:
// This api call creates a restaurant account.

// Usage: 
// $_POST['username']: Username
// $_POST['password']: Password
// $_POST['name']: Name
// $_POST['targetedDistrict']: 'Islands', 'Kwai Tsing', 'North', 'Sai Kung', 'Sha Tin', 'Tai Po', 'Tsuen Wan', 'Tuen Mun', 'Yuen Long', 'Kowloon City', 'Kwun Tong', 'Sham Shui Po', 'Wong Tai Sin', 'Yau Tsim Mong', 'Central & Western', 'Eastern', 'Southern', 'Wan Chai'
// $_POST['address']: Address
// $_POST['description']: Description
// $_POST['openingTime']: hh:mm
// $_POST['closingTime']: hh:mm
// $_POST['email']: Email

// Result:
// $response['successful']: Whether account creation is successful

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['name']) || !isset($_POST['targetedDistrict']) || !isset($_POST['address']) || !isset($_POST['description']) || !isset($_POST['openingTime']) || !isset($_POST['closingTime']) || !isset($_POST['email'])) {
    returnError("Some fields are empty");
}

if (!checkAvailability($_POST['username'])) {
    returnError("Username is not available");
}

$uid = newUser($_POST['username'], $_POST['email'], $_POST['password'], "restaurant");

if (!$uid){
    returnError("Internal Error: User creation failed");
}

$successful = true;

if ($stmt = $mysqli->prepare("INSERT INTO `restaurants` (`name`, `belongedUser`, `targetedDistrict`, `address`, `description`, `openingTime`, `closingTime`) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
    $stmt->bind_param("sisssss", $_POST['name'], $uid, $_POST['targetedDistrict'], $_POST['address'], $_POST['description'], $_POST['openingTime'], $_POST['closingTime']);
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
    returnError("Restaurant user creation failed, incorrect parameters");    
}

returnSuccessful(array("message"=>"Restaurant user created"));   
 
?>
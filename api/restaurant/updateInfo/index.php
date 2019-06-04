<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/restaurantOnlyResponse.php';

// Note:
// This api call updates a restaurant account's info.

// Usage: 
// $_POST['token']: Token for authentication
// $_POST['name']: Name
// $_POST['targetedDistrict']: 'Islands', 'Kwai Tsing', 'North', 'Sai Kung', 'Sha Tin', 'Tai Po', 'Tsuen Wan', 'Tuen Mun', 'Yuen Long', 'Kowloon City', 'Kwun Tong', 'Sham Shui Po', 'Wong Tai Sin', 'Yau Tsim Mong', 'Central & Western', 'Eastern', 'Southern', 'Wan Chai'
// $_POST['address']: Address
// $_POST['description']: Description
// $_POST['openingTime']: hh:mm
// $_POST['closingTime']: hh:mm

// Result:
// $response['successful']: Whether account creation is successful

if (!isset($_POST['name']) || !isset($_POST['targetedDistrict']) || !isset($_POST['address']) || !isset($_POST['description']) || !isset($_POST['openingTime']) || !isset($_POST['closingTime'])) {
    returnError("Some fields are empty");
}

if ($stmt = $mysqli->prepare("UPDATE `restaurants` SET name=?, targetedDistrict=?, address=?, description=?, openingTime=?, closingTime=? WHERE belongedUser=?")) {
    $uid = getVerifiedUid();
    $stmt->bind_param("ssssssi", $_POST['name'], $_POST['targetedDistrict'], $_POST['address'], $_POST['description'], $_POST['openingTime'], $_POST['closingTime'], $uid);
	if(!$stmt->execute()){
        $stmt->close();
        returnError("Restaurant info update failed, incorrect parameters");
        $stmt->close();
    }
    returnSuccessful(array("message"=>"Restaurant info updated"));
} else {
    returnError("Internal Error: Restaurant info update failed");
}

?>
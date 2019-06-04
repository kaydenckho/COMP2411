<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../../include/customerOnlyResponse.php'; // Customer only Json response

// Note:
// This api call updates the customer's account info

// Usage:
// $_POST['token']: Token for authentication
// $_POST['gender']: Gender (Male, Female, Others)
// $_POST['age']: Age

// Result:
// $response: The user info in Json format

if (!isset($_POST['gender']) || !isset($_POST['age'])){
    returnError("Some fields are empty");
}

if ($stmt = $mysqli->prepare("UPDATE `customers` SET gender=?, age=? WHERE userId=?")) {
    $uid = getVerifiedUid();
    $stmt->bind_param("sii", $_POST['gender'], $_POST['age'], $uid);
    if(!$stmt->execute()){
        $stmt->close();
        returnError("Customer info update failed, incorrect parameters");
    }
    $stmt->close();
    returnSuccessful(array("message"=>"Account info updated"));
} else {
    returnError("Internal Error: Customer info update failed");
}  

?>
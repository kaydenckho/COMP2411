<?php 
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);   
require_once __DIR__.'/../common/restaurantIdRequiredResponse.php';

// Note:
// This api call adds an advertising plan.

// Usage: 
// $_POST['token']: Token for authentication
// $_POST['planId']: The id of the plan 
// $_POST['restaurantId']: The id of the restaurant
// Result:
// $response['successful']: Whether the operation is successful

if (!isset($_POST['planId'])){
    returnError("planId is missing");
}

mysqli_report(MYSQLI_REPORT_ALL);

if ($stmt = $mysqli->prepare("DELETE FROM `advertisingPlans` WHERE `id` = ? AND `restaurantId` = ?")) {
    $stmt->bind_param("ii", $_POST['planId'], $_POST['restaurantId']);
    if(!$stmt->execute()) {
        $stmt->close();
        returnError("Advertising plan deletion failed, incorrect parameters");    
    }
    $stmt->close();
} else {
    returnError("Internal Error: Advertising plan creation failed");    
}  

returnSuccessful(array("message"=>"Advertising plan deleted"));

?>
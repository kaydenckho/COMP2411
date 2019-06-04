<?php 
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}
	
require_once __DIR__.'/../../include/connectDB.php'; // Connect to database

// This function creates a bare user for authentication
// Note: It does NOT do input checking. Please checkAvailability() before calling!

function newUser($username, $email, $password, $accountType){
    global $mysqli;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    if ($stmt = $mysqli->prepare("INSERT INTO `users` (`username`, `email`, `passwordHash`, `accountType`) VALUES (?, ?, ?, ?)")) {
        $stmt->bind_param("ssss", $username, $email, $passwordHash, $accountType);
        $stmt->execute();
        $uid = $stmt->insert_id;
        $stmt->close();
        return $uid;
    } else {
        return 0;
    }     
}

?>
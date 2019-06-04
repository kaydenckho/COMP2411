<?php
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}

require_once __DIR__.'/../../include/connectDB.php'; // Connect to database

function checkAvailability($username){
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT uid FROM `users` WHERE `username` = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $available = $stmt->num_rows == 0;
        $stmt->close();
        return $available;
    } else {
        return false;
    }     
}

?>
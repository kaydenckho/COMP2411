<?php
// Forbid direct access
if(!defined('UNLOCK_IMPORT')) {
    header("HTTP/1.1 403 Forbidden", 403); 
    exit;
}

// TODO: Remember to store credentials externally in production!!! 
// (Or not since it's a database project)
$hostname="localhost";
$username="comp2411";
$password="declanishandsome";
$database="comp2411_shakemart";
$mysqli=new mysqli($hostname, $username, $password, $database);

// Validate connection
if (mysqli_connect_errno()) {
    // Alternate connection to testing server
    $mysqli=new mysqli("127.0.0.1:3307", $username, $password, $database);  
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }   
}
?>
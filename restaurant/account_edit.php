<?php
require_once "validate_login.php";

$url="https://". $_SERVER['HTTP_HOST']."/api/restaurant/updateInfo/";

$data['token'] = $_COOKIE['token'];
$data['name'] = $_POST['name'];
$data['targetedDistrict'] = $_POST['targetedDistrict'];
$data['address'] = $_POST['address'];
$data['description'] = $_POST['description'];
$data['openingTime'] = $_POST['openingTime'];
$data['closingTime'] = $_POST['closingTime'];

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$resultJson = json_decode($result, true);


if ($resultJson['successful']) {
    header("Location: account.php");
} else {
    echo "Fail";
}
?>

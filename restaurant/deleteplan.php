<?php
$url = 'https://comp2411.tsytang.pro/api/restaurant/deletePlan/';
$data['token'] = $_COOKIE['token'];
$data['restaurantId'] = $_POST["restaurantId"];
$data['planId'] = $_POST["planId"];

// use key 'http' even if you send the request to https://...
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

header("Location: index.php");

?>
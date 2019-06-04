<?php
$url = 'https://comp2411.tsytang.pro/api/auth/validateToken/';
if(!isset($_COOKIE['token'])) {
    $cookie_value = "Please login first.";
    setcookie("msg", $cookie_value, time() + 30, "/");

    header('Location: ../index.php');
}

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query(array('token' => $_COOKIE['token']))
    )
);
$result = file_get_contents($url, false, stream_context_create($options));
$resultJson = json_decode($result, true);

if(!$resultJson['successful']) {
    $cookie_value = "Session expired. Please login again.";
    setcookie("msg", $cookie_value, time() + 30, "/");
    setcookie('token', null, -1, '/');
    header('Location: ../index.php');
}
?>


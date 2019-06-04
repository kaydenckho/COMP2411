<?php

$url = 'https://comp2411.tsytang.pro/api/auth/logout/';

if(!isset($_COOKIE['token'])) {
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

//$resultJson = json_decode($result, true);

if ($result['successful']) {
    header('Location: ../index.php');
}
else {
    
    /*
    echo "Fail :(" . "<br>";
    echo $_COOKIE['token'] . "<br>";
    echo $result['token'] . "<br>";
    */
    header('Location: ../index.php');
}
?>

<?php
    /*

    $url="https://". $_SERVER['HTTP_HOST']."/api/logout/";

    $data['token'] = $_COOKIE['token'];

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
    
    */
?>
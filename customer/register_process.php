<?php

    $url="https://". $_SERVER['HTTP_HOST']."/api/newUser/customer/";

    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['gender'] = $_POST['gender'];
    $data['age'] = $_POST['age'];
    $data['email'] = $_POST['email'];

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
        header("Location: login-registration.php");
    } else {
        echo "Fail";
    }

?>
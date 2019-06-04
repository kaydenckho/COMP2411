<?php

    $url="https://". $_SERVER['HTTP_HOST']."/api/auth/";

    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];

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
    
    header('Location: index.php');
    
    /*
    if ($resultJson['token']) {
    setcookie("token", $resultJson['token'], time() + 2592000, "/");
    
    
    if($resultJson['accountType'] == 'restaurant') {
        header('Location: ../restaurant/index.php');
    } else if($resultJson['accountType'] == 'customer') {
    
        header('Location: index.php');
    }

} else {
    $cookie_value = "<span class='text-danger font-weight-bold'>Login fail! &nbsp Please try again later.</span>";
    setcookie("msg", $cookie_value, time() + 30, "/");

    echo $resultJson['token'] . "<br>";
    echo "login fail";
    
    if ($resultJson['accountType'] == 'restaurant') {
        header('Location: ../index.php');
    }
    else if ($resultJson['accountType'] == 'customer') {
        header('Location: login-registration.php');
    }
}
*/


?>

<?php
$url = 'https://comp2411.tsytang.pro/api/auth/';

$uname = $_POST['uname'];
$psw = $_POST['psw'];

$data = array('username' => $uname, 'password' => $psw);

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


if ($resultJson['token']) {
    setcookie("token", $resultJson['token'], time() + 2592000, "/");

    if($resultJson['accountType'] == 'restaurant') {
        header('Location: ./restaurant/index.php');
    } else if($resultJson['accountType'] == 'customer') {
        header('Location: ./customer/index.php');
    }

} else {
    /* Handle error */
    $cookie_value = "<span class='text-danger font-weight-bold'>Login fail! &nbsp Please try again later.</span>";
    setcookie("msg", $cookie_value, time() + 30, "/");

    echo $resultJson['token'] . "<br>";
    echo "login fail";

    header('Location: ../index.php');
}

?>

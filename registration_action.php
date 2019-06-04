<?php
$url = 'https://comp2411.tsytang.pro/api/newUser/restaurant/';

$username = $_POST['uname'];
$password = $_POST['psw'];
$r_name = $_POST['Name'];
$email = $_POST["Email"];
$type = $_POST["Type"];
$district = $_POST["district"];
$address = $_POST["Address"];
$description = $_POST["Description"];
$openingTime = $_POST["openingTime"];
$closingTime = $_POST["closingTime"];

$data = array('username' => $username, 'password' => $password, 'name' => $r_name, 'targetedDistrict' => $district, 'address' => $address, 'description' => $description, 'openingTime' => $openingTime, 'closingTime' => $closingTime, 'email' => $email);

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

$cookie_name = "msg";
//if ($result === FALSE) { 
if ($resultJson['successful'] == 0) {
	/* Handle error */ 
	$cookie_value = "<span class=\"text-danger font-weight-bold\">Username has already existed! &nbsp Please try again.</span>";
}
else {
	$cookie_value = "<span class=\"text-success font-weight-bold\">Account Created Successfully!</span>";
}

// var_dump($result);

//echo $result;

//parameters: username, password
//return: 

//echo $resultJson['token'];
//echo "Success!";
//echo $resultJson['successful'];

setcookie($cookie_name, $cookie_value, time() + 30, "/");
//echo $resultJson['successful'];

header('Location: index.php');
?>


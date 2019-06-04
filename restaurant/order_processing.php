<?php require_once "validate_login.php"; ?>
<?php $url="https://". $_SERVER['HTTP_HOST']."/api/restaurant/getInfo/";

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

?>

<?php
	$title = $_POST['title'];
	$type = $_POST['type'];
	$quantity = $_POST['quantity'];
	$coupon_title = $_POST['coupon_title'];
	$coupon_content = $_POST['coupon_content'];
	$cardno = $_POST['cardno'];
	$expirationDateMonth = $_POST['expirationDateMonth'];
	$expirationDateYear = $_POST['expirationDateYear'];
	$cw = $_POST['cw'];
	
	$target_dir = "uploads/";
	$image_path = time() . "_" . basename($_FILES["image"]["name"]);
	$target_file = $target_dir . time() . "_" . basename($_FILES["image"]["name"]);
	$base_name = basename($_FILES["image"]["name"], ".".pathinfo($target_file)['extension']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
	$time = time();
	$date = date("Y-m-d",$time);

    $url = 'https://comp2411.tsytang.pro/api/restaurant/addPlan/';

    $data['token'] =$_COOKIE['token'];
    $data['restaurantId']=$resultJson['id'];
    $data['campaignTitle']=$title;
    $data['promotionType']=$type;
    $data['distributionQuantity']=$quantity;
    $data['couponTitle']=$coupon_title;
    $data['couponContent']=$coupon_content;
    $data['couponImageUrl']=$image_path;


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
    $resultJson1 = json_decode($result, true);
    
    
    if ($resultJson1['successful']) {
        header('Location: ../restaurant/index.php');
    
    } else {
        /* Handle error */
        $cookie_value = "AddPlan fail! &nbsp Please try again later.";
        setcookie("msg", $cookie_value, time() + 30, "/");
    
        echo $resultJson['successful'] . "<br>";
        echo "addPlan fail";

        header('Location: ../index.php');
    }

?>
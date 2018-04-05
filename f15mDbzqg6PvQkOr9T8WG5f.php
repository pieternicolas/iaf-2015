<?php
ob_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("192.168.160.42", "u1000159_user","@.MAFQ8Zr@","db1000159_ticketing","3306");

$nameOLD = $_POST['name'];
$nricOLD = $_POST['nric'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$tier = $_POST['tier'];
$quantity = $_POST['quantity'];
$submissiontime = $_POST['submissiontime'];
$captcha = $_POST['g-recaptcha-response'];

if(!$captcha)
	{
	header("Location: http://indoartsfest.org/errorc.html");
	die();
	}
		
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcycAATAAAAAPemQy63CpKmdQh5lHLj_dgXPutm&response=$captcha");

if($response.success==false)
{
    header("Location: http://indoartsfest.org/errorc.html");
	die();
}
else
{

/** SANITIZER **/
function alphanumSanitize($s) { return ereg_replace("/[^a-zA-Z0-9]+/", "",$s); }
$nric = alphanumSanitize ($nricOLD);
$name = filter_var($nameOLD, FILTER_SANITIZE_STRING);

$stock_sql = "SELECT stock FROM feb15stock WHERE tier='$tier'";
$stock = mysqli_query($conn,$stock_sql);
$currentStock = $conn->query($stock_sql) or die(mysqli_error($conn));
$stockrow = $currentStock->fetch_assoc();
$currentStock = $stockrow['stock'];

if ($quantity > $currentStock)
{
	header("Location: http://indoartsfest.org/errors.html");
	die();
}
else
{
if ($tier === "PLATINUM")
	{
	$tPrice = 30;
	}
else
	{
		if ($tier === "GOLD")
		{
		$tPrice = 25;
		}
		else
		{
		$tPrice = 20;
		}
	}


$price = ($quantity * $tPrice);

$payment="NOT PAID";

$newStock = $currentStock - $quantity;
$stockUpdate = "UPDATE feb15stock SET stock=$newStock WHERE tier='$tier'";
mysqli_query($conn,$stockUpdate);

$insert = "INSERT INTO feb15order (name, nric, email, contact, tier, quantity, price, payment, submissiontime)
VALUES ('$name', '$nric', '$email', '$contact', '$tier', '$quantity', '$price','$payment','$submissiontime')";

mysqli_query($conn, $insert);

header("Location: http://indoartsfest.org/thankyou.html");
	exit();
}
mysqli_close($conn);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Indonesia Art Festival 2015</title>
</head>
<body>

</body>
</html>
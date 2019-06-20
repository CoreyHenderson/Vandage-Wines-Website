<!DOCTYPE html>
<html class="section">
<head>
<meta charset="utf-8">
<link href="main.css" rel="stylesheet"> 
<title>Order Details</title>
</head>

<body>

		<!--========== Navigation Bar ==========-->
<ul class="nav">
	<li><a class="active" id="home" href="/~cwhen/sit104/main.html"><b>Main Site</b></a></li>
</ul>
	
	<!-- These break tags are listed at the start of each section so that the navigation bar has room to fit when navigating the website -->
	<br>
	<br>
	<br>
	<br>
	
		<!--========== Heading ==========-->
<table style="width:100%">
  	<tr>
		<td width="80">&nbsp </td>
    	<td><img src="img/vendangewines.png" width="70%"></td>
		<td width="80"><img src="img/logo.png"></td>
  	</tr>
</table>

	<br>
	
		<!--========== Response Section ==========-->
<div>
<br>
<br>

<?php
// Extracts form data
$firstName = 	$_POST['FName'];
$lastName = 	$_POST['LName'];
$email = 		$_POST['EmailAddress'];
$contactPhone = $_POST['pNumber'];
$address =		$_POST['Address'];
$city =			$_POST['suburb'];
$country =		$_POST['country'];
$postCode =		$_POST['postcode'];
$product =		$_POST['wines'];
$quantity =		$_POST['quantity'];
$cardName =		$_POST['CardName'];
$cardNumber =	$_POST['CardNumber'];
$cardExpiry =	$_POST['ExpiryDate'];
$cardCVV =		$_POST['CVVCode'];

//connects to the DB
$dbuser = "cwhen";
$dbpass = "Lymphocyte88";
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) {
echo ("An error occurred connecting to the database");
exit;
}

// Creates the SQL statement to add the data
$sql = "INSERT INTO Orders VALUES ('$firstName', '$lastName', '$email', '$contactPhone', '$address', '$city', '$country', '$postCode', '$product', '$quantity', 'NULL', 'NULL', '$cardName', '$cardNumber', '$cardExpiry', '$cardCVV')";

// Add the data to the database as a new record using the SQL statement above.
$stmt = oci_parse($connect, $sql);
if(!$stmt) {
echo ("An error occurred in parsing the sql string.\n"); 
exit; 
} 
oci_execute($stmt);

echo ("<p>We have recieved your order</p>");
echo ("<h3>Thank you ".$firstName." for shopping with Vendange Wines.</h3>");
echo ("<h3>Your order details are as follows:</h3>");

$orderID = rand(100000, 999999);
echo ("<h4>Order Information:</h4>");
echo ("<p>Your order reference number is: ".$orderID."</p>");
echo ("<p><strong>Name:</strong> ".$firstName." ".$lastName."</p>");
echo ("<p><strong>Phone:</strong> ".$contactPhone."</p>");
echo ("<p><strong>Email:</strong> ".$email."</p>");
echo ("&nbsp;");
echo ("<h4>Delivery Address:</h4>");
echo ("<p><strong>Name:</strong> ".$firstName." ".$lastName."</p>");
echo ("<p>".$address.", ".$city.", ".$postCode."</p>");
echo ("<p>".$country."</p>");
echo ("&nbsp;");
echo ("<h4>Product Details:</h4>");
echo ("<p><strong>Product:</strong> ".$product."</p>");
echo ("<p><strong>Quantity:</strong> ".$quantity."</p>");
?>

<p>Please click the home button in the top navigation bar to return to the site</p>
<br>
<br>
</div>
<br>
<div style="margin-left: 200px; margin-right: 200px">
	<p style="font-size: 10px; margin-left: 50px; margin-right: 50px">©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>

</html>
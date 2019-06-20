<!DOCTYPE html>
<html class="section">
<head>
<meta charset="utf-8">
<link href="main.css" rel="stylesheet"> 
<title>Contact Details</title>
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
$firstName = 	$_POST['FirstName'];
$lastName = 	$_POST['LastName'];
$contactPhone = $_POST['ContactPhone'];
$email = 		$_POST['EmailAddress'];
$comment =		$_POST['comments'];

//connects to the DB
/* Set oracle user login and password info */
$dbuser = "cwhen"; /*deakin login */
$dbpass = "Lymphocyte88"; /*oracle access password */
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) {
echo ("An error occurred connecting to the database");
exit;
}

// Creates the SQL statement to add the data
$sql = "INSERT INTO Contacts VALUES ('$firstName', '$lastName', '$contactPhone', '$email', '$comment')";

// Add the data to the database as a new record using the SQL statement above.
$stmt = oci_parse($connect, $sql);
if(!$stmt) {
echo ("An error occurred in parsing the sql string."); 
exit; 
}

oci_execute($stmt);
echo ("<p>We have recieved your message and added it to the database</p>");

echo ("<h2>Thank you ".$firstName." for contacting us.</h2>");
echo ("<h2>We will get back to you shortly via the email:</h2>");
echo ("<h3>".$email."</h3>");
echo ("<p>Please click the Main Site button in the top navigation bar to return to the site</p>");
?>
<br>
<br>
</div>
<br>
<div style="margin-left: 200px; margin-right: 200px">
	<p style="font-size: 10px; margin-left: 50px; margin-right: 50px">©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.</p>
</div>
</body>

</html>
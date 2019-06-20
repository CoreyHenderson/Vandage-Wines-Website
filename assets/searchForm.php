<!DOCTYPE html>
<html class="section">
<head>
<meta charset="utf-8">
<link href="main.css" rel="stylesheet"> 
<title>Search Details</title>
<style>
td {
	height: 100px;
	padding: 10px;
}
</style>
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
$product = $_POST["searchInput"];
$sql = "SELECT * FROM Products WHERE lower(Name) like lower('$product%')";

//connects to the DB
$dbuser = "cwhen";
$dbpass = "Lymphocyte88";
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

// Checks whether a connection to a database has been made.
if (!$connect) {
echo ("An error occurred connecting to the database");
exit;
}

// parse the sql statement and the connection to the DB into stmt.
$stmt = oci_parse($connect, $sql);
if(!$stmt) {
echo ("An error occurred in parsing the sql string.\n");
exit;
}

oci_execute($stmt);
echo ("<h4>Showing all results for '".$product."':</h4>");
?>
<center>
<table style="border-spacing: 15px;">
<tr>
	<th><strong>Wine&nbsp;Name</strong></th>
	<th><strong>Vintage</strong></th>
	<th><strong>Price</strong></th>
	<th><strong>Image</strong></th>
</tr>
<?php
while (oci_fetch_array($stmt)) {
	echo ("<tr>");
		echo ("<td><strong>".oci_result($stmt, "NAME")."</strong></td>");
		echo ("<td>".oci_result($stmt, "VINTAGE")."</td>");
		echo ("<td>".oci_result($stmt, "PRICE")."</td>");
		echo ("<td> <img src='img/".oci_result($stmt, "PHOTO")."'></td>");
	echo ("</tr>");

}

oci_close($connect);

?>
</table>
</center>
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
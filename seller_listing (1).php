<?php
//navbar details

$servername = "localhost";
$username = "nabousaw";
$password = "Spring@*%2019";
$dbname = "nabousaw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}echo("<p> connection works </p>");

$sql1 = 'select mls_id from listing';

$sql = 'select city from listing where seller_id = ?';

echo("<p> SQL Equn assigned </p>");

// prepare and bind
$stmt = $conn->prepare($sql);
echo("<p> SQL prepared </p>");

$parameter = $_GET["seller_id"];
echo($parameter);
$stmt->bind_param('s', $parameter);
echo("<p> SQL param binded </p>");

$stmt->execute();
echo("<p> SQL excecuted </p>");

//$stmt->bind_result($mls, $sellID);
$stmt->bind_result($mls);
echo("<p> SQL resulted binded </p>");

// set parameters and execute
while($stmt->fetch()) {
	echo($mls);
	//echo (" <p> MLS: " . $mls . " - Seller ID: " . $sellID .  "</p>");
}
echo ("<p> end of results </p>");

echo("<p> SQL printed </p>");
 ?>

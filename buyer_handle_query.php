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

//$sql1 = 'select mls_id from listing';

//$sql = " select q.mls_id, q.asking_price, q.seller_id from listing q where lower(q.city) LIKE '?' and q.bedrooms >= ? and q.bathrooms >= ? and q.asking_price <= ? and q.square_feet >= ? " ;
$sql = " select q.mls_id, q.asking_price, q.seller_id from listing q where q.city like /'%?/' and q.bedrooms >= ? and q.bathrooms >= ? and q.asking_price <= ? and q.square_feet >= ? " ;
echo("<p> SQL Equn assigned </p>");

// prepare and bind
$stmt = $conn->prepare($sql);
echo("<p> SQL prepared </p>");

//$parameter = $_GET["seller_id"];
$city = $_GET['City'];
echo("city is" . $city);
//if($city == NULL){
//  $city = '%';
//}
//else{
//  $city = strtolower($city);
//}
$bathrooms = $_GET['Number_of_Bathrooms'];
echo("Bathrooms is (before if):" . $bathrooms);
if($bathrooms == NULL){
  $bathrooms = 0;

}
echo("Bathrooms is (after if):" . $bathrooms);

$bedrooms = $_GET['Number_of_Bedrooms'];
echo("Bedrooms is (before if):" . $bedrooms);
if($bedrooms == NULL){
  $bedrooms = 0;

}
echo("Bedrooms is (after if):" . $bedrooms);

$asking_price = $_GET['Max_Price'];
if($asking_price = ''){
  $asking_price = 0;
}
$square_feet = $_GET['Min_Square_Footage'];
if($square_feet == NULL){
  $square_feet = 0;
}
//echo($parameter);
$stmt->bind_param('siddd',$city,$bedrooms,$bathrooms,$asking_price,$square_feet);
echo("<p> SQL param binded </p>");

$stmt->execute();
echo($bedrooms);
echo("<p> SQL excecuted </p>");

//$stmt->bind_result($mls, $sellID);
$stmt->bind_result($listing_mls_id,$listing_asking_price,$listing_seller_id);
echo("<p> SQL resulted binded </p>");

// set parameters and execute
while($stmt->fetch()) {
	//echo'<p> ' . $stmt['$listing_mls_id'] . ' | Price: ' . $stmt['$listing_asking_price']|'Home Owner Seller ID' .$stmt['$listing_seller_id'];
  echo '<p> asking is' . $listing_asking_price .'</p>' ;
//  echo ("<p> end of results </p>");
}

//else {
  echo '<p> did not work</p>';
//}
//echo ("<p> end of results </p>");
echo '<p> End of Available Listings </p>';
echo("<p> SQL printed </p>");
 ?>

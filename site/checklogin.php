<?php
$host="localhost"; // Host name 
$db_name="products"; // Database name
$tbl_name="service"; // Table name

// Define $myusername and $mypassword
$username=stripslashes($_POST['myusername']); // MongoDB username
$password=stripslashes($_POST['mypassword']); // MongoDB password

// Connect to server and select database.
try {
	$conn = new $Mongo("mongodb://$username:$password@localhost/products");

	
// If no auth errors occur, we set session!

session_start();
$_SESSION["logged"] = true;
$_SESSION["username"] = $username;
header("location:login_success.php");

catch(MongoConnectionException $e) {
	echo $e->getMessage();
}
?>
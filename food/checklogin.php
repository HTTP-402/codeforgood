<?php
include('password_hash.php');
$host="localhost"; // Host name 
$db_name="products"; // Database name
$tbl_name="service"; // Table name

// Define $myusername and $mypassword
$username=stripslashes($_GET['myusername']); // username
$password=stripslashes($_GET['mypassword']); // password

// Connect to server and select database.

	// a new MongoDB connection
	$conn = new Mongo('localhost');

	// connect to test database
	$db = $conn->users;

	// a new products collection object
	$collection = $db->login;
	
	$pass = password_hash($password, PASSWORD_DEFAULT);
	$data = $collection->findOne(array("user" => $username));
	print_r($data);
	$data_pass = $data["password"];
	print_r($data_pass);
	print_r($pass);

	if(password_verify($password,$data_pass)){
		// If no auth errors occur, we set session!
		session_start();
		$_SESSION["logged"] = true;
		$_SESSION["username"] = $username;
		header("Location: index.php");
	}
	else {
		header("Location: main_login.php");
	}
	

?>
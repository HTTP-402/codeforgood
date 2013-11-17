<?php
include('password_hash.php');
try {
        // a new MongoDB connection
        $conn = new Mongo('localhost');
 
        // connect to test database
        $db = $conn->users;
 
        // a new products collection object
        $collection = $db->login;
		
		$pass = password_hash("wonderadmin", PASSWORD_DEFAULT);
		
		$user_details = array("user" => "admin", "password" => $pass);
        
        $collection->insert($user_details);
 
        // close the connection to MongoDB
        $conn->close();
}
catch ( MongoConnectionException $e )
{
        // if there was an error, we catch and display the problem here
        echo $e->getMessage();
}
 
?>
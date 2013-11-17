<?php

function insert_routes_into_database($kitchenID,$routes){
	try {
		// Connect to MongoDB
		$conn = new Mongo('mongodb://localhost');
		if (!$conn){
			echo "failed";
		}
		// connect to products database
		$db = $conn->products;

		// a new routes collection object
		$collection =  $db->routes;

		$routes['kitchenID'] = $kitchenID;
		$collection->insert($routes);

		// close connection to MongoDB
		$conn->close();
	} catch ( MongoConnectionException $e ) {
		// if there was an error, we catch and display the problem here
		echo $e->getMessage();
	} catch ( MongoException $e ) {
		echo $e->getMessage();
	}
}

function drop_routes_from_database(){
	
}

?>

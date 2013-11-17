<?php

include "parse.php";

echo "hello word";
try {
        // Connect to MongoDB
        $conn = new Mongo('mongodb://mike:password@localhost/products');
		if (!$conn){
		 echo "failed";
		}


        // // connect to test database
         $db = $conn->products;

        // a new products collection object
        $collection =  $db->service;

        // Create an array of values to insert 
		
		$csv = csv_to_array("service-users.csv");
		// print_r($test);
		$csv  = json_encode($csv );
		$csv  =json_decode($csv ,true);
		
		
		// $note =  $obj['note'];
		// var_dump($note);
		foreach ($csv  as $value) {
			$collection->insert($value);
			// echo "key is ".$key."\n<br>";
			// echo "value is ".$value."\n<br>";
		}
		echo "data inserted succeed!";
        // $product = array(
                        // 'name' => 'Televisions',
                        // 'quantity' => 25,
                        // 'price' => 499.99,
                        // 'note' => '54 inch flat screens'
                        // );

        // insert the array
        // $collection->insert( $product );
		
		

        // echo 'Product inserted with ID: ' . $product['_id'] . "\n";

        // close connection to MongoDB
        $conn->close();

}
catch ( MongoConnectionException $e )
{
        // if there was an error, we catch and display the problem here
        echo $e->getMessage();
}
catch ( MongoException $e )
{
        echo $e->getMessage();
}

echo "hello word2";

?>
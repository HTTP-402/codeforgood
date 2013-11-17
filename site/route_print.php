<?php
try {
        // a new MongoDB connection
        $conn = new Mongo('localhost');
 
        // connect to test database
        $db = $conn->products;
 
        // a new products collection object
        $collection = $db->service;
        
		
		foreach( $array as $route_id) {
			$doc = $collection->findOne(array("_id" => $route_id)); ?>
		<strong><p> Booking ID: <?php echo $doc["BookingID"]; ?> </p></strong>
		<em<p> Postcode: <?php echo $doc["PrimaryPostalCode"]; ?> </p></em>
		<ul>
		<?php
		
		for($i = 0, $i < $doc["NoMeals"]; ++$i) {
			$mealtype = $doc["MealType"][$i];
			$comment = $doc["Comments"][$i];
		?>
		
		<li>Meal Type:  <?php echo $mealtype; ?>
		 - <?php if empty($comment): ? echo "Comment: " . $comment; ?>
		</li> 
		<?php } ?>
		</ul>
		<br/><br/>
	<?php	
		}
        // close the connection to MongoDB
        $conn->close();
}
catch ( MongoConnectionException $e )
{
        // if there was an error, we catch and display the problem here
        echo $e->getMessage();
}
 
?>
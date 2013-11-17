<?php

define( 'GENERATION_COUNT', 10 );
define( 'POPULATION_COUNT', 10 );
define( 'MAX_MEALS_PER_ROUTE', 12 );
define( 'MAX_ROUTE_STOPS', 8 );

$kitchenLatLong = NULL;

function getNumMeals( $nodesArray ){
	$sum = 0;
	foreach($nodesArray as $index=>$node){
		$sum += intval($node["NoMeals"]);
	}
	return $sum;
}

function distance_between_points($lat1, $lon1, $lat2, $lon2){
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	return ($miles * 1.609344);
}

function routeLength( $route ){
	global $kitchenLatLong;
	$distance = 0;
	foreach( $route as $index => $node ){
		if( $index == 0 ){
			$distance += distance_between_points( $kitchenLatLong["latitude"], $kitchenLatLong["longitude"], $node["Location"]["lat"], $node["Location"]["lng"] );
		} else if( $index >= 1 ) {
			$distance += distance_between_points( $route[$index-1]["Location"]["lat"], $route[$index-1]["Location"]["lng"], $node["Location"]["lat"], $node["Location"]["lng"] );
		}
	}
	return $distance;
}

// Find the fitness of a solution (being the sum of the length of the route)
function fitnessSolution( $solution ){
	$fitness = 0;
	foreach( $solution as $routeIndex => $route ) {
		if(count($route)>MAX_ROUTE_STOPS) 
			$fitness = 99999999;
		$fitness += routeLength($route);
	}
	return ( $fitness );
}

function countPresent( $solution, $var ) {
	$count = 0;
	for( $i = 0; $i < count( $solution ); $i++ )
		for( $j = 0; $j < count( $solution[$i] ); $j++ )
			if( $solution[$i][$j] == $var )
				$count++;

	return $count;
}

function repairSolution( $solution, $nodesArray ) {
	$missingVals = [];
	for( $i = 0; $i < count( $nodesArray ); $i++ ) {
		if( countPresent( $solution, $nodesArray[$i] ) < 1 )
			array_push( $missingVals, $nodesArray[$i] );
	}

	// Randomise order of missing vals
	array_rand( $missingVals );

	// Nested for loop heaven
	for( $i = 0; $i < count( $solution ); $i++ ) {
		for( $j = 0; $j < count( $solution[$i] ); $j++ ) {
			if( countPresent( $solution, $solution[$i][$j] ) > 1 ) {
				$solution[$i][$j] = array_pop( $missingVals );
			}
		}
	}

	return $solution;
}

// Returns an array of {numDriversMax} routes
function generateSolution( $nodesArray, $numDriversMax ){
	$solution = [];
  		
	// Randomize the array.
	array_rand( $nodesArray );

	for( $r = 0; $r < $numDriversMax; $r++ ){
		$solution[$r] = [];
		$numMeals = 0;	
		while( !empty( $nodesArray ) ) {
				
			// Grab one off the end
			$node = array_pop( $nodesArray );
			$numMeals += $node["NoMeals"];

			// Check it would not put us over the limit
			if( $numMeals > MAX_MEALS_PER_ROUTE ) {
				// Put it back on and go to the next iteration
				array_push( $nodesArray, $node );
				break;
			}
			
			// Put this node on the array
			array_push( $solution[$r], $node );
		}
	}

	if( !empty( $nodesArray ) ) {
		print_r( "Reached max driver allowance, but still have nodes left" );
		#print_r( $nodesArray );
	}

	return $solution;
}

// Population is an array of solutions
function generatePopulation( $nodesArray, $numDriversMax ){
	$nodesArray_copy = $nodesArray;
	$population = [];
	for( $i = 0; $i < POPULATION_COUNT; $i++){
		$nodesArray = $nodesArray_copy;
		$population[$i] = generateSolution( $nodesArray, $numDriversMax );
	}
	return $population;
}

function geneticAlgorithm( $kitchenLatLong_in, $nodesArray_in ){
	// Stuff
	global $kitchenLatLong;
	$kitchenLatLong = $kitchenLatLong_in;
	$nodesArray = $nodesArray_in;
	$numDriversMax = ceil( getNumMeals( $nodesArray ) / MAX_MEALS_PER_ROUTE );

	// Generate the population
	$population = generatePopulation( $nodesArray, $numDriversMax );
	$bestSolution;
	$bestScore=9999999;
	for( $gen=0; $gen < GENERATION_COUNT; $gen++ ){
		print "gen".$gen;

		$fitnesses = [];
		for( $solution = 0; $solution < count( $population ); $solution++ ) {
			$fitnesses[$solution] = fitnessSolution( $population[$solution] );
			if($fitnesses[$solution]<$bestScore){
				print $fitnesses[$solution];
				$bestSolution = $population[$solution];
				$bestScore = $fitnesses[$solution];
			}

		}

		// BUBBLES SORTEZ
		$swapped = false;
		do
		{
			for( $i = 1; $i < count( $fitnesses ); $i++ )
			{
				if( $fitnesses[$i - 1] > $fitnesses[$i] )
				{
					$swapped = true;
					$temp = $fitnesses[$i];
					$fitnesses[$i] = $fitnesses[$i - 1];
					$fitnesses[$i - 1] = $temp;

					$temp = $poplation[$i];
					$population[$i] = $population[$i - 1];
					$population[$i - 1] = $temp;
				}
			}
		} while( $swapped != false );

		// Crossover function goes here
		$newPopulation = [];

		for( $i = 0; $i < (POPULATION_COUNT / 2); $i += 2 ) {
			$solution1 = array_pop( $population );
			$solution2 = array_pop( $population );

			// Choose two of the best solutions
			// Choose the better parent
			$fitness1 = fitnessSolution( $solution1 );
			$fitness2 = fitnessSolution( $solution2 );

			// Take a route from one solution and swap it with one for another.
			$randIndex = rand(0,count($solution1)-1);
			$temp = $solution1[$randIndex];
			$solution1[$randIndex] = $solution2[$randIndex];
			$solution2[$randIndex] = $temp;

			// Then repair the new solutions so no duplicates
			$solution1 = repairSolution( $solution1, $nodesArray );
			$solution2 = repairSolution( $solution2, $nodesArray );

			array_push( $newPopulation, $solution1 );
			array_push( $newPopulation, $solution2 );
		}

		$population = $newPopulation;
	}

	print $bestScore;
	return $bestSolution;
}



// Request data from the database
$conn = new Mongo('mongodb://localhost');
if (!$conn){
	echo "failed";
}
// connect to products database
$db = $conn->products;
// a new collections object
$clusters = $db->clusters;
$cursor = $clusters->find();
var_dump($cursor);
// Find the nodes
$services = array();
$index = 0;
foreach($cursor as $cluster){
	$services[$index] = $db->service->find(array("_id"=>$cluster[1]));
	$index++;
}
$conn->close();



// Fetch kitchen data (latitude and longitude data)
$kitchens = array();
$row = 0;
if (($handle = fopen("../../kitchens.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		$kitchens[$row]=array("latitude"=>$data[2],"longitude"=>$data[3]);
		$row++;
	}
	fclose($handle);
}

foreach($kitchens as $kitchenLatLong_in){

	$BestSolution = geneticAlgorithm($kitchenLatLong_in, $services );
	foreach($BestSolution as $index=>$route){
		print $index." ".count($route)."\n";
	}
	print "\n";
	/*try {
		// Connect to MongoDB
		$conn = new Mongo('mongodb://localhost');
		if (!$conn){
			echo "failed";
		}
		// connect to products database
		$db = $conn->products;

		// a new routes collection object
		$routes =  $db->routes;

		$routes['kitchenID'] = $kitchenID;
		$routes->insert($routes);

		// close connection to MongoDB
		$conn->close();
	} catch ( MongoConnectionException $e ) {
		// if there was an error, we catch and display the problem here
		echo $e->getMessage();
	} catch ( MongoException $e ) {
		echo $e->getMessage();
	}*/
}

?>

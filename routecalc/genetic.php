<?php

define( 'GENERATION_COUNT', 10 );
define( 'POPULATION_COUNT', 10 );
define( 'MAX_MEALS_PER_ROUTE', 12 );

function getNumMeals( $nodesArray ){
	// HARDCODED 'TIL WE UN-HARD-CODE IT
	return 30;
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
	$distance = 0;
	foreach( $route as $index => $node ){
		if( $index == 0 ){
			$distance += distance_between_points( $kitchenLatLong["latitude"], $kitchenLatLong["longitude"], $node["latitude"], $node["longitude"] );
		} else if( $index >= 1 ) {
			$distance += distance_between_points( $route[$index-1]["latitude"], $route[$index-1]["longitude"], $node["latitude"], $node["longitude"] );
		}
	}
	return $distance;
}

// Find the fitness of a solution (being the sum of the length of the route)
function fitnessSolution( $solution ){
	$fitness = 0;
	foreach( $solution as $routeIndex => $route ) {
		$fitness += routeLength($route);
	}
	return ( 1 / $fitness );
}

function countPresent( $solution, $var ) {
	$count = 0;
	for( $i = 0; $i < count( $solution ); $i++ )
		for( $j = 0; $j < count( $solution[i] ); $j++ )
			if( $solution[i][j] == $var )
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
			if( countPresent( $solution[$i][$j] ) > 1 ) {
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
		$numMeals = 0;	
		while( !empty( $nodesArray ) ) {
				
			// Grab one off the end
			$node = array_pop( $nodesArray );
			$numMeals += $node["NoMeals"];

			// Check it would not put us over the limit
			if( $numMeals < MAX_MEALS_PER_ROUTE ) {
				// Put it back on and go to the next iteration
				array_push( $solution, $node );
				break;
			}
			
			// Put this node on the array
			array_push( $solution, $node );
		}
	}

	if( !empty( $nodesArray ) ) {
		print_r( "Reached max driver allowance, but still have nodes left" );
		print_r( $nodesArray );
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
	$kitchenLatLong = $kitchenLatLong_in;
	$nodesArray = $nodesArray_in;
	$numDriversMax = ceil( getNumMeals( $nodesArray ) / MAX_MEALS_PER_ROUTE );

	// Generate the population
	$population = generatePopulation( $nodesArray, $numDriversMax );

	for( $gen=0; $gen < GENERATION_COUNT; $gen++ ){
		$fitnesses = [];
		for( $solution = 0; $solution < count( $population ); $solution++ ) {
			$fitnesses[$solution] = fitnessSolution( $population[$solution] );
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
			$randIndex = rand(0,count($solution1));
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

	var_dump($population);
	return $population;
}



# ASSUMING FOR ONE GENETIC ALGORITHM RUN

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
// Find the nodes
foreach($cursor as $cluster){
	print_r($cluster);
	exit();
}
/*






$collection = $services.find();
$collection =  $db->services$db->collections;




// Fetch kitchen data (latitude and longitude data)
$kitchens = array();
$row = 0;
if (($handle = fopen("kitchens.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		$kitchenLatLong_in[$row]=array($data[2],$data[3],$data[6]);
		$row++;
	}
	fclose($handle);
}

foreach($kitchens as $kitchen){
	# geneticAlgorithm($kitchenLatLong_in, $nodesArray_in);
}*/

?>

<?php

try {
        // a new MongoDB connection
        $conn = new Mongo('localhost');
 
        // connect to test database
        $db = $conn->products;
 
        // a new products collection object
        $collection = $db->service;
 
        // fetch all product documents
        $cursor = $collection->find();
 
        // How many results found
        $num_docs = $cursor->count();
 
        if( $num_docs > 0 )
        {
				$i = 0;
				$locs = array();
				$ids = array();
                // loop over the results
                foreach ($cursor as $obj)
                {
					print_r($obj['Location']);
					//$locs[$i][0] = $obj['Location']['lat'];
					//$locs[$i][1] = $obj['Location']['lng'];
					$ids[$i]= $obj['_id'];
					$i++;
                }
  
        }
        else
        {
                // if no products are found, we show this message
                echo "No products found \n";
        }
        // close the connection to MongoDB
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
/*
// Fetch data about users
$users = array();
for($row=0; $row<count($locs); $row++)
{
	$users[$row]=array($locs[$row][0], $locs[$row][1], $ids[$row]);
}

$kitchens = array();
$row = 0;
if (($handle = fopen("kitchens.csv", "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$num = count($data);
	$kitchens[$row]=array($data[2],$data[3],$data[6]);
	$row++;
}
fclose($handle);
}

function distance($lat1, $lon1, $lat2, $lon2) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  return $miles;
}
$distances = array();
$kcount=0;
//find distance between all destinations and each kitchen

foreach($kitchens as $k)
{	
	$dist = array();
	$count = 0;
	foreach($users as $u)
	{
		$dist[$count] = distance($k[0], $k[1], $u[0], $u[1]);
		$count++;
	}
	$distances[$kcount]=$dist;
	$kcount++;
	
}
?>

<!--nearest neighbour til capacity-->
<?php 
$set=0;
$collection = array(array(), array(), array());

while($set < count($users))
{
	for($k=0;$k<count($kitchens);$k++)
	{	
		$a=array_keys($distances[$k], min($distances[$k]));
		//print_r($a);
		$distances[0][$a[0]]=9999;
		$distances[1][$a[0]]=9999;
		$distances[2][$a[0]]=9999;
		$set++;
		$collection[$k][]=$users[$a[0]];	
	}
}

for($k=0;$k<count($kitchens);$k++)
{
	foreach($collection[$k] as $c)
	{
		echo $c[2]."<br>";
	}
	echo "<br>";
}
*/
?>
<?php
function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename)){
		echo "File not read";
        return FALSE;
	}

    $header = NULL;
	$prev = NULL;
	$entry = array();
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 500, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else {
				$entry = make_array($header, $row);
				if(!empty($entry['Nickname'])){
					if(!empty($prev))
						$data[] = $prev;
					$prev = $entry;
				} else {
					array_push($prev['Comments'], $entry['Comments'][0]);
					array_push($prev['MealType'], $entry['MealType'][0]);
					array_push($prev['BookingID'], $entry['BookingID'][0]);
				}
			}
        }
        fclose($handle);
    }
    return $data;
}

function make_array($headers, $row)
{
	$array = array();
	foreach($headers as $key => $value)
	{
		$switch = sanitize_key($value);
		switch($value){
		case 'Primary Postal Code':
			$array[$switch] = $row[$key];
			$array['Location'] = get_lat_lng($row[$key]);
			break;
		case 'Kitchen':
			$array[$switch] = $row[$key];
			break;
		case 'Notes from kitchen':
			$array[$switch] = $row[$key];
			break;
		case 'Route and Code':
			$array[$switch] = $row[$key];
			break;
		case 'Birthdate':
			$array[$switch] = $row[$key];
			break;
		case 'Meal Type':
			$array[$switch] = array(empty($row[$key]) ? 'err' : $row[$key]);
			break;
		case 'Booking ID':
			$array[$switch] = array(empty($row[$key]) ? 'err' : $row[$key]);
			break;
		case 'Comments':
			$array[$switch] = array(empty($row[$key]) ? 'nil' : $row[$key]);
			break;
		case 'Cake?':
			$array[$switch] = empty($row[$key]) ? 'No' : $row[$key];
			break;
		default:
			$array[$switch] = $row[$key];
			break;
		}
	}
	return $array;
}

function sanitize_key($key)
{
	return str_replace(array('\n','\r',' ', '.', ','), '', ucwords($key));
}

function get_lat_lng($postcode)
{
	$request_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($postcode)."&sensor=true";
	$rec = @file_get_contents($request_url);
	$back = json_decode($rec, true);
	if($back['status'] !== 'OK'){
		return array();
	}
	return array(
		'lat' => $back['results'][0]['geometry']['location']['lat'],
		'lng' => $back['results'][0]['geometry']['location']['lng']
	);
}

$out = csv_to_array("service-users.csv");
print_r($out);
?>
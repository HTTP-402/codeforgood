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
			$array[$switch] = array(empty($row[$key]) ? 'none' : $row[$key]);
			break;
		case 'Cake?':
			$array[$switch] = empty($row[$key]) ? 'no' : $row[$key];
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
	return str_replace(array(' ', '.', ','), '', ucwords($key));
}

$out = csv_to_array("service-users.csv");
print_r($out);
?>
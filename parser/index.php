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
					array_push($prev['Meal Type'], $entry['Meal Type'][0]);
					array_push($prev['Booking ID'], $entry['Booking ID'][0]);
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
		switch($value){
		case 'Kitchen':
			$array[$value] = $row[$key];
			break;
		case 'Notes from kitchen':
			$array[$value] = $row[$key];
			break;
		case 'Route and Code':
			$array[$value] = $row[$key];
			break;
		case 'Birthdate':
			$array[$value] = $row[$key];
			break;
		case 'Meal Type':
			$array[$value] = array(empty($row[$key]) ? 'err' : $row[$key]);
			break;
		case 'Booking ID':
			$array[$value] = array(empty($row[$key]) ? 'err' : $row[$key]);
			break;
		case 'Comments':
			$array[$value] = array(empty($row[$key]) ? 'none' : $row[$key]);
			break;
		case 'Cake?':
			$array[$value] = empty($row[$key]) ? 'no' : $row[$key];
			break;
		default:
			$array[$value] = $row[$key];
			break;
		}
	}
	return $array;
}

$test = csv_to_array("service-users.csv");
print_r($test);
?>
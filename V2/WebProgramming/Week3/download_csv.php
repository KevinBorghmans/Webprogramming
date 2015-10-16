<?php 
include 'include/connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$fp = fopen('php://output', 'w');

$query ='SELECT * FROM location';	
$result = mysqli_query($con, $query);

$num_rows = mysqli_num_rows($result);

if ($num_rows >= 1){
	$row = mysqli_fetch_assoc($result);
	
	$seperator = "";
	$comma = "";
	
	foreach ($row as $name => $value) {
		$seperator .= $comma . '' .str_replace('','""',$name);
		$comma = ",";
	}
	$seperator .= "\n";

	fputs($fp,$seperator);
	
	mysqli_data_seek($result, 0);
	
	while($row = mysqli_fetch_assoc($result)) {
		$seperator = "";
		$comma = "";
		
		foreach ($row as $name => $value) {
			$seperator .= $comma . '' .str_replace('','""',$value);
			$comma = ",";
		}
		$seperator .= "\n";
	fputs($fp,$seperator);
	}
	fclose($fp);
}

?>
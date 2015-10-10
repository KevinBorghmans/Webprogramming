<?php 
//header('Content-type: application/json'); 
$songs = array();
if ($handvat = fopen("http://datasets.flowingdata.com/tv-earners/top-tv-earners.csv", "r")) {     
    while ($song = fgetcsv($handvat, 0, ",")){         
        $songs[]= array($song);     
        }fclose($handvat);     
//        echo json_encode(array($songs)); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <style>
table, th, td{
    border: 1px solid black;
    border-collapse: collapse;
}
       
th, td {
    padding: 5px;
}
       
</style>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table style="width:100%">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Show</th>
        <th>Pay per episode</th>
        <th>Show Type</th>
    </tr>
    <tr>
    <?php

$all = sizeof($songs);

for ($i=1; $i< $all; $i++){   
    $line[] = json_encode(array($songs[$i][0][0]));
}

$a=0;

foreach ($line as $name)
{
    $a++;
    $results = array();
    preg_match('#^[["]"?(\w+\.)?\s*([\'\’\w]+)\s+([\'\’\w]+)\s*(\w+\.?)?"[]]$#', $name, $results);

    ?>
    <td><?php echo $results[2] ?></td>
    <td><?php echo $results[3] ?></td>
    <td><?php echo json_encode(array($songs[$a][0][1]))?></td>
    <td><?php echo json_encode(array($songs[$a][0][2]))?></td>
    <td><?php echo json_encode(array($songs[$a][0][3]))?></td>
    </tr>
    <?php
}
?>


</body>
</html>

</table>



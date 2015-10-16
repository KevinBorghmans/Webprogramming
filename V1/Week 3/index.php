<?php 
error_reporting(E_ALL);

include 'include/connect.php';

if(isset($_POST['uploadCsv'])){
	$file = $_FILES['file']['tmp_name'];
	
	$handle = fopen($file, "r");
	while(($fileop = fgetcsv($handle, 1000, ",")) !== false) {
		$table_row2 = $fileop[0];
		$table_row3 = $fileop[1];
		$table_row4 = $fileop[2];
		
		//$insert = "INSERT INTO `match` (match_against, match_date, match_time, match_where) VALUES ('$match_against', '$match_date', '$match_time', '$match_where')";
		//$run_insert = mysqli_query($con, $insert);
		
		$insert = $con->prepare("INSERT INTO `table` (table_row2, table_row3, table_row4) VALUES (?, ?, ?)");
		$insert->bind_param("sis", $table_row2, $table_row3, $table_row4);
		$insert->execute();
		$insert->close();
		//header("location:invoer.php");
	}
}

$query ='SELECT * FROM `table`';	
$result = mysqli_query($con, $query);

function showData($data1, $data2, $data3) {
	?>
    <tr>
    	<td><?php echo $data1 ?></td>
        <td><?php echo $data2 ?></td>
        <td><?php echo $data3 ?></td>
	</tr>
	<?php
}
?>
<div id="cmsContent">
	<a href="download_csv.php"><button>download data als csv</button></a>
	<h1 class="floatLeft">Voeg een csv bestanden toe</h1>
	<form class="cmsForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
        <ul>
            <li>
            	<p>Upload bestand:</p>
                <input type="file" name="file">
            </li>
            <li>
                <input type="submit" name="uploadCsv" class="btn btn-2 btn-2c" value="Upload dit csv bestand">
            </li>
        </ul>
    </form>
    <table>
    	<h2>Mijn Data</h2>
    	<?php
		while ($row = mysqli_fetch_array($result)){
			showData ($row['table_row2'], $row['table_row3'], $row['table_row4']);
		}
		?>
    </table>
    
</div>
</body>
</html>

<?php
if(isset($_POST['lat'])){
    include 'connect.php';
    
    $lat = $_POST["lat"];
    $long = $_POST["long"];
    $geo = $_POST["geo"];
    
    $sql  =  "INSERT INTO location SET lat='$lat', geo='$geo', lng='$long'" ;
    
    if (mysqli_query($con, $sql))
             {
                echo 'Your location is know';
             }
             else
             { 
                 echo ' Fout: ' . $sql . '<br>' . mysqli_error($con);
             }
             
             mysqli_close($con);         
}
?>


<html>
<body>

Lat <?php echo $lat; ?><br>
Long <?php echo $long; ?><br>
Geo <?php echo $geo; ?><br>

<a href="Multiple_picture_upload/index.php">Upload images</a><br>
<a href="Multiple_picture_upload/maps.php">See yourself on map</a>
</body>
</html>
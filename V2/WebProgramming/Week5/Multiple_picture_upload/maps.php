<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
 <?php
include 'connect.php';
        $sqli = "SELECT * FROM location";
        $res2 = mysqli_query($con, $sqli);
        $loc = [];
        if ($res2->num_rows > 0) {
             while($row = $res2->fetch_assoc()) {
                 $geo = $row["geo"];
                 $lng = $row["lng"];
                 $lat = $row["lat"];
                $loc[] = array(
    // product abbreviation, product name, unit price
    array($geo, $lat, $lng)
);
             }
        }


?>
<script type="text/javascript">
// pass PHP array to JavaScript array
var loc = <?php echo json_encode($loc) ?>;
</script>
 
  <div id="map" style="width: 100%; height: 400px;"></div>
  <script type="text/javascript">
        var locations = [
        ];    

      
      for (a=0; a <loc.length; a++){
         var geo = [loc[a][0][0], loc[a][0][1],loc[a][0][2], a];
          locations.push(geo);
      }
      
     
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 1,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
  <a href="../index.php">upload your location</a><br>
  <a href="index.php">upload images</a>
</body>
</html>
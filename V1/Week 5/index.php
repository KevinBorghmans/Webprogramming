<!DOCTYPE html>

<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 75%;
        width: 100%;
      }
    </style>
  </head>
  <body>

    <div id="map"></div>
    <div id="id01"></div>
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15
  });
    
//    var marker = new google.maps.Marker({
//    position: initMap,
//    map: map,
//    title: 'Hello World!'
//  });
    
 var infowindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
    
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
        
        var geocoder = new google.maps.Geocoder;
        var lat = position.coords.latitude
        var long = position.coords.longitude
        document.getElementById('lat').value = lat;
        document.getElementById('long').value = long;
        
        
           

//  var infowindow = new google.maps.InfoWindow({
//    content: contentString
//  });
//        
  var latlng = {lat: parseFloat(lat), lng: parseFloat(long)};
    
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(15);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[1].formatted_address);
        document.getElementById('geo').value = (results[1].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });      
        
//var marker = new google.maps.Marker({
//position: pos,
//map: map,
//animation: google.maps.Animation.DROP,
//title: 'Hello World!'
//  });
//
// marker.addListener('click', function() {
//    infowindow.open(map, marker);
//  });
        
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
        
      

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFHrwfWHaoDw9rFf2ArKuJ9-T5Z3JW0mE&callback=initMap">
    </script>
    
<form action="test.php" method="post">
        <input id="lat" type="text" name="lat" value="" hidden>
        <input id="long" type="text" name="long" value="" hidden>
        <input id="geo" type="text" name="geo" value="" hidden>
        <input type="submit">
</form>
  </body>
</html>

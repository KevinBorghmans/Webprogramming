<?php
    session_start();
    include '../include/connect.php';

    if(!empty($_SESSION['user'])){

        $username = $_SESSION["user"];
        $_SESSION['user'] = $username;
        
        
        
         $sqli = "SELECT * FROM location";
        $res2 = mysqli_query($con, $sqli);
        $loc = [];
        if ($res2->num_rows > 0) {
             while($row = $res2->fetch_assoc()) {
             }
        }

   
    $sql = "SELECT role, thumb, firstname, lastname FROM user WHERE username = '".$username."'" ;
        
    $result = mysqli_query($con, $sql);
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 
             
    
?>


<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Prologue by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../Pages/assets/css/main.css" />
		<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
          
          <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 500px;
        width: 960px;
          margin: 0 auto;
          color:#000;
      }
    </style>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
                            <a href="../php/profile_image_upload.php"><span class="image avatar48"><img src="../php/<?php echo $row['thumb']; ?>" alt="thumb" class="show"/><img src="../Images/icon.png" id="btn" alt="btn"/></span></a>
							<h1 id="title"><?php echo $row['firstname'] .' '. $row['lastname']; ?></h1>
							<p><a href="../php/edit_profile.php">Edit profile</a></p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul>
								<li><a href="../Pages/main.php#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Maps</span></a></li>
								<li><a href="../Pages/main.php#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Gallery</span></a></li>
								<li><a href="../Pages/main.php#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Me</span></a></li>
								<li><a href="../Pages/main.php#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact</span></a></li>
								<li><a href="" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Upload location</span></a></li>
								<li>
                                <a href='../php/Multiple_picture_upload/index.php' id='portfolio-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Upload Gallery</span>
                                </a>
                            </li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">
						<header>
								<h2>Your Location</h2>
							</header>

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
    
<form action="geo_upload.php" method="post">
        <input id="lat" type="text" name="lat" value="" hidden>
        <input id="long" type="text" name="long" value="" hidden>
        <input id="geo" type="text" name="geo" value="" hidden>
        <input type="submit"><br>
        <a href="../Pages/main.php">see yourself on the map</a><br>
        <a href="Multiple_picture_upload/index.php">upload images</a>
</form>
						</div>
					</section>

				<!-- Portfolio -->
					

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
	<?php 
             }
        }
    }else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
    ?>
</html>
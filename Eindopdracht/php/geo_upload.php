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
                 $geo = $row["geo"];
                 $lng = $row["lng"];
                 $lat = $row["lat"];
                $loc[] = array(
    // product abbreviation, product name, unit price
    array($geo, $lat, $lng)
);
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
								<li><a href="upload_location.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-location">Upload location</span></a></li>
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

						<?php
if(isset($_POST['lat'])){
    include '../include/connect.php';
    
    $lat = $_POST["lat"];
    $long = $_POST["long"];
    $geo = $_POST["geo"];
    
    $sql  =  "INSERT INTO location SET lat='$lat', geo='$geo', lng='$long'" ;
    
    if (mysqli_query($con, $sql))
             {
                echo 'Your location <br>';
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
<?php echo $geo; ?><br><br><br>

<a href="Multiple_picture_upload/index.php">Upload images</a><br>
<a href="../Pages/main.php">See yourself on map</a>

	</body>
	<?php 
             }
        }
    }else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
    ?>
</html>

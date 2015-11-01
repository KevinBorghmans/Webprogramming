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

   
    $sql = "SELECT role, thumb, firstname, fullsize, abouttxt, lastname FROM user WHERE username = '".$username."'" ;
        
    $result = mysqli_query($con, $sql);
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 $fullsize = $row['fullsize'];
                 $abouttxt = $row['abouttxt'];
                 
             
    
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
        <!--[if lte IE 8]>
        <script src="assets/js/ie/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="assets/css/ie8.css" />
        <![endif]-->
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="assets/css/ie9.css" />
        <![endif]-->
    </head>

    <body>
        <!-- Header -->
        <div id="header">
            <div class="top">
                <!-- Logo -->
                <div id="logo">
                    <a href="../php/profile_image_upload.php">
                        <span class="image avatar48">
                            <img src="../php/<?php echo $row['thumb']; ?>" alt="thumb" class="show"/>
                                <img src="../Images/icon.png" id="btn" alt="btn"/>
                            </span>
                    </a>
                    <h1 id="title">
                            <?php echo $row['firstname'] .' '. $row['lastname']; ?>
                        </h1>
                    <p>
                        <a href="../php/edit_profile.php">Edit profile</a>
                    </p>
                </div>
                <!-- Nav -->
                <nav id="nav">
                    <?php 
                 
                 if($row["role"] == "user") {
							echo "
                        <ul>
                            <li>
                                <a href='#top' id='top-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-home'>Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href='#portfolio' id='portfolio-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href='#about' id='about-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-user'>About Me</span>
                                </a>
                            </li>
                            <li>
                                <a href='#contact' id='contact-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-envelope'>Contact</span>
                                </a>
                            </li>
                            <li>
                                <a href='../php/upload_location.php' id='contact-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Upload location</span>
                                </a>
                            </li>
                            <li>
                                <a href='../php/Multiple_picture_upload/index.php' id='portfolio-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Upload Gallery</span>
                                </a>
                            </li>
                        </ul>" ;} 
                 
                 else if($row["role"] == "admin"){
                                    echo "
                        <ul>
                            <li>
                                <a href='#top' id='top-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-home'>Edit users</span>
                                </a>
                            </li>
                            <li>
                                <a href='#portfolio' id='portfolio-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Backup Database</span>
                                </a>
                            </li>
                        </ul>" ;  
                                    }
                    else if($row['role'] == "viewer"){
                        
                        echo  "<ul>
                            <li>
                                <a href='#top' id='top-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-home'>Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href='#portfolio' id='portfolio-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-th'>Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href='#about' id='about-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-user'>About Me</span>
                                </a>
                            </li>
                            <li>
                                <a href='#contact' id='contact-link' class='skel-layers-ignoreHref'>
                                    <span class='icon fa-envelope'>Contact</span>
                                </a>
                            </li>
                            </ul>"
                        
                    ;}?>
                </nav>
            </div>
            <div class="bottom">
                <!-- Social Icons -->
                <ul class="icons">
                    <li>
                        <a href="#" class="icon fa-twitter">
                            <span class="label">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon fa-facebook">
                            <span class="label">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon fa-github">
                            <span class="label">Github</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon fa-dribbble">
                            <span class="label">Dribbble</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="icon fa-envelope">
                            <span class="label">Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
            if($row["role"] == "user"){    
        ?>
        <!-- Main -->
        <div id="main">
            <!-- Intro -->
            <section id="top" class="one dark cover">
                <div class="container">
                    
                        <header>
                            <h2>Maps</h2>
                        </header>
                        <script type="text/javascript">
                            // pass PHP array to JavaScript array
                            var loc =
                                <?php echo json_encode($loc) ?>;
                        </script>
                        <div id="map" style="width: 100%; height: 800px; color: #000;"></div>
                        <script type="text/javascript">
                            var locations = [
        ];


                            for (a = 0; a < loc.length; a++) {
                                var geo = [loc[a][0][0], loc[a][0][1], loc[a][0][2], a];
                                locations.push(geo);
                            }


                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 2,
                                center: new google.maps.LatLng(30, 0),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        </script>
                </div>
            </section>
            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">
                    <header>
                        <a href="gallery.php">
                            <h2>Gallery</h2>
                        </a>
                    </header>
                    <div class="row">
                        <?php 
        
$sql = "SELECT DISTINCT geo FROM location limit 6" ;
        
    $result = mysqli_query($con, $sql);
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 
                 ?>
                            <div class="4u 12u$(mobile)">
                                <article class="item">
                                    <a href="/Pages/<?php echo $row['geo'] ?>.php" class="image fit">
                                        <img src="images/pic02.jpg" alt="" />
                                    </a>
                                    <header>
                                        <h3>
                                                <?php echo $row['geo'];?>
                                            </h3>
                                    </header>
                                </article>
                            </div>
                            <?php
             }
         }
    
?>
                    </div>
                </div>
            </section>
            <!-- About Me -->
            <section id="about" class="three">
                <div class="container">
                    <header>
                        <h2>About Me <a href="../php/about_update.php"><img src="../Images/edit3.png"/></a></h2>
                    </header>
                    <a href="#" class="image featured">
                        <img src="../php/<?php echo $fullsize?>" alt="" />
                    </a>
                    <p><?php echo $abouttxt ?></p>
                </div>
            </section>
            <!-- Contact -->
            <section id="contact" class="four">
                <div class="container">
                    <header>
                        <h2>Contact</h2>
                    </header>
                    <p>Elementum sem parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>
                    <form method="post" action="#">
                        <div class="row">
                            <div class="6u 12u$(mobile)">
                                <input type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="6u$ 12u$(mobile)">
                                <input type="text" name="email" placeholder="Email" />
                            </div>
                            <div class="12u$">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="12u$">
                                <input type="submit" value="Send Message" />
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <div id="footer">
            <!-- Copyright -->
            <ul class="copyright">
                <li>&copy; Untitled. All rights reserved.</li>
                <li>Design:
                    <a href="http://html5up.net">HTML5 UP</a>
                </li>
            </ul>
        </div>
        <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/jquery.scrolly.min.js"></script>
                <script src="assets/js/jquery.scrollzer.min.js"></script>
                <script src="assets/js/skel.min.js"></script>
                <script src="assets/js/util.js"></script>
                <!--[if lte IE 8]>
                        <script src="assets/js/ie/respond.min.js"></script>
                        <![endif]-->
                <script src="assets/js/main.js"></script>
        <?php }
                 
else if($row["role"] == "admin") { 
    ?>
    
    
    
    
    
    
    
    
    
         <!-- Main -->
        <div id="main">
            <!-- Intro -->
            <section id="top" class="one dark cover">
                <div class="container">
                    
                        <header>
                            <h2>Edit role</h2>
                        </header>
        <?php
    
           $sqlii = "SELECT id, username, firstname, lastname, email, role FROM user" ;
        
    $result = mysqli_query($con, $sqlii);
         if ($result->num_rows > 0) {
             
        echo '<div class="postable">';
        echo '<table class="flatTable">';
        echo '<tr class="headingTr"><th class="space">firstname</th><th class="space">lastname</th><th class="space">email</th><th class="space">role</th><th class="space">Edit</th></tr>';
        
             while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo'<td>' . $row['firstname'] . '</td>';
                echo'<td>' . $row['lastname'] . '</td>';
                echo'<td>' . $row['email'] . '</td>';
                echo'<td>' . $row['role'] . '</td>';
                echo'<td><a href="edit.php?id='.$row['id'] .'"> <img src="../Images/edit2.png"></a></td>';
                echo'</tr>';
             
         
       
             }   
             echo'</table>';
             echo'</div>'; 
            ?>
                
                </div>
            </section>
            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">
                    <header>
                        <a href="gallery.php">
                            <h2>Backup Database</h2>
                        </a>
                    </header>
                    <?php
                    if(isset($_POST['uploadCsv'])){
	$file = $_FILES['file']['tmp_name'];
	
	$handle = fopen($file, "r");
	while(($fileop = fgetcsv($handle, 1000, ",")) !== false) {
		$table_row2 = $fileop[0];
		$table_row3 = $fileop[1];
		$table_row4 = $fileop[2];
		
		
		$insert = $con->prepare("INSERT INTO `location` (lat, lng, geo) VALUES (?, ?, ?)");
		$insert->bind_param("id", $table_row2, $table_row3, $table_row4);
		$insert->execute();
		$insert->close();
		//header("location:invoer.php");
	}
}

$query ='SELECT * FROM location';	
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
	<a href="../php/download_csv.php"><button>download data als csv</button></a>
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
			showData ($row['lat'], $row['lng'], $row['geo']);
		}
		?>
    </table>
    
</div>
                    
                    
                </div>
            </section>
      
            <?php } } else{ ?>
               <div id="main">
            <!-- Intro -->
            <section id="top" class="one dark cover">
                <div class="container">
                    
                        <header>
                            <h2>Maps</h2>
                        </header>
                        <script type="text/javascript">
                            // pass PHP array to JavaScript array
                            var loc =
                                <?php echo json_encode($loc) ?>;
                        </script>
                        <div id="map" style="width: 100%; height: 800px; color: #000;"></div>
                        <script type="text/javascript">
                            var locations = [
        ];


                            for (a = 0; a < loc.length; a++) {
                                var geo = [loc[a][0][0], loc[a][0][1], loc[a][0][2], a];
                                locations.push(geo);
                            }


                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 2,
                                center: new google.maps.LatLng(30, 0),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        </script>
                </div>
            </section>
            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">
                    <header>
                        <a href="gallery.php">
                            <h2>Gallery</h2>
                        </a>
                    </header>
                    <div class="row">
                        <?php 
        
$sql = "SELECT DISTINCT geo FROM location limit 6" ;
        
    $result = mysqli_query($con, $sql);
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 
                 ?>
                            <div class="4u 12u$(mobile)">
                                <article class="item">
                                    <a href="/Pages/<?php echo $row['geo'] ?>.php" class="image fit">
                                        <img src="images/pic02.jpg" alt="" />
                                    </a>
                                    <header>
                                        <h3>
                                                <?php echo $row['geo'];?>
                                            </h3>
                                    </header>
                                </article>
                            </div>
                            <?php
             }
         }
    
?>
                    </div>
                </div>
            </section>
            <!-- About Me -->
            <section id="about" class="three">
                <div class="container">
                    <header>
                        <h2>About Me <a href="about_update.php"><img src="../Images/edit3.png"/></a></h2>
                    </header>
                    <a href="#" class="image featured">
                        <img src="images/pic08.jpg" alt="" />
                    </a>
                    <p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec ornare iaculis.</p>
                </div>
            </section>
            <!-- Contact -->
            <section id="contact" class="four">
                <div class="container">
                    <header>
                        <h2>Contact</h2>
                    </header>
                    <p>Elementum sem parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>
                    <form method="post" action="#">
                        <div class="row">
                            <div class="6u 12u$(mobile)">
                                <input type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="6u$ 12u$(mobile)">
                                <input type="text" name="email" placeholder="Email" />
                            </div>
                            <div class="12u$">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="12u$">
                                <input type="submit" value="Send Message" />
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <div id="footer">
            <!-- Copyright -->
            <ul class="copyright">
                <li>&copy; Untitled. All rights reserved.</li>
                <li>Design:
                    <a href="http://html5up.net">HTML5 UP</a>
                </li>
            </ul>
        </div>
               

               
               <?php 
                
                           
               ?>
                <!-- Scripts -->
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/jquery.scrolly.min.js"></script>
                <script src="assets/js/jquery.scrollzer.min.js"></script>
                <script src="assets/js/skel.min.js"></script>
                <script src="assets/js/util.js"></script>
                <!--[if lte IE 8]>
                        <script src="assets/js/ie/respond.min.js"></script>
                        <![endif]-->
                <script src="assets/js/main.js"></script>
    </body>
    <?php 
                          }
             }
        }
    }else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
    ?>

    </html>
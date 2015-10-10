<?php
    $logo = "../";
    $title = "Control panel | ";
    session_start();
    include '../connect.php';
   
    if(!empty($_SESSION['user'])){
        
        
?>
   <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
    <!--Maak een container aan voor het CMS systeem-->
    <div id="cmscontainer">
        <a href="logout.php" class="logout">Logout</a>
        <h2>Wat wil je doen?</h2>
        <?php
        $username = $_SESSION["user"];
        $_SESSION['user'] = $username;
        
        echo 'Welcome: '. $username . '<br>';
        
       $sql = "SELECT role, thumb FROM user WHERE username = '".$username."'" ;
        $result = mysqli_query($con, $sql);
        
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                echo "Jou rol: Je bent een ". $row["role"]. "<br><br>";
                 
                if($row["role"] == "admin") {
                    echo "je bent een admin<br><br>";
                    echo "<a href='#' class='cmslink'>give a user rights</a>";
                    echo "<br><a href='#' class='cmslink'>Remove user</a>";
                    echo "<br><a href='profile_image_upload.php' class='cmslink'>Upload profile picture</a>";
                    echo "<br><a href='edit_profile.php' class='cmslink'>Edit Profile</a>";
                   
                }

                else if($row["role"] == "user"){
                     echo "<br><a href='profile_image_upload.php' class='cmslink'>Uploade profile picture</a>";
                }
                  ?>
                    
                    <div id="profilepic"><img src="<?php echo $row['thumb']; ?>"</div>
                    
                    <?php
             }
            
            
        } else {
             echo "0 results";
        }
        ?>
    </div>

<!-- Sluit pagina af-->
<?php
    } else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
?>

</html>
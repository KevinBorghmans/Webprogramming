<?php
    //Sessie aan
    $logo = "../";
    $title = "Control panel | ";
    session_start();
    include '../connect.php';
    if(!empty($_SESSION['user'])){
        
?>
    <!--Maak een container aan voor het CMS systeem-->
    <div id="cmscontainer">
        <a href="logout.php" class="logout">Logout</a>
        <h2>Wat wil je doen?</h2>
        <?php
        $username = $_SESSION["user"];
        echo 'Jou usernaam is: '. $username . '<br>';
        
       $sql = "SELECT role FROM user WHERE username = '".$username."'" ;
        $result = mysqli_query($con, $sql);
        
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                echo "Jou rol: Je bent een ". $row["role"]. "<br><br>";
                 
                if($row["role"] == "admin") {
                    echo "je bent een admin<br><br>";
                    echo "<a href='#' class='cmslink'>give a user rights</a><br><a href='#' class='cmslink'>Remove user</a><br><a href='#' class='cmslink'>Chance profile</a>";
                }

                else{
                     echo "You dont have rights<br>Klik <a href='../index.php'>hier</a> Om terug te keren";
                }
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
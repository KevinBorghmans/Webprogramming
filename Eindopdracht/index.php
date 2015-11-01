<?php
session_start();
if(isset($_POST['submit'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'include/connect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
        
//    
     $sql = "SELECT password, role FROM user WHERE username = '".$username."'" ;
       $result = mysqli_query($con, $sql);
    
        if ($result->num_rows > 0){
            // als de gegevens kloppen voer dan deze code uit
            while($row = $result->fetch_assoc()) { 
                $hash = $row[password];
                
                if (password_verify($password, $hash)) {
                    // Success!
                     $_SESSION['user'] = $username;
                    header('location: Pages/main.php');
                }
                else {
                    // Invalid credentials
                    echo "fucked";
                }
            }
            // anders stuur hem terug naar de login pagina en toon verkeerde inlog
        } else {
            $_SESSION['error'] = "<h2>Verkeerde login</h2>";
            header('Location: '. $_SERVER['PHP_SELF']);
            die;
        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Login | Follow me everywhere</title>
    
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    
</head>

<body>
    <header>
    
        <nav>
            <section class="wrapper">
                <div class="logo"><a href=""><img class="resize" src="Images/Logo.png" alt=""logo/></a></div>
            </section>
        </nav>
        
        <section class="login">
            <section class="wrapper">
                <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <input class ="username" type="text" name="username" placeholder="username" autofocus><br>
                    <input class="password" type="password" name="password" placeholder="Password"><br>
                    <input type="hidden" name="submit">
                    <input class="btn" type="submit" name="submit" value="Login">
                    <div id="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : " "; ?></div>
                    <?php unset($_SESSION['error']); ?>
                </form>
                
                <article class="register">Heb je nog geen account? <a href="php/register.php">Aanmelden</a</article>
                 
            </section>
        </section>
        
    </header>
</body>

</html>
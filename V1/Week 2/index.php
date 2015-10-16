<?php
session_start();
if(isset($_POST['submit'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';
    
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
                    header('location: php/controlpanel.php');
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
    <title>Login</title>
</head>
<body>

<div id="login">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <input class ="username" type="text" name="username" placeholder="username" autofocus>
    <input class="password" type="password" name="password" placeholder="Password">
    <input type="hidden" name="submit">
    <input class="btn" type="submit" name="submit" value="Login">
    <div id="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : " "; ?></div>
    <?php unset($_SESSION['error']); ?>
</form>
 <br>No account? <a href="php/register.php">Register</a> here!
</div>
</body>
</html>
<?php
$logo = "../";
    $title = "Control panel | ";
    session_start();
   
    $username = $_SESSION["user"];
    if(!empty($_SESSION['user'])){
        
        include '../connect.php';
        
       
        
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["firstname"])){
        $firstname_new = test_input($_POST["firstname"]);
        // check of the username letters en spaties bevat
        $sql = " UPDATE user SET firstname='$firstname_new' WHERE username='$username'";
         if (mysqli_query($con, $sql))
             {
             echo "firsname updated <br>";
             }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["lastname"])){
        $lastname_new = test_input($_POST["lastname"]);
        // check of the username letters en spaties bevat
        $sql = " UPDATE user SET lastname='$lastname_new' WHERE username='$username'";
         if (mysqli_query($con, $sql))
             {
             echo "lastname updated <br>";
             }
    }
}

        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"])){
        $email_new = test_input($_POST["email"]);
        
        if (filter_var($email_new, FILTER_VALIDATE_EMAIL)) {
          // check of the username letters en spaties bevat
        $sql = " UPDATE user SET email='$email_new' WHERE username='$username'";
         if (mysqli_query($con, $sql))
             {
             echo "Email updated <br>";
             }  
        }else{
        echo 'error email is not correct';
        }
    }
}
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!empty($_POST["password"])){
         if ($_POST["password"] == $_POST["repassword"]) {
                $password = test_input($_POST["password"]);
                
            if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password)) {
                $options = [
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), //write your own code to generate a suitable salt
                'cost' => 12 // the default cost is 10
                ];
                
                $hash = password_hash($password, PASSWORD_DEFAULT, $options);
                
                $sql = " UPDATE user SET password='$hash' WHERE username='$username'";
                if (mysqli_query($con, $sql))
             {
             echo "wachtwoord updated <br>";
             }  
            }
        }
        
    }
}
        echo 
    
       

        
 $sql = "SELECT firstname, lastname, email FROM user WHERE username = '".$username."'" ;
        $result = mysqli_query($con, $sql);
        
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 
                 $firstname = $row["firstname"];
                 $lastname = $row["lastname"];
                 $email = $row["email"];
            }
        }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
   <?php echo 'firstname' ?>
    <input class ="firstname" type="text" name="firstname" placeholder="<?php echo $firstname ?>" autofocus>
    <br>
    <?php echo 'lastname' ?>
    <input class="lastname" type="text" name="lastname" placeholder="<?php echo $lastname ?>">
    <br>
    <?php echo 'E-mail' ?>
    <input class="email" type="email" name="email" placeholder="<?php echo $email ?>">
    <br>
    <input class="password" type="password" name="password" placeholder="password">
    <br><h5>Password must be at least 8 characters and contain a upper and lowercase and a number and a Symbol(!@#$%)</h5><br>
    <input class="repassword" type="password" name="repassword" placeholder="repassword">
    
    <input type="hidden" name="submit">
    <input class="btn" type="submit" name="submit" value="Edit">
    <?php echo $firstname_new; ?>
    <div id="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : " "; ?></div>
    <?php unset($_SESSION['error']); ?>
</form>

</body>

<?php
    } else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
?>
</html>
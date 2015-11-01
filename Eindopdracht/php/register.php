<?php
// defineer variable en maak deze leeg
$usernameErr = $passwordErr = $firstnameErr = $lastnameErr = $emailErr = "";
$username = $password = $firstname = $lastname = $email = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])){
        $usernameErr = "Username is required";
    } else{
    $username = test_input($_POST["username"]);
        // check of the username letters en spaties bevat
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
       $nameErr = "Only letters and white space allowed"; 
        }else{
            $checkuser = 'true';
        }
   }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])){
        $firstnameErr = "Firstname required";
    } else{
    $firstname= test_input($_POST["firstname"]);
        // check of the username letters en spaties bevat
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $firstnameErr = "Only letters and white space allowed"; 
     }else{
            $checkfirst = 'true';
        }
   }
}
//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])){
        $lastnameErr = "Lastname required";
    } else{
    $lastname = test_input($_POST["lastname"]);
        // check of the username letters en spaties bevat
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed"; 
     }else{
            $checklast = 'true';
        }
   }
}
//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])){
        $emailErr = "e-mail required";
    } else{
    $email = test_input($_POST["email"]);
        // check of the username letters en spaties bevat
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $checkmail = 'true';
        }
        else {
        $emailErr = "E-mail is not correct"; 
        }   
   }
}



//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["password"])){
        $passwordErr = "Password is required";
    } else{
        if ($_POST["password"] == $_POST["confirm_password"]) {
        $password = test_input($_POST["password"]);
                
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password)) {
                $passwordErr = 'the password does not meet the requirements! please us an upper and lowercase, numbers and                 !@#$%, min 8, max 16 chars';
            }
        
        
            else
            {
              $checkpass = 'true';  
            }
            
        }
            
        if($checkuser == 'true' && $checkfirst == 'true' && $checklast == 'true' && $checkmail == 'true' && $checkpass =='true'){
            
            include '../include/connect.php';
              $options = [
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), //write your own code to generate a suitable salt
                'cost' => 12 // the default cost is 10
                ];
                
                $hash = password_hash($password, PASSWORD_DEFAULT, $options);
                
                
                $sql  =  "INSERT INTO user SET username='$username', firstname='$firstname', lastname='$lastname', email='$email', password='$hash' ";
             
             if (mysqli_query($con, $sql))
             {
                 header("Location: ../index.php");
             }
             else
             { 
                 echo ' Fout: ' . $sql . '<br>' . mysqli_error($con);
             }
             
             mysqli_close($con);
            }
        
            else
            {
                echo 'something is not correct please check it';
            }
}
}



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WP31_Week 1</title>
    <link rel="stylesheet" type="text/css" href="../Css/style.css">
</head>
<body>

<header>
       
        <nav>
            <section class="wrapper">
                <div class="logo2"><a href=""><img class="resize" src="../Images/Logo.png" alt=""logo/></a></div>
            </section>
        </nav>
        
<section class="login">
    <section class="wrapper">
            <form class="form" action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
                <input placeholder="Username" type="text" class="username" name="username" value="<?php echo $username;?>" autofocus>
                    <span class="error"><?php echo $usernameErr;?></span>
                        <br><br>

                <input placeholder="Voornaam" type="text" class ="firstname" name="firstname" value="<?php echo $firstname;?>">
                    <span class="error"><?php echo $firstnameErr;?></span>
                        <br><br>

                <input placeholder="Achternaam" type="text" name="lastname" class="lastname" value="<?php echo $lastname;?>">
                    <span class="error"><?php echo $lastnameErr;?></span>
                        <br><br>

                <input placeholder="E-mail" type="text" name="email" class="email" value="<?php echo $email;?>">
                    <span class="error"> <?php echo $emailErr;?></span>
                        <br><br>

                <input placeholder="Wachtwoord" type="password" name="password" class="password" id="password" value="<?php echo $password;?>">
                    <span class="error"> <?php echo $passwordErr;?></span>
                       <h5 class="passtxt">Password must contain 8 chars a upper and lowercase/number/Symbol(!@#$%)</h5>
                        <br>

                <input placeholder="Wachtwoord bevestigen" class="password" type="password" name="confirm_password" value="<?php echo $password;?>">
                        <br><br>

            <input class="btn" type="submit" name="submit" value="Register">
            </form>
        <article class="register">Heb je al een account? <a href="../index.php">Login</a></article>
    </section>
</section>
        
</header>
</body>
</html>
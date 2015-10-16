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
                include '../connect.php';
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
    
}
        
else {
$passwordErr = "Password does not match";
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
</head>
<body>

<form id="form" action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
    <input placeholder="Username" type="text" name="username" value="<?php echo $username;?>" autofocus>
        <span class="error">* <?php echo $usernameErr;?></span>
            <br><br>
            
    <input placeholder="Firstname" type="text" name="firstname" value="<?php echo $firstname;?>">
        <span class="error">* <?php echo $firstnameErr;?></span>
            <br><br>
             
    <input placeholder="Lastname" type="text" name="lastname" value="<?php echo $lastname;?>">
        <span class="error">* <?php echo $lastnameErr;?></span>
            <br><br>
            
    <input placeholder="E-mail" type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            
    <input placeholder="Password" type="password" name="password" id="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
           <h5>Password must be at least 8 characters and contain a upper and lowercase and a number and a Symbol(!@#$%)</h5>
            <br>
            
    <input placeholder=" Re-Password" type="password" name="confirm_password" value="<?php echo $password;?>">
            <br><br>

<input class="btn" type="submit" name="submit" value="Register">
</form>
    <br>
     <a href="../index.php" class="formlink">Return to login</a>
</body>
</html>
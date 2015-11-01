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
       

        
 $sql = "SELECT abouttxt, fi FROM user WHERE username = '".$username."'" ;
        $result = mysqli_query($con, $sql);
        
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 
                 $abouttxt = $row["abouttxt"];
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
   <?php echo 'About text' ?>
    <textarea rows="4" cols="50" name="firstname" autofocus><?php echo $abouttxt ?></textarea>
    <br>    
    <input type="hidden" name="submit">
    <input class="btn" type="submit" name="submit" value="Edit">
    <?php echo $firstname_new; ?>
    <div id="error"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : " "; ?></div>
    <?php unset($_SESSION['error']); ?>
</form>
    <p>click<a href="../Pages/main.php"> here </a> to return </p>
</body>

<?php
    } else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
?>
</html>
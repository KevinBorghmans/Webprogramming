<?php
    //Sessie aan
    $logo = "../";
    $title = "Control panel | ";
    session_start();
    include '../connect.php';
    $username = $_SESSION["user"];
    if(!empty($_SESSION['user'])){
        

//if(isset($_POST['fupload'])) {
    
require('image_inc.php');
    
if(isset($_FILES['fupload'])) {
     
    if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['fupload']['name'])) {
         
        $filename = $_FILES['fupload']['name'];
        $source = $_FILES['fupload']['tmp_name'];   
        $path_to_image_directory = 'images/fullsized/';
        $target = $path_to_image_directory . $filename;
         
         move_uploaded_file($source, $target);
    
        create_thumbnail($filename, $filename.'_thumb.png', 100, 100);
    
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="author" content="" />
    <title>Dynamic Thumbnails</title>
</head>
 
<body>
    <h1>Upload new Profile picture</h1>
    <form enctype="multipart/form-data" action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="file" name="fupload" />
        <input type="submit" value="Go!" />
    
    </form>
    
<?php
    } else {
        echo "You are not logged in!!<br>Klik <a href='../index.php'>hier</a> om in te loggen!!";   
    }
?>
    
</body>
</html>

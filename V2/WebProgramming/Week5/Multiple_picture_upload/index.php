<!DOCTYPE html>
<?php 

include 'connect.php';
if (isset($_POST['submit'])){
    $country = $_POST ['country'];
    

    if(isset($_FILES['files'])){
        
     
        foreach($_FILES['files']['tmp_name'] as $key => $name_tmp){
            
            $file_name = $_FILES['files']['name'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $dir = "gallery/";
            
            if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg"
&& $file_type != "image/gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}   else{
                
            $sql = "INSERT into gallery VALUES('', '$file_name', '$file_type', '$file_size', now(), '$country')";
            
            
            $movefile = move_uploaded_file($file_tmp,$dir."/".$file_name);
                
            if($movefile){
            $result = mysqli_query($con, $sql);
            } else{
                echo "not working";
            }
            }
               
        }
    }
}

    
echo $country;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MULTIPLE FILES</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple>
    <select name="country">
     
        <option value=""></option>
          <?php 
        $sqli = "SELECT geo FROM location";
        $res2 = mysqli_query($con, $sqli);
        
        if ($res2->num_rows > 0) {
             while($row = $res2->fetch_assoc()) {
                 $geo = $row["geo"];
                 ?> 
                  <option value="<?php echo $geo ?>"><?php echo $geo ?></option>
                 <?php
             }
        }
        ?>
       
    </select>
    <input type="submit" value="Create Gallary" name="submit" id="submit"><br>
    <a href="maps.php"> see yourself on the map</a><br>
    <a href="../index.php">upload your location</a>
</form>
</body>
</html>
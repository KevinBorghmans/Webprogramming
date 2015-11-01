<?php
   
    
function create_thumbnail($path, $save, $width, $height){
    
    session_start();
    $username = $_SESSION["user"];
    
    $info = getimagesize('images/fullsized/'.$path);
    // make variable size and fill it with array 
    $size = array($info[0], $info[1]);
    // if mime 
    if ($info['mime'] == 'image/jpeg'){
       $src = imagecreatefromjpeg('images/fullsized/'.$path);
    }else if ($info['mime'] == 'image/png'){
       $src = imagecreatefrompng('images/fullsized/'.$path); 
    }else if ($info['mime'] == 'image/gif'){
        $src = imagecreatefromgif('images/fullsized/'.$path);
    }else{
        echo 'haha';
    }
    
    
    $thumb = imagecreatetruecolor($width, $height);
    
    $src_aspect = $size[0] / $size[1];
    $thumb_aspect = $width / $height;
    
    
    if ($src_aspect < $thumb_aspect){
        // narrower
        $scale = $width / $size[0];
        $new_size = array($width, $width / $src_aspect);
        $src_pos = array (0, ($size[1] * $scale - $height) / $scale / 2);
        
    }else if ($src_aspect > $thumb_aspect){
        // wider
        $scale = $height / $size[1];
        $new_size = array($height * $src_aspect, $height);
        $src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0);
    }else{
        //same shape
        $new_size = array ($width, $height);
        $src_pos = array (0, 0);
    }
    
    $new_size[0] = max($new_size[0] , 1);
    $new_size[1] = max($new_size[1] , 1);
    
    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
    
    if ($save === false){
        return imagepng($thumb);
    }else{
        
        $finalthumb = 'images/thumbs/'. $save;
        $finalfull = 'images/fullsized/'. $path;
        
        include '../include/connect.php';
    
      
            $sql = "UPDATE user SET thumb='$finalthumb', fullsize='$finalfull' WHERE username='$username'";
            $result = mysqli_query($con, $sql);
            
        $text = '<img src="images/thumbs/'.$save.'" alt="images" />';
        $text .= '<br> Your file has been succesfully uploaded, and a thumbnail has been created!';
        echo $text;
        echo 'click here to<a href="../pages/main.php"> return</a>';
        
      return imagepng($thumb, 'images/thumbs/'.$save); 
                die;
    }  
}
?>
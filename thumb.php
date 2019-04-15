<?php
echo '<link rel="stylesheet" href="styl.css" type="text/css"><meta charset="UTF-8">';

$imgfolder = "obrazky"."\\";
$thumb_img_obsah = glob($imgfolder."*_m.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);
$img_obsah = glob($imgfolder."*.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);

$remain = array_diff($img_obsah, $thumb_img_obsah); 

$new_thumb_count= 0;

foreach ($remain as $file) {
 echo $file . "....";	
 $new = substr($file, 0, -4)."_m.jpg";
 echo $new . "...";

 if (!file_exists($new)) {
 	   echo "miniatura neexistuje......";
        $size = 0.25; 

    list($width, $height) = getimagesize($file) ; 
    $modwidth = $width * $size; 
    $modheight = $height * $size; 
    $tn = imagecreatetruecolor($modwidth, $modheight) ; 
    $image = imagecreatefromjpeg($file) ; 
    imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; // Here we are saving the .jpg, you can make this gif or png if you want 
    //the file name is set above, and the quality is set to 100% 
    imagejpeg($tn, $new, 100) ; 
    $new_thumb_count++;
    echo "Vytvářím : ".$new."<br>";
 }
 else 
 {
    echo "miniatura již byla dříve vytvořena<br>";
    
 } 
    echo "<hr>";
}
if ($new_thumb_count>0 and $new_thumb_count<5 ) {
  echo "byly přidány ".$new_thumb_count." minuatury";  
} 
elseif ($new_thumb_count >= 5) {
  echo "bylo přidáno ".$new_thumb_count." minuatur";  
  }

?>

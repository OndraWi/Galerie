<?php
echo '<link rel="stylesheet" href="styl.css" type="text/css"><meta charset="UTF-8">';
// include 'thumb.php';

  if (isset($_GET['img'])){
    if(file_exists($_GET['img'])){
    ignore_user_abort(true);
    set_time_limit(120);
    ini_set('memory_limit','512M');
    }
    die();
  }
  
  $fullimgfolder = "obrazky"."\\";
	// $obsah = scandir($fullimgfolder);
	
  $thumb_img_obsah = glob($fullimgfolder."*_m.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);
  $img_obsah = glob($fullimgfolder."*.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);

  $remain = array_diff($img_obsah, $thumb_img_obsah);
   
  // print_r($img_obsah);
	foreach($thumb_img_obsah as $thumb) {
       $original = substr($thumb, 0, -6).".jpg";
       echo '<div class="img">'."<a href=".$original.">" ."<img src=".$thumb."></a></div><br>";
       // echo "<img src=".$soubor."><br><br>";
       }
       echo '<a href="thumb.php">Tvorba miniatur<a><br>';

	foreach($remain as $soubor) {
        echo $soubor;     
       }

?>

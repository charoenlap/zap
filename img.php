<?php
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
include_once("system/lib/gd/ThumbLib.inc.php");
include_once("system/lib/gd/GdThumb.inc.php");


$sFIle = $_GET["file"]; 
$sFIle = explode(",", $sFIle); 
$nMode = $sFIle[0]; 
$nPath = $sFIle[1]; 
// $nFile = $sFIle[2];
$nW = $sFIle[2];
$nH = $sFIle[3];
if(isset($sFIle[5])){
  $wm = $sFIle[5];
}

$nPath = str_replace('https://zappvariety.com/','',$nPath);
$nPath = str_replace('https://www.zappvariety.com/','',$nPath);

// if ($nPath==1){$nPath="upload/content/";}
// if ($nPath==2){$nPath="images";}
$PathFile = "$nPath";
$new_name = $nW.'x'.$nH.'_'.str_replace('uploads_images_','',str_replace('/','_',$PathFile));
if(file_exists("uploads/thumb/".$new_name)){
  $filename = basename($new_name);
  $file_extension = strtolower(substr(strrchr($filename,"."),1));

  switch( $file_extension ) {
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpeg"; break;
      case "svg": $ctype="image/svg+xml"; break;
      default:
  }

  header('Content-type: ' . $ctype);
  readfile("uploads/thumb/".$new_name);
  // $thumb = PhpThumbFactory::create("uploads/thumb/".$nFile);
  // $thumb->showCache("uploads/thumb/".$nFile);
  // echo "test";
}else{

  
  $thumb = PhpThumbFactory::create($PathFile);
  if ($nMode==2){$thumb->adaptiveResize($nW, $nH);}
  // if(isset($wm)){
  //     $thumb->showWatermask();
      
  // }else{
      $thumb->show();

  // }
  
  $thumb->save("uploads/thumb/".$new_name);
}

/*if(file_exists("images/imgCache/".$nFile) and $nFile!="no_photo.jpg"){
  $thumb = PhpThumbFactory::create("images/imgCache/".$nFile);
  $thumb->showCache("images/imgCache/".$nFile);
}else{
  $thumb = PhpThumbFactory::create($PathFile);
  if ($nMode==1){$thumb->cropFromCenter($nW, $nH);}
  elseif ($nMode==2){$thumb->adaptiveResize($nW, $nH);}
  if(isset($wm)){
      $thumb->showWatermask();
      
  }else{
      $thumb->show();

  }
  $thumb->save("images/imgCache/".$nFile);
}*/







?>
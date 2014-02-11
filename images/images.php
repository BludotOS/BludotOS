<?
if($_POST['file']) {
	$path = $_POST['file'];
} else {
	$path = $_GET['file'];
}
$type = pathinfo($path, PATHINFO_EXTENSION);
/*$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

echo $base64;
$image=base64_decode($base64);*/



/*
$im = new Imagick();

  // Convert image into Imagick
  $im->readImage($path);
  $im->setCompressionQuality(10);
  $im->optimizeImageLayers();
  $output = base64_encode($im->getImage());
  echo 'data:image/' . $type . ';base64,' . $output;*/


// define widescreen dimensions
$width = 160;
$height = 90;

// load an image
$i = new Imagick($path);
// get the current image dimensions
$geo = $i->getImageGeometry();

// crop the image
/*if(($geo['width']/$width) < ($geo['height']/$height))
{
    $i->cropImage($geo['width'], floor($height*$geo['width']/$width), 0, (($geo['height']-($height*$geo['width']/$width))/2));
}
else
{
    $i->cropImage(ceil($width*$geo['height']/$height), $geo['height'], (($geo['width']-($width*$geo['height']/$height))/2), 0);
}*/
// thumbnail the image
$i->ThumbnailImage($width,$height,true);

$output = base64_encode($i->getImage());
  echo 'data:image/' . $type . ';base64,' . $output;

?>
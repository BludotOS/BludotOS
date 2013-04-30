<?
ob_start();
$name = $_GET['name'];
$nameit = $_GET['nameit'];
$stream = fopen('../FileNet/HDD/Applications/temp/'.$nameit.'/'.$name,"rb");
$file = '../FileNet/HDD/Applications/temp/'.$nameit.'/'.$name;
$temp4 = fread($stream, filesize($file));
fclose($stream);
echo $temp4;
?>
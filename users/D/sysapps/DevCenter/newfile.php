<?
$name = $_GET['name'];
$nameit = $_GET['nameit'];
fopen('../FileNet/HDD/Applications/temp/'.$nameit.'/'.$name, 'w') or die("can't open file");
?>
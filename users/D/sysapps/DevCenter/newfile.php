<?
$name = $_GET["name"];
$nameit = $_GET["nameit"];
$type = $_GET["type"];
if($type == "dir")
{
	mkdir('../FileNet/HDD/Applications/temp/'.$nameit.'/'.$name);
} else {
	$temp = fopen('../FileNet/HDD/Applications/temp/'.$nameit.'/'.$name, 'w') or die("can't open file");
	fclose($temp);
};
?>
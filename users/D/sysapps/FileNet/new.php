<?php
$tloc = $_GET["loc"];
$ttype = $_GET["type"];
if($ttype == "dir")
{
	mkdir($tloc);
} else {
	$ourFileName = $tloc;
	$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
	fclose($ourFileHandle);
}
?>
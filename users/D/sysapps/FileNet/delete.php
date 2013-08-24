<?
$tloc = $_GET["loc"];
$tfile = $_GET["file"];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
function fileDelete($filepath,$filename) {
	$success = FALSE;
	if (file_exists($filepath.$filename)&&$filename!=""&&$filename!="n/a") {
		unlink ($filepath.$filename);
		$success = TRUE;
	}
	echo $success;	
}
if(is_dir($tloc.$tfile))
{
	//echo "Directory";
	rrmdir($tloc.$tfile);
}
if(is_file($tloc.$tfile))
{
	//echo "File";
	fileDelete($tloc, $tfile);
}
//fileDelete("../FileNet/HDD/Applications/temp/".$nameit."/", $nameitf);
?>
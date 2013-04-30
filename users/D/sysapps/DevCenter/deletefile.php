<?
$nameit = $_GET['nameit'];
$nameitf = $_GET['nameitf'];
function fileDelete($filepath,$filename) {
	$success = FALSE;
	if (file_exists($filepath.$filename)&&$filename!=""&&$filename!="n/a") {
		unlink ($filepath.$filename);
		$success = TRUE;
	}
	echo $success;	
}
fileDelete("../FileNet/HDD/Applications/temp/".$nameit."/", $nameitf);
?>
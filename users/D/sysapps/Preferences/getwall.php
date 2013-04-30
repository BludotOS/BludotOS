<?php
$folder = $_GET['folder'];
$dirs1 = array();
$files1 = array();
if ($handle = opendir('../FileNet/'.$folder.'')) {
    while (false !== ($entry = readdir($handle))) {
    	if ($entry != "." && $entry != ".." && is_dir("../FileNet/$folder/" . $entry)) {
	       array_push($dirs1, $entry);
	}
    }
    closedir($handle);
}
if ($handle2 = opendir('../FileNet/'.$folder.'')) {
    while (false !== ($entry2 = readdir($handle2))) {
        if ($entry2 != "." && $entry2 != ".." && is_file("../FileNet/$folder/" . $entry2)) {
            array_push($files1, $entry2);
        }
    }
    closedir($handle2);
}
if (count($dirs1) > 0) {
	$dirs = "{ \"dirs\": [";
	for ($i = 0; $i < count($dirs1); $i++) {
	if ($i < (count($dirs1)-1)) {
		$dirs .= "\"".$dirs1[$i]."\", ";
	} else {
		if (count($files1) > 0) {
		$dirs .= "\"".$dirs1[$i]."\"], ";
		} else {
		$dirs .= "\"".$dirs1[$i]."\"] }";
		}
	}
	}
	echo $dirs;
}
if (count($files1) > 0) {
	if (count($dirs1) > 0) {
		$files = "\"files\": [";
	} else {
		$files = "{ \"files\": [";
	}
	for ($i = 0; $i < count($files1); $i++) {
	if ($i < (count($files1)-1)) {
		$files .= "\"".$files1[$i]."\", ";
	} else {
		$files .= "\"".$files1[$i]."\"] }";
	}
	}
	echo $files;
}
?>
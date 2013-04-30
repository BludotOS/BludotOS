<?php
$user = $_GET['user'];
$type = $_GET['type'];
$goto = "../../../../$type/default/themes";
$dirs1 = array();
$files1 = array();
if (strlen($goto) > 4)
{
if ($handle = opendir($goto)) {
    while (false !== ($entry = readdir($handle))) {
    	if ($entry != "." && $entry != ".." && is_dir($goto. '/' . $entry)) {
	       array_push($dirs1, $entry);
	}
    }
    closedir($handle);
}
if ($handle2 = opendir($goto)) {
    while (false !== ($entry2 = readdir($handle2))) {
        if ($entry2 != "." && $entry2 != ".." && is_file($goto. '/' . $entry2)) {
            array_push($files1, $entry2);
        }
    }
    closedir($handle2);
}
} else if(strlen($goto) < 4){
if ($handle = opendir('HDD')) {
    while (false !== ($entry = readdir($handle))) {
    	if ($entry != "." && $entry != ".." && is_dir("HDD/" . $entry)) {
	       array_push($dirs1, $entry);
	}
    }
    closedir($handle);
}
if ($handle2 = opendir('HDD')) {
    while (false !== ($entry2 = readdir($handle2))) {
        if ($entry2 != "." && $entry2 != ".." && is_file("HDD/" . $entry2)) {
            array_push($files1, $entry2);
        }
    }
    closedir($handle2);
}
}
if (count($dirs1) > 0) {
	$dirs = "{ \"dirs\": [";
	for ($i = 0; $i < count($dirs1); $i++) {
	if ($i < (count($dirs1)-1)) {
		$dirs .= "\"$dirs1[$i]\", ";
	} else {
		if (count($files1) > 0) {
		$dirs .= "\"$dirs1[$i]\"], ";
		} else {
		$dirs .= "\"$dirs1[$i]\"], ";
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
	for ($k = 0; $k < count($files1); $k++) {
	if ($k < (count($files1)-1)) {
		$files .= "\"$files1[$k]\", ";
	} else {
		$files .= "\"$files1[$k]\"], ";
	}
	}
	echo $files;
}
echo "\"location\": \"$goto\" }";
?>
<?php
function ZIP($new, $path, $old)
{
// Adding files to a .zip file, no zip file exists it creates a new ZIP file

// increase script timeout value
ini_set('max_execution_time', 5000);

// create object
$zip = new ZipArchive();

// open archive 
if ($zip->open($new, ZIPARCHIVE::CREATE) !== TRUE) {
    die ("Could not open archive");
}

// initialize an iterator
// pass it the directory to be processed
//$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($old."/"));
$dirlist =new RecursiveDirectoryIterator($path.$old);
echo $dirlist;
$iterator = new RecursiveIteratorIterator($dirlist);

// iterate over the directory
// add each file found to the archive
foreach ($iterator as $key=>$value) {
    $test = explode("/", $key);
    $key2 = $test[count($test)-2].'/'.$test[count($test)-1];
    echo $key2;
    $zip->addFile(realpath($key), $key2) or die ("ERROR: Could not add file: $key");
}

// close and save archive
$zip->close();
echo "Archive created successfully.";
}
$old = $_POST['old'];
$new = $_POST['new'];
$path = $_POST['path'];
$name = $_POST['move'];
function fileDelete($filepath,$filename) {
	$success = FALSE;
	if (file_exists($filepath.$filename)&&$filename!=""&&$filename!="n/a") {
		unlink ($filepath.$filename);
		$success = TRUE;
	}
	echo $success;	
}
fileDelete("../FileNet/apps/".$name, ($name.".blu"));
Zip($new, $path, $old);
    function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
deleteDir('../FileNet/HDD/Applications/temp/'.$name);
?>
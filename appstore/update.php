<?
$app = $_GET['app'];
$cat = $_GET['cat'];
$name = $_GET['name'];
mkdir('temp');
//copy('apps/'.$cat.'/'.$app.'/'.$app.'.blu', 'apps/'.$cat.'/'.$app.'/'.$app.'.zip');
$zip = new ZipArchive;
if ($zip->open('apps/'.$cat.'/'.$app.'/'.$app.'.blu') === TRUE) {
    $zip->extractTo('temp');
    $zip->close();
    //echo 'ok';
} else {
    echo 'apps/'.$cat.'/'.$app.'/'.$app.'.blu';
    echo 'failed';
}
mkdir('temp2');
$zip = new ZipArchive;
if ($zip->open('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'/'.$app.'.blu') === TRUE) {
    $zip->extractTo('temp2');
    $zip->close();
    //echo 'ok';
} else {
    echo '../users/'.$name.'/sysapps/FileNet/apps/'.$app.'/'.$app.'.blu';
    echo 'failed';
}
unlink('temp/'.$app.'/prefs.php');
copy("temp2/$app/prefs.php", "temp/$app/prefs.php");
ZIP("temp/$app.blu", "temp/$app", "/");
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
//echo $dirlist;
$iterator = new RecursiveIteratorIterator($dirlist);

// iterate over the directory
// add each file found to the archive
foreach ($iterator as $key=>$value) {
    $test = explode("/", $key);
    $key2 = $test[count($test)-2].'/'.$test[count($test)-1];
    //echo $key2;
    $zip->addFile(realpath($key), $key2) or die ("ERROR: Could not add file: $key");
}

// close and save archive
$zip->close();
//echo "Archive created successfully.";
}
//mkdir('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'');
//copy("apps/$cat/$app/img.png","../users/$name/sysapps/FileNet/apps/$app/img.png");
unlink("../users/$name/sysapps/FileNet/apps/$app/$app.blu");
copy("temp/$app.blu","../users/$name/sysapps/FileNet/apps/$app/$app.blu");
function deleteDir($dirPath) {
$dir = $dirPath;
$it = new RecursiveDirectoryIterator($dir);
$files = new RecursiveIteratorIterator($it,
             RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->getFilename() === '.' || $file->getFilename() === '..') {
        continue;
    }
    if ($file->isDir()){
        rmdir($file->getRealPath());
    } else {
        unlink($file->getRealPath());
    }
}
rmdir($dir);
}
deleteDir('temp');
deleteDir('temp2');
if(is_dir('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'') && is_file("../users/$name/sysapps/FileNet/apps/$app/$app.blu")) {
unlink('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'/version.txt');
copy("apps/$cat/$app/version.txt", "../users/$name/sysapps/FileNet/apps/$app/version.txt");
echo "updated";
} else {
echo "error";
};
?>
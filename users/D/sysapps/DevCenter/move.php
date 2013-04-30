<?
$old = $_POST['old'];
$new = $_POST['new'];
function copydir($source,$destination)
{
if(!is_dir($destination)){
$oldumask = umask(0); 
mkdir($destination, 01777); // so you get the sticky bit set 
umask($oldumask);
}
$dir_handle = @opendir($source) or die("Unable to open");
while ($file = readdir($dir_handle)) 
{
if($file!="." && $file!=".." && !is_dir("$source/$file"))
copy("$source/$file","$destination/$file");
}
closedir($dir_handle);
//header( 'Location: http://bludot.tk/index.php' );
}
// Get array of all source files
    $files = scandir($old);
    // Identify directories
    $source = $old;
    $destination = '../FileNet/HDD/Applications/'.$new.'/';
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
deleteDir($old);

?>
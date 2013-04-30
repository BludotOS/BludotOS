<?

$name = $_POST['name'];
$name1 = explode(".", $name);
$name2 = $name1[0];
echo $name2;
$zip = new ZipArchive;
if ($zip->open('../FileNet/HDD/Applications/'.$name) === TRUE) {
  $zip->extractTo('../FileNet/HDD/Applications/temp/');
  $zip->close();
  echo 'ok';
  echo $name2;
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
deleteDir('../FileNet/HDD/Applications/temp/APP');
} else {
  echo 'failed';
}
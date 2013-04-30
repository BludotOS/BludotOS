<?
$file_handle = fopen("../../config/config.php", "r");
/*while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line;
}*/
$lined = file_get_contents('../../config/config.php');
echo $lined;
fclose($file_handle);
?>
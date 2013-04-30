<?php
$filename = $_POST['filedir'];
$string = $_POST['filed'];
$user=$_POST['uname'];
$homepage = file_get_contents($filename);
echo $homepage;
$fh = fopen($filename, 'w') or die("can't open file");

fwrite($fh, $string) or die("can't open file");
fclose($fh) or die("can't open file");
?>
<?php
$filename = $_POST['filedir'];
$string = $_POST['filed'];
$user=$_POST['uname'];

$fh = fopen($filename, 'w') or die("can't open file");
if(fwrite($fh, $string)) {
echo "Saved";
} else {
echo "error";
}
fclose($fh) or die("can't open file");
?>
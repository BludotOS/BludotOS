<?
$name = $_POST['name'];
$zip = new ZipArchive;
if ($zip->open('HDD/Applications/'.$name) === TRUE) {
  $zip->extractTo('HDD/Applications/temp/');
  $zip->close();
  echo 'ok';
} else {
  echo 'failed';
}
//rename('HDD/Applications/'.$name.'/index.txt', 'HDD/Applications/'.$name.'/index.php');
?>
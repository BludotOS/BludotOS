<?
$name = $_POST['name'];
$user = $_POST['user'];
$zip = new ZipArchive;
if ($zip->open('users/'.$user.'/sysapps/FileNet/apps/'.$name.'/'.$name.'.blu') === TRUE) {
  $zip->extractTo('users/'.$user.'/sysapps/FileNet/HDD/Applications/temp/');
  $zip->close();
  echo 'ok';
} else {
  echo 'failed';
}
//rename('HDD/Applications/'.$name.'/index.txt', 'HDD/Applications/'.$name.'/index.php');
?>
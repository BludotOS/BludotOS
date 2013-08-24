<?
$app = $_GET['app'];
$cat = $_GET['cat'];
$name = $_GET['name'];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
rrmdir("../users/$name/sysapps/FileNet/apps/$app");
if(!is_dir('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'')) {
//unlink('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'/version.txt');
echo "Success";
} else {
echo "error";
};
?>
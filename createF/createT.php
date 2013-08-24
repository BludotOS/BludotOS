<?php
ob_start();
$namers = $_GET['namer'];
$id = $_GET['id'];


$name = $namers;
mkdir('./../users/'.$name.'');

mkdir('./../users/'.$name.'/'.MYSITES.'');

mkdir('./../users/'.$name.'/'.config.'');

mkdir('./../users/'.$name.'/'.sysapps.'');

mkdir('./../users/'.$name.'/sysapps/'.DevCenter.'');

mkdir('./../users/'.$name.'/sysapps/'.FileNet.'');

//mkdir('./../users/'.$name.'/sysapps/DevCenter/'.images.'');



mkdir('./../users/'.$name.'/sysapps/Preferences/');

//mkdir('./../users/'.$name.'/sysapps/FileNet/'.include.'');

mkdir('./../users/'.$name.'/sysapps/FileNet/'.wallpaper.'');

mkdir('./../users/'.$name.'/sysapps/FileNet/'.HDD.'');

mkdir('./../users/'.$name.'/sysapps/FileNet/'.images.'');

mkdir('./../users/'.$name.'/sysapps/FileNet/HDD/'.Applications.'');

mkdir('./../users/'.$name.'/sysapps/FileNet/HDD/Applications/'.temp.'');
mkdir('../users/'.$name.'/sysapps/FileNet/apps');
mkdir('../users/'.$name.'/sysapps/FileNet/temp');
mkdir('../users/'.$name.'/sysapps/Uploader');
//mkdir('../users/'.$name.'/sysapps/DevCenter');
mkdir('../users/'.$name.'/sysapps/DevCenter/include');
mkdir('../users/'.$name.'/sysapps/DevCenter/include/APP_core');

//chmod ('../users/'.$name.'/.htacces', 0644);
////////////////////////////////////////////////////
$string = urldecode("RewriteEngine%20On%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20cookid%3D0%0ARewriteRule%20%5E%2F%20-%20%5BCO%3Dcookid%3A.*%3A.bludotos.com%3A100%3A%2F%5D%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20!cookid%3D".$id."%0ARewriteRule%20.*%20http%3A%2F%2Fbludotos.com%2FBlocked.html");
$fh = fopen('../users/'.$name.'/.htacces', 'w') or die("can't open file");
if(fwrite($fh, $string)) {
//echo "Saved";
} else {
//echo "error";
}
fclose($fh) or die("can't open file");
//////////////////////////////////

copydir("../users/D","../users/$name");
copydir("../users/D/config","../users/$name/config");
copydir("../users/D/sysapps","../users/$name/sysapps");
copydir("../users/D/sysapps/Uploader","../users/$name/sysapps/Uploader");
copydir("../users/D/sysapps/DevCenter","../users/$name/sysapps/DevCenter");
copydir("../users/D/sysapps/DevCenter/images","../users/$name/sysapps/DevCenter/images");
copydir("../users/D/sysapps/DevCenter/include","../users/$name/sysapps/DevCenter/include");
copydir("../users/D/sysapps/DevCenter/include/APP_core","../users/$name/sysapps/DevCenter/include/APP_core");
copydir("../users/D/sysapps/FileNet","../users/$name/sysapps/FileNet");
copydir("../users/D/sysapps/FileNet/wallpaper","../users/$name/sysapps/FileNet/wallpaper");
copydir("../users/D/sysapps/FileNet/include","../users/$name/sysapps/FileNet/include");
//copydir("../users/D/sysapps/FileNet/images","../users/$name/sysapps/FileNet/images");
copydir("../users/D/sysapps/FileNet/HDD","../users/$name/sysapps/FileNet/HDD");
copydir("../users/D/sysapps/FileNet/HDD/Applications","../users/$name/sysapps/FileNet/HDD/Applications");
copydir("../users/D/sysapps/Preferences","../users/$name/sysapps/Preferences");
echo "success";

function copydir($source,$destination)
{
if(!is_dir($destination)){
$oldumask = umask(0); 
mkdir($destination, 01777); // so you get the sticky bit set 
umask($oldumask);
}
$dir_handle = @opendir($source) or die("Unable to open".$source);
while ($file = readdir($dir_handle)) 
{
if($file!="." && $file!=".." && !is_dir("$source/$file"))
copy("$source/$file","$destination/$file");
}
closedir($dir_handle);
}
ob_end_flush();
?>
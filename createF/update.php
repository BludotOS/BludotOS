<?php
$namers = explode(",", $_GET['namer']);
foreach($namers as $name){

copydir("../users/admin","../users/$name");
copydir("../users/admin/config","../users/$name/config");
copydir("../users/admin/sysapps","../users/$name/sysapps");
copydir("../users/admin/sysapps/DevCenter","../users/$name/sysapps/DevCenter");
copydir("../users/admin/sysapps/DevCenter/images","../users/$name/sysapps/DevCenter/images");
copydir("../users/admin/sysapps/DevCenter/include","../users/$name/sysapps/DevCenter/include");
copydir("../users/admin/sysapps/FileNet","../users/$name/sysapps/FileNet");
copydir("../users/admin/sysapps/FileNet/wallpaper","../users/$name/sysapps/FileNet/wallpaper");
copydir("../users/admin/sysapps/FileNet/include","../users/$name/sysapps/FileNet/include");
//copydir("../users/admin/sysapps/FileNet/images","../users/$name/sysapps/FileNet/images");
copydir("../users/admin/sysapps/Preferences","../users/$name/sysapps/Preferences");
echo "done";
}
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
{
unlink($destination.DIRECTORY_SEPARATOR.$file);
copy("$source/$file","$destination/$file");
}
}
closedir($dir_handle);
//header( 'Location: http://bludot.tk/index.php' );
}
?>
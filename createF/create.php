<?php
$namers = $_GET['namer'];

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


copydir("../users/D","../users/$name");
copydir("../users/D/config","../users/$name/config");
copydir("../users/D/sysapps","../users/$name/sysapps");
copydir("../users/D/sysapps/DevCenter","../users/$name/sysapps/DevCenter");
copydir("../users/D/sysapps/DevCenter/images","../users/$name/sysapps/DevCenter/images");
copydir("../users/D/sysapps/DevCenter/include","../users/$name/sysapps/DevCenter/include");
copydir("../users/D/sysapps/FileNet","../users/$name/sysapps/FileNet");
copydir("../users/D/sysapps/FileNet/wallpaper","../users/$name/sysapps/FileNet/wallpaper");
copydir("../users/D/sysapps/FileNet/include","../users/$name/sysapps/FileNet/include");
//copydir("../users/D/sysapps/FileNet/images","../users/$name/sysapps/FileNet/images");
copydir("../users/D/sysapps/FileNet/HDD","../users/$name/sysapps/FileNet/HDD");
copydir("../users/D/sysapps/FileNet/HDD/Applications","../users/$name/sysapps/FileNet/HDD/Applications");
copydir("../users/D/sysapps/Preferences","../users/$name/sysapps/Preferences");
echo "done";

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
header( 'Location: http://bludot.tk/index.php' );
}

?>
<?php
$namers = explode(",", $_GET['namer']);
$acook = $_GET['userid'];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
foreach($namers as $name){
$string = urldecode("RewriteEngine%20On%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20cookid%3D".$acook."%0ARewriteRule%20%5E%2F%20-%20%5BCO%3Dcookid%3A.*%3A.bludotos.com%3A100%3A%2F%5D%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20!cookid%3D".$acook."%0ARewriteRule%20.*%20http%3A%2F%2Fbludotos.com%2FBlocked.html");
         if(file_exists('users/'.$name.'/.htaccess')) {
         	chmod ('users/'.$name.'/.htaccess', 0644);
         	$fh = fopen("users/".$name."/.htaccess", "w") or die("can't open file");
         	if(fwrite($fh, $string)) {
         		
         	};
         } else if(file_exists('../users/'.$name.'/.htaccess')) {
         	chmod ('../users/'.$name.'/.htaccess', 0644);
         	$fh = fopen("../users/".$name."/.htaccess", "w") or die("can't open file");
         	if(fwrite($fh, $string)) {
         		
         	};
         };
//copydir("../users/admin","../users/$name");
copydir("../users/admin/config","../users/$name/config");
//copydir("../users/admin/sysapps","../users/$name/sysapps");
copydir("../users/admin/sysapps/DevCenter","../users/$name/sysapps/DevCenter");
//copydir("../users/admin/sysapps/DevCenter/images","../users/$name/sysapps/DevCenter/images");
if($name != "admin")
{
	//rrmdir("../users/$name/sysapps/DevCenter/include");
	//mkdir("../users/$name/sysapps/DevCenter/include/APP_core");
};
copydir("../users/admin/sysapps/DevCenter/include","../users/$name/sysapps/DevCenter/include");
copydir("../users/admin/sysapps/DevCenter/include/APP_core","../users/$name/sysapps/DevCenter/include/APP_core");
copydir("../users/admin/sysapps/FileNet","../users/$name/sysapps/FileNet");
//copydir("../users/admin/sysapps/FileNet/wallpaper","../users/$name/sysapps/FileNet/wallpaper");
copydir("../users/admin/sysapps/FileNet/include","../users/$name/sysapps/FileNet/include");
//rrmdir("../users/$name/sysapps/uploader");
copydir("../users/admin/sysapps/Uploader","../users/$name/sysapps/Uploader");
//copydir("../users/admin/sysapps/FileNet/images","../users/$name/sysapps/FileNet/images");
copydir("../users/admin/sysapps/Preferences","../users/$name/sysapps/Preferences");
$link = mysql_connect('localhost','vios_admin','qlalsldl');
mysql_select_db('vios_users', $link);
$sql = "SELECT userid FROM users WHERE username = '".$name."'";
$result = mysql_query($sql, $link) or die(mysql_error());
$row = mysql_fetch_assoc($result);
$useridt = $row['userid'];
$string = urldecode("RewriteEngine%20On%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20cookid%3D".$useridt."%0ARewriteRule%20%5E%2F%20-%20%5BCO%3Dcookid%3A.*%3A.bludotos.com%3A100%3A%2F%5D%0ARewriteCond%20%25%7BHTTP_COOKIE%7D%20!cookid%3D".$useridt."%0ARewriteRule%20.*%20http%3A%2F%2Fbludotos.com%2FBlocked.html");
         if(file_exists('users/'.$name.'/.htaccess')) {
         	chmod ('users/'.$name.'/.htaccess', 0644);
         	$fh = fopen("users/".$name."/.htaccess", "w") or die("can't open file");
         	if(fwrite($fh, $string)) {
         		
         	};
         } else if(file_exists('../users/'.$name.'/.htaccess')) {
         	chmod ('../users/'.$name.'/.htaccess', 0644);
         	$fh = fopen("../users/".$name."/.htaccess", "w") or die("can't open file");
         	if(fwrite($fh, $string)) {
         		
         	};
         };
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
if($file!="." && $file!=".." && $file!=".htaccess" && !is_dir("$source/$file"))
{
//unlink($destination.DIRECTORY_SEPARATOR.$file);
copy("$source/$file","$destination/$file");
}
}
closedir($dir_handle);
//header( 'Location: http://bludot.tk/index.php' );
}
?>
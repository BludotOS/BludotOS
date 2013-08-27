<?php
$user = $_POST["user"];
$app = $_POST["name"];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
$zip = new ZipArchive;
if ($zip->open('../users/'.$user.'/sysapps/FileNet/HDD/Applications/'.$app) === TRUE) {
  $zip->extractTo('DEV/');
  $zip->close();
//deleteDir('../FileNet/HDD/Applications/temp/APP');
/*{"version":"1.3", "cat":"Social"}
*/
function insertb($code, $cat, $appn, $auth, $ver, $user, $app){
$dbhost = '127.0.0.1';
$dbuser = user;
$dbpass = pass;
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
//$db_found = mysql_select_db($qdatabase, $db_handle);

mysql_select_db('vios_apps') or die(mysql_error());
      $q = "SELECT * FROM ".$cat." WHERE id='$code'";
      $resulted = mysql_query( $q, $conn ) or die(mysql_error());
      if (mysql_num_rows($resulted)) {
			betacode();
	//header('Location:http://bludotos.com/');
      } else {
      mysql_close($conn);
      	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('vios_apps') or die(mysql_error());
      $q = "SELECT * FROM ".$cat." WHERE name='$appn'";
      $resulted = mysql_query( $q, $conn ) or die(mysql_error());
      if(mysql_num_rows($resulted) == 0)
      {
      	mysql_close($conn);
      	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$betacoded = $code;
mysql_select_db('vios_apps');
$SQL = "INSERT INTO ".$cat." (name, id, author, version) VALUES ('$appn', '$code', '$auth', '$ver')";
$result = mysql_query( $SQL, $conn );
mkdir('apps/'.$cat.'/'.$betacoded);
copy('DEV/APP_core/img.png', 'apps/'.$cat.'/'.$betacoded.'/img.png');
copy('DEV/APP_core/version.txt', 'apps/'.$cat.'/'.$betacoded.'/version.txt');
copy('../users/'.$user.'/sysapps/FileNet/HDD/Applications/'.$app, 'apps/'.$cat.'/'.$betacoded.'/'.$app);
rrmdir('DEV');
mkdir('DEV');
echo "app submited";
} else {
	//echo "app already exists! ERROR: 3";
	mysql_close($conn);
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db('vios_apps');
      $q = "SELECT version FROM ".$cat." WHERE name='$appn'";
      $resulted = mysql_query( $q, $conn ) or die(mysql_error());
      $tempres = mysql_fetch_array($resulted);
      if($tempres[0] < $ver)
      {
      	mysql_close($conn);
      	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
      	mysql_select_db('vios_apps') or die(mysql_error());
      $q = "SELECT id FROM ".$cat." WHERE name='$appn'";
      $resulted = mysql_query( $q, $conn ) or die(mysql_error());
      $tempres2 = mysql_fetch_array($resulted);
      mysql_close($conn);
      	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db('vios_apps');
      $q = "UPDATE ".$cat." SET version=$ver
WHERE name='$appn'";
      $resulted = mysql_query( $q, $conn ) or die(mysql_error());
      rrmdir('apps/'.$cat.'/'.$tempres2[0]);
      mkdir('apps/'.$cat.'/'.$tempres2[0]);
copy('DEV/APP_core/img.png', 'apps/'.$cat.'/'.$tempres2[0].'/img.png');
copy('DEV/APP_core/version.txt', 'apps/'.$cat.'/'.$tempres2[0].'/version.txt');
copy('../users/'.$user.'/sysapps/FileNet/HDD/Applications/'.$app, 'apps/'.$cat.'/'.$tempres2[0].'/'.$app);
rrmdir('DEV');
mkdir('DEV');
      }
}
}
mysql_close($conn);
}
function betacode($cat, $appn, $auth, $ver, $user, $app){
	$temp = base_convert(mt_rand(0x1D39D3E06400000, 0x41C21CB8E0FFFFFF), 36, 15);
	insertb($temp, $cat, $appn, $auth, $ver, $user, $app);
};
if($info = file_get_contents('DEV/APP_core/version.txt'))
{
	if($obj = json_decode($info))
	{
		if($obj->{'auth'} && $obj->{'version'} && $user && $app)
		{
			$appn = substr($app, 0, -4);
			$cat = (string)$obj->{'cat'};
betacode($cat, $appn, $obj->{'auth'}, $obj->{'version'}, $user, $app);
		} else {
	echo 'Contact the administrator! ERROR: 0';
}
	} else {
	echo 'There was a problem with your version.txt file. ERROR: 2';
}
} else {
	echo 'version.txt not found! ERROR: 1';
}
} else {
  echo 'failed';
}
?>
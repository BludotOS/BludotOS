<?
function load($path) 
{
    return require $path;
}
 
# Now we can use our configuration as an array ...
$myConf = load('users/'.$_GET['user'].'/config/config.php');
if($_GET['array']) {
$changeit = explode(",", $_GET['array']);
$countit = count($changeit);
$countit2 = count($myConf["$_GET[name]"]);
echo $_GET['array'];
echo $changeit;
echo $countit;
echo $countit2;
if($countit < $countit2) {
$myConf["$_GET[name]"] = array(
);
};
for($i = 0; $i < ($countit); $i++) {
$myConf["$_GET[name]"][$i] = "$changeit[$i]";
};
} else {
$myConf["$_GET[name]"] = $_GET['change'];
};
$array = array(
'trash'=> $myConf['trash'],
'homepage'=> $myConf['homepage'],
'theme'=> $myConf['theme'],
'Dockp'=> $myConf['Dockp'],
'wallpaper'=> $myConf['wallpaper'],
'version'=> $myConf['version'],
'dock' => $myConf['dock'],
'taskbar' => $myConf['taskbar'],
'windows' => $myConf['windows']);

function save($path, $array) 
{
    $content = '<?php '.PHP_EOL.'return ' . var_export($array, true) . ';';
    return is_numeric(file_put_contents($path, $content));
    //return file_put_contents($path, $content);
}

function save2($path, $array) 
{
    $content = '<?php '.PHP_EOL.'$array = ' . var_export($array, true) . ';'.PHP_EOL.'echo json_encode($array);';
    //return is_numeric(file_put_contents($path, $content));
    return file_put_contents($path, $content);
}
 
# Saving configuration
save('users/'.$_GET['user'].'/config/config.php', $array);
save2('users/'.$_GET['user'].'/config/configB.php', $array);
//echo $myConf['Dockapps'][1];
?>
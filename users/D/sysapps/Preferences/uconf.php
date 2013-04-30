<?
function load($path) 
{
    return require $path;
}
 
# Now we can use our configuration as an array ...
$myConf = load('../../config/config.php');
if($_GET['array']) {
$changeit = explode(",", $_GET['change']);
$myConf["$_GET[name]"][0] = $changeit[0];
$myConf["$_GET[name]"][1] = $changeit[1];
$myConf["$_GET[name]"][2] = $changeit[2];
$myConf["$_GET[name]"][3] = $changeit[3];
} else {
$myConf["$_GET[name]"] = $_GET['change'];
};
$array = array(
'trash'=> $myConf['trash'],
'homepage'=> $myConf['homepage'],
'theme'=> $myConf['theme'],
'Dockapps' => $myConf['Dockapps'],
'Dockfunc' => $myConf['Dockfunc'],
'Dockmag' => $myConf['Dockmag'],
'Dockmin' => $myConf['Dockmin'],
'Dockmax' => $myConf['Dockmax'],
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
save('../../config/config.php', $array);
save2('../../config/configB.php', $array);
//echo $myConf['Dockapps'][1];
?>
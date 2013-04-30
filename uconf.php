<?
function load($path) 
{
    return require $path;
}
 
# Now we can use our configuration as an array ...
$myConf = load($_GET['path'].'/config.php');
$myConf['version'] = $_GET['change'];
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
'version' => $myConf['version'],
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
save($_GET['path'].'/config.php', $array);
save2($_GET['path'].'/configB.php', $array);
//echo $myConf['Dockapps'][1];
?>
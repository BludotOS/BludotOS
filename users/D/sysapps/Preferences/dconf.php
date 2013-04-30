<?
function load($path) 
{
    return require $path;
}
 
# Now we can use our configuration as an array ...
$myConf = load('../../config/config.php');
$myConf['dockmag'] = $_GET['change'];
$array = array(
'trash'=> $myConf['trash'],
'homepage'=> $myConf['homepage'],
'theme'=> $myConf['theme'],
'Dockapps'=> $myConf['Dockapps'],
'Dockfunc'=> $myConf['Dockfunc'],
'wallpaper'=> $myConf['wallpaper'],
'version'=> $myConf['version'],
'dockmag'=> $myConf['dockmag']);
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
echo $myConf['dockmag'];
?>
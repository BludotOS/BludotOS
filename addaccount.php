<?
$newa = $_GET['newa'];
if($newa == "false") {
$oserver = explode(",", $_GET['oserver']);
$ouser = explode(",", $_GET['ouser']);
$opass = explode(",", $_GET['opass']);
};
function load($path) 
{
    return require $path;
}
 
function array_push_assoc($array, $key, $value){
$array[$key] = $value;
return $array;
}
# Now we can use our configuration as an array ...
$mailp = json_decode(load('prefs.php'));
$arrayt = array(
    'version'=> '1.0',
);
if($newa == "false")
{
$tempit = array();
for ($i=0; $i < count($oserver); $i++)
{
$tempitt = array(
    'server'=> $oserver[$i],
    'username'=> $ouser[$i],
    'password'=> $opass[$i]
);
array_push($tempit, $tempitt);
}
$tempitt = array(
    'server'=> $_GET['server'],
    'username'=> $_GET['user'],
    'password'=> $_GET['pass']
);
array_push($tempit, $tempitt);
    $arrayt = array_push_assoc($arrayt, 'accounts', $tempit);
    /*for ($i=1; $i < count($myConf); $i++)
    {
        array_push($tempa, "'server'=> '".$_GET['server']."'");
    }
    array_push($arrayt, "'accounts'=> ".$tempa);*/
}
if($newa == "true") {
$tempit = array();
$arrayt = array(
    'version'=> '1.0',
);
$tempitt = array(
    'server'=> $_GET['server'],
    'username'=> $_GET['user'],
    'password'=> $_GET['pass']
);
array_push($tempit, $tempitt);
$arrayt = array_push_assoc($arrayt, 'accounts', $tempit);
//$arrayt['accounts'] = $tempitt;
save2('prefs.php', $arrayt);
};

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
save2('prefs.php', $arrayt);
?>
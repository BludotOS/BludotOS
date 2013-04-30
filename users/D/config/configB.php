<?php 
$array = array (
  'trash' => 'empty',
  'homepage' => 'http://apple.com',
  'theme' => 'Apfelsine',
  'Dockapps' => 
  array (
    0 => 'DevCenter',
    1 => 'FileNet',
    2 => 'Appstore',
    3 => 'Applications',
  ),
  'Dockfunc' => 
  array (
    0 => 'DevCenter()',
    1 => 'FileNet()',
    2 => 'Appstore()',
    3 => 'Applications()',
  ),
  'Dockmag' => false,
  'Dockmin' => 44,
  'Dockmax' => 100,
  'wallpaper' => 'http://bludotos.com/users/admin/sysapps/FileNet/wallpaper/BluDot.svg',
  'version' => '0.67',
  'dock' => 
  array (
    0 => 'default',
    1 => 'white',
    2 => 'style',
    3 => 'script',
  ),
  'taskbar' => 
  array (
    0 => 'default',
    1 => 'default',
    2 => 'check',
    3 => 'script',
  ),
  'windows' => 
  array (
    0 => 'default',
    1 => 'default',
    2 => 'check',
    3 => 'check',
  ),
);
echo json_encode($array);
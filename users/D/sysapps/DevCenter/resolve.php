<?php
$apps = explode(',', $_POST['apps']);
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  };
  if(is_dir($dir)) rmdir($dir); 
}
foreach($apps as $app) {
rrmdir("../FileNet/HDD/Applications/temp/".$app);	
echo $app;
}
?>
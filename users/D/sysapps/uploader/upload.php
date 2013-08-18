<?php
if($_POST['valid'] == 1)
{
	$loc = $_GET["location"];
// make a note of the current working directory relative to root. 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

// make a note of the location of the upload handler script 
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.php';


function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.php';
$ferrors = ($_FILES[$fieldname]['error'] == 0) 
    or error($errors[$_FILES['image_file']['error']], $uploadForm); 
$there = @is_uploaded_file($_FILES['image_file']['tmp_name']) 
    or error('not an HTTP upload', $uploadForm);
$now = time();
$uploadsDirectory = $loc;
while(file_exists($uploadFilename = $uploadsDirectory.$_FILES['image_file']['name'])) 
{ 
    $now++; 
}
@move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadFilename);
echo <<<EOF
<p>Your file: {$sFileName} has been successfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
<p>Saved to: {$loc}</p>
EOF;
function error($error, $location, $seconds = 5) 
{ 
    //header("Refresh: $seconds; URL="$location""); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."n". 
    '"http://www.w3.org/TR/html4/strict.dtd">'."nn". 
    '<html lang="en">'."n". 
    '    <head>'."n". 
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."nn". 
    '        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."nn". 
    '    <title>Upload error</title>'."nn". 
    '    </head>'."nn". 
    '    <body>'."nn". 
    '    <div id="Upload">'."nn". 
    '        <h1>Upload failure</h1>'."nn". 
    '        <p>An error has occurred: '."nn". 
    '        <span class="red">' . $error . '...</span>'."nn". 
    '         The upload form is reloading</p>'."nn". 
    '     </div>'."nn". 
    '</html>'; 
    exit; 
} // end error handler 
} else {
echo <<<EOF
<p>ERROR: This is not a valid file type</p>
EOF;
}
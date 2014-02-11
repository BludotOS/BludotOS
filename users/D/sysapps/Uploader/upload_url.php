<?php
//blog.theonlytutorials.com
//author: agurchand
 
if($_POST){
//get the url
$url = $_POST['url'];
 $loc = $_GET["location"];
//add time to the current filename
$name = basename($url);
list($txt, $ext) = explode(".", $name);
$name = $txt.time();
$name = $name.".".$ext;
 
//check if the files are only image / document
//if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf"){
if($ext){
//here is the actual code to get the file from the url and save it to the uploads folder
//get the file from the url using file_get_contents and put it into the folder using file_put_contents
$upload = file_put_contents("$loc/$name",file_get_contents($url));
//check success
if($upload) {
	//echo "Success: <a href='uploads/".$name."' target='_blank'>Check Uploaded</a>"; else "please check your folder permission";
	echo "The file ".$name." has been uploaded successfully.";
}
}else{
echo "There was an error:/nEither the file was too big or the url is not valid.";
}
}
?>
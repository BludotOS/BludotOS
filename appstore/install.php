<?
$app = $_GET['app'];
$cat = $_GET['cat'];
$name = $_GET['name'];
$id = $_GET["id"];
mkdir('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'');
copy("apps/$cat/$id/img.png","../users/$name/sysapps/FileNet/apps/$app/img.png");
copy("apps/$cat/$id/$app.blu","../users/$name/sysapps/FileNet/apps/$app/$app.blu");
if(is_dir('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'') && is_file("../users/$name/sysapps/FileNet/apps/$app/$app.blu")) {
//unlink('../users/'.$name.'/sysapps/FileNet/apps/'.$app.'/version.txt');
copy("apps/$cat/$id/version.txt", "../users/$name/sysapps/FileNet/apps/$app/version.txt");
echo "installed";
} else {
echo "error";
};
?>
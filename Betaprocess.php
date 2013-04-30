<?PHP
ob_start();

$user_name = "vios_admin";
$password = "qlalsldl";
$database = "vios_beta";
$server = "127.0.0.1";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
$subemail = $_POST[email];
$username = $_POST[username];
$username = addslashes($username);
      $q = "SELECT * FROM beta_codes WHERE username = '$username'";
      $resulted = mysql_query($q);
         $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$";
         if(!eregi($regex,$subemail)){
            print "The email you have entered is invalid";
	    header('Location:http://bludot.tk/');
         };
         $subemail = stripslashes($subemail);
      if (mysql_numrows($resulted) > 0) {
	echo 'username already taken';
	header('Location:http://bludot.tk/');
      } else {

$SQL = "INSERT INTO beta_codes (username, betacode, email) VALUES ('$_POST[username]', '$_POST[betacode]', '$_POST[email]')";
$result = mysql_query($SQL);
print "Records added to the database";
$from = "From: bludot";
$to = $subemail;
$subject = "bludot - Welcome!";
$body = $username.",\n\n"
             ."Welcome! You've just registered at the bludot Site "
             ."with the following information:\n\n"
             ."Username: ".$username."\n"
             ."Password: ".$subemail."\n\n"
             ."You will receive a beta code shortly."
             ."- administrator";
if (mail($to, $subject, $body, $from)) {
  echo("<p>Message successfully sent!</p>");
 } else {
  echo("<p>Message delivery failed...</p>");
 }
};
mysql_close($db_handle);
header("location: http://bludot.tk/register.php?code=".$_POST[betacode]."");
}
else {
print "Database NOT Found ";
mysql_close($db_handle);
}
?>
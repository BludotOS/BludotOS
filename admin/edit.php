<?
$location = "10.10.10.3";
$database = "buildmet_clients"; 
$username = "buildmet_admin"; 
$password = "qlalsldl"; 

$conn = mysql_connect("$location","$username","$password"); 
if (!$conn) die ("Could not connect MySQL"); 
mysql_select_db($database,$conn) or die ("Could not open database"); 

if(isset($_POST['edit']))
  {
    $suser            =    addslashes($_POST['user']);
    $sbill        =    addslashes($_POST['bill']);
    
    mysql_query("UPDATE bill SET username='$suser', bill='$sbill' WHERE username='$suser'") or die (mysql_error());

    echo 'Je gegevens zijn succesvol ge-update<br>';
  }

$query = "select * from bill order by user";
$result = mysql_query($query);
?>

<?
         while ($link=mysql_fetch_array($result))
         {
         echo '&nbsp;&nbsp;'.$link[user].' <a href="'.$PHP_SELF.'/test2.php?id='.$link[id].'">'.$link[name].'</a> - '.$link[user].' - '.$link[bill].'<br>';
         }
?>
<?
if(!defined('TBL_ACTIVE_USERS')) {
  die("Error processing page");
}

$q = "SELECT username FROM ".TBL_ACTIVE_USERS
    ." ORDER BY timestamp DESC,username";
$result = $database->query($q);
/* Error occurred, return given name by default */
$num_rows = mysql_numrows($result);
if(!$result || ($num_rows < 0)){
   echo "Error displaying info";
}
else if($num_rows > 0){
   /* Display active users, with link to their info */
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
   }
}
?>

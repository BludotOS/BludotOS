<?php
/****************
* File: displaytables.php
* Date: 1.13.2009
* Author: design1online.com, LLC
* Purpose: display all table structure for a specific database
****************/

//connection variables
$host = "127.0.0.1";
$database = "vios_apps";
$user = "vios_apps";
$pass = "apfelorange1";

//connection to the database
mysql_connect($host, $user, $pass)
or die ('cannot connect to the database: ' . mysql_error());

//select the database
mysql_select_db($database)
or die ('cannot select database: ' . mysql_error());

//loop to show all the tables and fields
$loop = mysql_query("SHOW tables FROM $database")
or die ('cannot select tables');
echo "{";
$num_rowst = mysql_numrows($loop);
//for($a=0; $a < $num_rowst; $a++)
$a = 0;
while($table = mysql_fetch_array($loop))
{
	if($a < ($num_rowst-1))
	{
		echo "\"".$table[0]."\":[";

    //$i = 0; //row counter
    $row = mysql_query("select * FROM " . $table[0])
    or die ('cannot select table fields');
	$num_rows = mysql_numrows($row);
	if($num_rows > 0)
	{
    for($i=0; $i < $num_rows; $i++)
    {
    	if($i < ($num_rows-1))
    	{
    		echo "{";
			echo "\"name\":\"".mysql_result($row,$i, "name")."\", ";
			echo "\"id\":\"".mysql_result($row,$i, "id")."\", ";
			echo "\"author\":\"".mysql_result($row,$i, "author")."\", ";
			echo "\"version\":\"".mysql_result($row,$i, "version")."\"";
			echo "}, ";
    	} else {
    		echo "{";
    		echo "\"name\":\"".mysql_result($row,$i, "name")."\", ";
			echo "\"id\":\"".mysql_result($row,$i, "id")."\", ";
			echo "\"author\":\"".mysql_result($row,$i, "author")."\", ";
			echo "\"version\":\"".mysql_result($row,$i, "version")."\"";
			echo "}";
    	}

        //echo $col[0].$col[1].$col[2].$col[3];

    } //end row loop
	}
	echo "], ";
	} else {
		echo "\"".$table[0]."\":[";
	echo "]";
	}
	$a++;
} //end table loop
    echo "}";
?>
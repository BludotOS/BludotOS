<html>
<title>Jpmaster77's Login Script</title>
<body>
<h1>Admin Center</h1>
<font size="5" color="#ff0000">
<b>::::::::::::::::::::::::::::::::::::::::::::</b></font>
<br><br>
[<a onclick="admingoto('admin.php');" style="color:blue;">Admin Home</a>]<br><br>
<h3>Users Table Contents:</h3>
<?php
$con = mysql_connect("127.0.0.1","vios_admin","qlalsldl");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("vios_beta", $con);
$result = mysql_query("SELECT * FROM beta_codes ORDER BY email");
echo "<table border='1'>
<tr>
<th>Username</th>
<th>Bill</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['betacode'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
<h3>Update User Level</h3>
<? echo $form->error("upduser"); ?>
<table>
<form enctype="multipart/form-data" action="adminbillprocess.php" method="POST">
user to edit: <input type="text" name="user"><br />
New bill: <input type="text" name="bill"><br />
<input type="submit" name="edit" value="edit"></form> <br>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
</body>
</html>
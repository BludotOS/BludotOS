<html>
<head>
<style>
body {
background:
linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
background-color: #131313;
background-size: 20px 20px;; background:
-webkit-linear-gradient(63deg, #151515 5px, transparent 5px) 0 5px,
-webkit-linear-gradient(-117deg, #151515 5px, transparent 5px) 10px 0px,
-webkit-linear-gradient(63deg, #222 5px, transparent 5px) 0px 10px,
-webkit-linear-gradient(-117deg, #222 5px, transparent 5px) 10px 5px,
-webkit-linear-gradient(0deg, #1b1b1b 10px, transparent 10px),
-webkit-linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
background-color: #131313;
background-size: 20px 20px;
}
h2 {
	color:grey;
}
h3 {
	color:grey;
}
h4 {
	color:grey;
}
p {
	color:grey;
}
</style>
</head>
<body>
<?
$betacoded = base_convert(mt_rand(0x1D39D3E06400000, 0x41C21CB8E0FFFFFF), 36, 15);
?>
<form method="post" action="Betaprocess.php">
<font style="color:white;">Username:</font><input type="text" name="username" />
<br>
<input type="hidden" name="betacode" value="<? echo $betacoded; ?>" />
<font style="color:white;">Email:</font><input type="text" name="email" />
<br>
<input type="submit" />
</form>
<a onclick="parent.window.location.href='http://bludot.tk';">Home</a>
</body>
</html>
<html>
	<head>
		<style>
			body {
				background: #444;
			}
			.form {
				width: 450px;
height: 150px;
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
margin: auto;
color: white;
}
.input {
	outline: none;
border: none;
background: rgba(150,150,150,0.6);
height: 35px;
width: 100%;
color: black;
font-size: 26px;
line-height: 35px;
padding: 5px;
box-shadow: inset 0px 0px 15px -3px black;
}
.font {
	position: relative;
width: 100%;
text-align: center;
font-size: 35px;
font-family: sans-serif;
}

.submit {
	outline: none;
border: 1px solid gray;
width: 450px;
right: 0px;
position: relative;
height: 50px;
top: 15px;
margin: 0 auto;
padding: 0px;
background: #00025C;
color: white;
font-family: sans-serif;
font-size: 25px;
font-weight: bold;
}
		</style>
	</head>
<body>
<form class="form" method="post" action="process.php" >
<label>
	<font class="font">Please enter your username:</font>
	<input class="input" name="user" type="text" />
</label>
<input type="hidden" name="code" value="<? echo $_GET['code']; ?>" />
<input type="hidden" name="task" value="unlocked" />
<input type="submit" class="submit" value="Submit" />
</form>
</body>
</html>
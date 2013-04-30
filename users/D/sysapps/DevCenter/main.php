<? 
$user=$_GET['userN'];
?>
<div id="topbar" style="left:0px; top: 0px; position:relative; height:100px; width:150%; background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);">
<div id="topbarleft" style="float:left; position:relative; height:100px; background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);">
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/save.png" onclick="save();"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png" onclick="newproj();"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/open.png" onclick="thisis.popen();"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png" onclick="upload();"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/help.png" onclick="help();"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/gear.png" onclick="thisis.build(document.forms[0].children[0].value);"/>
	<img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/debug.png" onclick="thisis.debug(document.forms[0].children[0].value);"/>
</div>
<div id="topbarcenter">
	<center>
	<form action="javascript:thisis.rename(document.forms[0].children[0].value);" style="top: 10px;">
	Appname:<input type="text" name="AppName" id="AppName">
	</form>
	</center>
</div>
</div>
<div id="content" style="position: absolute;top: 100px;width: 150px;bottom: 0px;background:grey;">
	<div id="leftsidebar" style="relative; float:left; width:200px;background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);">
		<div id="topsidebar" style="left:0px;">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/newfolder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/deletefile-folder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png">
		</div>
                <div id="topsidebar" style="left:0px;">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/newfolder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/deletefile-folder.png">
			<img class="smallicons" onclick="thisis.back(thisis.response.location.split((thisis.response.location.split('/')[(thisis.response.location.split('/')).length-1]))[0].substring(0, thisis.response.location.split((thisis.response.location.split('/')[(thisis.response.location.split('/')).length]))[0].length-1));" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png">
		</div>
	</div>
                <table id="leftfilemgr" align="left" style="position:relative;top:0px;width:150px;height:auto;">
                <tbody  style="position:relative;overflow:hidden;height:auto;width:100%;top:100px;">
                </tbody>
                </table>
	</div>
<div id="divTop" style="position:absolute; top:100px; overflow:auto; overflow-x:hidden; overflow-y:hidden; bottom: 0px; left: 150px;right:0px;">
<div class="numbered_textarea">
</div>​
</div>
<?php
include('images.php');
$user = $_GET["user"];
?>
<script>
window.thisis.push(actT);
for (x in thisis)
{
     if(actT == thisis[x])
     {
        var thisislength = x;
        actT.x = x;
     }
}
thisis[actT.x].menu = function() {
var menu = document.getElementById('menu1').cloneNode(true);
window.bar(0);
menu.innerHTML = '<li onclick="clickt(this);"><a>Appstore</a></li><ul></ul><li><a>File</a></li><ul></ul></li>';
for(var i = 2; i < menu.children.length; i++)
{
document.getElementById('menu0').appendChild(menu.children[i].cloneNode(true));
}
};
thisis[actT.x].menu();
thisis[actT.x].submitapp = function(name){
	var ajax = new XMLHttpRequest();
	var sendit = 'user=<? echo $user; ?>&name='+name;
	ajax.open('POST', 'appstore/submit.php', true);
ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
ajax.onreadystatechange = function(){
	if(ajax.readyState == 4)
	{
		MainTools.Notify(ajax.responseText, '<? echo $devicon; ?>', 10)
	}
};
ajax.send(sendit);
};

thisis[actT.x].openfile = function(file) {
	console.log(file);
	core.openapp("<? echo $_GET['func']; ?>", file);
};
thisis[actT.x].goto = function(gotoit){
	console.log(gotoit);
	for(var i=0; i < (thisis[actT.x].children[1].children[0].children[0].children[0].children.length); i++) {
        	thisis[actT.x].children[1].children[0].children[0].children[0].removeChild(thisis[actT.x].children[1].children[0].children[0].children[0].children[0]);
        }
var goto2 = new XMLHttpRequest();
thisis[actT.x].gotoit=gotoit;
	if(gotoit.substring(0, 4) != "HDD/"){
	sendit = 'goto=HDD/'+gotoit;
	} else {
	sendit = 'goto='+gotoit;
	}
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		//window.tempitresp = response;
                //thisis[actT.x].response = response;
		if(thisis[actT.x].response.dirs) {
			for(var a=0; a < thisis[actT.x].response.dirs.length; a++)
		{
			var temp = document.createElement('tr');
			temp.innerHTML = '<td style="background: url(\'<? echo $Ifolder; ?>\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+thisis[actT.x].response.dirs[a]+'</td>';
			temp.style.cssText = 'width: 100%;position: relative;top: 0px;left: 0px;float: left;';
			if(isOdd(a))
			{
				temp.style.background = 'lightblue';
			} else {
				temp.style.background = 'white';
			}
			temp.addEventListener('click', function() {
				thisis[actT.x].goto(thisis[actT.x].response.location+'/'+this.children[0].innerHTML);
			}, false);
			thisis[actT.x].children[1].children[0].children[0].children[0].appendChild(temp);
		}
		}
		if(thisis[actT.x].response.files) {
		for(var a=0; a < thisis[actT.x].response.files.length; a++)
		{
			var temp = document.createElement('tr');
			var tempn = thisis[actT.x].response.files[a].substring(thisis[actT.x].response.files[a].indexOf(".") + 1);
			tempn = tempn.toLowerCase();
			var newtr = document.createElement('tr');
			if(tempn == 'png' || tempn == 'jpg' || tempn == 'jpeg' || tempn == 'gif') {
				temp.innerHTML = '<td style="background: url(\'users/'+core.user+'/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+thisis[actT.x].response.files[a]+'\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+thisis[actT.x].response.files[a]+'</td>';
			} else {
				temp.innerHTML = '<td style="background: url(\'<? echo $Ifile; ?>\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+thisis[actT.x].response.files[a]+'</td>';
			}
			temp.style.cssText = 'width: 100%;position: relative;top: 0px;left: 0px;float: left;';
			if(isOdd(a))
			{
				temp.style.background = 'lightblue';
			} else {
				temp.style.background = 'white';
			}
			temp.addEventListener('click', function() {
				thisis[actT.x].openfile(('users/'+core.user+'/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+this.children[0].innerHTML));
			}, false);
			thisis[actT.x].children[1].children[0].children[0].children[0].appendChild(temp);
		}
		}
		MainTools.scrollV(thisis[actT.x].children[1].children[0], thisis[actT.x], thisis[actT.x].children[1].children[0].children[0].children[0]);
	};
	};
goto2.send(sendit);
};
function isOdd(num) { return num % 2;}
var ajax = new XMLHttpRequest();
var sendit = 'goto=HDD';
ajax.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
ajax.onreadystatechange = function(){
	if(ajax.readyState == 4)
	{
		var response = JSON.parse(ajax.responseText);
		window.tempitresp = response;
                thisis[actT.x].response = response;
		for(var a=0; a < response.dirs.length; a++)
		{
			var temp = document.createElement('tr');
			temp.innerHTML = '<td style="background: url(\'<? echo $Ifolder; ?>\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+response.dirs[a]+'</td>';
			temp.style.cssText = 'width: 100%;position: relative;top: 0px;left: 0px;float: left;';
			if(isOdd(a))
			{
				temp.style.background = 'lightblue';
			} else {
				temp.style.background = 'white';
			}
		temp.addEventListener('click', function() {
				thisis[actT.x].goto(thisis[actT.x].response.location+'/'+this.children[0].innerHTML);
			}, false);
			thisis[actT.x].children[1].children[0].children[0].children[0].appendChild(temp);
		}
		for(var a=0; a < response.files.length; a++)
		{
			var temp = document.createElement('tr');
			var tempn = thisis[actT.x].response.files[a].substring(thisis[actT.x].response.files[a].indexOf(".") + 1);
			tempn = tempn.toLowerCase();
			var newtr = document.createElement('tr');
			if(tempn == 'png' || tempn == 'jpg' || tempn == 'jpeg' || tempn == 'gif') {
				temp.innerHTML = '<td style="background: url(\'users/'+core.user+'/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+thisis[actT.x].response.files[a]+'\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+thisis[actT.x].response.files[a]+'</td>';
			} else {
				temp.innerHTML = '<td style="background: url(\'<? echo $Ifile; ?>\') no-repeat;height: 20px;background-size: 20px;text-indent: 25px;">'+thisis[actT.x].response.files[a]+'</td>';
			}
			temp.style.cssText = 'width: 100%;position: relative;top: 0px;left: 0px;float: left;';
			if(isOdd(a))
			{
				temp.style.background = 'lightblue';
			} else {
				temp.style.background = 'white';
			}
			temp.addEventListener('click', function() {
				thisis[actT.x].openfile(('users/'+core.user+'/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+this.children[0].innerHTML));
			}, false);
			thisis[actT.x].children[1].children[0].children[0].children[0].appendChild(temp);
		}
		MainTools.scrollV(thisis[actT.x].children[1].children[0], thisis[actT.x], thisis[actT.x].children[1].children[0].children[0].children[0]);
	}
};
ajax.send(sendit);
</script>
<style>
</style>
<div style="position:absolute;top:0px;left:0px;right:0px;bottom:0px;background:grey;">
<table style="position: relative;top: 0px;left: 0px;right: 0px;bottom: 0px;width: 100%;height: 100%;">
<tbody style="position: absolute;top: 0px;left: 0px;right: 0px;overflow: hidden;bottom: 0px;">
</tbody>
</table>
</div>
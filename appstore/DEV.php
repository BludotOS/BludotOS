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
function isOdd(num) { return num % 2;}
var ajax = new XMLHttpRequest();
var sendit = 'goto=HDD/Applications/';
ajax.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
ajax.onreadystatechange = function(){
	if(ajax.readyState == 4)
	{
		var response = JSON.parse(ajax.responseText);
		window.tempitresp = response;
		for(var a=0; a < response.files.length; a++)
		{
			var temp = document.createElement('tr');
			temp.innerHTML = '<td>'+response.files[a]+'</td>';
			temp.style.cssText = 'width: 100%;position: relative;top: 0px;left: 0px;float: left;';
			if(isOdd(a))
			{
				temp.style.background = 'lightblue';
			} else {
				temp.style.background = 'white';
			}
			temp.onclick = function(){
				thisis[actT.x].submitapp(this.children[0].innerHTML);
			}
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
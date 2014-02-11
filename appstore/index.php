<?
include('images.php');
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
var installed;
thisis[actT.x].resp = '';
var getapps = new XMLHttpRequest();
getapps.open('GET', 'apps.php?goto=users/'+core.user+'/sysapps/FileNet/apps/', true);
getapps.onreadystatechange = function() {
        if(getapps.readyState==4) {
        window.testit = getapps.responseText;
        window.installed = JSON.parse(getapps.responseText);
var ajax = new XMLHttpRequest();
ajax.open('GET', 'appstore/get.php?t='+new Date().getTime(), true);
ajax.onreadystatechange = function() {
        if(ajax.readyState==4) {
                var response = JSON.parse(ajax.responseText);
                //window.resp = resp;
                window.tempitresp = response;
                thisis[actT.x].resp = response;
                var temp = document.createElement('tr');
                temp.td = document.createElement('td');
                temp.td.innerHTML = "All";
                thisis[actT.x].children[1].children[1].children[0].children[0].appendChild(temp);
                temp.appendChild(temp.td);
                temp.td.style.cssText = "border:1px solid black;";
                temp.td.onclick = function(){thisis[actT.x].catselect(this.innerHTML);};
                for(var tempName in thisis[actT.x].resp) {
    if(thisis[actT.x].resp.hasOwnProperty(tempName)) {
                var temp = document.createElement('tr');
                temp.td = document.createElement('td');
                temp.td.innerHTML = tempName;
                thisis[actT.x].children[1].children[1].children[0].children[0].appendChild(temp);
                temp.appendChild(temp.td);
                temp.td.style.cssText = "border:1px solid black;";
                temp.td.onclick = function(){thisis[actT.x].catselect(this.innerHTML);};
    }
};
                for(var propName in thisis[actT.x].resp) {
                	if(thisis[actT.x].resp.hasOwnProperty(propName) && thisis[actT.x].resp[propName].length > 0) {
                		for(var a=0; a < thisis[actT.x].resp[propName].length; a++)
                		{
                			var temp = document.createElement('div');
                			temp.img = document.createElement('img');
	                		temp.img.src = 'appstore/apps/'+propName+'/'+thisis[actT.x].resp[propName][a].id+'/img.png';
                			temp.name = document.createElement('div');
	                		temp.install = document.createElement('div');
	                		if(window.installed.dirs && window.installed.dirs.length > 0)
	                		{
	                		for(var h=0; h < window.installed.dirs.length; h++)
	                		{
	                			if(window.installed.dirs[h] == thisis[actT.x].resp[propName][a].name)
	                			{
	                				if(core.capps.length > 0)
	                				{
	                				for(var m in core.capps)
	                				{
	                					if(core.capps[m] == thisis[actT.x].resp[propName][a].name)
	                					{
	                						temp.install.innerHTML = 'Update';
	                						var tempname = thisis[actT.x].resp[propName][a].id;
	                						var nameit = propName;
                							temp.install.onclick = function(){thisis[actT.x].updateapp(nameit, tempname, this.parentNode.children[1].innerHTML);};
	                					} else if(core.capps[m] != thisis[actT.x].resp[propName][a].name){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                				}
	                				} else if(core.capps.length == 0){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                			}
	                		};
	                		};
	                		if(window.installed.dirs.indexOf(thisis[actT.x].resp[propName][a].name) == -1)
	                		{
	                			temp.install.innerHTML = 'Install';
	                			var tempname = thisis[actT.x].resp[propName][a].id;
                temp.install.onclick = function(){ thisis[actT.x].installapp(tempname, this.parentNode.children[1].innerHTML);};
	                		};
                		temp.name.innerHTML = thisis[actT.x].resp[propName][a].name;
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(temp.install.innerHTML != 'Uninstall')
                {
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                } else {
                	if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#fe4343 0%, #fe1205 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#fe4343), color-stop(100%,#fe1205))';
                };
                }
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);position:relative;float:left;";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                	};
                	};
};
        }
        }
        ajax.send();
thisis[actT.x].updateapp = function(name, id, app) {
var cupdateapp = new XMLHttpRequest();
cupdateapp.open('GET', 'appstore/update.php?app='+app+'&cat='+name+'&name='+core.user+'&id='+id, true);
cupdateapp.onreadystatechange = function() {
        if(cupdateapp.readyState==4) {
                var resp = cupdateapp.responseText;
                window.respit2 = resp;
                thisis[actT.x].resp1 = resp;
                MainTools.Notify(resp);
                core.checkupdates();
        }
}
cupdateapp.send();
};
thisis[actT.x].catselect = function(Name) {
	core.checkupdates();
thisis[actT.x].children[1].children[1].children[1].innerHTML = '';
if(Name == "All")
{
	for(var propName in thisis[actT.x].resp) {
                	if(thisis[actT.x].resp.hasOwnProperty(propName) && thisis[actT.x].resp[propName].length > 0) {
                		for(var a=0; a < thisis[actT.x].resp[propName].length; a++)
                		{
                			var temp = document.createElement('div');
                			temp.img = document.createElement('img');
	                		temp.img.src = 'appstore/apps/'+propName+'/'+thisis[actT.x].resp[propName][a].id+'/img.png';
                			temp.name = document.createElement('div');
	                		temp.install = document.createElement('div');
	                		if(window.installed.dirs && window.installed.dirs.length > 0)
	                		{
	                		for(var h=0; h < window.installed.dirs.length; h++)
	                		{
	                			if(window.installed.dirs[h] == thisis[actT.x].resp[propName][a].name)
	                			{
	                				if(core.capps.length > 0)
	                				{
	                				for(var m in core.capps)
	                				{
	                					if(core.capps[m] == thisis[actT.x].resp[propName][a].name)
	                					{
	                						temp.install.innerHTML = 'Update';
	                						var tempname = thisis[actT.x].resp[propName][a].id;
	                						var nameit = propName;
                							temp.install.onclick = function(){thisis[actT.x].updateapp(nameit, tempname, this.parentNode.children[1].innerHTML);};
	                					} else if(core.capps[m] != thisis[actT.x].resp[propName][a].name){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                				}
	                				} else if(core.capps.length == 0){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                			}
	                		};
	                		};
	                		if(window.installed.dirs.indexOf(thisis[actT.x].resp[propName][a].name) == -1)
	                		{
	                			temp.install.innerHTML = 'Install';
	                			var tempname = thisis[actT.x].resp[propName][a].id;
                temp.install.onclick = function(){ thisis[actT.x].installapp(tempname, this.parentNode.children[1].innerHTML);};
	                		};
                		temp.name.innerHTML = thisis[actT.x].resp[propName][a].name;
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(temp.install.innerHTML != 'Uninstall')
                {
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                } else {
                	if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#fe4343 0%, #fe1205 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#fe4343), color-stop(100%,#fe1205))';
                };
                }
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);position:relative;float:left;";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                	};
                	};
};
} else {
                		for(var a=0; a < thisis[actT.x].resp[Name].length; a++)
                		{
                			var temp = document.createElement('div');
                			temp.img = document.createElement('img');
	                		temp.img.src = 'appstore/apps/'+Name+'/'+thisis[actT.x].resp[Name][a].id+'/img.png';
                			temp.name = document.createElement('div');
	                		temp.install = document.createElement('div');
	                		if(window.installed.dirs && window.installed.dirs.length > 0)
	                		{
	                		for(var h=0; h < window.installed.dirs.length; h++)
	                		{
	                			if(window.installed.dirs[h] == thisis[actT.x].resp[Name][a].name)
	                			{
	                				if(core.capps.length > 0)
	                				{
	                				for(var m in core.capps)
	                				{
	                					if(core.capps[m] == thisis[actT.x].resp[Name][a].name)
	                					{
	                						temp.install.innerHTML = 'Update';
	                						var tempname = thisis[actT.x].resp[Name][a].id;
	                						var nameit = Name;
                							temp.install.onclick = function(){thisis[actT.x].updateapp(nameit, tempname, this.parentNode.children[1].innerHTML);};
	                					} else if(core.capps[m] != thisis[actT.x].resp[Name][a].name){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                				}
	                				} else if(core.capps.length == 0){
	                						temp.install.innerHTML = 'Uninstall';
					                		temp.install.onclick = function(){ thisis[actT.x].uninstall(this.parentNode.children[1].innerHTML);};
					                		//window.tempit = 'true';
	                					}
	                			}
	                		};
	                		};
	                		if(window.installed.dirs.indexOf(thisis[actT.x].resp[Name][a].name) == -1)
	                		{
	                			temp.install.innerHTML = 'Install';
	                			var tempname = thisis[actT.x].resp[Name][a].id;
                temp.install.onclick = function(){ thisis[actT.x].installapp(tempname, this.parentNode.children[1].innerHTML);};
	                		};
                		temp.name.innerHTML = thisis[actT.x].resp[Name][a].name;
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(temp.install.innerHTML != 'Uninstall')
                {
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                } else {
                	if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#fe4343 0%, #fe1205 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#fe4343), color-stop(100%,#fe1205))';
                };
                }
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);position:relative;float:left;";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                	};
};
};
thisis[actT.x].uninstall = function(app) {
	var app = app;
for(var propName in thisis[actT.x].resp) {
    if(thisis[actT.x].resp.hasOwnProperty(propName) && thisis[actT.x].resp[propName].length > 0) {
       for(var i=0; i < thisis[actT.x].resp[propName].length; i++) {
       if(thisis[actT.x].resp[propName][i].name == app) {
       var install = new XMLHttpRequest();
           install.open('GET', 'appstore/uninstall.php?cat='+propName+'&app='+app+'&name='+core.user+'', true);
           install.onreadystatechange = function() {
        if(install.readyState==4) {
        if(install.responseText == 'Success'){
        core.checkupdates();
        //thisis[actT.x].catselect(propName);
        MainTools.Notify('App removed!');
        delete window.installed;
        } else if(install.responseText == 'error') {
        alert('There was an error with uninstalling');
        alert(install.responseText);
        };
        };
        };
        install.send();
       };
       };
    };
};
};
thisis[actT.x].installapp = function(id, app) {
var app = app;
for(var propName in thisis[actT.x].resp) {
    if(thisis[actT.x].resp.hasOwnProperty(propName) && thisis[actT.x].resp[propName].length > 0) {
       for(var i=0; i < thisis[actT.x].resp[propName].length; i++) {
       if(thisis[actT.x].resp[propName][i].name == app) {
       var install = new XMLHttpRequest();
           install.open('GET', 'appstore/install.php?cat='+propName+'&app='+app+'&name='+core.user+'&id='+id, true);
           install.onreadystatechange = function() {
        if(install.readyState==4) {
        if(install.responseText == 'installed'){
        //thisis[actT.x].catselect(propName);
        MainTools.Notify('app installed!');
        core.checkupdates();
        delete window.installed;
        } else if(install.responseText == 'error') {
        alert('There was an error with installing');
        };
        };
        };
        install.send();
       };
       };
    };
};

};
}
}
getapps.send();
thisis[actT.x].dev = function(){
	var dev = SimpleWin.create("devsub", "devsub", "appstore/DEV.php?user="+core.user, null);
	dev.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
//dock.removeclick('FileNet', ['close', 'minimize']);

return true
}
}
</script>
<style>
.topbar-opt {
/*display: inline-block;*/
display:none;
width: 30px;
height: 30px;
background: white;
margin: 0px 5px 0px 5px;
}
.topbar-opt-dev {
	position: absolute;
right: 10px;
width: 26px;
height: 26px;
background: transparent;
top: 2px;
}
</style>
    <div class="topbar">
  <div class="topbar-opt"></div>
  <div class="topbar-opt"></div>
  <div class="topbar-opt"></div>
  <div class="topbar-opt"></div>
  <div class="topbar-opt"></div>
  <? if($_GET["dev"] == 1 || $_GET["admin"] == 1) { ?>
  <div class="topbar-opt-dev" onclick="thisis[actT.x].dev();"><img src="<? echo $devicon; ?>" /></div>
  <? }; ?>
    </div>
    <div style="position:absolute;top:30px;left:0px;right:0px;bottom:0px;height:auto;width:100%;background:red;">
        <div style="position:absolute;top:0px;right:0px;height:auto;bottom:0px;width:150px;background:white;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(181,189,200,1)), color-stop(36%,rgba(165,165,165,1)), color-stop(100%,rgba(124,124,124,1)));background:-moz-linear-gradient(top, rgba(181,189,200,1) 0%, rgba(165,165,165,1) 36%, rgba(124,124,124,1) 100%);">
        <table style="width:100%;">
        </table>
        </div>
        <div style="position: absolute;top: 0px;right: 150px;height: auto;bottom: 0px;width: auto;background: white;left: 0px;border-right:1px solid black;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);box-shadow: inset -2px 0px 5px black;">
        </div>
    </div>
<?
include('include/session.php');
include('include/view_active.php');
include('include/coreBC.php');
if ($user !=  'Guest') {
};
function load($path) 
{
    return require $path;
}
$version = '5.55';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
if (!$isMobile) {
?>
<html scrolling="no">
<?
};
?>
<head id="csslinks">
	<meta name="keywords" content="webos, operating system, online os, online operating system, idevice os, oses, apfelsine, apfelsineos, apfelsineoses">
	<title>bludot</title>
	<link rel="shortcut icon" href="wallpaper/BluDotlogo.png">
	<meta itemprop="name" content="ApfelsineOS">
	<meta itemprop="description" content="An easy WebOS for on the go. Fast, simple, and small. A new way for cloud computing.">
	<meta itemprop="image" content="http://bludot.tk/wallpaper/BluDotlogo.png">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
	<link rel="apple-touch-startup-image" href="images/bludotipod.png" />
	<link rel="apple-touch-icon" href="images/bludottransparent.png"/>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style>
	#popup {
		text-align:center;
		width:300px;
		height:auto;
		position:fixed;
		top:0px;
		left:25%;
		background-color: #555;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#555), to(#333));
		background-image: -webkit-linear-gradient(top, #555, #333);
		background-image: -moz-linear-gradient(top, #555, #333);
		background-image: -ms-linear-gradient(top, #555, #333);
		background-image: -o-linear-gradient(top, #555, #333);
		background-image: linear-gradient(top, #555, #333);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#555555', EndColorStr='#333333');
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-o-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
		-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -1px 0 rgba(255,255,255,0.3), inset 1px 0 0 rgba(255,255,255,0.3), inset -1px 0 0 rgba(255,255,255,0.3), 0 0 4px rgba(0,0,0,0.6);
		box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
		-webkit-text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
		-moz-text-shadow: 0 -1px 0 rgba(0,0,0,0.4);
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
		border: 1px solid #333;
		border-bottom-color: #222;
		border-top-color: #444;
		color: #EEE;
		overflow: hidden;
		-webkit-transform: translateY(36px);
		-moz-transform: translateY(36px);
		transform: translateY(36px);
		-webkit-transition: all 0.3s ease;
		-moz-transition: all 0.3s ease;
		transition: all 0.3s ease;
		opacity: 1;
		z-index: 970;
	}
	#form {
		position:relative;
		top:10px;
	}
#form input {
    position:relative;
    background-color: #555;
    background-image: -webkit-gradient(linear, left bottom, left bottom, from(#555), to(#333));
background-image: -webkit-linear-gradient(bottom, #555, #333);
    border:1px solid grey;
    border-radius:8px;
    padding-left:8px;
    padding-right:8px;
    outline:none;
}
#form input:last-child {
    background-color: #555;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#555), to(#333));
background-image: -webkit-linear-gradient(top, #555, #333);
    border:1px solid grey;
    border-radius:8px;
    padding-left:8px;
    padding-right:8px;
    outline:none;
    border-radius:3px;
    margin-bottom:15px;
}
.notifydialog {
width: 230px;
top: 0;
right: 0;
margin: 5px 10px;
padding: 10px;
background-color: #555;
background-image: -webkit-gradient(linear, left top, left bottom, from(#555), to(#333));
background-image: -webkit-linear-gradient(top, #555, #333);
background-image: -moz-linear-gradient(top, #555, #333);
background-image: -ms-linear-gradient(top, #555, #333);
background-image: -o-linear-gradient(top, #555, #333);
background-image: linear-gradient(top, #555, #333);
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#555555', EndColorStr='#333333');
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -1px 0 rgba(255,255,255,0.3), inset 1px 0 0 rgba(255,255,255,0.3), inset -1px 0 0 rgba(255,255,255,0.3), 0 0 4px rgba(0,0,0,0.6);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
-webkit-text-shadow: 0 -1px 0 rgba(0,0,0,0.6);
-moz-text-shadow: 0 -1px 0 rgba(0,0,0,0.6);
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.6);
border: 1px solid #333;
border-bottom-color: #222;
border-top-color: #444;
color: #EEE;
overflow: hidden;
-webkit-transform: translateY(36px);
-moz-transform: translateY(36px);
transform: translateY(36px);
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
transition: all 0.3s ease;
opacity: 0.8;
z-index: 970;
}
	</style>
<? if(!$isMobile) { ?>
<link rel="stylesheet" href="loadOS.css" type="text/css"/>
<? }; ?>
<script>
window.core = (function(){
    var core = {
    	OS: {}
    	},
    priv = {};
    core.create = function(type)
    {
        return document.createElement(type);
    };
    core.boot = function()
    {
    	
    };
    core.style = function(style, node)
    {
        node.style.cssText = style;
    };
    core.loadApps = {
Trash:function ()
{
var dividofapps = "trashwin"
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt");
dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Trash', ['close', 'minimize']);
return true
}
},
AmoebaChat:function ()
{
<?
if (!$isMobile) {
?>
var AchatS = prompt('Username');
     // OR var favorite = window.prompt('What is your favorite color?', 'RED');

     // if (favorite) equivalent to if (favorite != null && favorite != "");
     if (AchatS) {
        window.dock.AddNew({
            name:      'images/AmoebaChat',
            label:     'AmoebaChat',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
     	var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", 'http://amoeba.im/#username='+AchatS);
        dock.addclick('AmoebaChat', ['close', 'minimize'], [function(){SimpleWin.close(AmoebaChat);}, function(){SimpleWin.minimize(AmoebaChat);}]);
     } else {
     	alert("You pressed Cancel or no value was entered!");
     }
<?
} else if ($isMobile) {
?>
var AchatS = prompt('Username');
     // OR var favorite = window.prompt('What is your favorite color?', 'RED');

     // if (favorite) equivalent to if (favorite != null && favorite != "");
     if (AchatS) {
var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", "sysapps/amoebachat.txt");
     } else {
     	alert("You pressed Cancel or no value was entered!");
     }
<?
};
?>
AmoebaChat.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
dock.removeclick('AmoebaChat', ['close', 'minimize']);
window.dock.removeApp('AmoebaChat');
return true;
<?
} else if ($isMobile) { };
?>
return true;
}
},
DevCenter:function ()
{
alert('How to use:\nthe variable "Doc" is the window element of the object you are building. "Doc.ajax()" is an ajax call.\n Example:\nDoc.ajax("prefs.php", function(obj) {\nwindow.tested2 = obj;\nif(window.tested2.accounts.length < 1) {\nMainTools.popup(["test", "test2", "test3"]);\n} else {\nvar a = [];\na[0] = window.tested2.accounts[0].server;\na[1] = window.tested2.accounts[0].username;\na[2] = window.tested2.accounts[0].password;\nthisis[actT.x].callback(a);\n};\n}, "json", null, false);');
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+window.user+"/sysapps/DevCenter/?thefile=file.txt&userN="+window.user+"");
<?
if (!$isMobile) {
?>
dock.addclick('DevCenter', ['close', 'minimize'], [function(){SimpleWin.close(DevCenter);}, function(){SimpleWin.minimize(DevCenter);}]);
<?
};
?>
DevCenter.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
for (var x=0; x < thisis.length; x++)
{
     if(actT == thisis[x])
     {
        var thisislength = x;
     }
}
var renameit = new XMLHttpRequest();
        var nameit = window.thisis[actT.x].old.split("/")[window.thisis[actT.x].old.split("/").length-1];
        var sendit2 = 'path=../FileNet/HDD/Applications/temp/&old='+encodeURIComponent(nameit+'/')+'&new='+encodeURIComponent('../FileNet/HDD/Applications/'+nameit+'.blu')+'&move='+nameit;
	renameit.open('POST', 'users/'+window.user+'/sysapps/DevCenter/build.php', false);
        renameit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	renameit.onreadystatechange = function() {
	if (renameit.readyState==4) {
        //thisis.old = '../FileNet/HDD/Applications/temp/'+name;	
	};
	};
renameit.send(sendit2);
dock.removeclick('DevCenter', ['close', 'minimize']);
<?
};
?>
return true;
}
},
FileNet:function ()
{

var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+window.user+"/sysapps/FileNet/?userN="+window.user+"");
dock.addclick('FileNet', ['close', 'minimize'], [function(){SimpleWin.close(FileNet);}, function(){SimpleWin.minimize(FileNet);}]);
     
FileNet.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('FileNet', ['close', 'minimize']);

return true
}
},
Prefs:function ()
{
<?
if (!$isMobile) {
?>
window.dock.AddNew({
            name:      'icons/Preferences',
            label:     'Prefs',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+window.user+"/sysapps/Preferences/index.php?userN="+window.user+"");
dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){SimpleWin.minimize(Prefer);}]);
<?
} else if ($isMobile) {
?>
var Prefer=SimpleWin.create("pref", "prefed", "users/"+window.user+"/sysapps/Preferences/index.php");
<?
};
?>
Prefer.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
//dock.removeclick('Prefs', ['close', 'minimize']);
window.dock.removeApp('Prefs');
<?
} else if ($isMobile) { };
?>
return true;
}
},
AdminC:function ()
{
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/"+window.user+"/admin/admin.php")
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
},
Safari:function ()
{
var googlewin=SimpleWin.create("Safari", "safari", 'browserT/browser.html', 590, 500);
dock.addclick('Safari', ['close', 'minimize'], [function(){SimpleWin.close(googlewin);}, function(){SimpleWin.minimize(googlewin);}]);
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Safari', ['close', 'minimize']);
return true;
}
},
AboutOS:function()
{
var aboutos=SimpleWin.create("About", "about", "aboutOSw.php", 450, 400, 1, 1);
     
aboutos.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
},
logout:function()
                                        {
                                        setTimeout("location.href = 'process.php';",1500);
                                        var logout=SimpleWin.create("logout", "logout", "sysapps/logout.txt", "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
                                        logout.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
                                        return true
                                        }
                                        }
};
    core.getstyle = function(path, ex, name, callback)
    {
					var fileref=document.createElement("link");
  					fileref.setAttribute("rel", "stylesheet");
  					fileref.setAttribute("type", "text/css");
  					if(name == "check")
  					{
  					<? if($isMobile) {?>
  					fileref.setAttribute("href", ex+'s/'+path+'/mobile.css');
  					<? } else if(!$isMobile) {?>
  					fileref.setAttribute("href", ex+'s/'+path+'/desktop.css');
  					<? }; ?>
  					} else {
  					fileref.setAttribute("href", ex+'s/'+path+'/'+name+'.css');
  					};
  					document.getElementsByTagName("head")[0].appendChild(fileref);
  					return true;
	};
	core.getscript = function(path, ex, name, callback)
	{
		var fileref=document.createElement('script');
  		fileref.setAttribute("type","text/javascript");
  					if(name == "check")
  					{
  					<? if($isMobile) {?>
  					fileref.setAttribute("src", ex+'s/'+path+'/mobile.js');
  					<? } else if(!$isMobile) {?>
  					fileref.setAttribute("src", ex+'s/'+path+'/desktop.js');
  					<? }; ?>
  					} else {
  					fileref.setAttribute("src", ex+'s/'+path+'/'+name+'.js');
  					};
  		document.getElementsByTagName("head")[0].appendChild(fileref);
  		if(callback)
  		{
  		callback(true);
  		};
	};
    core.ajaxlogin = function (user, pass, sub, box)
                {
                     var checkit = new XMLHttpRequest();
                         var sendit = 'sublogin='+sub+'&user='+user+'&pass='+pass+'&remember='+box;
                         checkit.open("POST", "process.php", true);
                         checkit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                         checkit.onreadystatechange = function() {
                               if(checkit.readyState == 4){
                                     var resp = JSON.parse(checkit.responseText);
                                     window.resp = JSON.parse(checkit.responseText);
                                     if (resp.result == 'false'){
                                            alert("LOGIN DOES NOT EXIST");
                                            //delete check.responseText;
                                     } else if (resp.result == 'true') {
                                        var divit = document.getElementById('logdiv');
                                        document.body.removeChild(divit);
                                        document.body.removeChild(document.getElementById('loginback'));
                                        window.user = resp.user;
                                        core.user = resp.user;
                                        core.Admin = resp.Admin;
                     var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/"+user+"/config/configB.php", true);
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //window.userprefs = prefit;
                                     core.OS.Desktop.background.src = prefit.wallpaper;
                                     if (prefit.dockmag == 'false') {
                                         prefit.dockmag = false;
                                     } else if (prefit.dockmag == 'true') {
                                         prefit.dockmag = true;
                                     }
                                     core.getstyle(prefit.dock[0], 'dock', prefit.dock[1]);
                                     core.getscript(prefit.dock[0], 'dock', prefit.dock[2], function(result){
                                     if(result == true)
                                     {
                                     setTimeout(function(){
                                     window.dockit = [];
                                          //window.i = i;
                                          window.temp = {
                                                    name:      'icons/DevCenter',
                                                    label:     'DevCenter',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.DevCenter();}],
                                                    onclick:   function(){core.loadApps.DevCenter();}
                                          };
                                          window.dockit[0] = window.temp;
                                          window.temp = {
                                                    name:      'icons/FileNet',
                                                    label:     'FileNet',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.FileNet();}],
                                                    onclick:   function(){core.loadApps.FileNet();}
                                          };
                                          window.dockit[1] = window.temp;
                                          if (prefit.trash == 'empty') { 
                                          window.temp = {
                                                    name:      'icons/trash-empty',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.Trash();}],
                                                    onclick:   function(){core.loadApps.Trash();}
                                          };
                                          window.dockit.push(window.temp);
                                          } else if (prefit.trash == 'full') {
                                          window.temp = {
                                                    name:      'icons/trash-full',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.Trash();}],
                                                    onclick:   function(){core.loadApps.Trash();}
                                          };
                                          window.dockit.push(window.temp);
                                          };
                                     if (core.Admin == 1 || resp.Dev == 1) {
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                window.dockit,
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                prefit.dockmag);
                                     } else if(core.Admin != 1 && reap.Dev != 1) {
                                      window.dockit = [];
                                     for(var i=1; i < prefit.Dockapps.length; i++)
                                     {
                                          var temp = {
                                                    name:      'icons/'+prefit.Dockapps[i]+'',
                                                    label:     prefit.Dockapps[i],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){prefit.Dockapps[i]();}],
                                                    onclick:   function(){prefit.Dockapps[i]();}
                                          };
                                          window.dockit[i-1] = temp;
                                     };
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                window.docks,
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                prefit.dockmag);
                                     }
                                     }, 1000);
                                     };
                                     });
                                     core.getstyle(prefit.taskbar[0], 'taskbar', prefit.taskbar[1]);
                                     core.getscript(prefit.taskbar[0], 'taskbar', prefit.taskbar[2], function()
                                     {
                                     core.OS.Taskbar = core.create('div');
    	document.body.appendChild(core.OS.Taskbar);
    	core.OS.Taskbar.id = 'menubar';
    	core.OS.br = core.create('br');
    	document.body.appendChild(core.OS.br);
    	core.OS.Taskbar.menu1 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.menu1);
    	core.OS.Taskbar.menu1.id  = 'menu1';
    	core.OS.Taskbar.menu1.li1 = core.create('li');
    	core.OS.Taskbar.menu1.appendChild(core.OS.Taskbar.menu1.li1);
    	core.OS.Taskbar.menu1.li1.img = core.create('img');
    	core.OS.Taskbar.menu1.li1.appendChild(core.OS.Taskbar.menu1.li1.img);
    	core.OS.Taskbar.menu1.li1.img.src = 'wallpaper/BluDotlogo.png';
    	core.OS.Taskbar.menu1.menu2sub1 = core.create('ul');
    	core.OS.Taskbar.menu1.appendChild(core.OS.Taskbar.menu1.menu2sub1);
    	core.OS.Taskbar.menu1.menu2sub1.id = 'menu2sub1';
    	core.OS.Taskbar.menu1.menu2sub1.name = 'test';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li);
    	core.OS.Taskbar.menu1.menu2sub1.li.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li.appendChild(core.OS.Taskbar.menu1.menu2sub1.li.a);
    	core.OS.Taskbar.menu1.menu2sub1.li.a.id = 'testt';
    	core.OS.Taskbar.menu1.menu2sub1.li.a.innerText = 'About core OS';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li2 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li2.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2.a);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a.innerText = 'System Preferences...';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li3 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a.innerText = 'Dock';
    	
    	if(core.Admin == 1)
    	{
    	core.OS.Taskbar.menu1.menu2sub1.li4 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li4.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4.a);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a.innerText = 'Admin Center';
    	};
    	
    	core.OS.Taskbar.menu1.menu2sub1.li5 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li5.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5.a);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a.innerText = 'Logout '+core.user;
    	
    	core.OS.Taskbar.menu1.menu2sub1.li6 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li6.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6.a);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a.innerText = 'Reboot';
    	core.OS.Taskbar.temp = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.temp);
    	core.style('top:-8px', core.OS.Taskbar.temp);
    	core.OS.Taskbar.temp.id = 'menu0';
    	core.OS.Taskbar.temp2 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.temp2);
    	core.style('top:-8px', core.OS.Taskbar.temp2);
    	core.OS.Taskbar.temp2.id = 'menu2';
    	
    	
    	});

    	menubar = document.querySelector("#menubar");

menues = document.querySelectorAll("ul");
function clearNodes(node){
    while(node.children.length){
        node.removeChild(node.children[0]);
    }

}
clearNodes(menubar);
menubar.appendChild(menues[0].cloneNode(true));
window.addEventListener("hashchange", function(){
    var loc = document.location+"";
    clearNodes(menubar);
    menubar.appendChild(document.querySelector(loc.substr(loc.indexOf("#"))).cloneNode(true));
}, false);
window.bar = function(idn){
    var loc = document.location+"";
    clearNodes(menubar);
    menubar.appendChild(document.querySelector("#menu"+idn).cloneNode(true));

}
bar(1);
core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
    	if(core.Admin == 1)
    	{
    	core.OS.Taskbar.children[0].children[1].children[3].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].children[0].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludot.tk/loadtest.php';
    	};
    	} else {
    	core.OS.Taskbar.children[0].children[1].children[3].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].children[0].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludot.tk/loadtest.php';
    	};
    	};
    				core.getstyle(prefit.windows[0], 'window', prefit.windows[1]);
    				core.getscript(prefit.windows[0], 'window', prefit.windows[2]);
                                     if('<? echo $version; ?>' > prefit.version) {
                                     var updatev = new XMLHttpRequest();
                         updatev.open("GET", "uconf.php?path=users/"+window.user+"/config&change=<? echo $version; ?>", true);
                         updatev.onreadystatechange = function() {
                               if(updatev.readyState == 4){
                                     //MainTools.Notify('Version Updated\n<? echo $version; ?>');
                               }
                               }
                               updatev.send();
                                     }
                               }
                         }
                         checkp.send();
                                        if (resp.Admin == 1) {
                                        //document.getElementById('ajax1').style.display = 'block';
                                        };
                                        //document.getElementById('ajax2').innerText += window.user+'...';
                                     }
                               }
                         }
                         checkit.send(sendit);
                };
    core.load = function(){

	document.body.innerHTML+='<div id="dhtmlwindowholder" style="position: fixed;height: 100%;width: 100%;top: 0px;left: 0px;z-index: 1;"></div>';
	this.getscript('default', 'script', 'maintools');
        this.OS = this.create('div');
        this.OS.id = 'loading';
        this.OS.style.cssText = 'position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:2147486;-webkit-transition:opacity .5s linear;';
		this.OS.canvas = this.create('canvas');
        this.OS.canvas.width = 1600;
        this.OS.canvas.height = 1200;
        this.style('width: 100%;height: 100%;position:fixed;top:0px;left:0px;z-index:2147486;', this.OS.canvas);
        this.OS.meter = this.create('div');
        this.style('position: absolute;left: 50%;width: 200px;margin-left: -100px;top: 75%;text-align: center;color: white;z-index:2147486;', this.OS.meter);
        this.OS.meter.progress = this.create('progress');
        this.OS.meter.progress.min = 0;
        this.OS.meter.progress.max = 1;
        this.OS.meter.progress.value = 0;
        this.style('apearance: none;-webkit-appearance: none;', this.OS.meter.progress);
        this.OS.meter.span = this.create('span');
        this.OS.meter.span.className = 'progressText';
        this.OS.meter.span.innerText = 'Loading';
        this.OS.meter.audio = this.create('audio');
        this.OS.meter.audio.id = 'loadaudio';
        this.OS.meter.audio.src = 'http://www.soundjay.com/appliances/microwave-oven-bell-1.wav';
        document.body.appendChild(this.OS);
        this.OS.appendChild(this.OS.canvas);
        this.OS.appendChild(this.OS.meter);
        this.OS.meter.appendChild(this.OS.meter.progress);
        this.OS.meter.appendChild(this.OS.meter.span);
        this.OS.meter.appendChild(this.OS.meter.audio);
        
        canvas = document.querySelector("canvas");
progress = document.querySelector(".progressText");
progressMeter = document.querySelector(".meter progress");
context = canvas.getContext("2d");
radius = 48;
//14, 10
//var bluDot = {x: 14, y: 10};
var bluDot = {x: 11, y: 6};
gradient1 = context.createRadialGradient(radius+bluDot.x*radius*2, radius+bluDot.y*radius*2, 0,radius+bluDot.x*radius*2, radius+bluDot.y*radius*2,1400);
gradient1.addColorStop(0, "#666");
gradient1.addColorStop(1, "#333");
gradient2 = context.createRadialGradient(radius+bluDot.x*radius*2, radius+bluDot.y*radius*2, 0,radius+bluDot.x*radius*2, radius+bluDot.y*radius*2,1400);
gradient2.addColorStop(0, "rgba(102,102,102,0)");
gradient2.addColorStop(1, "#333");
var lerp = function(s,e,i){
	return s+(e-s)*i;
};
var rgba = function(r,g,b,a){
	return "rgba("+[Math.round(r),Math.round(g),Math.round(b),Math.round(a)].join(',')+")";
}
var draw = function(loaded){
//	loaded %= 1;
	context.fillStyle = gradient1;
	context.fillRect(0,0,1600,1200);
	
	context.lineWidth = 10;
	context.fillStyle="#333";
	context.strokeStyle="#777";
	for(var x = 0; x <= 19; x++){
		for(var y = 0; y <= 14; y++){
			if(x == bluDot.x && y == bluDot.y)
				continue;
			context.beginPath();
			context.arc(radius+x*radius*2,radius+y*radius*2,radius-10, 0, Math.PI*2);
			context.fill();
			context.stroke();
			context.closePath();
		}
	}
	context.beginPath();
	
	context.fillStyle = gradient2;
	context.fillRect(0,0,1600,1200);
	
	//context.fillStyle="#2a7fff";
	var fillP = Math.min(loaded/0.5,1);
	context.fillStyle=rgba(lerp(0x33,0x2a,fillP), lerp(0x33,0x7f,fillP), 
						   lerp(0x33,0xff,fillP), 255);
	//context.strokeStyle = "#0055d4";
	context.strokeStyle=rgba(lerp(0x77,0x00,fillP), lerp(0x77,0x75,fillP), 
						   lerp(0x77,0xd4,fillP), 255);
	context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, radius-10, 0, Math.PI*2);
	context.fill();
	context.stroke();
	context.closePath();
	if(loaded > 0.5){
		var circlePercent = Math.min((loaded-0.5)/0.25, 1);
		context.beginPath();
		//#156ae9
		context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, lerp(radius-10,radius*2, circlePercent), 0, Math.PI*2);
		context.strokeStyle="rgba("+0x15+","+0x6a+","+0xe9+","+circlePercent+")";
		context.stroke();
		context.closePath();
	}
	if(loaded > 0.75){
		var circlePercent = Math.min((loaded-0.75)/0.25, 1);
		context.beginPath();
		//#156ae9
		context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, lerp(radius-10,radius*3, circlePercent), 0, Math.PI*2);
		context.strokeStyle="rgba("+0x55+","+0x99+","+0xff+","+circlePercent*0.75+")";
		context.lineWidth*=3;
		context.stroke();
		context.closePath();
	}
};
var percentLoaded = 0;
draw(1);
core.progressI = setInterval(function(){
                if(progressMeter.value < 1) {
                      progressMeter.value += .1;
                } else {
                      progressMeter.value = 0;
                }
           }, 10);
var loadCore = function(every, done){
	//progress.innerHTML = "Loading the core";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
var loadDock = function(every, done){
	//progress.innerHTML = "Loading the dock";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
var loadPrefs = function(every, done){
	//progress.innerHTML = "Loading user preferences";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets*2);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
	
	loadCore(function(percent){
		draw(percent*0.5);
	},function(){loadDock(function(percent){
		draw(0.50 + percent*0.25);
	},function(){
		loadPrefs(function(percent){
			draw(0.75+percent*0.25);
		},function(){
			var audio = document.querySelector("audio");
			audio.play();
			/*canvas.style.display='none';
			progress.style.display='none';
			progressMeter.style.display='none';*/
			setTimeout("document.getElementById('loading').style.opacity=0;", 500);
			setTimeout("document.body.removeChild(document.getElementById('loading'));", 500);
		});
	})});
        this.OS.loginback = this.create('img');
        document.body.appendChild(this.OS.loginback);
        this.style('position:fixed; width:100%; height:100%; top:0px; left:0px; z-index:2147485;', this.OS.loginback);
        this.OS.loginback.src = 'http://bludot.tk/wallpaper/BluDot.svg';
        this.OS.loginback.id = 'loginback';
        this.OS.logindiv = this.create('div');
        document.body.appendChild(this.OS.logindiv);
        this.style('position:fixed;width:auto;height:auto;left:15%;top:10%;z-index:2147487;', this.OS.logindiv);
        this.OS.logindiv.id = 'logdiv';
        this.OS.logindiv.head = this.create('div');
        this.OS.logindiv.appendChild(this.OS.logindiv.head);
        this.style('-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;position:relative;top:0px;background:rgba(33, 33, 33, 1);width:100%;height:15px;color:white;font-size:10px;', this.OS.logindiv.head);
        this.OS.logindiv.head.center = this.create('center');
        this.OS.logindiv.head.appendChild(this.OS.logindiv.head.center);
        this.OS.logindiv.head.center.innerText = 'BluDot';
        this.OS.logindiv.body = this.create('div');
        this.OS.logindiv.appendChild(this.OS.logindiv.body);
        this.style('position:relative;width:100%;height:100%;background:rgba(16, 16, 16, 0.3);', this.OS.logindiv.body);
        this.OS.logindiv.body.content = this.create('div');
        this.OS.logindiv.body.appendChild(this.OS.logindiv.body.content);
        this.style('width:100%;height:100%;', this.OS.logindiv.body.content);
        this.OS.logindiv.body.content.inner = this.create('div');
        this.OS.logindiv.body.content.appendChild(this.OS.logindiv.body.content.inner);
        this.style('position:relative;width:100%;height:125px;', this.OS.logindiv.body.content.inner);
        this.OS.logindiv.body.content.form = this.create('form');
        this.OS.logindiv.body.content.appendChild(this.OS.logindiv.body.content.form);
        this.OS.logindiv.body.content.form.action = 'javascript:core.ajaxlogin(document.forms[0].children[0].children[0].value, document.forms[0].children[2].children[0].value, document.forms[0].children[2].children[1].value, document.forms[0].children[4].checked);';
        this.OS.logindiv.body.content.form.font1 = this.create('font');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.font1);
        this.style('position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;', this.OS.logindiv.body.content.form.font1);
        this.OS.logindiv.body.content.form.font1.innerText = 'Username:';
        this.OS.logindiv.body.content.form.font1.input = this.create('input');
        this.OS.logindiv.body.content.form.font1.appendChild(this.OS.logindiv.body.content.form.font1.input);
        this.style('color: black; background-color: gray', this.OS.logindiv.body.content.form.font1.input);
        this.OS.logindiv.body.content.form.font1.input.type = 'text';
        this.OS.logindiv.body.content.form.font1.input.name = 'user';
        this.OS.logindiv.body.content.form.font1.input.maxlength = 30;
        this.OS.logindiv.body.content.form.br = this.create('br');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.br);
        this.OS.logindiv.body.content.form.font2 = this.create('font');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.font2);
        this.style('position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;', this.OS.logindiv.body.content.form.font2);
        this.OS.logindiv.body.content.form.font2.innerText = 'Password:';
        this.OS.logindiv.body.content.form.font2.input = this.create('input');
        this.OS.logindiv.body.content.form.font2.appendChild(this.OS.logindiv.body.content.form.font2.input);
        this.style('color: black; background-color: gray', this.OS.logindiv.body.content.form.font2.input);
        this.OS.logindiv.body.content.form.font2.input.type = 'password';
        this.OS.logindiv.body.content.form.font2.input.name = 'pass';
        this.OS.logindiv.body.content.form.font2.input.maxlength = 30;
        this.OS.logindiv.body.content.form.font2.input2 = this.create('input');
        this.OS.logindiv.body.content.form.font2.appendChild(this.OS.logindiv.body.content.form.font2.input2);
        this.OS.logindiv.body.content.form.font2.input2.type = 'hidden';
        this.OS.logindiv.body.content.form.font2.input2.name = 'sublogin';
        this.OS.logindiv.body.content.form.font2.input2.value = 1;
        this.OS.logindiv.body.content.form.br2 = this.create('br');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.br2);
        this.OS.logindiv.body.content.form.input3 = this.create('input');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.input3);
        this.OS.logindiv.body.content.form.input3.type = 'checkbox';
        this.OS.logindiv.body.content.form.input3.name = 'remember';
        this.OS.logindiv.body.content.form.br3 = this.create('br');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.br3);
        this.OS.logindiv.body.content.form.input4 = this.create('input');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.input4);
        this.style('position:relative;left:10%;', this.OS.logindiv.body.content.form.input4);
        this.OS.logindiv.body.content.form.input4.type = 'submit';
        this.OS.logindiv.body.content.form.input4.value = 'Login';
        this.OS.logindiv.body.content.form.input5 = this.create('input');
        this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.input5);
        this.style('position:relative;left:37%;', this.OS.logindiv.body.content.form.input5);
        this.OS.logindiv.body.content.form.input5.type = 'button';
        this.OS.logindiv.body.content.form.input5.value = 'Signup';
        this.OS.logindiv.body.content.form.input5.onclick = function(){
            alert('We are now in the Dev/Beta mode. Anyone can now sign up!');
            this.register();
        };
        //this.OS.logindiv.body.content.form.br4 = this.create('br');
        //this.OS.logindiv.body.content.form.appendChild(this.OS.logindiv.body.content.form.br4);
        this.OS.logindiv.body.content.font = this.create('font');
        this.OS.logindiv.body.content.appendChild(this.OS.logindiv.body.content.font);
        this.style('position:relative;bottom:20%;left:5%;font-size:13px;', this.OS.logindiv.body.content.font);
        this.OS.logindiv.body.content.font.innerHTML = '<b>Help/Support</b><a href="mailto:support@bludot.tk">support@bludot.tk</a>';
        this.OS.logindiv.body.content.br5 = this.create('br');
        this.OS.logindiv.body.content.appendChild(this.OS.logindiv.body.content.br5);
        this.OS.logindiv.bottom = this.create('div');
        this.OS.logindiv.appendChild(this.OS.logindiv.bottom);
        this.style('-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;position:relative;top:100%;background:rgba(33, 33, 33, 1);width:100%;height:15px;', this.OS.logindiv.bottom);
        
        
        
        
        
        
        
    	this.OS.Desktop = this.create('div');
    	this.OS.Desktop.background = this.create('img');
    	this.style('width:100%;height:100%;position:fixed;top:0px;left:0px;', this.OS.Desktop);
    	this.style('width:100%;height:100%;position:fixed;top:0px;left:0px;', this.OS.Desktop.background);
    	//this.style('width:100%;height:33px;position:fixed;top:0px;left:0px;', this.OS.Taskbar);

    	
    	
    	

    	
    	document.body.appendChild(this.OS.Desktop);
    	this.OS.Desktop.appendChild(this.OS.Desktop.background);
    	this.OS.Dock = this.create('div');
    	document.body.appendChild(this.OS.Dock);
    	this.OS.Dock.id = 'dockContainer'
    	//this.style('', this.OS.Dock);
    	this.OS.Dock.bg = this.create('div');
    	this.OS.Dock.appendChild(this.OS.Dock.bg);
    	this.OS.Dock.bg.id = 'background';
    	//this.style('', this.OS.Dock.bg);
    	this.OS.Dock.dock = this.create('div');
    	this.OS.Dock.appendChild(this.OS.Dock.dock);
    	this.OS.Dock.dock.id = 'dock';
    	//this.style('', this.OS.Dock.dock);
    	
        clearInterval(core.progressI);
        <?
if ($session->logged_in && $session->username != 'Guest') {
if($session->isAdmin()){?>
core.Admin = 1;
<?
};
?>
var divit = document.getElementById('logdiv');
                                        document.body.removeChild(divit);
                                        document.body.removeChild(document.getElementById('loginback'));
var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/<? echo $session->username; ?>/config/configB.php", true);
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //window.userprefs = prefit;
                                     core.OS.Desktop.background.src = prefit.wallpaper;
                                     if (prefit.dockmag == 'false') {
                                         prefit.dockmag = false;
                                     } else if (prefit.dockmag == 'true') {
                                         prefit.dockmag = true;
                                     }
                                     core.getstyle(prefit.dock[0], 'dock', prefit.dock[1]);
                                     core.getscript(prefit.dock[0], 'dock', prefit.dock[2], function(result){
                                     if(result == true)
                                     {
                                     setTimeout(function(){
                                     window.dockit = [];
                                          //window.i = i;
                                          window.temp = {
                                                    name:      'icons/DevCenter',
                                                    label:     'DevCenter',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.DevCenter();}],
                                                    onclick:   function(){core.loadApps.DevCenter();}
                                          };
                                          window.dockit[0] = window.temp;
                                          window.temp = {
                                                    name:      'icons/FileNet',
                                                    label:     'FileNet',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.FileNet();}],
                                                    onclick:   function(){core.loadApps.FileNet();}
                                          };
                                          window.dockit[1] = window.temp;
                                          if (prefit.trash == 'empty') { 
                                          window.temp = {
                                                    name:      'icons/trash-empty',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.Trash();}],
                                                    onclick:   function(){core.loadApps.Trash();}
                                          };
                                          window.dockit.push(window.temp);
                                          } else if (prefit.trash == 'full') {
                                          window.temp = {
                                                    name:      'icons/trash-full',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){core.loadApps.Trash();}],
                                                    onclick:   function(){core.loadApps.Trash();}
                                          };
                                          window.dockit.push(window.temp);
                                          };
                                     if (core.Admin == 1 || resp.Dev == 1) {
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                window.dockit,
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                prefit.dockmag);
                                     } else if(core.Admin != 1 && reap.Dev != 1) {
                                      window.dockit = [];
                                     for(var i=1; i < prefit.Dockapps.length; i++)
                                     {
                                          var temp = {
                                                    name:      'icons/'+prefit.Dockapps[i]+'',
                                                    label:     prefit.Dockapps[i],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){prefit.Dockapps[i]();}],
                                                    onclick:   function(){prefit.Dockapps[i]();}
                                          };
                                          window.dockit[i-1] = temp;
                                     };
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                window.docks,
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                prefit.dockmag);
                                     }
                                     }, 1000);
                                     };
                                     });
                                     core.getstyle(prefit.taskbar[0], 'taskbar', prefit.taskbar[1]);
                                     core.getscript(prefit.taskbar[0], 'taskbar', prefit.taskbar[2], function()
                                     {
                                     core.OS.Taskbar = core.create('div');
    	document.body.appendChild(core.OS.Taskbar);
    	core.OS.Taskbar.id = 'menubar';
    	core.OS.br = core.create('br');
    	document.body.appendChild(core.OS.br);
    	core.OS.Taskbar.menu1 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.menu1);
    	core.OS.Taskbar.menu1.id  = 'menu1';
    	core.OS.Taskbar.menu1.li1 = core.create('li');
    	core.OS.Taskbar.menu1.appendChild(core.OS.Taskbar.menu1.li1);
    	core.OS.Taskbar.menu1.li1.img = core.create('img');
    	core.OS.Taskbar.menu1.li1.appendChild(core.OS.Taskbar.menu1.li1.img);
    	core.OS.Taskbar.menu1.li1.img.src = 'wallpaper/BluDotlogo.png';
    	core.OS.Taskbar.menu1.menu2sub1 = core.create('ul');
    	core.OS.Taskbar.menu1.appendChild(core.OS.Taskbar.menu1.menu2sub1);
    	core.OS.Taskbar.menu1.menu2sub1.id = 'menu2sub1';
    	core.OS.Taskbar.menu1.menu2sub1.name = 'test';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li);
    	core.OS.Taskbar.menu1.menu2sub1.li.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li.appendChild(core.OS.Taskbar.menu1.menu2sub1.li.a);
    	core.OS.Taskbar.menu1.menu2sub1.li.a.id = 'testt';
    	core.OS.Taskbar.menu1.menu2sub1.li.a.innerText = 'About core OS';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li2 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li2.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2.a);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a.innerText = 'System Preferences...';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li3 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a.innerText = 'Dock';
    	
    	<? if($session->isAdmin()){ ?>
    	core.OS.Taskbar.menu1.menu2sub1.li4 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li4.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4.a);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a.innerText = 'Admin Center';
    	<? }; ?>
    	
    	core.OS.Taskbar.menu1.menu2sub1.li5 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li5.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5.a);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a.innerText = 'Logout '+core.user;
    	
    	core.OS.Taskbar.menu1.menu2sub1.li6 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li6.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6.a);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a.innerText = 'Reboot';
    	core.OS.Taskbar.temp = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.temp);
    	core.style('top:-8px', core.OS.Taskbar.temp);
    	core.OS.Taskbar.temp.id = 'menu0';
    	core.OS.Taskbar.temp2 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.temp2);
    	core.style('top:-8px', core.OS.Taskbar.temp2);
    	core.OS.Taskbar.temp2.id = 'menu2';
    	
    	
    	});

    	menubar = document.querySelector("#menubar");

menues = document.querySelectorAll("ul");
function clearNodes(node){
    while(node.children.length){
        node.removeChild(node.children[0]);
    }

}
clearNodes(menubar);
menubar.appendChild(menues[0].cloneNode(true));
window.addEventListener("hashchange", function(){
    var loc = document.location+"";
    clearNodes(menubar);
    menubar.appendChild(document.querySelector(loc.substr(loc.indexOf("#"))).cloneNode(true));
}, false);
window.bar = function(idn){
    var loc = document.location+"";
    clearNodes(menubar);
    menubar.appendChild(document.querySelector("#menu"+idn).cloneNode(true));

}
bar(1);
core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
    	<? if($session->isAdmin()){ ?>
    	core.OS.Taskbar.children[0].children[1].children[3].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].children[0].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludot.tk/loadtest.php';
    	};
    	<? } else { ?>
    	core.OS.Taskbar.children[0].children[1].children[3].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].children[0].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludot.tk/loadtest.php';
    	};
    	<? }; ?>
    				core.getstyle(prefit.windows[0], 'window', prefit.windows[1]);
    				core.getscript(prefit.windows[0], 'window', prefit.windows[2]);
                                     if('<? echo $version; ?>' > prefit.version) {
                                     var updatev = new XMLHttpRequest();
                         updatev.open("GET", "uconf.php?path=users/"+window.user+"/config&change=<? echo $version; ?>", true);
                         updatev.onreadystatechange = function() {
                               if(updatev.readyState == 4){
                                     //MainTools.Notify('Version Updated\n<? echo $version; ?>');
                               }
                               }
                               updatev.send();
                                     }
                               }
                         }
                         checkp.send();
                         <? };?>
    };
    priv.auth = function(){
        var rand = function() {
	    return Math.random().toString(36).substr(2); // remove `0.`
	};

	var token = function() {
	    return rand() + rand(); // to make it longer
	};
	priv.token = token();	
    };
    core.token = function(){
        priv.auth();
    };
    core.test = function(token){
    if(token == priv.token)
    {
    alert('true');
    } else {
    alert('false');
    }
    };
    priv.auth();
    return core;
}());
window.onload = function(){core.load();};
</script>
</head>
<body scrolling="no" id="body" oncontextmenu="return false;" ondragstart="return false;" onselectstart="return false;" style="background:black;text-align:center;">
</body>
</html>
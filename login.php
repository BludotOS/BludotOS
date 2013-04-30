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
	<link rel="shortcut icon" href="images/bludottransparent.png">
	<meta itemprop="name" content="ApfelsineOS">
	<meta itemprop="description" content="An easy WebOS for on the go. Fast, simple, and small. A new way for cloud computing.">
	<meta itemprop="image" content="http://bludot.tk/images/bludot.png">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
	<link rel="apple-touch-startup-image" href="images/bludotipod.png" />
	<link rel="apple-touch-icon" href="images/bludottransparent.png"/>
	<link rel="stylesheet" type="css/text" href="styles/core.css"/>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="loadOS.css" type="text/css"/>
<script src="scripts/maintools.js"></script>
<script type="text/javascript" src="js/iscroll.js">
<?
if ($isMobile) {
?>
<link rel="stylesheet" href="taskbar/default/mobile.css" type="text/css" />
        <script type="text/javascript" src="windowfiles/dhtmlwindowM.js"></script>
        <link rel="stylesheet" href="windowfiles/dhtmlwindowM.css" type="text/css" />
<script type="text/javascript" src="scripts/touch.js"></script>
<script type="text/javascript">
/********************************************************************************************************************************************/
/*                                                           SCROLLING                                                                      */
/********************************************************************************************************************************************/
var myScroll;
function loaded() {
	myScroll = new iScroll('notificationD', {
		useTransform: false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});
}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded, false);
var myScroll2;
function loaded2() {
	myScroll2 = new iScroll('dockscroll', {
		hScrollbar: true,
		vScrollbar: false
	});
};
document.addEventListener('DOMContentLoaded', loaded2, false);
</script>
<script type="text/javascript">
var myScroll3;

function loaded3() {
	myScroll3 = new iScroll('mindock', {
		momentum: true,
		hScrollbar: false,
		vScrollbar: false
	 });
}

document.addEventListener('DOMContentLoaded', loaded3, false);
var myScroll4;
function loadedFF() {
	myScroll4 = new iScroll('contentareaF');
};
var myScroll5;
function loadedI() {
	myScroll5 = new iScroll('safariframe', { zoom: true });
};
 function BlockMove(event) {
  // Tell Safari not to move the window.
	event.preventDefault();
 }
</script>
<?
} else if (!$isMobile) {
?>
<script>
function notificationDesktop(Command) {
	if (Command == 'open') {
		document.getElementById('notificationD').style.display = 'block';
		document.getElementById('notificationD').style['-webkit-transition-property'] = 'top';
		document.getElementById('notificationD').style['-webkit-transition-duration'] = '.3s';
		document.getElementById('notificationD').style.MozTransition = 'top .3s';
		document.getElementById('notificationD').style.top = 0+'px';
	} else if (Command == 'close') {
		document.getElementById('notificationD').style.top = 100+'%';
	}
}
</script>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="windowfiles/dhtmlwindow.js"></script>
<link rel="stylesheet" href="taskbar/default/mobile.css" type="text/css" />
<link rel="stylesheet" href="docks/default/style.css" type="text/css" />
<script src="docks/default/script.js"></script>
<script type="text/javascript" src="scripts/clock.js"></script>
<?
};
?>
<script src="taskbar/default/script.js"></script>
	<script>
/********************************************************************************************************************************************/
/*                                                            GOOGLE                                                                        */
/********************************************************************************************************************************************/
		function register() {
			var removeC= document.getElementById('logdiv').children[1];
			document.getElementById('logdiv').removeChild(removeC);
		var register = document.createElement('iframe');
		register.src = 'registerBeta.php';
		document.getElementById('logdiv').children[1].appendChild(register);
		};
	</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32015121-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?
if($session->isDev() || $session->isAdmin()){
} else {
unset($Dockapps[1]);
};
?>
<script>
/********************************************************************************************************************************************/
/*                                                        LOAD APPS                                                                         */
/********************************************************************************************************************************************/
window.loadApps = function(user) {
window.Trash = function ()
{
var dividofapps = "trashwin"
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Trash', ['close', 'minimize']);
return true
}
}
window.AmoebaChat = function ()
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
     	var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", 'http://amoeba.im/#username='+AchatS, "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", "sysapps/amoebachat.txt", "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
}
window.DevCenter = function ()
{
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+window.user+"/sysapps/DevCenter/?thefile=file.txt&userN="+window.user+"", "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
for (x in thisis)
{
     if(actT == thisis[x])
     {
        var thisislength = x;
     }
}
var renameit = new XMLHttpRequest();
        var nameit = window.thisis[actT.x].old.split("/")[window.thisis[actT.x].old.split("/").length-1];
        var sendit2 = 'path=../FileNet/HDD/Applications/temp/&old='+encodeURIComponent(nameit+'/')+'&new='+encodeURIComponent('../FileNet/HDD/Applications/'+nameit+'.blu')+'&move='+nameit;
	renameit.open('POST', 'users/'+window.user+'/sysapps/DevCenter/build.php', true);
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
}
window.FileNet = function ()
{

var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+window.user+"/sysapps/FileNet/?userN="+window.user+"", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('FileNet', ['close', 'minimize'], [function(){SimpleWin.close(FileNet);}, function(){SimpleWin.minimize(FileNet);}]);
     
FileNet.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('FileNet', ['close', 'minimize']);
return true
}
}
window.Prefs = function ()
{
alert('This is still being developed. You can only edit your user information at this time');
<?
if (!$isMobile) {
?>
window.dock.AddNew({
            name:      'icons/prefsicon',
            label:     'Prefs',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+window.user+"/sysapps/Preferences/index.php?userN="+window.user+"", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){SimpleWin.minimize(Prefer);}]);
<?
} else if ($isMobile) {
?>
var Prefer=SimpleWin.create("pref", "prefed", "users/"+window.user+"/sysapps/Preferences/index.php", "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
}
window.AdminC = function ()
{
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/"+window.user+"/admin/admin.php", "width=590px,height=350px,resize=1,scrolling=1,center=1")
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
window.Safari = function ()
{
var googlewin=SimpleWin.create("Safari", "safari", 'browserT/browser.html', "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Safari', ['close', 'minimize'], [function(){SimpleWin.close(googlewin);}, function(){SimpleWin.minimize(googlewin);}]);
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Safari', ['close', 'minimize']);
return true;
}
}
window.AboutOS = function()
{
alert('I\'m sorry but this is not yet avaliable');
// var googlewin=SimpleWin.create("safari", "iframe", <? echo "\"$homepage\""; ?>, "width=590px,height=350px,resize=0,scrolling=0,center=1")
     
// googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
// return true
// }
}
window.logout = function()
                                        {
                                        setTimeout("location.href = 'process.php';",1500);
                                        var logout=SimpleWin.create("logout", "logout", "sysapps/logout.txt", "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
                                        logout.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
                                        return true
                                        }
                                        }
};
</script>
<script>
/********************************************************************************************************************************************/
/*                                                 TOUCH AND CLICK DISABLE                                                                  */
/********************************************************************************************************************************************/
window.addEventListener("touchmove", function (event) {
	BlockMove(event);
	window.touchcount = event.touches.length;
	if (window.touchcount == 3) {
		window.shimG = document.createElement('div');
		shimG.style.position = 'fixed';
		shimG.style.top = 0+'px';
		shimG.style.left = 0+'px';
		shimG.style.width = 100+'%';
		shimG.style.width = 100+'%';
		shimG.style.zIndex = 3647;
		document.body.appendChild(shimG);
	};
}, false);
window.addEventListener("gesturestart", function(event) {
	window.Gscale = event.scale;
}, false);
window.addEventListener("gesturechange", function(event) {
	window.GscaleC=event.scale;
}, false);
window.addEventListener( "gestureend", function(event) {
	if (window.touchcount == 3 && GscaleC < 1)  {
		document.body.removeChild(shimG);
		delete window.shimG;
		alert(GscaleC);
		window.SimpleWin.close(actT);
	};
}, false);

actT.contentarea.addEventListener("touchmove", function (event) {
	BlockMove(event);
	window.touchcount = event.touches.length;
	if (window.touchcount == 3) {
		window.shimG = document.createElement('div');
		shimG.style.position = 'fixed';
		shimG.style.top = 0+'px';
		shimG.style.left = 0+'px';
		shimG.style.width = 100+'%';
		shimG.style.width = 100+'%';
		shimG.style.zIndex = 3647;
		document.body.appendChild(shimG);
	};
}, false);
actT.contentarea.addEventListener("gesturestart", function(event) {
	window.Gscale = event.scale;
}, false);
actT.contentarea.addEventListener("gesturechange", function(event) {
	window.GscaleC = event.scale;
}, false);
actT.contentarea.addEventListener( "gestureend", function(event) {
	if (touchcount == 3 && GscaleC < 1)  {
		document.body.removeChild(shimG);
		delete window.shimG;
		alert(GscaleC);
		window.SimpleWin.close(actT);
	};
}, false);
function safed() {
var safe = document.getElementsByTagName('img');
for (var i=0; i<safe.length; i++) {
safe[i].ondragstart = function () {window.event.preventDefault();};
};
};
window.onclick = safed();
window.ondragstart = safed();
function loadOS() {
     loadDock();
};
</script>
</head>
<?
if ($isMobile) {
?>
<body scrolling="no" onload="<? if ($isMobile) { ?>loadM();<? }; ?>" ontouchmove="BlockMove(event);" id="body" style="background:black;text-align:center;">
<?
} else if (!$isMobile) {
?>
<body scrolling="no" onload="updateClock(); setInterval('updateClock()', 1000 ); safed(); <? if ($isMobile) { ?>loadM();<? }; ?>" ontouchmove="BlockMove(event);" id="body" oncontextmenu="return false;" ondragstart="return false;" onselectstart="return false;" style="background:black;text-align:center;">
<?
};
?>
<?php include_once("analytics.php"); ?>
<div id="testpopupmenuq" style="display:none;z-index:3647;top:0;left:0;position:absolute;border-color:gray;border:0.5px solid;width:auto;height:auto;background:URL('images/menu_back.png');" onmouseout="this.style.display='none';" onmouseover="this.style.display='block';"><ul><li><a onclick="alert('bobett')">Sub Nav Link</a></li><li><a onclick="alert('bob')">Sub Nav Link</a></li></ul></div>
<div id="loading" style="position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:2147486;-webkit-transition:opacity .5s linear;">
<canvas width="1600" height="1200" >
</canvas>
<div class="meter">
	<progress min="0" max="1" value="0.5" ></progress>
	<span class="progressText">Hello!</span>
	<audio src="http://www.soundjay.com/appliances/microwave-oven-bell-1.wav" autobuffer/>
</div>
</div>
<?
if (!$session->logged_in || $session->username == 'Guest') {
?>
                <script>
                function ajaxlogin(user, pass, sub, box)
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
                                     if (resp.result == 'false'){
                                            alert("LOGIN DOES NOT EXIST");
                                            //delete check.responseText;
                                     } else if (resp.result == 'true') {
                                        var divit = document.getElementById('logdiv');
                                        document.body.removeChild(divit);
                                        document.body.removeChild(document.getElementById('loginback'));
                                        window.user = resp.user;
                     var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/"+user+"/config/config.php", true);
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     //var prefit = JSON.parse(checkp.responseText);
                                     //window.userprefs = prefit;
                                     <? include('users/admin/config/config.php'); ?>
                                     <? $myConf = load('users/admin/config/configB.php'); ?>
                                     <? $session->isAdmin = true; ?>
                                     //document.getElementById('thedesktop').src = 'users/'+window.user+'/sysapps/FileNet/wallpaper/'+prefit.wallpaper;
                                     window.docks = [];
                                     if (resp.Admin == 1 || resp.Dev == 1) {
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                [<? foreach($myConf['Dockapps'] as $thisDock) { ?>
                                          {
                                                    name:      'icons/<? echo $thisDock; ?>',
                                                    label:     '<? echo $thisDock; ?>',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){<? echo $thisDock; ?>();}],
                                                    onclick:   function(){<? echo $thisDock; ?>();}
                                          },
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'empty') { ?>
                                          {
                                                    name:      'icons/trash-empty',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'full') { ?>
                                          {
                                                    name:      'icons/trash-full',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                ],
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                false);
                                     } else {
                                      <? unset($myConf['Dockapps'][1]); ?>
                                      window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                [<? foreach($myConf['Dockapps'] as $thisDock) { ?>
                                          {
                                                    name:      'icons/<? echo $thisDock; ?>',
                                                    label:     '<? echo $thisDock; ?>',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){<? echo $thisDock; ?>();}],
                                                    onclick:   function(){<? echo $thisDock; ?>();}
                                          },
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'empty') { ?>
                                          {
                                                    name:      'icons/trash-empty',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'full') { ?>
                                          {
                                                    name:      'icons/trash-full',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                ],
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                false);
                                     }
                               }
                         }
                         checkp.send();
                                        if (resp.Admin == 1) {
                                        document.getElementById('ajax1').style.display = 'block';
                                        };
                                        document.getElementById('ajax2').innerText += window.user+'...';
                                        window.loadApps();
                                     }
                               }
                         }
                         checkit.send(sendit);
                };
	</script>
<img id="loginback" src="wallpaper/BluDot.svg" style="position:fixed; width:100%; height:100%; top:0px; left:0px; z-index:2147485;"/>
	<div style="position:fixed;width:auto;height:auto;left:15%;top:10%;z-index:2147487;" id="logdiv">
		<div style="-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;position:relative;top:0px;background:rgba(33, 33, 33, 1);width:100%;height:15px;color:white;font-size:10px;">
			<center>bludot</center>
		</div>
		<div style="position:relative;width:100%;height:100%;background:rgba(16, 16, 16, 0.3);">
			<div style="width:100%;height:100%;">
				<div style="position:relative;width:100%;height:125px;">
				</div>
				<form action="javascript:ajaxlogin(document.forms[0].children[0].children[0].value, document.forms[0].children[2].children[0].value, document.forms[0].children[2].children[1].value, document.forms[0].children[4].checked);" method="POST">
					<font style="position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;">Username:<input type="text" style="color: black; background-color: gray" name="user" maxlength="30" ></font>
				<br>
				<font style="position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;">Password: <input type="password" style="color: black; background-color: gray" name="pass" maxlength="30" ><input type="hidden" name="sublogin" value="1"></font>
				<br>
				<input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
				<br>
				<input type="submit" value="Login" style="position:relative;left:10%;" ><input type="button" value="Sign up" style="position:relative;left:37%;" onclick="alert('We are now in beta mode and there for only those with beta codes can sign up. However, you can sign up for a beta code.');register();"></form><? include("include/view_active.php"); ?>
				<font style="position:relative;bottom:20%;left:5%;font-size:13px;"><b>Help/Support: </b><a href="mailto:support@buildme.tk">support@bludot.tk</a></font>
				<div style="position:relative;bottom:20%;left:30%;"><div class="g-plusone" data-size="small" data-annotation="none">
				</div>
			</div>
		<br>
		<center>
			<form style="position:relative;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="RKMHF5AUUTUL8">
				<input type="image" src="images/donate.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		</center>
		</div>
	</div>
	<div style="-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;position:relative;top:100%;background:rgba(33, 33, 33, 1);width:100%;height:15px;"></div>
	</div>
<?
} else if ($session->logged_in && $session->username != 'Guest') {
?>
<script>
var divit = document.getElementById('logdiv');
                                        //document.body.removeChild(divit);
                                        //document.body.removeChild(document.getElementById('loading'));
                                        window.user = '<? echo $session->username; ?>';
                     var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/"+user+"/config/config.php", true);
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     //var prefit = JSON.parse(checkp.responseText);
                                     //window.userprefs = prefit;
                                     <? //include('users/admin/config/config.php'); ?>
                                     <? $myConf = load('users/admin/config/configB.php'); ?>
                                     //document.getElementById('thedesktop').src = 'users/'+window.user+'/sysapps/FileNet/wallpaper/'+prefit.wallpaper;
                                     window.docks = [];
                                      <? if(!$session->isAdmin() && !$session->isDev()) { ?>
                                      <? unset($myConf['Dockapps'][1]); ?>
                                      <? }; ?>
                                        window.dock = new SimpleDock(
                                                document.getElementById('dock'),
                                                [<? foreach($myConf['Dockapps'] as $thisDock) { ?>
                                          {
                                                    name:      'icons/<? echo $thisDock; ?>',
                                                    label:     '<? echo $thisDock; ?>',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){<? echo $thisDock; ?>();}],
                                                    onclick:   function(){<? echo $thisDock; ?>();}
                                          },
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'empty') { ?>
                                          {
                                                    name:      'icons/trash-empty',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                <? if ($myConf['trash'] == 'full') { ?>
                                          {
                                                    name:      'icons/trash-full',
                                                    label:     'Trash',
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){Trash();}],
                                                    onclick:   function(){Trash();}
                                          }
                                                <? }; ?>
                                                ],
                                                44,
                                                100,
                                                3,
                                                5,
                                                10,
                                                false);
                               }
                         }
                         checkp.send();
                                        window.loadApps();
</script>
<?
};
?>
<script src="loadOS.js"></script>
<div id="menubar"></div>
<br/>
<ul id="menu1">
    <li onclick="clickt(this);"><img src="images/bludottransparent.png"/></li>
        <ul id="menu2sub1" name="test">
			<li>
                                <a id="testt" onclick="clickt(clicked);window.AboutOS();">About This OS</a>
			</li>
			<li>
				<a onclick="clickt(clicked);window.Prefs();">System Preferences...</a>
			</li>
			<li>
				<a onclick="clickt(clicked);">Dock  ?</a>
			</li>
			<?
if ($session->logged_in && $session->username != 'Guest') {
			if($session->isAdmin()){
			?>
			<li>
				<a onclick="clickt(clicked);window.AdminC();">Admin Center</a>
			</li>
			<?
			}
                        } else {
			?>
			<li id="ajax1" style="display:none;">
				<a onclick="clickt(clicked);window.AdminC();">Admin Center</a>
			</li>
<?
};
?>
			<li>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="RKMHF5AUUTUL8">
				<input type="image" src="images/donate.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" style="position:absolute;">
				</form>
			</li>
<?
if ($session->logged_in && $session->username != 'Guest') {
?>
			<li>
				<a onclick="clickt(clicked);window.logout();">Log Out <? echo $session->username; ?> ...</a>
			</li>
<?
} else {
?>
			<li>
				<a id="ajax2" onclick="clickt(clicked);window.logout();">logout </a>
			</li>
<?
};
?>
			<li>
			<a onclick="clickt(clicked);window.close();">Shutdown</a>
			</li>
			<li>
				<a onClick="window.location.href='http://dev.bludot.tk';">Reboot</a>
			</li>
		</ul>
    <li onclick="clickt(this);"><a>FileNet</a></li>
        <ul id="menu2sub3">
			<li>
			<a onclick="clickt(clicked);testdock();">test</a>
			</li>
			<li>
			<a onclick="clickt(clicked);testremove();">testremove</a>
			</li>
			<li>
			<a onclick="clickt(clicked);testbounce();">Test 3</a>
			</li>
			<li>
			<a onclick="clickt(clicked);testdocks();">Test 4</a>
			</li>
                        <li>
                        <a onclick="clickt(clicked);homebar();">test 5</a>
                        </li>
                        <li>
                        <a onclick="clickt(clicked);clearall();">clear cache</a>
                        </li>
                        <li>
                        <a onclick="clickt(clicked);Safar();">safari</a>
                        </li>
                        <li>
                        <a onclick="alert(window.applicationCache.status);">check cache</a>
                        </li>
                        <li>
                        <a onclick="window.applicationCache.update();">update cache</a>
                        </li>
                        <li>
                        <a onclick="window.applicationCache.swapCache();">swap cache</a>
                        </li>
		</ul>
<?
if (!$isMobile) {
?>
	<li style="position:fixed;top:1px;right:85px;z-index:2;">
                        <img onclick="notificationDesktop('open');" src="images/notificationDesktop.png" />
                        </li>
<?
};
?>
</ul>
<ul id="menu2">
    <li><a>App</a></li>
    <li><a>File</a></li>
    <li><a>Edit</a></li>
</ul>
<div style="position: absolute; top: 2px; right: 0; z-index: 999999;">
<span id="clock" style="float: right; position: relative; top: 2px; right: 9px; font-size: 12px; font-weight: 700; width: 100px; height: 21px;color: black;">&nbsp;</span>
</div>
<script>
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
function bar(idn){
    var loc = document.location+"";
    clearNodes(menubar);
    menubar.appendChild(document.querySelector("#menu"+idn).cloneNode(true));
}
bar(1);
</script>
<img src="images/AmoebaChat.png" style="width:55px;height:55px;position:fixed;top:25%;right:10px;z-index:5;" onclick="AmoebaChat();"/>
<div id="desktop" style="position: fixed; width:100%; height:100%; top:21px;z-index:5;"></div>
<img id="thedesktop" src="wallpaper/<? echo $myConf['wallpaper']; ?>" style="position:fixed; margin:0 auto;top:0px;left:0px;z-index:1;width:100%;height:100%;"/>
<div id="notificationE" ontouchstart="touchStart(event,'notificationE');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);"style="width:auto;height:15px;position:fixed;bottom:0px;left:25%;right:25%;z-index:2147487;"></div>
<div id="notificationD">
<div id="scroller" style="width:inherit;">
		<ul id="thelist">
<?
if (!$isMobile) {
?>
<li onclick="notificationDesktop('close');" style="margin-top:21px;">
<font style="text-align:center;color:white;">Close</font>
</li>
<?
};
?>
			<li>Chat<br><input type="text"></li>
			<li>Pretty row 2</li>
			<li>test</li>
			<li>Pretty row 4</li>
			<li>test</li>
			<li>Pretty row 6</li>
			<li>test</li>
			<li>Chat<br><input type="text"></li>
			<li>Pretty row 2</li>
			<li>test</li>
			<li>Pretty row 4</li>
			<li>test</li>
			<li>Pretty row 6</li>
			<li>test</li>
			<li>Chat<br><input type="text"></li>
			<li>Pretty row 2</li>
			<li>test</li>
			<li>Pretty row 4</li>
			<li>test</li>
			<li>Pretty row 6</li>
			<li>test</li>

		</ul>
</div></div>
<?
if ($isMobile) {
?>
<div id="SlidingDock" style="display:inline-block;position:relative;width:auto;overflow:visible;bottom:0px;z-index:10;">
	<div style="position:fixed;left:0px;height:40px;width:15px;bottom:0px;"><img src="images/left_shelf.png" style="width:100%;height:100%;" /></div>
	<div style="left:15px;right:15px;display:inline-block;width:auto;list-style:none;height:40px;bottom:0px;position:fixed;"><img src="images/shelf.png" style="width:100%;height:100%;" />
	<div  id="dockscroll" style="position:fixed;width:auto;bottom:0px;left:15px;right:15px;overflow:auto;">
		<div id="dockwidth" style="width:292px;height:73px;left:0p;padding:0px;float:left;">
		<ul id="docklist" style="display:inline-block;width:100%;height:100%;margin:0px;padding:0px;list-style:none;float:left;">
		<? foreach ($Dockapps as $thisDockapp) { ?>
			<li style="width:65px;height:65px;display:inline-block;vertical-align:bottom;position:relative;float:left;padding-left:4px;padding-right:4px;"><img src="icons/<? echo $thisDockapp; ?>.png" style="width:55px;height:55px;left:0;position:relative;border:none;" onclick="<? echo $thisDockapp; ?>();"/><br><a style="font-size:10px;color:white;"><? echo $thisDockapp; ?></a></li>
<? 
};
if ($trash == "empty") {
?>
<li style="width:65px;height:65px;display:inline-block;vertical-align:bottom;position:relative;float:left;padding-left:4px;padding-right:4px;"><img src="icons/trash-empty.png" style="width:55px;height:55px;left:0;position:relative;border:none;" onclick="trash();"/><br><a style="font-size:10px;color:white;">Trash</a></li>
<?
} else if ($trash == "full") {
?>
<li style="width:65px;height:65px;display:inline-block;vertical-align:bottom;position:relative;float:left;padding-left:4px;padding-right:4px;"><img src="icons/trash-full.png" style="width:55px;height:55px;left:0;position:relative;border:none;" onclick="trash();"/><br><a style="font-size:10px;color:white;"><? echo $thisDockapp; ?></a></li>
<?
};
?>
		</ul>
		</div>
	</div>
	</div>
	<div style="position:fixed;right:0px;height:40px;width:15px;bottom:0px;"><img src="images/right_shelf.png" style="width:100%;height:100%;" /></div>
</div>
</div>
<div id="closeswipe" ontouchstart="touchStart(event,'closeswipe');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" style="position:fixed;top:0px;left:0px;width:15px;height:50%;bottom:50%;z-index:2147487;background:transparent;"></div>
<div id="minswipe" ontouchstart="touchStart(event,'minswipe');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" style="position:fixed;top:50%;left:0px;width:15px;height:50%;bottom:0px;z-index:2147487;background:transparent;"></div>
<div id="mindockS" ontouchstart="touchStart(event,'mindockS');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" style="position:fixed;top:0px;right:0px;width:3px;height:100%;bottom:0px;z-index:2147487;background:transparent;"></div>
<div id="mindock">
	<div id="Dscroller">
		<ul id="Mthelist">
		</ul>
	</div>
</div>
<?
} else if (!$isMobile) {
?>
<div id="dockContainer"><div id="background"></div><div id="dock"></div></div>
<?
if (!$session->logged_in || $session->username == 'Guest') {
?>

<?
};
?>
<?
};
?>
<div id="alertdiv" style="width:150px;height:auto;position:fixed;z-index:3645;left:43%;top:0px;"></div>
<script>
window.loadedPackets=+90;
if (navigator.onLine == true) {
MainTools.alertsystem('Online');
} else if (navigator.onLine == false) {
MainTools.alertsystem('Offline');
}
</script>
</body>
</html>
<?
?>
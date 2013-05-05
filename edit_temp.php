<?
include('include/session.php');
include('include/view_active.php');
$user = $session->username;
if ($user !=  'Guest') {
	include('users/'.$user.'/config/config.php');
};
if (!$session->logged_in || $session->username == 'Guest') {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html itemscope itemtype="http://schema.org/Web OS" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
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
<style type="text/css">
  /*this is what we want the div to look like
    when it is not showing*/
  div.loading-invisible{
    /*make invisible*/
    display:none;
  }

  /*this is what we want the div to look like
    when it IS showing*/
  div.loading-visible{
    /*make visible*/
    display:block;

    /*position it 200px down the screen*/
    position:fixed;
    top:0px;
    left:0;
    width:100%;
    height:100%;
    text-align:center;

    /*in supporting browsers, make it
      a little transparent*/
    background-color: black;
  }
  div.loading-visible.img{
    position:fixed;
    margin:0 auto;
    z-index:1;
  }
</style>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="styles/jScrollPane.css" />
	<script type="text/javascript" src="scripts/jquery-1.2.6.min.js"></script>
<script>
function register() {
	var removeC= document.getElementById('logdiv').children[1];
	document.getElementById('logdiv').removeChild(removeC);
var register = document.createElement('iframe');
register.src = 'registerBeta.php';
document.getElementById('logdiv').children[1].appendChild(register);
};
function loginajax(user, pass) {
     var logina = new XMLHttpRequest();
     var senden = 'user='+user+'pass='+pass;
     logina.open('POST', 'process.php', true);
     logina.send(senden);
     logina.onreadystatechange = function() {
		if (logina.readyState==4) {
                    alert(senden);
                    alert(logina.responseText);
                }
     }
};
</script>
</head>
<body style="background:black;text-align:center;">
<div id="loading" class="loading-invisible" style="z-index: 2147483647;text-align:center;">
  <img src="images/bludotloader.gif" style="position:fixed; margin:0 auto;z-index:1;"/>
  <img src="images/load_progress.gif" style="position:fixed; margin:0 auto; bottom:20%; width:15px; height:15px;z-index:2;"/>
</div>
<script type="text/javascript">
  document.getElementById("loading").className = "loading-visible";
  var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
  var oldLoad = window.onload;
  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
  window.onload = newLoad;
</script>
<div style="position:fixed;width:auto;height:auto;left:15%;top:10%;z-index:5;" id="logdiv">
	<div style="-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;position:relative;top:0px;background:rgba(33, 33, 33, 1);width:100%;height:15px;color:white;font-size:10px;"><center>bludot</center></div>
	<div style="position:relative;width:100%;height:100%;background:rgba(16, 16, 16, 0.3);">
		<div style="width:100%;height:100%;">
		<div style="position:relative;width:100%;height:125px;background:url(icons/bludottransparent.png) no-repeat center;"></div>
		<form action="process.php" method="POST">
		<font style="position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;">Username:<input type="text" style="color: black; background-color: gray" name="user" maxlength="30" ></font>
		<br>
		<font style="position:relative;top:3%;left:3%;right:3%;font-wheight:10px;color:white;">Password: <input type="password" style="color: black; background-color: gray" name="pass" maxlength="30" ><input type="hidden" name="sublogin" value="1"></font>
		<br>
		<input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
		<br>
		<input type="submit" value="Login" style="position:relative;left:10%;"><input type="button" value="Sign up" style="position:relative;left:37%;" onclick="alert('We are now in beta mode and there for only those with beta codes can sign up. However, you can sign up for a beta code.');register();"></form><? include("include/view_active.php"); ?>
		<font style="position:relative;bottom:20%;left:5%;font-size:13px;"><b>Help/Support: </b><a href="mailto:support@buildme.tk">support@bludot.tk</a></font>
		<div style="position:relative;bottom:20%;left:30%;"><div class="g-plusone" data-size="small" data-annotation="none"></div></div>
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
<img id="thedesktop" src="wallpaper/bludotwallpaper.png" style="position:fixed; margin:0 auto;top:0px;left:0px;z-index:1;width:100%;height:100%;"/>
</body>
</html>
<?
} else if ($session->logged_in || $session->username !== 'guest') {

$isMobile = false;
$isBot = false;

$op = strtolower($_SERVER['HTTP_X_OPERAMINI_PHONE']);
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$ac = strtolower($_SERVER['HTTP_ACCEPT']);
$ip = $_SERVER['REMOTE_ADDR'];

$isMobile = strpos($ac, 'application/vnd.wap.xhtml+xml') !== false
        || $op != ''
        || strpos($ua, 'sony') !== false 
        || strpos($ua, 'symbian') !== false 
        || strpos($ua, 'nokia') !== false 
        || strpos($ua, 'samsung') !== false 
        || strpos($ua, 'mobile') !== false
        || strpos($ua, 'windows ce') !== false
        || strpos($ua, 'epoc') !== false
        || strpos($ua, 'opera mini') !== false
        || strpos($ua, 'nitro') !== false
        || strpos($ua, 'j2me') !== false
        || strpos($ua, 'midp-') !== false
        || strpos($ua, 'cldc-') !== false
        || strpos($ua, 'netfront') !== false
        || strpos($ua, 'mot') !== false
        || strpos($ua, 'up.browser') !== false
        || strpos($ua, 'up.link') !== false
        || strpos($ua, 'audiovox') !== false
        || strpos($ua, 'blackberry') !== false
        || strpos($ua, 'ericsson,') !== false
        || strpos($ua, 'panasonic') !== false
        || strpos($ua, 'philips') !== false
        || strpos($ua, 'sanyo') !== false
        || strpos($ua, 'sharp') !== false
        || strpos($ua, 'sie-') !== false
        || strpos($ua, 'portalmmm') !== false
        || strpos($ua, 'blazer') !== false
        || strpos($ua, 'avantgo') !== false
        || strpos($ua, 'danger') !== false
        || strpos($ua, 'palm') !== false
        || strpos($ua, 'series60') !== false
        || strpos($ua, 'palmsource') !== false
        || strpos($ua, 'pocketpc') !== false
        || strpos($ua, 'smartphone') !== false
        || strpos($ua, 'rover') !== false
        || strpos($ua, 'ipaq') !== false
        || strpos($ua, 'au-mic,') !== false
        || strpos($ua, 'alcatel') !== false
        || strpos($ua, 'ericy') !== false
        || strpos($ua, 'up.link') !== false
        || strpos($ua, 'vodafone/') !== false
        || strpos($ua, 'wap1.') !== false
        || strpos($ua, 'wap2.') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'],'iPad') !== false;

        $isBot =  $ip == '66.249.65.39'
        || strpos($ua, 'googlebot') !== false 
        || strpos($ua, 'mediapartners') !== false 
        || strpos($ua, 'yahooysmcm') !== false 
        || strpos($ua, 'baiduspider') !== false
        || strpos($ua, 'msnbot') !== false
        || strpos($ua, 'slurp') !== false
        || strpos($ua, 'ask') !== false
        || strpos($ua, 'teoma') !== false
        || strpos($ua, 'spider') !== false 
        || strpos($ua, 'heritrix') !== false 
        || strpos($ua, 'attentio') !== false 
        || strpos($ua, 'twiceler') !== false 
        || strpos($ua, 'irlbot') !== false 
        || strpos($ua, 'fast crawler') !== false                        
        || strpos($ua, 'fastmobilecrawl') !== false 
        || strpos($ua, 'jumpbot') !== false
        || strpos($ua, 'googlebot-mobile') !== false
        || strpos($ua, 'yahooseeker') !== false
        || strpos($ua, 'motionbot') !== false
        || strpos($ua, 'mediobot') !== false
        || strpos($ua, 'chtml generic') !== false
        || strpos($ua, 'nokia6230i/. fast crawler') !== false;

$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
$isiPod = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
$isWebview = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Safari');
$user = $session->username;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
if ($isMobile) {
?>
<?
} else if (!$isMobile) {
?>
<html scrolling="no">
<?
};
?>
<head id="csslinks">
	<title>bludot</title>
	<link rel="shortcut icon" href="images/bludottransparent.png">
<script src="https://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
<link rel="apple-touch-icon" href="images/bludottransparent.png"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="webos, operating system, online os, online operating system, idevice os, oses, apfelsine, apfelsineos, apfelsineoses">
<meta itemprop="description" content="An easy WebOS for on the go. Fast, simple, and small. A new way for cloud computing.">
<link rel="apple-touch-startup-image" href="images/bludotipod.png" />
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
<script>
if (navigator.onLine == true) {
function onlineT() {
window.connectionT = document.createElement('div');
connectionT.style.width = 150+'px';
connectionT.style.height = 35+'px';
connectionT.style.position = 'fixed';
connectionT.style.zIndex = 3645;
connectionT.style.left = 43+'%';
connectionT.style.top = -40+'px';
connectionT.style.background = 'rgba(66, 66, 66, 0.8)';
connectionT.style['border-radius'] = '10px';
connectionT.style.MozBorderRadius = '10px';
connectionT.style.MozTransition = 'top .8s';
connectionT.style['-webkit-border-radius'] = '10px';
connectionT.style['-webkit-transition-property'] = 'top';
connectionT.style['-webkit-transition-duration'] = '.8s';
connectionT.style['border'] = '2px #333333 solid';
connectionT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Online</font>';
document.body.appendChild(connectionT);
setTimeout('onlineTD()', 1000);
};
function onlineTD() {
connectionT.style.top = -40+'px';
connectionT.style.top = 0+'px';
setTimeout('onlineTU()', 5000);
};
function onlineTU() {
connectionT.style.top = -40+'px';
};
setTimeout('onlineT()', 5000);
} else if (navigator.onLine == false) {
function onlineF() {
window.connectionT = document.createElement('div');
connectionT.style.width = 150+'px';
connectionT.style.height = 35+'px';
connectionT.style.position = 'fixed';
connectionT.style.zIndex = 3845;
connectionT.style.left = 43+'%';
connectionT.style.top = -40+'px';
connectionT.style.background = 'rgba(66, 66, 66, 0.8)';
connectionT.style['border-radius'] = '10px';
connectionT.style.MozBorderRadius = '10px';
connectionT.style.MozTransition = 'top .8s';
connectionT.style['-webkit-border-radius'] = '10px';
connectionT.style['-webkit-transition-property'] = 'top';
connectionT.style['-webkit-transition-duration'] = '.8s';
connectionT.style['border'] = '2px #333333 solid';
connectionT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Offline</font>';
document.body.appendChild(connectionT);
setTimeout('onlineFD()', 1000);
};
function onlineFD() {
connectionT.style.top = -40+'px';
connectionT.style.top = 0+'px';
setTimeout('onlineTU()', 5000);
};
function onlineFU() {
connectionT.style.top = -40+'px';
};
setTimeout('onlineF()', 5000);
};
</script>
<script>
function cacheTT() {
window.cacheBT = document.createElement('div');
cacheBT.style.width = 150+'px';
cacheBT.style.height = 35+'px';
cacheBT.style.position = 'fixed';
cacheBT.style.zIndex = 2147487;
cacheBT.style.left = 43+'%';
cacheBT.style.top = -40+'px';
cacheBT.style.background = 'rgba(66, 66, 66, 0.8)';
cacheBT.style['border-radius'] = '10px';
cacheBT.style.MozBorderRadius = '10px';
cacheBT.style.MozTransition = 'top .8s';
cacheBT.style['-webkit-border-radius'] = '10px';
cacheBT.style['-webkit-transition-property'] = 'top';
cacheBT.style['-webkit-transition-duration'] = '.8s';
cacheBT.style['border'] = '2px #333333 solid';
cacheBT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Updating</font>';
document.body.appendChild(cacheBT);
setTimeout('cacheTD()', 1000);
};
function cacheTD() {
cacheBT.style.top = -40+'px';
cacheBT.style.top = 0+'px';
setTimeout('cacheTU()', 5000);
};
function cacheTU() {
cacheBT.style.top = -40+'px';
};
function cacheFT() {
//window.cacheBT = document.createElement('div');
cacheBT.style.width = 150+'px';
cacheBT.style.height = 35+'px';
cacheBT.style.position = 'fixed';
cacheBT.style.zIndex = 2147487;
cacheBT.style.left = 43+'%';
cacheBT.style.top = -40+'px';
cacheBT.style.background = 'rgba(66, 66, 66, 0.8)';
cacheBT.style['border-radius'] = '10px';
cacheBT.style.MozBorderRadius = '10px';
cacheBT.style.MozTransition = 'top .8s';
cacheBT.style['-webkit-border-radius'] = '10px';
cacheBT.style['-webkit-transition-property'] = 'top';
cacheBT.style['-webkit-transition-duration'] = '.8s';
cacheBT.style['border'] = '2px #333333 solid';
cacheBT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Done!</font>';
document.body.appendChild(cacheBT);
window.applicationCache.swapCache();
setTimeout('cacheTD()', 1000);
};
function cacheTD() {
cacheBT.style.top = -40+'px';
cacheBT.style.top = 0+'px';
setTimeout('cacheTU()', 5000);
};
function cacheTU() {
cacheBT.style.top = -40+'px';
};
window.applicationCache.addEventListener('downloading', function() { cacheTT(); }, false);

window.applicationCache.addEventListener('updateready', function() { cacheFT(); }, false);
</script>
<?
if (!$isMobile) {
?>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="windowfiles/dhtmlwindow.js"></script>
<?
}
?>
<script type="text/javascript" src="js/iscroll.js">
<script>
window.iframecount=0;
</script>
<script>
function clearall(event)
{ 
    localStorage.clear();
    alert("Cleared!");    
}
</script>
<?
if (!$isMobile) {
?>
<style>
    #dockContainer{
    position: fixed;
    bottom: 0;
    margin: auto;
    text-align: center;
    /*padding: 5px 5px 2px 5px;*/
    -webkit-transform-origin: 50% 100%;
    z-index:2147483;
    }
    #dock{
    height: 1px;
    position: relative;
    padding: 0 20px;
    }
    #background {
    background: hsla(0,0%,30%, 0.7);
    box-shadow: 0px 1px 5px black inset;
    border: 3px solid white;
    //border-radius: 7px 7px 0 0;
    border-bottom-width: 0;
    bottom: -3px;
    //background: url('http://fc05.deviantart.net/fs28/f/2008/181/f/b/tileable_wood_texture_by_ftIsis_Stock.jpg') no-repeat;
    height: 44px;
    position: absolute;
    border-width: 0px;
    text-align: center;
    margin: auto;
    width: 100%;
    opacity: 0.5;
    -webkit-transform: perspective(500) rotate3d(1,0,0, 30deg);
    -moz-transform: perspective(500) rotate3d(1,0,0, 30deg);
    background-size: 100%;
}
.label:after {
position: absolute;
content: "";
width: 0;
height: 0;
border: 5px solid 
transparent;
border-top-color: 
rgba(0, 0, 0, 0.4);
bottom: -10px;
left: 50%;
margin-left: -5px;
}
.dockmenu:after {
position: absolute;
content: "";
width: 0;
height: 0;
border: 5px solid 
transparent;
border-top-color: 
rgba(0, 0, 0, 0.4);
bottom: -10px;
left: 50%;
margin-left: -5px;
}
</style>

<?
};
if ($isiPod && !$isWebview) {
?>

<?
};
if($session->isDev() || $session->isAdmin()){
} else {
unset($Dockapps[1]);
};
?>
<script>
 function BlockMove(event) {
  // Tell Safari not to move the window.
	event.preventDefault();
 }
</script>
<script src="scripts/mDock2.js"></script>
<script src="scripts/maintools.js"></script>
<?
if (!$isMobile) {
?>
<script>
/*
window.addEventListener("load", function(ev){ 
<?
foreach ($Dockapps as $thisDockapp) {
?>
window.dock.AddNew({
            name:      'icons/<? echo $thisDockapp; ?>',
            label:     '<? echo $thisDockapp; ?>',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            meneClick: [function(){this.name();}],
            onclick:   function (){<? echo $thisDockapp; ?>();}
          });
<?
};
if ($trash == "empty") {
?>
window.dock.AddNew({
            name:      'icons/trash-empty',
            label:     'Trash',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            meneClick: [function(){this.name();}],
            onclick:   function (){Trash();}
          });
<?
} else if ($trash == "full") {
?>
window.dock.AddNew({
            name:      'icons/trash-full',
            label:     'Trash',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            meneClick: [function(){this.name();}],
            onclick:   function (){Trash();}
          });
<?
};
?>
},false);
var dockappsarray = [];
<?
foreach ($Dockapps as $thisDockapp) {
?>
dockappsarray.push('mDock4_adding_icon_'+<? echo $Dockapps; ?>+'_1');
<?
};
?>
*/
</script>
<?
};
?>
<script>
window.onmousemove = function() {
<?
foreach ($Dockapps as $thisDockapp) {
?>
	if (window.<? echo $thisDockapp; ?>L) {
		<? echo $thisDockapp; ?>L.style.left = <? echo $thisDockapp; ?>I.offsetLeft+(<? echo $thisDockapp; ?>I.clientWidth/2)-10+'px';
		<? echo $thisDockapp; ?>L.style.top = 35+'px';
	};
<?
};
?>
	if (window.TrashL) {
		TrashL.style.left = TrashI.offsetLeft+(TrashI.clientWidth/2)-10+'px';
		TrashL.style.top = 35+'px';
	};
};
function restoremousemove() {
window.onmousemove = function() {
<?
foreach ($Dockapps as $thisDockapp) {
?>
	if (window.<? echo $thisDockapp; ?>L) {
		<? echo $thisDockapp; ?>L.style.left = <? echo $thisDockapp; ?>I.offsetLeft+(<? echo $thisDockapp; ?>I.clientWidth/2)-10+'px';
		<? echo $thisDockapp; ?>L.style.top = 35+'px';
	};
<?
};
?>
	if (window.TrashL) {
		TrashL.style.left = TrashI.offsetLeft+(TrashI.clientWidth/2)-10+'px';
		TrashL.style.top = 35+'px';
	};
};
};
</script>
<script language="JavaScript1.2">
<!--

// Detect if the browser is IE or not.
// If it is not IE, we assume that the browser is NS.
var IE = document.all?true:false

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE)

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0
var tempY = 0

// Main function to retrieve mouse x-y pos.s

function getMouseXY(e) {
  if (IE) { // grab the x-y pos.s if browser is IE
    tempX = event.clientX + document.body.scrollLeft
    tempY = event.clientY + document.body.scrollTop
  } else {  // grab the x-y pos.s if browser is NS
    tempX = e.pageX
    tempY = e.pageY
  }  
  // catch possible negative values in NS4
  if (tempX < 0){tempX = 0}
  if (tempY < 0){tempY = 0}  
  // show the position values in the form named Show
  // in the text fields named MouseX and MouseY
  return true
}

//-->
</script>
<script>
function loadM() {

}
</script>
<script type="text/javascript">
var contentsource = <? echo "\"$homepage\""; ?>;
</script>
<style type="text/css">
  /*this is what we want the div to look like
    when it is not showing*/
  div.loading-invisible{
    /*make invisible*/
    display:none;
  }

  /*this is what we want the div to look like
    when it IS showing*/
  div.loading-visible{
    /*make visible*/
    display:block;

    /*position it 200px down the screen*/
    position:fixed;
    top:0px;
    left:0;
    width:100%;
    height:100%;
    text-align:center;

    /*in supporting browsers, make it
      a little transparent*/
    background-color: black;
  }
</style>

	<style type="text/css">
		body, html{
                        width: 100%;
                        height: 100%;
			margin:0;
			padding:0;
			font-family:Trebuchet MS, Helvetica, sans-serif;
			text-align: center;
                        overflow: hidden;
                        -webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
                        cursor: url(cursors/arrow_r.cur), pointer;
		}
		ul {
			cursor: url(cursors/arrow_r.cur), pointer;
		}
                #option {
                        display: none;
                }
                #testpopupmenuq {
                        width:auto;
                        height:auto;
                        display: none;
                        -moz-box-shadow: 5px 5px 5px #544F4F;
                        -webkit-box-shadow: 5px 5px 5px #544F4F;
                        box-shadow: 5px 5px 5px #544F4F;
                        -moz-border-radius: 4px;
                        -webkit-border-radius:4px;
                        border-radius: 4px;
                        -webkit-transition-property: width, height;
                        -webkit-transition-duration: 0.3s;
                        -o-transition-property: width, height;
                        -o-transition-duration: 0.3s;
                        -moz-transition-property: width, height;
                        -moz-transition-duration: 0.3s;
                }
                #testpopupmenuq ul{	
   		 display: block;
   		 width: auto;
   		 height: auto;
   		 position: relative;
  		 padding: 5px;

                }
                #testpopupmenuq ul a {
   			position: relative;
   			width: auto;
   			height: auto;
   			display: block;
			font-size:10px;
                        border-top:1px solid;
                        border-bottom:1px solid;
                        border-color:gray;
                        color: white;
                        cursor:pointer;
                }
                #appmenu {
                        width:0px;
                        height:0px;
                        display: none;
                        -moz-border-radius: 4px;
                        -webkit-border-radius:4px;
                        border-radius: 4px;
                        -webkit-transition-property: width, height;
                        -webkit-transition-duration: 0.3s;
                        -o-transition-property: width, height;
                        -o-transition-duration: 0.3s;
                        -moz-transition-property: width, height;
                        -moz-transition-duration: 0.3s;
                }
                #appmenu ul{
                	background:URL('images/appmenuback.png');
                        list-style-type: none;
                        padding: 0;
                        margin: 0 0 0 0;
                }
                #appmenu ul a {
                        font-size:10px;
                        color:white;
                        cursor:pointer;
                }
                #appmenu ul a:hover {
                        border-bottom:1px solid;
                        border-color:white;
                }
	</style>
        <?
        if ($isMobile) {
        ?>
        <script type="text/javascript" src="windowfiles/dhtmlwindowM.js"></script>
        <link rel="stylesheet" href="windowfiles/dhtmlwindowM.css" type="text/css" />
        <?
        };
        ?>
<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->
</script>
<script type="text/javascript">
function Trash()
{
var dividofapps = "trashwin"
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Trash', ['close', 'minimize']);
return true
}
}
function AmoebaChat()
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
function DevCenter()
{
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/<? echo $user; ?>/sysapps/DevCenter/?thefile=file.txt&userN=<? echo $user; ?>", "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
dock.removeclick('DevCenter', ['close', 'minimize']);
<?
};
?>
return true;
}
}
function FileNet()
{

var FileNet=SimpleWin.create("FileNet", "FileNet", "users/<? echo $user; ?>/sysapps/FileNet/?userN=<? echo $user; ?>", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('FileNet', ['close', 'minimize'], [function(){SimpleWin.close(FileNet);}, function(){SimpleWin.minimize(FileNet);}]);
     
FileNet.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('FileNet', ['close', 'minimize']);
return true
}
}
function Prefs()
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
var Prefer=SimpleWin.create("Preferences", "prefed", "prefs/prefs.php", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){SimpleWin.minimize(Prefer);}]);
<?
} else if ($isMobile) {
?>
var Prefer=SimpleWin.create("pref", "prefed", "prefs/prefs.php", "width=590px,height=350px,resize=1,scrolling=1,center=1");
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
function AdminC()
{
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/<? echo $user; ?>/admin/admin.php", "width=590px,height=350px,resize=1,scrolling=1,center=1")
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
function Safari()
{
var googlewin=SimpleWin.create("Safari", "safari", 'browserT/browser.html', "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Safari', ['close', 'minimize'], [function(){SimpleWin.close(googlewin);}, function(){SimpleWin.minimize(googlewin);}]);
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Safari', ['close', 'minimize']);
return true;
}
}
function AboutOS()
{
alert('I\'m sorry but this is not yet avaliable');
// var googlewin=SimpleWin.create("safari", "iframe", <? echo "\"$homepage\""; ?>, "width=590px,height=350px,resize=0,scrolling=0,center=1")
     
// googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
// return true
// }
}
function logout()
{
setTimeout("location.href = 'process.php';",1500);
var logout=SimpleWin.create("logout", "logout", "sysapps/logout.txt", "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
logout.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
</script>
<?
if (!$isMobile) {
?>
<link rel="stylesheet" type="text/css" href="dockcss/mDockstyle.css" />
<script>
function testdock() {
/** Add an icon to the dock: */
var item = myDock.addItem({
	id : 'bob',
	icon : 'icons/trash-full.png',
	label : 'Trashfull',
	action : function() {
		trash();
	}
});
}
function testremove() {
/** Add an icon to the dock: */
myDock.RemoveItem('bob');
}
function testbounce() {
myDock.BounceIcon('bob', 3, 38, 7);
}
</script>

<script>
function testdocks() {
if (!mDock4_docks[1]) {
/** Create a dock: */
var myDock2 = new mDock4(
	{},				// optional default dock items
	32,				// normal icon size
	64,				// zoomed icon size
	'left',		// dock position on screen
	5,				// grow width (number of icons to magnify)
	10,				// grow speed (1-10, 10 is fastest)
	null,			// ignore this
	null,			// and this
	"apple.png",		// default dock icon
	"null.gif"					// used for IE6 transparency
);

this.myDock2 = myDock2;
myDock2.Position("right", true);
};
window.addEventListener('mousemove', function(e) {
	if (e.pageX > (window.innerWidth-60)) {
		myDock2.base.style.display = "block";
	} else if (e.pageX < (window.innerWidth-60)) {
		myDock2.base.style.display = "none";
	}
});
};
</script>
<script>
window.addEventListener('keydown', function(event) {
	if (event.keyCode == 115) {
           var exposeholder = document.getElementById('dhtmlwindowholder');
	   if (exposeholder.children.length > 0) {
              if (!window.expose || window.expose == false) {
              window.expose = true;
              window.shim = document.createElement('div');
              document.body.appendChild(shim);
              shim.style.position = 'fixed';
              shim.style.top = 0+'px';
              shim.style.left = 0+'px';
              shim.style.width = 100+'%';
              shim.style.height = 100+'%';
              shim.style.background = 'rgba(0, 0, 0, 0.4)';
              shim.style.zIndex = 10;
              window.appshim = [];
              for (var i=0; i < exposeholder.children.length; i++) {
                  if (i < 5) {
                  SimpleWin.rememberattr(exposeholder.children[i]);
                  appshim[i] = document.createElement('div');
                  document.body.appendChild(appshim[i]);
                  appshim[i].style.position = 'fixed';
                  appshim[i].style.width = (window.innerWidth/4)-21+'px';
                  appshim[i].style.height = (window.innerHeight/4)-2+'px';
                  appshim[i].style.top = 21+'px';
                  appshim[i].style.left = ((i-1)*(window.innerWidth/4))+2+'px';
                  appshim[i].style.zIndex = 99999999;
                  appshim[i].style.boderRadius = '10px';
                  appshim[i].onmouseover = function(){this.style.border = '5px solid blue';};
                  appshim[i].onmouseout = function(){this.style.border = '';};
                  appshim[i].onclick = function(){SimpleWin.restore(exposeholder.children[num]);};
                  exposeholder.children[i].style.width = (window.innerWidth/4)-16+'px';
                  exposeholder.children[i].style.height = (window.innerHeight/4)-16+'px';
                  exposeholder.children[i].style.top = 21+'px';
                  exposeholder.children[i].style.left = ((i-1)*(window.innerWidth/4))+2+'px';
                  }
              }
              } else if (window.expose == true) {
              window.expose = false;
              for (var i=0; i < exposeholder.children.length; i++) {
                 SimpleWin.restore(exposeholder.children[i]);
                 document.body.removeChild(appshim[i]);
              }
              document.body.removeChild(shim);
              delete shim;
              }
           }
	}
return false;
}, false);
</script>
<?
};
if ($isMobile) {
?>
<style>
ul li {
	display: none;
}
#menubar {
        position: fixed;
	margin: 0;
        height:50px;
        width: 100%;
        top: 0px;
        left: 0px;
	padding: 0;
	line-height: 100%;

	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);

	background: #8b8b8b; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#a9a9a9', endColorstr='#7a7a7a'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.4)), to(rgba(0, 0, 0, 0.4))); /* for webkit browsers */
	background: -moz-linear-gradient(top,  rgba(0, 0, 0, 0.4),  rgba(0, 0, 0, 0.4)); /* for firefox 3.6+ */

	border: solid 1px rgba(0, 0, 0, 0.5);
	z-index: 2147485;
}
* {
    font-family: arial;
}
#menubar ul {
	width: auto;
	position: absolute;
	left:-40px;
	top: -15px;
}
#menubar ul ul {
	background: #ddd; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#cfcfcf'); /* for IE */
	background: rgba(0, 0, 0, 0.4); /* for webkit browsers */
	background: rgba(0, 0, 0, 0.4); /* for firefox 3.6+ */

	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	top: 50px;
	width: 100px;
	left: 0px;
	list-style: none;
	//border: solid 1px #b4b4b4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
}
#menubar ul li a {
	position: relative;
	height: 50px;
        align: center;
	font-weight: normal;
	//text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 50;
        top: -6px;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 0px;
        padding-bottom: 0px;
        -webkit-border-radius: 10px;
}
#menubar ul li img {
	position: relative;
	height: 50px;
	width: 50px;
        align: center;
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 0px;
        padding-bottom: 0px;
        -webkit-border-radius: 10px;
}
#menubar ul li {
	position: static;
        display: inline-block;
}
#menubar ul ul li {
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left:-1px;
	width: 102%;
}
#menubar ul ul li:first-child {
	-webkit-border-top-left-radius: 9px;
	-webkit-border-top-right-radius: 9px;
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left: -1px;
	top: -1px;
	width: 102%;
}
#menubar ul ul li:last-child {
	-webkit-border-bottom-left-radius: 9px;
	-webkit-border-bottom-right-radius: 9px;
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left: -1px;
	bottom: -1px;
	width: 102%;
}
#menubar ul ul li:hover {
	background: -webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF));
}
#menubar ul ul a:hover {

}
#menubar ul ul form:hover {

}
#menubar ul ul a {
        position: relative;
        top: 0px;
        align: center;
	font-weight: 550;
        color: white;
	//text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
	width: 100px;
}
#menubar ul ul form {
        position: relative;
        top: 0px;
        align: center;
	font-weight: normal;
	//text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
	width: 100px;
}
/* level 3+ list */
#menubar ul ul ul {
	left: 181px;
	top: -3px;
}
/* rounded corners for first and last child */
#menubar ul ul li:first-child > a {
	-webkit-border-top-left-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topright: 9px;
}
#menubar ul ul li:last-child > a {
	-webkit-border-bottom-left-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomright: 9px;
}
</style>
<?
};
if (!$isMobile) {
?>
<style>
ul li {
	display: none;
}
#menubar {
        position: fixed;
	margin: 0;
        height:21px;
        width: 100%;
        top: 0px;
        left: 0px;
	padding: 0;
	line-height: 100%;

	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);

	background: #8b8b8b; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#a9a9a9', endColorstr='#7a7a7a'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.4)), to(rgba(0, 0, 0, 0.4))); /* for webkit browsers */
	background: -moz-linear-gradient(top,  rgba(0, 0, 0, 0.4),  rgba(0, 0, 0, 0.4)); /* for firefox 3.6+ */

	border: solid 1px rgba(0, 0, 0, 0.5);
	z-index: 3640;
}
* {
    font-family: arial;
}
#menubar ul {
	width: auto;
	position: absolute;
	left:-40px;
	top: -15px;
}
#menubar ul ul {
	background: #ddd; /* for non-css3 browsers */
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#cfcfcf'); /* for IE */
	background: rgba(0, 0, 0, 0.4); /* for webkit browsers */
	background: rgba(0, 0, 0, 0.4); /* for firefox 3.6+ */

	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	top: 21px;
	width: 100px;
	left: 0;
	list-style: none;
	//border: solid 1px black;
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	z-index: 3640;
}
#menubar ul li a {
	position: relative;
	height: 21px;
        align: center;
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
        top: -6px;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 0px;
        padding-bottom: 0px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
}
#menubar ul li img {
	position: relative;
	height: 21px;
        align: center;
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 0px;
        padding-bottom: 0px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
}
#menubar ul li {
	position: static;
        display: inline-block;
}
#menubar ul ul li {
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left:-1px;
	width: 102%;
}
#menubar ul ul li:first-child {
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left: -1px;
	top: -1px;
	width: 102%;
	-webkit-border-top-left-radius: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-moz-border-radius-topright: 9px;
}
#menubar ul ul li:last-child {
	-webkit-border-bottom-left-radius: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-moz-border-radius-bottomright: 9px;
	position: relative;
        align: center;
	float: none;
	margin: 0;
	padding: 0;
	left: -1px;
	bottom: -1px;
	width: 102%;
}
#menubar ul ul li:hover {
	background: -webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF));
	background: -moz-linear-gradient(top,  #7a7a7a,  #6E24FF);
}
#menubar ul ul a:hover {

}
#menubar ul ul form:hover {

}
#menubar ul ul a {
        position: relative;
        top: 0px;
        align: center;
	font-weight: 550;
        color: white;
	//text-shadow: 0 1px 1px rgba(33, 33, 33, .9);
        font-size: 25;
	width: 100px;
}
#menubar ul ul form {
        position: relative;
        top: 0px;
        align: center;
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
        font-size: 25;
	width: 100px;
}
/* level 3+ list */
#menubar ul ul ul {
	left: 181px;
	top: -3px;
}
/* rounded corners for first and last child */
#menubar ul ul li:first-child > a {
	-webkit-border-top-left-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topright: 9px;
}
#menubar ul ul li:last-child > a {
	-webkit-border-bottom-left-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomright: 9px;
}
</style>
<?
};
?>
<script>
function clickt(clickth) {
Object.prototype.nextObject = function() {
	var n = this;
	do n = n.nextSibling;
	while (n && n.nodeType != 1);
	return n;
}
 
Object.prototype.previousObject = function() {
	var p = this;
	do p = p.previousSibling;
	while (p && p.nodeType != 1);
	return p;
}
window.clicked = clickth;
clicked.nextObject().style.left=clicked.offsetLeft+'px';
if (clicked.click !== 1) {
clicked.children[0].style.background = '-webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF))';
clicked.children[0].style.background = '-moz-linear-gradient(top,  #7a7a7a,  #6E24FF)';
clicked.nextObject().style.display='block'; 
clicked.click=1;
} else if (clicked.click == 1) {
clicked.children[0].style.background='transparent';
clicked.nextObject().style.display='none';
delete clicked.click; delete clicked; }
}
</script>
<?
if (!$isMobile) {
?>
<style>
#notificationD {
	overflow:auto;
	z-index:9900000;
	width:100%;
	height:150%;
	position:fixed;
	left:0px;
	top:100%;
	background:url('images/notificationDBG.png');
	display:none;
}

#thelist {
	list-style:none;
	padding:2px 0px 0px 2px;
	margin:0;
	width:99%;
}

#thelist li {
	height:auto;
	line-height:40px;
	border-radius: 15px;
	border:.02px solid black;
	background:rgba(22, 22, 22, 0.3);
	font-size:14px;
	border:1px solid #2A2A2A;
	margin-bottom:3px;
	display:block;
}
</style>
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
<?
} else if ($isMobile) {
?>
<style>
#notificationD {
	overflow:hidden;
	z-index:2147486;
	width:100%;
	height:150%;
	position:fixed;
	left:0px;
	top:100%;
	-moz-box-shadow: 0px -10px 10px #544F4F;
	-webkit-box-shadow: 0px -10px 10px #544F4F;
	box-shadow: 0px -10px 10px #544F4F;
	background:url('images/notificationDBG.png');
	display:none;
}

#thelist {
	list-style:none;
	padding:2px 0px 0px 2px;
	margin:0;
	width:99%;
}

#thelist li {
	height:auto;
	line-height:40px;
	border-radius: 15px;
	border:.02px solid black;
	background:rgba(22, 22, 22, 0.3);
	font-size:14px;
	border:1px solid #2A2A2A;
	margin-bottom:3px;
	display:block;
}

#mindock {
	position:fixed;
	z-index:2147486;
	top:5%;
	bottom:0;
	left:100%;
	width:99%;
	height:90%;
	border: 2px white solid;
	-webkit-border-top-left-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topright: 9px;
	-webkit-border-bottom-left-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomright: 9px;
	overflow:auto;
	background:black;
}

#Dscroller {
	position:relative;
	width:800px;
	float:left;
	padding:0;
}

#Mthelist {
	position:relative;
	top:0px;
	list-style:none;
	display:block;
	float:left;
	width:100%;
	height:100%;
	padding:0px;
	margin:0px;
	border:1px solid #aaa;
	-webkit-border-top-left-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topright: 9px;
	-webkit-border-bottom-left-radius: 9px;
	-moz-border-radius-bottomleft: 9px;
	-webkit-border-bottom-right-radius: 9px;
	-moz-border-radius-bottomright: 9px;
}

#Mthelist li {
	position:relative;
	display:block;
	float:left;
	width:65px;
	height:65px;
	line-height:82px;
	text-align:center;
	margin-top: 4px;
	margin-right: 4px;
	margin-left: 4px;
	margin-bottom: 4px;
	border:1px solid #aaa;
	background:transparent;
}
</style>
<script type="text/javascript">

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
</script>
<script type="text/javascript">
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
</script>
<script type="text/javascript">
	// TOUCH-EVENTS SINGLE-FINGER SWIPE-SENSING JAVASCRIPT
	// Courtesy of PADILICIOUS.COM and MACOSXAUTOMATION.COM
	
	// this script can be used with one or more page elements to perform actions based on them being swiped with a single finger

	var triggerElementID = null; // this variable is used to identity the triggering element
	var fingerCount = 0;
	var startX = 0;
	var startY = 0;
	var curX = 0;
	var curY = 0;
	var deltaX = 0;
	var deltaY = 0;
	var horzDiff = 0;
	var vertDiff = 0;
	var minLength = 72; // the shortest distance the user may swipe
	var swipeLength = 0;
	var swipeAngle = null;
	var swipeDirection = null;
	
	// The 4 Touch Event Handlers
	
	// NOTE: the touchStart handler should also receive the ID of the triggering element
	// make sure its ID is passed in the event call placed in the element declaration, like:
	// <div id="picture-frame" ontouchstart="touchStart(event,'picture-frame');"  ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);">

	function touchStart(event,passedName) {
		// disable the standard ability to select the touched object
		event.preventDefault();
		// get the total number of fingers touching the screen
		fingerCount = event.touches.length;
		// since we're looking for a swipe (single finger) and not a gesture (multiple fingers),
		// check that only one finger was used
		if ( fingerCount == 1 ) {
			// get the coordinates of the touch
			startX = event.touches[0].pageX;
			startY = event.touches[0].pageY;
			// store the triggering element ID
			triggerElementID = passedName;
		} else {
			// more than one finger touched so cancel
			touchCancel(event);
		}
	}

	function touchMove(event) {
		event.preventDefault();
		if ( event.touches.length == 1 ) {
			curX = event.touches[0].pageX;
			curY = event.touches[0].pageY;
	caluculateAngle();
				determineSwipeDirection();
				processingRoutine();
				touchCancel(event); // reset the variables
		} else {
			touchCancel(event);
		}
	}
	
	function touchEnd(event) {
		event.preventDefault();
		// check to see if more than one finger was used and that there is an ending coordinate
		if ( fingerCount == 1 && curX != 0 ) {
			// use the Distance Formula to determine the length of the swipe
			swipeLength = Math.round(Math.sqrt(Math.pow(curX - startX,2) + Math.pow(curY - startY,2)));
			// if the user swiped more than the minimum length, perform the appropriate action
			if ( swipeLength >= minLength ) {
				caluculateAngle();
				determineSwipeDirection();
				processingRoutine();
				touchCancel(event); // reset the variables
			} else {
				touchCancel(event);
			}	
		} else {
			touchCancel(event);
		}
	}

	function touchCancel(event) {
		// reset the variables back to default values
		fingerCount = 0;
		startX = 0;
		startY = 0;
		curX = 0;
		curY = 0;
		deltaX = 0;
		deltaY = 0;
		horzDiff = 0;
		vertDiff = 0;
		swipeLength = 0;
		swipeAngle = null;
		swipeDirection = null;
		triggerElementID = null;
	}
	
	function caluculateAngle() {
		var X = startX-curX;
		var Y = curY-startY;
		var Z = Math.round(Math.sqrt(Math.pow(X,2)+Math.pow(Y,2))); //the distance - rounded - in pixels
		var r = Math.atan2(Y,X); //angle in radians (Cartesian system)
		swipeAngle = Math.round(r*180/Math.PI); //angle in degrees
		if ( swipeAngle < 0 ) { swipeAngle =  360 - Math.abs(swipeAngle); }
	}
	
	function determineSwipeDirection() {
		if ( (swipeAngle <= 45) && (swipeAngle >= 0) ) {
			swipeDirection = 'left';
		} else if ( (swipeAngle <= 360) && (swipeAngle >= 315) ) {
			swipeDirection = 'left';
		} else if ( (swipeAngle >= 135) && (swipeAngle <= 225) ) {
			swipeDirection = 'right';
		} else if ( (swipeAngle > 45) && (swipeAngle < 135) ) {
			swipeDirection = 'down';
		} else {
			swipeDirection = 'up';
		}
	}
	
	function processingRoutine() {
		var swipedElement = document.getElementById(triggerElementID);
		if ( swipeDirection == 'left'  &&  startX > 100 && event.touches[0].target !== document.getElementById('notificationE')) {
	if (document.getElementById('mindock').offsetRight > 0 || document.getElementById('mindock').style.display !== 'block') {
		document.getElementById('mindock').style.display = 'block';
		MoEL('mindock');
	} else if (document.getElementById('mindock').offsetLeft == 0) {
		document.getElementById('mindock').style.left = 100+'%';
		if (document.getElementById('mindock').style.display == 'block') {
			document.getElementById('mindock').style.display = 'none';
		};
		}
			
			// REPLACE WITH YOUR ROUTINES
		} else if ( swipeDirection == 'right' && startX < 100) {
		if (event.touches[0].target == document.getElementById('closeswipe')) {
			SimpleWin.close(actT);
		} else if (event.touches[0].target == document.getElementById('minswipe')) {
			SimpleWin.minimize(window.actT);
		};
			// REPLACE WITH YOUR ROUTINES
		} else if (swipeDirection == 'up' && startY > 200) {
			// REPLACE WITH YOUR ROUTINES
	if (event.touches[0].target !== document.getElementById('mindock') && (document.getElementById('notificationD').offsetTop > 0 || document.getElementById('notificationD').style.display !== 'block')) {
		document.getElementById('notificationD').style.display = 'block';
		MoE('notificationD');
	} else if (document.getElementById('notificationD').offsetTop == 0) {
		document.getElementById('notificationD').style.top = 100+'%';
		if (document.getElementById('notificationD').style.display == 'block') {
			document.getElementById('notificationD').style.display = 'none';
		};
	};
		} else if ( swipeDirection == 'down' ) {
			// REPLACE WITH YOUR ROUTINES
		}
	}
function MoE(eleM) {
document.getElementById('notificationD').children[0].style.display = 'none';
document.ontouchmove = null;
document.ontouchmove = function (e) {
	document.getElementById(eleM).style.top = event.touches[0].pageY+'px';
};
document.ontouchend = function() {
	document.getElementById(eleM).style.top = 0+'px';
document.ontouchmove = null;
document.ontouchend = null;
document.getElementById('notificationD').ontouchmove = null;
document.getElementById('notificationD').ontouch = null;
document.getElementById('notificationD').ontouchend = null;
document.getElementById('notificationD').ontouchstart = null;
document.getElementById('notificationD').children[0].style.display = 'block';
};
};
function MoEL(eleMD) {
document.getElementById('mindock').children[0].style.display = 'none';
document.ontouchmove = null;
document.ontouchmove = function (e) {
	document.getElementById(eleMD).style.left = event.touches[0].pageX+'px';
};
document.ontouchend = function() {
	document.getElementById(eleMD).style.left = 0+'px';
document.ontouchmove = null;
document.ontouchend = null;
document.getElementById('mindock').ontouchmove = null;
document.getElementById('mindock').ontouch = null;
document.getElementById('mindock').ontouchend = null;
document.getElementById('mindock').ontouchstart = null;
document.getElementById('mindock').children[0].style.display = 'block';
};
};
</script>
<?
};
?>
<script>
var myScroll4;
function loadedFF() {
	myScroll4 = new iScroll('contentareaF');
};
</script>
<script>
var myScroll5;
function loadedI() {
	myScroll5 = new iScroll('safariframe', { zoom: true });
};
</script>
<script>
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
<div id="loading" class="loading-invisible" style="z-index: 2147483647;text-align:center;">
  <img src="images/bludotloader.gif" style="position:fixed; margin:0 auto;z-index:1;"/>
  <img src="images/load_progress.gif" style="position:fixed; margin:0 auto; bottom:20%; width:15px; height:15px;z-index:2;"/>
</div>
<script type="text/javascript">
  document.getElementById("loading").className = "loading-visible";
  var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
  var oldLoad = window.onload;
  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
  window.onload = newLoad;
</script>
<div id="menubar"></div>
<br/>
<ul id="menu1">
    <li onclick="clickt(this);"><img src="images/bludottransparent.png"/></li>
        <ul id="menu2sub1" name="test">
			<li>
                                <a id="testt" onclick="clickt(clicked);AboutOS();">About This OS</a>
			</li>
			<li>
				<a onclick="clickt(clicked);Prefs();">System Preferences...</a>
			</li>
			<li>
				<a onclick="clickt(clicked);">Dock  ?</a>
			</li>
			<?
			if($session->isAdmin()){
			?>
			<li>
				<a onclick="clickt(clicked);AdminC();">Admin Center</a>
			</li>
			<?
			}
			?>
			<li>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="RKMHF5AUUTUL8">
				<input type="image" src="images/donate.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" style="position:absolute;">
				</form>
			</li>
			<li>
				<a onclick="clickt(clicked);logout();">Log Out <? echo $user; ?> ...</a>
			</li>
			<li>
			<a onclick="clickt(clicked);window.close();">Shutdown</a>
			</li>
			<li>
				<a onClick="window.location.href='http://bludot.tk';">Reboot</a>
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
	<li style="position:fixed;top:1px;right:85px;">
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
<img id="thedesktop" src="wallpaper/bludotwallpaper.png" style="position:fixed; margin:0 auto;top:0px;left:0px;z-index:1;width:100%;height:100%;"/>
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
<div id="SlidingDock" style="display:inline-block;position:relative;width:auto;overflow:visible;bottom:0px;z-index:2147485;">
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
<script>
window.dock = new SimpleDock(
        document.getElementById('dock'),
        [<?
foreach ($Dockapps as $thisDockapp) {
?>
{
            name:      'icons/<? echo $thisDockapp; ?>',
            label:     '<? echo $thisDockapp; ?>',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){<? echo $thisDockapp; ?>();}],
            onclick:   function (){<? echo $thisDockapp; ?>();}
          },
<?
};
if ($trash == "empty") {
?>
{
            name:      'icons/trash-empty',
            label:     'Trash',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){Trash();}],
            onclick:   function (){Trash();}
          },
<?
} else if ($trash == "full") {
?>
{
            name:      'icons/trash-full',
            label:     'Trash',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){Trash();}],
            onclick:   function (){Trash();}
          }
<?
};
?>],
        44,
        100,
        3,
        5,
        10,
        false);
</script>
<?
};
?>
</body>
</html>
<?
};
?>
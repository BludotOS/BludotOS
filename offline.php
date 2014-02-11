<?
include('users/admin/config/config.php');
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
        || strpos($ua, 'wap2.') !== false;

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html manifest="users/<? echo $user; ?>/user.manifest" scrolling="no">
<head id="csslinks">
	<title>ApfelSine OS</title>
	<link rel="shortcut icon" href="images/apfelsinetabicon.png">
<script src="https://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
<link rel="apple-touch-icon" href="images/apfelsinetabicon.png"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
<link rel="apple-touch-startup-image" href="images/apfelsineipod.png" />
<script>
if (navigator.onLine == true) {
alert('online!');

} else if (navigator.onLine == false) {
alert('offline :(');
}
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
window.addEventListener('contextmenu', function(evt) { 

		document.getElementById("testpopupmenuq").style.display="block";
		document.getElementById("testpopupmenuq").style.top=parseInt(event.pageY)+"px";
		document.getElementById("testpopupmenuq").style.left=parseInt(event.pageX)+"px";
		evt.preventDefault();
}, false);
</script>
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
<script type="text/javascript" src="scripts/mDock.js"></script>
<?
};
if ($isiPod && !$isWebview) {
?>

<?
};
if($isDev() || $isAdmin()){
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
<?
if (!$isMobile) {
?>
<script>
window.addEventListener("load", function(ev){ 
/** Create a dock: */
var myDock = new mDock4(
	{},				// optional default dock items
	32,				// normal icon size
	64,				// zoomed icon size
	'bottom',		// dock position on screen
	5,				// grow width (number of icons to magnify)
	10,				// grow speed (1-10, 10 is fastest)
	null,			// ignore this
	"Reflection",			// and this
	"apple.png",		// default dock icon
	"null.gif"					// used for IE6 transparency
);
<?
foreach ($Dockapps as $thisDockapp) {
?>
/** Add an icon to the dock: */
var item = myDock.addItem({
	id : '<? echo $thisDockapp; ?>',
	icon : 'icons/<? echo $thisDockapp; ?>.png',
	label : '<? echo $thisDockapp; ?>',
	action : function() {
		<? echo $thisDockapp; ?>();
		myDock.BounceIcon('<? echo $thisDockapp; ?>', 3, 38, 7);
		if (!window.<? echo $thisDockapp; ?>L) {
			window.<? echo $thisDockapp; ?>L = document.createElement('img');
			<? echo $thisDockapp; ?>L.id = 'nhild';
			<? echo $thisDockapp; ?>L.src = "images/lighton.png";
			<? echo $thisDockapp; ?>L.style.zIndex = 99999999;
			<? echo $thisDockapp; ?>L.style.width = 25+'px';
			<? echo $thisDockapp; ?>L.style.height = 8+'px';
			<? echo $thisDockapp; ?>L.style.position = 'absolute';
			<? echo $thisDockapp; ?>L.style.left = (myDock.Item('<? echo $thisDockapp; ?>').dockItem.offsetLeft+(myDock.Item('<? echo $thisDockapp; ?>').dockItem.clientWidth/2))-10+'px';
			<? echo $thisDockapp; ?>L.style.top = 35+'px';
			<? echo $thisDockapp; ?>L.className = "mDock4 mdock4 mDock_icon mdock_icon";
			myDock.base.appendChild(<? echo $thisDockapp; ?>L);
			window.<? echo $thisDockapp; ?>I =  myDock.Item('<? echo $thisDockapp; ?>').dockItem;
		};
	},
	menuItems : function() {
	}
});
<?
};
if ($trash == "empty") {
?>
/** Add an icon to the dock: */
var Trashn = myDock.addItem({
	id : 'Trash',
	icon : 'icons/trash-empty.png',
	label : 'Trash',
	action : function() {
		trash();
		myDock.BounceIcon('Trash', 3, 38, 7);
		if (!window.TrashL) {
			TrashL = document.createElement('img');
			TrashL.id = 'nhild';
			TrashL.src = "images/lighton.png";
			TrashL.style.zIndex = 99999999;
			TrashL.style.width = 25+'px';
			TrashL.style.height = 8+'px';
			TrashL.style.position = 'absolute';
			TrashL.style.left =  myDock.Item('Trash').dockItem.offsetLeft+( myDock.Item('Trash').dockItem.clientWidth/2)-10+'px';
			TrashL.style.top = 35+'px';
			TrashL.className = "mDock4 mdock4 mDock_icon mdock_icon";
			myDock.base.appendChild(TrashL);
			window.TrashI =  myDock.Item('Trash').dockItem;
		};
	}
});
<?
} else if ($trash == "full") {
?>
/** Add an icon to the dock: */
var item = myDock.addItem({
	id : 'Trash',
	icon : 'icons/trash-full.png',
	label : 'Trash',
	action : function() {
		trash();
		myDock.BounceIcon('Trash', 3, 38, 7);
		if (!window.TrashL) {
			TrashL = document.createElement('img');
			TrashL.id = 'nhild';
			TrashL.src = "images/lighton.png";
			TrashL.style.zIndex = 99999999;
			TrashL.style.width = 25+'px';
			TrashL.style.height = 8+'px';
			TrashL.style.position = 'absolute';
			TrashL.style.left = myDock.Item('Trash').dockItem.offsetLeft+(myDock.Item('Trash').dockItem.clientWidth/2)-10+'px';
			TrashL.style.top = 35+'px';
			TrashL.className = "mDock4 mdock4 mDock_icon mdock_icon";
			myDock.base.appendChild(TrashL);
			window.TrashI = myDock.Item('Trash').dockItem;
		};
	},
	menuItems : function() {
		alert('succes!!!');
	}
});
<?
};
?>
this.myDock = myDock;
myDock.Position("bottom");
window.myDock = myDock;
},false);
var dockappsarray = [];
<?
foreach ($Dockapps as $thisDockapp) {
?>
dockappsarray.push('mDock4_adding_icon_'+<? echo $Dockapps; ?>+'_1');
<?
};
?>
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
    background-color: white;
  }
</style>
	<script type="text/javascript" src="scripts/jquery-1.2.6.min.js"></script>
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
function trash()
{
var dividofapps = "trashwin"
var trash=dhtmlwindow.open("<? if ($trash == 'full') { ?>trash-full<? } else if ($trash == 'empty') { ?>trash-empty<? }; ?>", "trash", "<div></div>", "#Trash", "width=590px,height=350px,resize=1,scrolling=1,center=1")
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
var allDIVS = document.getElementsByTagName('DIV');
var el; i = 0; Trashwincount = 0;
while (el = allDIVS.item(i++)) { if (el.id.substr(0,6) == 'trashwin') { Trashwincount++; }
}
if (Trashwincount==1 || Trashwincount==0) {
	myDock.base.removeChild(TrashL);
	delete TrashL;
}
return true
}
}
function AmoebaChat()
{
<?
if (!$isMobile) {
?>
if (!mDock4_docks[0].Item('AmoebaChat')) {
var item = myDock.addItem({
	id : 'AmoebaChat',
	icon : 'images/AmoebaChat.png',
	label : 'AmoebaChat',
	action : function() {
		AmoebaChat();
	}
}, mDock4_docks[0].Item('Trash'));
};

var AchatS = prompt('Username');
     // OR var favorite = window.prompt('What is your favorite color?', 'RED');

     // if (favorite) equivalent to if (favorite != null && favorite != "");
     if (AchatS) {
     	var AmoebaChat=dhtmlwindow.open("AmoebaChat", "amoebachat", 'http://amoeba.im/#username='+AchatS, "Chat", "width=590px,height=350px,resize=1,scrolling=1,center=1");
     } else {
     	alert("You pressed Cancel or no value was entered!");
     }
<?
} else if ($isMobile) {
?>
var AmoebaChat=dhtmlwindow.open("AmoebaChat", "amoebachat", "http://amoeba.im", "Chat", "width=590px,height=350px,resize=1,scrolling=1,center=1");
<?
};
?>
AmoebaChat.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
myDock.RemoveItem('AmoebaChat');
<?
} else if ($isMobile) { };
?>
return true;
}
}
function CoSine()
{
var CoSine=dhtmlwindow.open("CoSine", "seeder", "users/<? echo $user; ?>/sysapps/CoSine/?thefile=file.txt&userN=<? echo $user; ?>", "CoSine", "width=590px,height=350px,resize=1,scrolling=1,center=1");

CoSine.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
var allDIVS = document.getElementsByTagName('DIV');
var el; i = 0; CoSinecount = 0;
while (el = allDIVS.item(i++)) { if (el.id.substr(0,6) == 'CoSine') { CoSinecount++; }
}
if (CoSinecount==1 || CoSinecount==0) {
	myDock.base.removeChild(CoSineL);
	delete CoSineL;
}
return true;
}
}
function Seeder()
{

var seeder=dhtmlwindow.open("Seeder", "seeder", "users/<? echo $user; ?>/sysapps/Seeder/?userN=<? echo $user; ?>", "Seeder", "width=590px,height=350px,resize=1,scrolling=1,center=1")
     
seeder.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
var allDIVS = document.getElementsByTagName('DIV');
var el; i = 0; Seedercount = 0;
while (el = allDIVS.item(i++)) { if (el.id.substr(0,6) == 'Seeder') { Seedercount++; }
}
if (Seedercount==1 || Seedercount==0) {
	myDock.base.removeChild(SeederL);
	delete SeederL;
}
return true
}
}
function Prefs()
{
<?
if (!$isMobile) {
?>
if (!mDock4_docks[0].Item('prefs')) {
var item = myDock.addItem({
	id : 'prefs',
	icon : 'images/prefsicon.png',
	label : 'Prefs',
	action : function() {
		Prefs();
	}
}, mDock4_docks[0].Item('Trash'));
var Prefer=dhtmlwindow.open("pref", "prefed", "prefs/prefs.php", "Preferences", "width=590px,height=350px,resize=1,scrolling=1,center=1");
};
<?
} else if ($isMobile) {
?>
var Prefer=dhtmlwindow.open("pref", "prefed", "prefs/prefs.php", "Preferences", "width=590px,height=350px,resize=1,scrolling=1,center=1");
<?
};
?>
Prefer.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
myDock.RemoveItem('prefs');
<?
} else if ($isMobile) { };
?>
return true;
}
}
function AdminC()
{
var AdminC=dhtmlwindow.open("AdminC", "iframe", "admin/admin.php", "AdminC", "width=590px,height=350px,resize=1,scrolling=1,center=1")
dhtmlwindow.style = 'overflow:auto;-webkit-overflow-scrolling:touch;';     
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
function Safari()
{
window.contenttypeS = "safari";
var googlewin=dhtmlwindow.open("safari", "safari", <? echo "\"$homepage\""; ?>, "Safari", "width=590px,height=350px,resize=1,scrolling=1,center=1")
     
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
window.contenttypeS = null;
var allDIVS = document.getElementsByTagName('DIV');
var el; i = 0; Safaricount = 0;
while (el = allDIVS.item(i++)) { if (el.id.substr(0,6) == 'Safarie') { Safaricount++; }
}
if (Safaricount==1 || Safaricount==0) {
	myDock.base.removeChild(SafariL);
	delete SafariL;
}
return true;
}
}
function AboutOS()
{

var googlewin=dhtmlwindow.open("safari", "iframe", <? echo "\"$homepage\""; ?>, "#1: Google Web site", "width=590px,height=350px,resize=0,scrolling=0,center=1")
     
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
function logout()
{
<?
setcookie("cookname", "", "-300", "/");
setcookie("cookid", "", "-300", "/");
?>
setTimeout("location.href = 'process.php';",1500);
var logout=dhtmlwindow.open("logout", "logout", "<div></div>", "Logging out...", "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
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
	if (event.ctrlKey && window.onmousewheel) {
		alert('bob');
	}
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
	background: -webkit-gradient(linear, left top, left bottom, from(#a9a9a9), to(#7a7a7a)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #a9a9a9,  #7a7a7a); /* for firefox 3.6+ */

	border: solid 1px #6d6d6d;
	z-index: 2;
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
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#cfcfcf)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #fff,  #cfcfcf); /* for firefox 3.6+ */

	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	top: 50px;
	width: 100px;
	left: 0px;
	list-style: none;
	border: solid 1px #b4b4b4;
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
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
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
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
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
	background: -webkit-gradient(linear, left top, left bottom, from(#a9a9a9), to(#7a7a7a)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #a9a9a9,  #7a7a7a); /* for firefox 3.6+ */

	border: solid 1px #6d6d6d;
	z-index: 2147483640;
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
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#cfcfcf)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #fff,  #cfcfcf); /* for firefox 3.6+ */

	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	top: 21px;
	width: 100px;
	left: 0;
	list-style: none;
	border: solid 1px #b4b4b4;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
	z-index: 2147483640;
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
	-webkit-border-top-left-radius: 9px;
	-webkit-border-top-right-radius: 9px;
	-moz-border-radius-topleft: 9px;
	-moz-border-radius-topright: 9px;
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
	-moz-border-radius-topleft: 9px;
	-moz-border-radius-topright: 9px;
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
	font-weight: normal;
	text-shadow: 0 1px 1px rgba(255, 255, 255, .9);
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
if (!clicked.click) {
clicked.children[0].style.background='-moz-linear-gradient(top,  #7a7a7a,  #6E24FF)';
clicked.children[0].style.background='-webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF))';
clicked.nextObject().style.display='block'; 
clicked.click=1;
} else if (clicked.click) {
clicked.children[0].style.background='transparent';
clicked.nextObject().style.display='none';
delete clicked.click; delete clicked; }
}
</script>
<?
if (!$isMobile) {
?>
<script>
function notificationDesktop(Command) {
	if (Command == 'open') {
		document.getElementById('notificationD').style['-webkit-transition-property'] = 'top';
		document.getElementById('notificationD').style['-webkit-transition-duration'] = '.3s';
		document.getElementById('notificationD').style.MozTransition = 'top .3s';
		document.getElementById('notificationD').style.top = 0+'px';
	} else if (Command == 'close') {
		document.getElementById('notificationD').style.top = 100+'%';
	}
}
</script>
<style>
#notificationD {
	overflow:auto;
	z-index:2147483640;
	width:100%;
	height:100%;
	position:absolute;
	left:0px;
	top:100%;
	background:url('images/notificationDBG.png');
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
	background:url('images/notificationD.png');
	font-size:14px;
	border:1px solid #2A2A2A;
	margin-bottom:3px;
	display:block;
}
</style>
<?
} else if ($isMobile) {
?>
<style>
#notificationD {
	overflow:auto;
	z-index:2147483640;
	width:100%;
	height:150%;
	position:absolute;
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
document.addEventListener('DOMContentLoaded', loaded, false);
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
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
		if ( swipeDirection == 'left' ) {
			// REPLACE WITH YOUR ROUTINES
		} else if ( swipeDirection == 'right' && event.touches[0].target == document.getElementById('closeswipe') && startX < 100) {
			dhtmlwindow.close(actT);
			// REPLACE WITH YOUR ROUTINES
		} else if ( (swipeDirection == 'up' && window.orientation == 0 && startY > 360) || (swipeDirection == 'up' && window.orientation == 90 && startY > 200) || (swipeDirection == 'up' && window.orientation == -90 && startY > 200) && event.touches[0].target == document.getElementById('bodytag')) {
			// REPLACE WITH YOUR ROUTINES
	if (document.getElementById('notificationD').offsetTop > 0 || document.getElementById('notificationD').style.display !== 'block') {
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
}
</script>
<?
};
?>
<script>
var myScroll3;
function loadedFF() {
	myScroll3 = new iScroll('contentareaF');
};
</script>
<script>
var myScroll4;
function loadedI() {
	myScroll4 = new iScroll('safariframe', { zoom: true });
};
</script>
<script>
document.addEventListener("touchmove", function (event) {
	BlockMove(event);
	window.touchcount=event.touches.length;
}, false);
document.addEventListener("gesturestart", function(event) {
	window.Gscale=event.scale;
}, false);
document.addEventListener("gesturechange", function(event) {
	window.GscaleC=event.scale;
}, false);
document.addEventListener( "gestureend", function(event) {
	if (touchcount == 3 && GscaleC < 1)  {
		alert(GscaleC);
		window.dhtmlwindow.close(actT);
	};
}, false);

actT.contentarea.addEventListener("touchmove", function (event) {
	BlockMove(event);
	window.touchcount=event.touches.length;
}, false);
actT.contentarea.addEventListener("gesturestart", function(event) {
	window.Gscale=event.scale;
}, false);
actT.contentarea.addEventListener("gesturechange", function(event) {
	window.GscaleC=event.scale;
}, false);
actT.contentarea.addEventListener( "gestureend", function(event) {
	if (touchcount == 3 && GscaleC < 1)  {
		alert(GscaleC);
		window.dhtmlwindow.close(actT);
	};
}, false);
</script>
</head>
<?
if ($isMobile) {
?>
<body scrolling="no" onload="<? if ($isMobile) { ?>loadM();<? }; ?>" ontouchmove="BlockMove(event);" id="body">
<?
} else if (!$isMobile) {
?>
<body scrolling="no" onload="updateClock(); setInterval('updateClock()', 1000 );<? if ($isMobile) { ?>loadM();<? }; ?>" ontouchmove="BlockMove(event);" id="body">
<?
};
?>
<div id="testpopupmenuq" style="display:none;z-index:2147483647;top:0;left:0;position:absolute;border-color:gray;border:0.5px solid;width:auto;height:auto;background:URL('images/menu_back.png');" onmouseout="this.style.display='none';" onmouseover="this.style.display='block';"><ul><li><a onclick="alert('bobett')">Sub Nav Link</a></li><li><a onclick="alert('bob')">Sub Nav Link</a></li></ul></div>
<div id="loading" class="loading-invisible" style="z-index: 2147483647;">
  <img src="images/boot.png" style="position: fixed; top: 0px; left: 0px; width:100%; height:100%;"/>
  <center>
  <img src="images/load_progress.gif" style="position: absolute; align:center; bottom:25%; width:25px; height:25px;"/>
  </center>
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
    <li onclick="clickt(this);"><img src="images/ApfelsineOS_bar.png"/></li>
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
				<a onClick="window.location.href='http://apfelsineos.tk';">Reboot</a>
			</li>
		</ul>
    <li onclick="clickt(this);"><a>Seeder</a></li>
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
<div style="position: absolute; top: 2px; right: 0; z-index: 2147483647;">
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
<img src="images/AmoebaChat.png" style="width:25px;height:25px;position:fixed;top:25px;right:5px;z-index:5;" onclick="AmoebaChat();"/>
<div id="desktop" style="position: fixed; width:100%; height:100%; top:21px;">
<img id="thedesktop" src="wallpaper/apfelsinelogo.png" style="position: fixed;  z-index:1; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 1;"/>
</div>
<div id="notificationE" ontouchstart="touchStart(event,'notificationE');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" style="width:100%;height:20px;position:fixed;bottom:0px;left:0px;z-index:2147483647;"></div>
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

		</ul>
</div></div>
<?
if ($isMobile) {
?>

<div id="SlidingDock" style="display:inline-block;position:relative;width:auto;overflow:visible;bottom:0px;">
	<div style="position:fixed;left:0px;height:40px;width:15px;bottom:0px;"><img src="images/left_shelf.png" style="width:100%;height:100%;" /></div>
	<div style="left:15px;right:15px;display:inline-block;width:auto;list-style:none;height:40px;bottom:0px;position:fixed;"><img src="images/shelf.png" style="width:100%;height:100%;" />
	<div  id="dockscroll" style="position:fixed;width:auto;bottom:0px;left:15px;right:15px;overflow:auto;">
		<div id="dockwidth" style="width:292px;height:73px;left:0p;padding:0px;float:left;">
		<ul id="docklist" style="display:inline-block;width:100%;height:100%;margin:0px;padding:0px;list-style:none;float:left;">
		<? foreach ($Dockapps as $thisDockapp) { ?>
			<li style="width:65px;height:65px;display:inline-block;vertical-align:bottom;position:relative;float:left;padding-left:4px;padding-right:4px;"><img src="icons/<? echo $thisDockapp; ?>.png" style="width:55px;height:55px;left:0;position:relative;border:none;" onclick="<? echo $thisDockapp; ?>();"/><br><a style="font-size:10px;color:white;"><? echo $thisDockapp; ?></a></li>
		<? };
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
<div id="closeswipe" ontouchstart="touchStart(event,'closeswipe');" ontouchend="touchEnd(event);" ontouchmove="touchMove(event);" ontouchcancel="touchCancel(event);" style="position:fixed;top:50px;left:0px;width:20px;height:100%;bottom:60px;z-index:2147483647;background:transparent;"></div>
<?
};
?>
</body>
</html>
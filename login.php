<?
include('include/session.php');
include('include/view_active.php');
include('include/coreBC.php');
if($_GET["sub"])
{
	$sub = $_GET["sub"];
} else {
	$sub = "OSlogin";
}
if($isMobile) {
	$sub = "OSlogin";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" manifest="manifest2.php">
<?
if ($user !=  'Guest') {
};
function load($path) 
{
    return require $path;
}
$version = '0.91';
$updateinfo = "We are almost there!!!!</br>Huge update to most of the system and apps</br>Now runs on Android and iOS!</br>New uploader for wallpapers!</br>New improved Dock</br>ETA:Late August(Hopefully the 26th)!!";
?>
<?
if (!$isMobile) {
?>
<html scrolling="no" style="position:fixed;height:100%;width:100%;top:0px;left:0px;margin:0px;padding:0px;border:0;">
<?
};
?>
<html>
<head>
	<title>bludot</title>
	<meta name="keywords" content="webos, operating system, online os, online operating system, idevice os, oses, bludot, bludotos">
	<meta name="description" content="Desktop Environment built from the ground up to give the seamless sync experience. Run all apps anywhere at the same speed on any device."></meta>
	<link rel="shortcut icon" href="wallpaper/BluDotlogo.png">
	<meta name="google-site-verification" content="vfXTQKdRGnkavfXcKZjSPoToLOSVV0JDvQ_HjgEAhmo" />
	<meta itemprop="name" content="ApfelsineOS">
	<meta itemprop="description" content="An easy WebOS for on the go. Fast, simple, and small. A new way for cloud computing.">
	<meta itemprop="image" content="http://bludotos.com/wallpaper/BluDotlogo.png">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="apple-touch-startup-image" href="images/bludotipod.png" />
	<link rel="apple-touch-icon" href="wallpaper/BluDotlogo.png"/>
	<link rel="stylesheet" type="text/css" href="theme.css" />
	<script src="http://s.cdpn.io/298/fastclick.js"></script>
<link rel="stylesheet" type="text/css" href="test/GUI/main.css" />
<script type="text/javascript" src="jquery/jquery-1.10.2.min.js"></script>
<script src="jqnoconflict.js"></script>
<script src="jqezbgresize.js"></script>
<script src="formmkr/formmkr.js"></script>
<link type="text/css" rel="stylesheet" href="formmkr/formmkr.css" />
<script type="text/javascript" for="jqlibcyc" src="http://malsup.github.io/jquery.cycle.all.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40966109-1', 'bludotos.com');
  ga('send', 'pageview');

</script>
	<style>
input[type="range"]{
    background: white;
width: 130px;
height: 15px;
-webkit-appearance: none;
border-radius: 8px;
-moz-border-radius: 8px;
-wekkit-border-radius: 8px;
-webkit-box-shadow: inset 0px 0px 12px 2px rgba(0, 0, 0, 0.9);
}

input[type="range"]::-webkit-slider-thumb{
   -webkit-appearance:none !important;  
   width:20px;
   height:20px;
   -webkit-appearance: none;
    border-radius: 20px;
    border:2px solid rgb(150, 150, 150);;
    background-color:rgb(200, 200, 200);
    -webkit-box-shadow: 0px 0px 4px 2px rgba(0, 0, 0, 0.9);
 }
.appdiv:after {
position: absolute;
content: "";
width: 0;
height: 0;
border: 10px solid transparent;
border-top-color: rgba(0, 0, 0, 0.8);
bottom: -20px;
left: 50%;
margin-left: -5px;
}
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
#notifications {
 position:fixed;
  top:30px;
  right:0px;
  width:300px;
}
#notifymain {
  position:fixed;
  right:0px;
  width:300px;
  height:auto;
  background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI4MjgyOCIgc3RvcC1vcGFjaXR5PSIwLjgiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwLjgiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
    border: 1px solid blue;
    padding: 4px;
  min-height:50px;
  z-index:9999999;
  box-shadow:5px 5px 15px black;
  border-radius:5px;
}

#notifymain:after {
content: '';
display: block;
position: absolute;
top: 50%;
right:-7px;
width: 10px;
height: 10px; 
background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI4MjgyOCIgc3RvcC1vcGFjaXR5PSIwLjgiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwLjgiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
    border-right:1px solid blue;
    border-bottom:1px solid blue;
 -moz-transform:rotate(-45deg);
  -webkit-transform:rotate(-45deg);
  margin-top:-10px;
  box-shadow:5px 5px 15px black;
}
#notifylogo {
  position:relative;
  top:0px;
  left:0px;
  width:100%;
  height:50px;
  float:left;
}
.notifylogo {
  position:absolute;
  width:50px;
  height:50px;
}
#notifycontent {
 position:relative;
  top:-0px;
  left:60px;
  width:250px;
  height:100%;
}
.notifytext {
  position:relative;
  width:auto;
  height:auto;
 color:white;
  word-wrap:normal;
}
#notifytest {
 position:fixed;
  top:0px
    left:0px;
}
body {
font-family:arial;
overflow:hidden !important;
}
.menu-sub:hover > ul {
	display:block !important;
}
	</style>
<? if(!$isMobile) { ?>
<link rel="stylesheet" href="loadOS.css" type="text/css"/>
<? }; ?>
<script src="http://ajaxorg.github.io/ace-builds/src/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
window.addEventListener('load', function() {
  new FastClick(document.body);
}, false);
</script>
<head>
  <body>
    <ul class="taskbar" style="opacity:1;display:block;">
      <li style="float:left;">
        <div class="font" onclick="core.UI.taskbarlist(this.parentNode, this);">
        <font>Applications</font>
        </div>
        <div class="list" style="display:none;">
          <div class="topbar">
            <div class="ops">
              <div class="all" onclick="core.UI.appDisplay('');"></div>
              <div class="divider"></div>
              <div class="cat"  onclick="core.UI.appDisplay('cat');"></div>
            </div>
            <div class="search">
              <input type="text" placeholder="search" onkeyup="core.UI.Search(this.value);" />
            </div>
          </div>
          <ul class="menu">
            <li onclick="core.UI.menuSort(this.innerHTML);">System</li>
            <li onclick="core.UI.menuSort(this.innerHTML);">Social</li>
            <li onclick="core.UI.menuSort(this.innerHTML);">Games</li>
            <li onclick="core.UI.menuSort(this.innerHTML);">Other</li>
          </ul>
          <div class="content">
            <div class="pages"></div>
          </div>
          <div class="scrolldiv">
          <div class="scroller">
            </div>
          </div>
          <div class="pages">
            
          </div>
        </div>
      </li>
      <li>
        <div class="font" onclick="core.UI.taskbarlist(this.parentNode, this);">
        <font onload="getTime(this);"></font>
        </div>
        <div class="list menu" style="display:none;">
          <div class="calander">
  <div class="top">
    <div class="arrow left" onclick="turnLeft();">
    </div>
    <div class="font">
      
    </div>
    <div class="arrow right" onclick="turnRight();">
    </div>
  </div>
  <div class="container">
  </div>
</div>
        </div>
      </li>
      <li>
        <div class="font" onclick="core.UI.taskbarlist(this.parentNode, this);">
        <font class="username-text">Username</font>
        </div>
        <div class="list menu username" style="display:none;">
          <div class="li">
            User Preferences
          </div>
          <div class="li">
            Change Wallpaper
          </div>
        </div>
      </li>
      <? /*if($isMobile) {*/ ?>
        <li class="switch">
        	<div class="list switch" onclick="core.UI.twindow();">
        	</div>
        </li>
        <? /*};*/ ?>
    </ul>
    <div class="container">
    <div class="body">
    </div>
    <div class="dock" style="-webkit-transform: rotate(360deg);-Moz-transform: rotate(360deg);-webkit-transform : rotateX(360deg);-Moz-transform: rotateX(360deg);">
      <div class="pages">
      <div class="page">
        
        </div>
      </div>
    </div>
    </div>
    <div class="notification_bottom">
      <ul class="list_row">
        <li>
          <div class="wifi_signal">
            <div class="message">
              <font>Connected</font>
            </div>
          </div>
        </li>
        <li>
          <div class="bludot_services">
            <div class="message">
              <font>Running</font>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div style="display: none" id="menu1"><li>test</li></div>
    <div style="display: none" id="menu0"></div>
    <ul class="taskbar twindow">
    	<li class="switch">
        	<div class="list close switch" onclick="SimpleWin.close(thisis[actT.x]);">
        	</div>
        </li>
    	<li class="switch">
        	<div class="list minimize switch" onclick="SimpleWin.minimize(thisis[actT.x]);">
        	</div>
        </li>
      <li class="switch">
        	<div class="list switch" onclick="core.UI.twindow();">
        	</div>
        </li>
            </ul>
    <script>
    window.bar = function(obj) {
    	//for(var a=1; a < core.UI.ttaskbar.children.length; a++) {
    	//	core.UI.ttaskbar.removeChild(core.UI.ttaskbar.children[0]);
    	//}
    	core.UI.ttaskbar.innerHTML = '<li class="switch"><div class="list close switch" onclick="SimpleWin.close(thisis[actT.x]);"></div></li><li class="switch"><div class="list minimize switch" onclick="SimpleWin.minimize(thisis[actT.x]);"></div></li><li class="switch"><div class="list switch" onclick="core.UI.twindow();"></div></li>';
    	console.log(obj);
    	var add = document.getElementById('menu'+obj);
    	console.log(add);
    	//core.UI.ttaskbar.appendChild(add.cloneNode(true));
    	var allLI = [];
    	var allUL = [];
    	console.log('-1');
    	add = document.getElementById('menu'+obj);
    	for(var i=0; i < add.children.length; i++) {
    		console.log('0');
    		//console.log(add.children[i]);
    		//core.UI.ttaskbar.appendChild(add.children[i].cloneNode(true));
    		if(add.children[i].tagName == 'LI') {
    			console.log('1');
    			allLI.push(add.children[i].cloneNode(true));
    			if(add.children[i+1]) {
    				console.log('2');
    				allUL.push(add.children[i+1].cloneNode(true));
    			};
    		};
    		
    	}
    	console.log('test next');
    	for(var c=0; c < allLI.length; c++){
    		var temp = document.createElement('li');
    		var temp2 = '';
    		if(allUL[c].childNodes) {
    			console.log('3');
    			for(var t=0; t < allUL[c].children.length; t++) {
	    			temp2+= '<div class="li" onclick="'+allUL[c].children[t].children[0].attributes.onclick.textContent.replace('clickt(clicked);', '')+'core.UI.taskbarlist(this.parentNode.parentNode, this.parentNode);">'+allUL[c].children[t].children[0].innerHTML+'</div>';
	    		}
    		}
    		temp.innerHTML = '<div class="font" onclick="core.UI.taskbarlist(this.parentNode, this);"><font class="text">'+allLI[c].innerHTML+'</font></div>'+'<div class="list menu username" style="display: none; opacity: 0;">'+temp2+'</div>';
			allLI[c] = temp;
			console.log(allLI[c]);
    	};
    	for(var i=0; i < allLI.length; i++) {
    		//if(add.children[i].tagName == 'LI') {
    			//console.log(allLI[i]);
    			core.UI.ttaskbar.appendChild(allLI[i].cloneNode(true));
    		//}
    	}
    	add.innerHTML = '';
    };
/////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                                             //
//                    Firefox input fix                                                        //
//                                                                                             //
/////////////////////////////////////////////////////////////////////////////////////////////////

/*
html5slider - a JS implementation of <input type=range> for Firefox 16 and up
https://github.com/fryn/html5slider

Copyright (c) 2010-2013 Frank Yan, <http://frankyan.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

(function() {
  window.twebkit;
  var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
    
    if (isChrome || isSafari)
    {
      window.twebkit = 'true';
    } else {
      window.twebkit = 'false';
    };

// test for native support
var test = document.createElement('input');
try {
  test.type = 'range';
  if (test.type == 'range')
    return;
} catch (e) {
  return;
}

// test for required property support
test.style.background = 'linear-gradient(red, red)';
if (!test.style.backgroundImage || !('MozAppearance' in test.style) ||
    !document.mozSetImageElement || !this.MutationObserver)
  return;

var scale;
var isMac = navigator.platform == 'MacIntel';
var thumb = {
  radius: isMac ? 19 : 16,
  width: isMac ? 22 : 12,
  height: isMac ? 16 : 25
};
var track = 'linear-gradient(transparent ' + (isMac ?
  '6px, #999 6px, #999 7px, #ccc 8px, #bbb 9px, #bbb 10px, transparent 10px' :
  '6px, #999 6px, #bbb 10px, #999 20px, #bbb 20px, transparent 23px') +
  ', transparent)';
var styles = {
  'min-width': thumb.width + 'px',
  'min-height': thumb.height + 'px',
  'max-height': thumb.height + 'px',
  //padding: '0 0 ' + (isMac ? '2px' : '1px'),
  border: 0,
  'border-radius': 0,
  cursor: 'default',
  'text-indent': '-999999px' // -moz-user-select: none; breaks mouse capture
};
var options = {
  attributes: true,
  attributeFilter: ['min', 'max', 'step', 'value']
};
var forEach = Array.prototype.forEach;
var onInput = document.createEvent('HTMLEvents');
onInput.initEvent('input', true, false);
var onChange = document.createEvent('HTMLEvents');
onChange.initEvent('change', true, false);

if (document.readyState == 'loading')
  document.addEventListener('DOMContentLoaded', initialize, true);
else
  initialize();

function initialize() {
  // create initial sliders
  forEach.call(document.querySelectorAll('input[type=range]'), transform);
  // create sliders on-the-fly
  new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.addedNodes)
        forEach.call(mutation.addedNodes, function(node) {
          check(node);
          if (node.childElementCount)
            forEach.call(node.querySelectorAll('input'), check);
        }); 
    });
  }).observe(document, { childList: true, subtree: true });
}

function check(input) {
  if (input.localName == 'input' && input.type != 'range' &&
      input.getAttribute('type') == 'range')
    transform(input);
}

function transform(slider) {

  var isValueSet, areAttrsSet, isChanged, isClick, prevValue, rawValue, prevX;
  var min, max, step, range, value = slider.value;

  // lazily create shared slider affordance
  if (!scale) {
    scale = document.body.appendChild(document.createElement('div'));
    style(scale, {
      //'-moz-appearance': isMac ? 'scale-horizontal' : 'scalethumb-horizontal',
      display: 'block',
      visibility: 'visible',
      opacity: 1,
      position: 'fixed',
      top: '-999999px',
      background: 'red',
      width: '20px',
      height: '20px',
      'border-radius': '20px',
      'border': '2px solid rgb(150, 150, 150)',
      'background-color': 'rgb(200, 200, 200)'
    });
    document.mozSetImageElement('__sliderthumb__', scale);
  };

  // reimplement value and type properties
  var getValue = function() { return '' + value; };
  var setValue = function setValue(val) {
    value = '' + val;
    isValueSet = true;
    draw();
    delete slider.value;
    slider.value = value;
    Object.defineProperty(slider, 'value', {
        get: getValue,
        set: setValue
    });
  };
  Object.defineProperty(slider, 'value', {
    get: getValue,
    set: setValue
  });
  Object.defineProperty(slider, 'type', {
    get: function() { return 'range'; }
  });

  // sync properties with attributes
  ['min', 'max', 'step'].forEach(function(prop) {
    if (slider.hasAttribute(prop))
      areAttrsSet = true;
    Object.defineProperty(slider, prop, {
      get: function() { return this.hasAttribute(prop) ? this.getAttribute(prop) : ''; },
      set: function(val) { val === null ? this.removeAttribute(prop) : this.setAttribute(prop, val); }
    });
  });

  // initialize slider
  slider.readOnly = true;
  style(slider, styles);
  update();

  new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.attributeName != 'value') {
        update();
        areAttrsSet = true;
      }
      // note that value attribute only sets initial value
      else if (!isValueSet) {
        value = slider.getAttribute('value');
        draw();
      }
    });
  }).observe(slider, options);

  slider.addEventListener('mousedown', onDragStart, true);
  slider.addEventListener('keydown', onKeyDown, true);
  slider.addEventListener('focus', onFocus, true);
  slider.addEventListener('blur', onBlur, true);

  function onDragStart(e) {
    isClick = true;
    setTimeout(function() { isClick = false; }, 0);
    if (e.button || !range)
      return;
    var width = parseFloat(getComputedStyle(this, 0).width);
    var multiplier = (width - thumb.width) / range;
    if (!multiplier)
      return;
    // distance between click and center of thumb
    var dev = e.clientX - this.getBoundingClientRect().left - thumb.width / 2 -
              (value - min) * multiplier;
    // if click was not on thumb, move thumb to click location
    if (Math.abs(dev) > thumb.radius) {
      isChanged = true;
      this.value -= -dev / multiplier;
    }
    rawValue = value;
    prevX = e.clientX;
    this.addEventListener('mousemove', onDrag, true);
    this.addEventListener('mouseup', onDragEnd, true);
  }

  function onDrag(e) {
    var width = parseFloat(getComputedStyle(this, 0).width);
    var multiplier = (width - thumb.width) / range;
    if (!multiplier)
      return;
    rawValue += (e.clientX - prevX) / multiplier;
    prevX = e.clientX;
    isChanged = true;
    this.value = rawValue;
  }

  function onDragEnd() {
    this.removeEventListener('mousemove', onDrag, true);
    this.removeEventListener('mouseup', onDragEnd, true);
    slider.dispatchEvent(onChange);
  }

  function onKeyDown(e) {
    if (e.keyCode > 36 && e.keyCode < 41) { // 37-40: left, up, right, down
      onFocus.call(this);
      isChanged = true;
      this.value = value + (e.keyCode == 38 || e.keyCode == 39 ? step : -step);
    }
  }

  function onFocus() {
    if (!isClick)
      this.style.boxShadow = !isMac ? '0 0 0 2px #fb0' :
        'inset 0 0 20px rgba(0,127,255,.1), 0 0 1px rgba(0,127,255,.4)';
  }

  function onBlur() {
    this.style.boxShadow = '';
  }

  // determines whether value is valid number in attribute form
  function isAttrNum(value) {
    return !isNaN(value) && +value == parseFloat(value);
  }

  // validates min, max, and step attributes and redraws
  function update() {
    min = isAttrNum(slider.min) ? +slider.min : 0;
    max = isAttrNum(slider.max) ? +slider.max : 100;
    if (max < min)
      max = min > 100 ? min : 100;
    step = isAttrNum(slider.step) && slider.step > 0 ? +slider.step : 1;
    range = max - min;
    draw(true);
  }

  // recalculates value property
  function calc() {
    if (!isValueSet && !areAttrsSet)
      value = slider.getAttribute('value');
    if (!isAttrNum(value))
      value = (min + max) / 2;;
    // snap to step intervals (WebKit sometimes does not - bug?)
    value = Math.round((value - min) / step) * step + min;
    if (value < min)
      value = min;
    else if (value > max)
      value = min + ~~(range / step) * step;
  }

  // renders slider using CSS background ;)
  function draw(attrsModified) {
    calc();
    if (isChanged && value != prevValue)
      slider.dispatchEvent(onInput);
    isChanged = false;
    if (!attrsModified && value == prevValue)
      return;
    prevValue = value;
    var position = range ? (value - min) / range * 100 : 0;
    var bg = '-moz-element(#__sliderthumb__) ' + position + '% no-repeat, ';
    style(slider, {
      background: bg + track,
      'border-radius': '100px',
    });
  }

}

function style(element, styles) {
  for (var prop in styles)
    element.style.setProperty(prop, styles[prop], 'important');
}

})();


window.ontouchmove = function(e){
    e.preventDefault();
}
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
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt", null);
//dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
//dock.removeclick('Trash', ['close', 'minimize']);
return true
}
},
Appstore:function ()
{
core.checkupdates();
var Appstore=SimpleWin.create("Appstore", "Appstore", "appstore/?dev=<? echo $session->isDev(); ?>&admin=<? echo $session->isAdmin(); ?>", null);
     
Appstore.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):

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
        /*window.dock.addIcon({
            name:      'images/AmoebaChat',
            label:     'AmoebaChat',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));*/
     	var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", 'http://amoeba.im/#username='+AchatS, null);
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
var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", "sysapps/amoebachat.txt", null);
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
//dock.removeclick('AmoebaChat', ['close', 'minimize']);
//window.dock.removeApp('AmoebaChat');
return true;
<?
} else if ($isMobile) { };
?>
return true;
}
},
DevCenter:function ()
{
<?
if (!$isMobile) {
?>
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+core.user+"/sysapps/DevCenter/?thefile=file.txt&userN="+core.user+"", '');
<?
} else if($isMobile) {
?>
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+core.user+"/sysapps/DevCenter/mobile.php?thefile=file.txt&userN="+core.user+"", '');
<?
};
if (!$isMobile) {
?>
//dock.addclick('DevCenter', ['close', 'minimize'], [function(){SimpleWin.close(DevCenter);}, function(){SimpleWin.minimize(DevCenter);}]);
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
console.log(thisis[actT.x].openApps);
thisis[actT.x].checknew();
var renameit = new XMLHttpRequest();
        var nameit = window.thisis[actT.x].old.split("/")[window.thisis[actT.x].old.split("/").length-1];
        var sendit2 = 'path=../FileNet/HDD/Applications/temp/&old='+encodeURIComponent(nameit+'/')+'&new='+encodeURIComponent('../FileNet/HDD/Applications/'+nameit+'.blu')+'&move='+nameit;
	renameit.open('POST', 'users/'+core.user+'/sysapps/DevCenter/build.php', false);
        renameit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	renameit.onreadystatechange = function() {
	if (renameit.readyState==4) {
        //thisis.old = '../FileNet/HDD/Applications/temp/'+name;	
	};
	};
renameit.send(sendit2);
var sendapps = '';
console.log(thisis[actT.x].openApps);
for(var i=0; i < thisis[actT.x].openApps.length; i++) {
	sendapps+=thisis[actT.x].openApps[i]+',';
};
console.log(sendapps);
sendapps = sendapps.substring(0,sendapps.length-1);
var tempapps = sendapps;
sendapps = 'apps='+tempapps;
console.log(sendapps);
renameit = new XMLHttpRequest();
	renameit.open('POST', 'users/'+core.user+'/sysapps/DevCenter/resolve.php', false);
        renameit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	renameit.onreadystatechange = function() {
	if (renameit.readyState==4) {
        //thisis.old = '../FileNet/HDD/Applications/temp/'+name;	
        console.log(renameit.responseText);
	};
	};
renameit.send(sendapps);
//dock.removeclick('DevCenter', ['close', 'minimize']);
<?
};
?>
return true;
}
},
FileNet:function ()
{
<?
if (!$isMobile) {
?>
var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+core.user+"/sysapps/FileNet/?userN="+core.user+"", '<div style="position: relative;height: 120px;top:0px;left:0px;width: 100px;"><img src="icons/FileNet.png" style="position:relative;top:0px;width:100%;left: 0px;"/><font style="position:relative;top:0px;left:0px;width:100%;text-align:center;">Loading</font></div>', 400, 750, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
} else if($isMobile) {
?>
var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+core.user+"/sysapps/FileNet/mobile.php?userN="+core.user+"", '', 400, 750, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
};
?>
//dock.addclick('FileNet', ['close', 'minimize'], [function(){SimpleWin.close(FileNet);}, function(){SimpleWin.minimize(FileNet);}]);
     
FileNet.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
//dock.removeclick('FileNet', ['close', 'minimize']);

return true
}
},
Prefs:function ()
{
<?
if (!$isMobile) {
?>
/*window.dock.addIcon({
            name:      'icons/Preferences',
            label:     'Prefs',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));*/
<?
if (!$isMobile) {
?>
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+core.user+"/sysapps/Preferences/index.php?userN="+core.user+"", '', 420, 540, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
} else if($isMobile) {
?>
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+core.user+"/sysapps/Preferences/mobile.php?userN="+core.user+"", '', 420, 540, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
};
?>
//dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){alert('test');}]);
<?
} else if ($isMobile) {
?>
var Prefer=SimpleWin.create("pref", "prefed", "users/"+core.user+"/sysapps/Preferences/index.php");
<?
};
?>
Prefer.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
//dock.removeclick('Prefs', ['close', 'minimize']);
//window.dock.removeApp('Prefs');
<?
} else if ($isMobile) { };
?>
return true;
}
},
Uploader:function(loc, type, callback){
	var tempdiv;
	<?
if (!$isMobile) {
?>
if(loc == false)
{
	var loc = "../FileNet/HDD/";
}
	var Uploader=SimpleWin.create("Uploader", "Uploader", "users/"+core.user+"/sysapps/Uploader/index.php?user="+core.user+"&location="+loc+"&type="+type+"", '', 250, 525, function(obj){
		var temp = document.createElement('div');
		temp.style.cssText = "position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: transparent;z-index:1;";
		document.getElementById('dhtmlwindowholder').insertBefore(temp, document.getElementById('dhtmlwindowholder').children[0]);
		temp.style.zIndex = parseInt(document.getElementById('dhtmlwindowholder').lastChild.previousSibling.style.zIndex)+1;
		tempdiv = temp;
		window.tempdiv = tempdiv;
		temp.onclick = function(){
			var num = 0;
			var interval = setInterval(function(){num++; if(num == 10){thisis[actT.x].style.display = 'block';clearInterval(interval);} else {thisis[actT.x].style.display = thisis[actT.x].style.display == 'none' ? 'block' : 'none';}}, 150);
		};
		});
<?
} else if($isMobile) {
?>
if(loc == false)
{
	var loc = "../FileNet/HDD/";
}
var Uploader=SimpleWin.create("Uploader", "Uploader", "users/"+core.user+"/sysapps/Uploader/mobile.php?user="+core.user+"&location="+loc+"&type="+type+"", '', 250, 525, function(obj){
		var temp = document.createElement('div');
		temp.style.cssText = "position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: transparent;z-index:1;";
		document.getElementById('dhtmlwindowholder').insertBefore(temp, document.getElementById('dhtmlwindowholder').children[0]);
		temp.style.zIndex = parseInt(document.getElementById('dhtmlwindowholder').lastChild.previousSibling.style.zIndex)+1;
		tempdiv = temp;
		window.tempdiv = tempdiv;
		temp.onclick = function(){
			var num = 0;
			var interval = setInterval(function(){num++; if(num == 10){thisis[actT.x].style.display = 'block';clearInterval(interval);} else {thisis[actT.x].style.display = thisis[actT.x].style.display == 'none' ? 'block' : 'none';}}, 150);
		};
		});
<?
};
?>
Uploader.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
document.getElementById('dhtmlwindowholder').removeChild(window.tempdiv);
if(callback)
{
	callback();
}
return true;
}
},
AdminC:function ()
{
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/"+core.user+"/admin/admin.php", '')
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true;
}
},
Safari:function ()
{
var googlewin=SimpleWin.create("Safari", "safari", 'browserT/browser.html', '', 590, 500);
//dock.addclick('Safari', ['close', 'minimize'], [function(){SimpleWin.close(googlewin);}, function(){SimpleWin.minimize(googlewin);}]);
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
//dock.removeclick('Safari', ['close', 'minimize']);
return true;
}
},
AboutOS:function()
{
var aboutos=SimpleWin.create("About", "about", "aboutOSw.php?ver=<? echo $version; ?>", '', 450, 400, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;}, 1, 1);
     
aboutos.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
},
logout:function()
                                        {
                                        setTimeout("location.href = 'process.php';",1500);
                                        var logout=SimpleWin.create("logout", "logout", "sysapps/logout.txt", '', "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
                                        logout.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
                                        return true
                                        }
                                        },
Applications:function(node)
{
window.checkthis = node;
if(!window.appdivopen) {
window.appdivopen =1;
window.appdiv = core.create('div');
document.body.appendChild(appdiv);
appdiv.style.cssText = 'background: black;width: 300px;height: 250px;z-index: 2147486;position: fixed;bottom: 60px;border-radius: 20px;right: 486px;border: 2px solid blue;box-shadow: inset 0px 0px 23px -3px white;padding:5px;';
if(dock.mag == 1 || dock.mag == true) {
appdiv.style.bottom = dock.max+'px';
} else if(dock.mag == 0 || dock.mag == false) {
appdiv.style.bottom = dock.min+'px';
};
appdiv.style.left = checkthis.offsetLeft+((window.innerWidth-dock.dock.clientWidth)/2)-(appdiv.clientWidth/2)+(node.clientWidth/2)+'px';
dock.docklock();
appdiv.className = 'appdiv';
var getapps = new XMLHttpRequest();
getapps.open('GET', 'apps.php?goto=users/'+core.user+'/sysapps/FileNet/apps/', true);
getapps.onreadystatechange = function() {
        if(getapps.readyState==4) {
        window.respit = JSON.parse(getapps.responseText);
        for(var i=0; i < respit.dirs.length; i++) {
        var temp = core.create('div');
        temp.img = core.create('img');
        temp.name = core.create('div');
        temp.name.innerHTML = respit.dirs[i];
        temp.img.src = '/users/'+core.user+'/sysapps/FileNet/apps/'+respit.dirs[i]+'/img.png';
        appdiv.appendChild(temp);
        temp.style.cssText = 'position:relative;top:0px;left:0px;float:left;width:75px;height:90px;margin:5px;overflow:hidden;';
        temp.appendChild(temp.img);
        temp.img.style.cssText = 'position:relative;top:0px;left:0px;width:75px;height75px;';
        temp.appendChild(temp.name);
        temp.name.style.cssText = 'position:relative;top:0px;left:0px;width:100%;height75px;color:white;text-align:center;';
        temp.onclick = function(){core.openapp(this.name.innerHTML);core.loadApps.Applications(null);if(dock.skip == 1) {dock.magT(0);setTimeout(function(){dock.magT(1);}, 5);} else if(dock.skip == false || dock.skip == 0){dock.magT(0);};};
        };
}
}
getapps.send();
} else if (window.appdivopen == 1) {
delete window.appdivopen;
document.body.removeChild(window.appdiv);
dock.docklock();
};
}



};
core.FileAPI = function(name) {
	console.log('func');
	var name = name;
	console.log(name);
	var dev = SimpleWin.create("devsub", "devsub", "users/"+core.user+"/sysapps/FileNet/FileAPI.php?user="+core.user+"&func="+name, null);
	dev.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
//dock.removeclick('FileNet', ['close', 'minimize']);

return true;
}
}
core.openapp = function(name, attrib) {
	console.log(attrib);
	if(attrib) {
		var attrib = attrib;
	} else {
		var attrib = "NULL";
	}
var name = name;
var openapp = new XMLHttpRequest();
        var sendit = 'name='+name+'&user='+core.user+'';
        openapp.open('POST', 'openapp.php', true);
	openapp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	openapp.onreadystatechange = function() {
	if (openapp.readyState==4) {
/*window.dock.addIcon({
            name:      'users/'+core.user+'/sysapps/FileNet/apps/'+name+'/img',
            label:     name,
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){return false;}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));*/
var temp = SimpleWin.create(name, name, "users/"+core.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+core.user+"", '');
temp.DevAPIattrib = attrib;
console.log(temp);
window.tempname = name;
<?
if ($isMobile) {
?>
//dock.addclick(name, ['close', 'minimize'], [function(){SimpleWin.close(temp);}, function(){SimpleWin.minimize(temp);}]);
<?
};
?>
temp.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
//window.dock.removeApp(thisis[actT.x].id);
var saveapp = new XMLHttpRequest();
        var sendit2 = 'path=HDD/Applications/temp/&old='+encodeURIComponent(window.tempname+'/')+'&new='+encodeURIComponent('apps/'+window.tempname+'/'+window.tempname+'.blu')+'&move='+window.tempname;
        saveapp.open('POST', 'users/'+core.user+'/sysapps/FileNet/saveapp.php', true);
	saveapp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit2.length);
	saveapp.onreadystatechange = function() {
	if (saveapp.readyState==4) {

}
}
saveapp.send(sendit2);
<?
};
?>
return true;
}
}
}
openapp.send(sendit);
}
    core.getstyle = function(path, type, ex, name, callback)
    {
					var fileref=document.createElement("link");
  					fileref.setAttribute("rel", "stylesheet");
  					fileref.setAttribute("type", "text/css");
  					if(name == "check")
  					{
  					<? if($isMobile) {?>
  					fileref.setAttribute("href", ex+'s/'+path+'/themes/'+type+'/mobile.css');
  					<? } else if(!$isMobile) {?>
  					fileref.setAttribute("href", ex+'s/'+path+'/themes/'+type+'/desktop.css');
  					<? }; ?>
  					} else {
  					fileref.setAttribute("href", ex+'s/'+path+'/themes/'+type+'/'+name+'.css');
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
	var previousOrientation = window.orientation;
var checkOrientation = function(){
    if(window.orientation !== previousOrientation){
        previousOrientation = window.orientation;
        dock.dock.style.left = (window.innerWidth/2)-(dock.dock.clientWidth/2)+'px';
    }
};

window.addEventListener("resize", checkOrientation, false);
window.addEventListener("orientationchange", checkOrientation, false);

// (optional) Android doesn't always fire orientationChange on 180 degree turns
setInterval(checkOrientation, 2000);






core.GetApps = function()
{
var getapps = new XMLHttpRequest();
getapps.open('GET', 'apps.php?goto=users/'+core.user+'/sysapps/FileNet/apps/', true);
getapps.onreadystatechange = function() {
        if(getapps.readyState==4) {
        window.respit = JSON.parse(getapps.responseText);
        core.Aapps = [];
        for(var i=0; i < respit.dirs.length; i++) {
        var temp = {};
        temp.img = '/users/'+core.user+'/sysapps/FileNet/apps/'+respit.dirs[i]+'/img.png';
        temp.name = respit.dirs[i];
        temp.cat = 'Other';
        temp.click = function() {
        	core.openapp(this.name.innerHTML);
        	core.loadApps.Applications(null);
        };
        core.Aapps.push(temp);
        };
        if(core.SystemApps) {
        	for(var a in core.SystemApps) {
        		core.Aapps.push(core.SystemApps[a]);
        	}
        };
}
}
getapps.send();
};




core.backgroundSRC = function(change) {
	
	if(core.UI) {
	    core.UI.Desktop.style.opacity = 0;
	    console.log('bloops');
	    var change = change;
		setTimeout(function() {
			core.UI.Desktop.style.background = 'url(\''+change+'\')';
			core.UI.Desktop.style.backgroundSize = 'cover';
			core.UI.Desktop.style.opacity = 1;
			if(change.indexOf('FileNet/') == -1)
			{
				var temp  = change;
				temp = encodeURIComponent(temp);
				temp = temp.toString().replace('%20', '/');
				console.log('test: '+temp);
				change = 'users/'+core.user+'/sysapps/FileNet/'+temp;
			}
			console.log(change);
			core.backgroundSRC.updatecon(change.split('FileNet/')[1]);
		},500);

		} else {
			document.getElementById('thedesktop').style.opacity = 0;
			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;core.backgroundSRC.updatecon(change.split('FileNet/')[1]);",500);
		};
}


core.backgroundSRC.updatecon = function(file) {
var wall = new XMLHttpRequest();
	wall.open('GET', 'users/'+core.user+'/sysapps/Preferences/uconf.php?user='+core.user+'&name=wallpaper&change='+file, true);
	//wall.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		
		};
	};
wall.send();
};


logmein = function() {
	var form = document.querySelector('form');
		core.ajaxlogin(form.querySelectorAll('input')[0].value, form.querySelectorAll('input')[1].value, 1, "checked");
	}








    core.ajaxlogin = function (user, pass, sub, box)
                {
                	var form  = document.querySelector('form');
                	form.div = document.createElement('div');
                	form.div.style.cssText = 'position:absolute;top:0px;left:0;right:0;bottom:0;z-index:1;';
                	form.appendChild(form.div);
                	form.querySelectorAll('input')[0].style.opacity = 0.5;
                	form.querySelectorAll('input')[1].style.opacity = 0.5;
                     var checkit = new XMLHttpRequest();
                     window.testtemp = checkit;
                         var sendit = 'sublogin='+sub+'&user='+user+'&pass='+pass+'&remember='+box;
                         checkit.open("POST", "process.php", true);
                         checkit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkit.setRequestHeader( "Pragma", "no-cache" );
						checkit.setRequestHeader( "Cache-Control", "no-cache" );
                         checkit.onreadystatechange = function() {
                               if(checkit.readyState == 4){
                               	/*loader.style.display = 'none';
                               	clearTimeout(loader.timeout1);
                               	clearInterval(loader.interval1);
                               	clearTimeout(loader.timeout2);*/
                                     var resp = JSON.parse(checkit.responseText);
                                     //window.resp = JSON.parse(checkit.responseText);
                                     if (resp.result == 'false'){
                                     	//checkit.abort();
                                     	//core.loadlogin();
                                            var divit = document.getElementById('logdiv');
                                            divit.querySelector('.error').innerHTML += 'Error!';
                                            var form  = document.querySelector('form');
											//var login = document.querySelector('.login');
											var i=0;
                                            var interval = setInterval(function() {
											    /*login.style.left = -10+'px';
											    setTimeout(function() {
											      login.style.left = 10+'px';
											    }, 25);
											    setTimeout(function() {
											      login.style.left = 0+'px';
											    }, 75);*/
											    i++;
											    if(i == 3)
											    {
											      clearInterval(interval);
											        document.querySelector('.error').innerHTML = "<font>wrong username or password</font></br><a href=\"javascript:core.lockedout();\">You might be locked out!</a>";
											        document.querySelector('.error').style.height = "60px";
											        document.querySelector('.error').style.color = '#B94A48';
											      document.querySelector('.error').style.opacity = 0;
											  document.querySelector('.error').style.opacity = 1;
											  setTimeout(function() {
											    document.querySelector('.error').style.opacity = 0;
											  }, 3000);
											    }
											  }, 125);
											  form.removeChild(form.div);
											  form.querySelectorAll('input')[0].style.opacity = 1;
                							  form.querySelectorAll('input')[1].style.opacity = 1;
                                            /*divit.querySelectorAll('input')[1].blur();
                                            divit.querySelectorAll('input')[1].focus();
                                            divit.querySelectorAll('input')[0].blur();
                                            divit.querySelectorAll('input')[0].focus();
                                            divit.querySelectorAll('input')[1].value = '';*/
                                            //window.location.href="http://bludotos.com";
                                            delete resp.result;
                                            delete checkit;
                                            delete user;
                                            delete pass;
                                            delete sub;
                                            delete box;
                                            delete resp;
                                            
                                            //document.getElementById('loginf').action = "javascript:core.ajaxlogin(document.getElementById('loginf').children[0].value, document.getElementById('loginf').children[2].value, document.getElementById('loginf').children[1].value, document.getElementById('loginf').children[3].checked);";                                            //delete window.resp;';                                            //delete window.resp;
                                     } else if (resp.result == 'true') {
                                     	var form  = document.querySelector('form');
                                     	/*loader.style.display = 'none';
                               	clearTimeout(loader.timeout1);
                               	clearInterval(loader.interval1);
                               	clearTimeout(loader.timeout2);*/
                                        //document.body.removeChild(divit);
                                        form.removeChild(form.div);
                                        form.querySelectorAll('input')[0].style.opacity = 1;
                							  form.querySelectorAll('input')[1].style.opacity = 1;
                                        clearInterval(core.backgroundI);
                                        core.user = resp.user;
                                        window.user = resp.user;
                                        core.Admin = resp.Admin;
                                        core.Cversion = <?echo $version;?>;
core.checkupdates();
core.GetApps();
                     var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/"+window.user+"/config/configB.php", true);
                         checkp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //core.userprefs = prefit;
                                     core.getscript('', 'test/temp_file', 'new', function() {
                                        var testt = setInterval(function() {
                                        	console.log('interval');
                                     	if(window.core.UI) {
                                     		if(window.core.UI.Desktop) {
                                     			window.dockit = [];
                                          //window.i = i;
                                          core.SystemApps = [];
                                          var coreapps = ['DevCenter', 'FileNet', 'Appstore'];
                                          for(var t=0; t < coreapps.length; t++) {
                                           var temp = {
                                           	name:      coreapps[t],
                                                    label:     coreapps[t],
                                                    extension: '.png',
                                                    img:		'icons/'+coreapps[t]+'.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [core.loadApps[coreapps[t]]],
                                                    onclick:   core.loadApps[coreapps[t].toString()],
                                                    click:		function() {
                                                    	core.openapp(coreapps[t]);
        												core.loadApps.Applications(null);
                                                    },
                                                    cat:		'System'
                                           };
                                           core.SystemApps.push(temp);
                                          }
                                          		console.log(prefit.wallpaper);
                                     			window.core.UI.Desktop.style.background = 'URL(\'http://bludotos.com/users/'+core.user+'/sysapps/FileNet/'+prefit.wallpaper+'\')';
                                     			window.core.UI.Desktop.style.backgroundSize = 'cover';
                                     			core.UI.taskbar.username.innerHTML = core.user;
                                     			var taskbarlis = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
                                     			taskbarlis.children[0].addEventListener('click', function() {
                                     				core.loadApps.Prefs();
                                     				core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
                                     			 if(core.Admin == 1) {
													var newop = core.create('div');
													newop.add = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
													newop.className = 'li';
													newop.innerHTML = 'Admin Options';
													newop.add.appendChild(newop);
													newop.addEventListener('click', function() {
														core.loadApps.AdminC();
														core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
                         						};
                         						var newop = core.create('div');
													newop.add = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
													newop.className = 'li';
													newop.innerHTML = 'Logout';
													newop.add.appendChild(newop);
													newop.addEventListener('click', function() {
														core.loadApps.logout();
														core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
														core.UI.appSort();
                                     			clearInterval(testt);
                                     		}
                                     	}
                                     	core.GetApps();
                                     }, 500);
                                     //core.OS.Desktop.background.src = 'users/'+core.user+'/sysapps/FileNet/'+prefit.wallpaper;
                                     //core.getscript(prefit.windows[0], 'window', prefit.windows[3]);
                                     core.getstyle(prefit.windows[0], prefit.windows[1], 'window', prefit.windows[2]);
                                		core.windowtheme = prefit.windows[1];
                                     core.getscript(prefit.windows[0], 'window', 'temp');
                                        });
                               }
                         }
                         checkp.send();
                                       if (resp.Admin == 1) {
                                        //document.getElementById('ajax1').style.display = 'block';
                                        };
                                        //document.getElementById('ajax2').innerHTML += core.user+'...';
                                        var divit = document.getElementById('logdiv');
                                        divit.style['-webkit-transition'] = 'all 1.5s ease';
                                        divit.style['-moz-transition'] = 'all 1.5s ease';
                                        document.querySelector('.error').innerHTML = "Success! Welcome";
                                        document.querySelector('.error').style.height = "30px";
        document.querySelector('.error').style.color = '#11eb1f';
    document.querySelector('.error').style.opacity = 0;
  document.querySelector('.error').style.opacity = 1;
    setTimeout(function() {
    document.querySelector('.error').style.opacity = 0;
  }, 3000);
                                        setTimeout(function() {
                                        	//divit.style.top = -100+'%';
                                        	divit.style.opacity = 0;
                                        	setTimeout(function() {
                                        		divit.style.top = 100+'%';
                                        	}, 1500);
                                        }, 1500);
                                     }
                               }
                         }
                         checkit.send(sendit);
                };
                core.register = function(){
    	var temp = core.create('div');
    	temp.id="regbox";
    	core.style('position:absolute;top:0px;left:0px;width:257px;height:380px;right:0px;bottom:0px;background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#eaeaea\',GradientType=0 );border-radius: 20px;border: 10px solid rgba(0,0,0,0.5);z-index:2147487;margin:auto;', temp);
    	document.body.appendChild(temp);
    	core.getreg(temp);
    };
    core.forgotpass = function(){
    	if(document.getElementById('regbox')) {
    		document.body.removeChild(document.getElementById('regbox'));
    	}
    	var temp = core.create('div');
    	temp.id="regbox";
    	core.style('position: absolute;top: 0px;left: 0px;width: 350px;height: 200px;right: 0px;bottom: 0px;border-radius: 10px;border: 1px solid;box-shadow: 0px 0px 10px 0px black;z-index: 2147487;margin: auto;-webkit-transition: all 2.2s ease;transition: all .2s ease;background-position: initial initial;background-repeat: repeat-x, repeat;background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#eaeaea\',GradientType=0 );border-color:lightgray;', temp);
    	document.body.appendChild(temp);
    	core.getpass(temp);
    };
    core.sendlo = function(user, sub){
    	var regit = new XMLHttpRequest();
                         var sendit = 'user='+user+'&task=unlock&t='+new Date().getTime();
                         regit.open("POST", "process.php", true);
                         regit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        regit.onreadystatechange = function() {
                               if(regit.readyState == 4){
                               	window.testresp = regit.responseText;
								MainTools.Notify(regit.responseText, null, 5);
                               };
                         };
                         regit.send(sendit);
    };
    core.lockedout = function(){
    	if(document.getElementById('regbox')) {
    		document.body.removeChild(document.getElementById('regbox'));
    	}
    	var temp = core.create('div');
    	temp.id="regbox";
    	core.style('position: absolute;top: 0px;left: 0px;width: 257px;height: 175px;right: 0px;bottom: 0px;border-radius: 10px;border: 1px solid;box-shadow: 0px 0px 10px 0px black;z-index: 2147487;margin: auto;-webkit-transition: all 1s ease;transition: all 1s ease;background-position: initial initial;background-repeat: repeat-x, repeat;background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#eaeaea\',GradientType=0 );border-color:lightgray;', temp);
    	document.body.appendChild(temp);
    	temp.innerHTML = '<div style="position: absolute;top: -13px;right: -15px;background: black;border-radius: 20px;width: 25px;height: 25px;text-align: center;font-weight: bold;color: white;line-height: 25px;font-size: 16px;box-shadow: 0px 0px 10px 0px black;cursor: pointer;font-family: sans-serif;border: 1px solid white;" onclick="document.body.removeChild(this.parentNode);">X</div>';
    	var head = document.createElement('div');
    	head.appendChild(document.createTextNode('Enter your username and you will receive an email to unlock your account.'));
    	temp.appendChild(head);
    	head.style.cssText = 'position: relative; padding: 3px 26px; text-align: center; font-weight: bold; margin-bottom: -10px;';
    	var form = document.createElement('form');
    	form.style.position = 'relative';
    	form.username = document.createElement('input');
    	form.username.style.cssText = 'position: absolute; outline: none; border: 1px solid grey; border-radius: 5px; background: -moz-linear-gradient(top, #e5e5e5 0%, #f6f6f6 53%, #ffffff 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e5e5), color-stop(53%,#f6f6f6), color-stop(100%,#ffffff)); background: -webkit-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); background: -o-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); background: -ms-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); background: linear-gradient(to bottom, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); padding: 5px 5px; font-size: 15px; height: 15px; line-height: 15px; width: 215px; top: 15px; left: 0px; right: 0; margin: 0px auto;';
    	form.send = document.createElement('input');
    	form.send.style.cssText = 'background: -moz-linear-gradient(top, #fcfcfc 0%, #ededed 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#ededed)); background: -webkit-linear-gradient(top, #fcfcfc 0%,#ededed 100%); background: -o-linear-gradient(top, #fcfcfc 0%,#ededed 100%); background: -ms-linear-gradient(top, #fcfcfc 0%,#ededed 100%); background: linear-gradient(to bottom, #fcfcfc 0%,#ededed 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fcfcfc\', endColorstr=\'#ededed\',GradientType=0 ); outline: none; border: 1px solid #D6D6D6; border-radius: 3px; position: absolute; top: 55px; left: 0; right: 0; height: 30px; width: 100px; margin: 0 auto; text-align: center;';
    	form.username.type = 'text';
    	form.send.type = 'submit';
    	form.onsubmit = function() {
			//var temp = document.querySelector('.FormMkr');
			core.sendlo(form.username.value);
		return false;
		};
		form.appendChild(form.username);
		form.appendChild(form.send);
    	temp.appendChild(form);
    }
    core.getpass = function(node){
    	var node = node;
    	//node.style['-webkit-transition'] = 'all .2s ease';
    	var ajax = new XMLHttpRequest();
    		ajax.open('GET', 'forgotpass.php', true);
    		ajax.onreadystatechange = function(){
    			if(ajax.readyState == 4) {
    				node.innerHTML = ajax.responseText;
    				eval(node.getElementsByTagName('script')[0].innerHTML);
    				/*var temp = new FormMkr ('Sign-up', function() {
	var temp = document.querySelector('.FormMkr');
	core.sendreg(temp.querySelector('.username').value,
		temp.querySelector('.email').value,
		temp.querySelector('.beta').value
	);
	return false;
	},
 {text: 'Sign-up', css: 'height:50px; font-weight: bold; color: white;border-radius:8px;'},
 [
  {type: ''    , text: 'Username:', css: '', placeholder:'Username', class:'username'},
  {type: 'email', text: 'Email:', css: '', placeholder:'Email', class:'email'},
   {type: 'hidden'   , text: 'beta:'   , css: ''                        , class:'beta', value:node.getElementsByTagName('betacode')[0].innerHTML}
 ],
 [
  {type: 'submit', text: 'Sign-up'}
 ]
);

temp.design = 'round';
//temp.design = 'flat';
temp.themecolors = ['rgba(0,0,0,0.5)', 'transparent', 'rgba(0,0,0,0.5)'];
node.appendChild(temp);*/
    			}
    		}
    		ajax.send();
    }
    core.sendfpass = function(user, sub){
    	var regit = new XMLHttpRequest();
                         var sendit = 'user='+user+'&subforgot='+sub+'&t='+new Date().getTime();
                         regit.open("POST", "process.php", true);
                         regit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        regit.onreadystatechange = function() {
                               if(regit.readyState == 4){
                               	window.testresp = regit.responseText;
								MainTools.Notify(regit.responseText, null, 5);
                               	//core.getreg(document.getElementById('regbox'));                               	
                               	/*if(regit.responseText=="success"){
                               		MainTools.Notify(regit.responseText);
                               		document.getElementById('regbox').innerHTML += '<div style="position: relative;width: 100%;text-align: center;color: blue;font-weight: bold;">An Email has been sent to you to verify you email account.</div>'
                               		document.body.removeChild(document.getElementById('regbox'));
                               		<? //if($_GET["sub"]){ ?>
                               		var sub = new XMLHttpRequest();
                         var sendit2 = 'user='+user+'&sub=<? //echo $sub; ?>&key=<? //echo $_GET["key"] ?>';
                         sub.open("POST", "subdomains/signup.php", true);
                         sub.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        sub.onreadystatechange = function() {
                               if(sub.readyState == 4){
                               		alert(sub.responseText);
                               }
                        }
                        sub.send(sendit2);
                        <? //}; ?>
                               	} else {
                               		MainTools.Notify(regit.responseText);
                               		core.getreg(document.getElementById('regbox'));
                               		setTimeout(function(){location.href.reload();}, 5000);
                               	}*/
                               };
                         };
                         regit.send(sendit);
    };
    core.getreg = function(node){
    	var node = node;
    	node.style['-webkit-transition'] = 'all 1s ease';
    	var ajax = new XMLHttpRequest();
    		ajax.open('GET', 'registerBeta.php', true);
    		ajax.onreadystatechange = function(){
    			if(ajax.readyState == 4) {
    				node.innerHTML = ajax.responseText;
    				eval(node.getElementsByTagName('script')[0].innerHTML);
    				var temp = new FormMkr ('Sign-up', function() {
	var temp = document.querySelector('.FormMkr');
	core.sendreg(temp.querySelector('.username').value,
		temp.querySelector('.email').value,
		temp.querySelector('.beta').value
	);
	return false;
	},
 {text: 'Sign-up', css: 'height:50px; font-weight: bold; color: white;border-radius:8px;'},
 [
  {type: ''    , text: 'Username:', css: '', placeholder:'Username', class:'username'},
  {type: 'email', text: 'Email:', css: '', placeholder:'Email', class:'email'},
   {type: 'hidden'   , text: 'beta:'   , css: ''                        , class:'beta', value:node.getElementsByTagName('betacode')[0].innerHTML}
 ],
 [
  {type: 'submit', text: 'Sign-up'}
 ]
);

temp.design = 'round';
//temp.design = 'flat';
temp.themecolors = ['rgba(0,0,0,0.5)', 'transparent', 'rgba(0,0,0,0.5)'];
node.appendChild(temp);
    			}
    		}
    		ajax.send();
    }
    core.sendreg = function(user, mail, beta){
    	var regit = new XMLHttpRequest();
                         var sendit = 'username='+user+'&email='+mail+'&betacode='+beta+'&t='+new Date().getTime();
                         regit.open("POST", "Betaprocess.php", true);
                         regit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        regit.onreadystatechange = function() {
                               if(regit.readyState == 4){
                               	window.testresp = regit.responseText;
                               	if(regit.responseText=="success"){
                               		MainTools.Notify(regit.responseText);
                               		document.getElementById('regbox').innerHTML += '<div style="position: relative;width: 100%;text-align: center;color: blue;font-weight: bold;">An Email has been sent to you to verify you email account.</div>'
                               		document.body.removeChild(document.getElementById('regbox'));
                               		<? if($_GET["sub"]){ ?>
                               		var sub = new XMLHttpRequest();
                         var sendit2 = 'user='+user+'&sub=<? echo $sub; ?>&key=<? echo $_GET["key"] ?>';
                         sub.open("POST", "subdomains/signup.php", true);
                         sub.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        sub.onreadystatechange = function() {
                               if(sub.readyState == 4){
                               		alert(sub.responseText);
                               }
                        }
                        sub.send(sendit2);
                        <? }; ?>
                               	} else {
                               		MainTools.Notify(regit.responseText);
                               		core.getreg(document.getElementById('regbox'));
                               		setTimeout(function(){location.href.reload();}, 5000);
                               	}
                               };
                         };
                         regit.send(sendit);
    };
    core.load = function(){

	document.body.innerHTML+='<div id="dhtmlwindowholder" style="position: absolute;top: 0px;left: 0px;z-index:30;"></div>';

        this.OS.logindiv = this.create('div');
        document.body.appendChild(this.OS.logindiv);
        this.style('position:fixed;width:100%;height:100%;left:0px;top:0px;z-index:2147487;', this.OS.logindiv);
        this.OS.logindiv.id = 'logdiv';
        core.loadlogin = function()
        {
        var loadmain = new XMLHttpRequest();
        	loadmain.open('GET', '<? echo $sub; ?>.php', true);
        	//loadmain.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            loadmain.onreadystatechange = function() {
	            if(loadmain.readyState == 4){
	            	core.OS.logindiv.innerHTML = loadmain.responseText;
	            	
	            	if (core.OS.logindiv.children[0].attachEvent) {
	            		//core.OS.logindiv.children[0].attachEvent('onkeydown', core.loginkeydown, false);
	            		core.OS.logindiv.children[0].querySelector('#submit').attachEvent('onclick', core.loginkeydown, false);
	            	} else if(core.OS.logindiv.children[0].addEventListener)
	            	{
	            		core.OS.logindiv.children[0].addEventListener('keydown', core.loginkeydown, false);
	            		//core.OS.logindiv.children[0].querySelector('#submit').addEventListener('click', core.loginkeydown, false);
	            	};
	            	core.getscript('..', 'window', 'OSlogin');
	            }
            }
            loadmain.send();
        };
        
        core.loadlogin();
        
        
        
        
        
        
        
    	/*this.OS.Desktop = this.create('div');
    	this.OS.Desktop.background = this.create('img');
        this.OS.Desktop.background.id = 'thedesktop';
    	this.style('width:100%;height:100%;position:fixed;top:1px;left:0px;', this.OS.Desktop);
    	this.style('width:100%;height:100%;position:absolute;top:0px;left:0px;', this.OS.Desktop.background);
    	//this.style('width:100%;height:33px;position:fixed;top:0px;left:0px;', this.OS.Taskbar);

    	
    	
    	

    	
    	document.body.appendChild(this.OS.Desktop);
    	this.OS.Desktop.appendChild(this.OS.Desktop.background);
    	this.OS.Dock = this.create('div');
    	this.OS.Dock.id = "dock";
    	document.body.appendChild(this.OS.Dock);
    	this.OS.Dock.bg = this.create('div');
    	this.OS.Dock.appendChild(this.OS.Dock.bg);
    	this.OS.Dock.bg.id = 'background';
    	//this.style('', this.OS.Dock.bg);
    	this.OS.Dock.dock = this.create('div');
    	this.OS.Dock.appendChild(this.OS.Dock.dock);
    	this.OS.Dock.dock.id = 'iconNodes';
    	//this.style('', this.OS.Dock.dock);*/
    	
        clearInterval(core.progressI);
        
<?
if ($session->logged_in && $session->username != 'Guest') {

if($session->isAdmin()){?>
core.Admin = 1;
<?
};
if($session->isDev()){?>
core.Dev = 1;
<?
};
?>
delete core.register;
core.user = '<? echo $session->username; ?>';
core.user = '<? echo $session->username; ?>';
core.checkupdates();
var divit = document.getElementById('logdiv');
                                        document.body.removeChild(divit);
                                        core.GetApps();
                                        

var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/<? echo $session->username; ?>/config/configB.php", true);
                         checkp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                               	window.testo = checkp.responseText;
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //core.userprefs = prefit;
                                        core.Cversion = <?echo $version;?>;
                                        core.getscript('', 'test/temp_file', 'new', function() {
                                        var testt = setInterval(function() {
                                        	console.log('interval');
                                     	if(window.core.UI) {
                                     		if(window.core.UI.Desktop) {
                                     			window.dockit = [];
                                          //window.i = i;
                                          core.SystemApps = [];
                                          var coreapps = ['DevCenter', 'FileNet', 'Appstore'];
                                          for(var t=0; t < coreapps.length; t++) {
                                           var temp = {
                                           	name:      coreapps[t],
                                                    label:     coreapps[t],
                                                    extension: '.png',
                                                    img:		'icons/'+coreapps[t]+'.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [core.loadApps[coreapps[t]]],
                                                    onclick:   core.loadApps[coreapps[t].toString()],
                                                    click:		function() {
                                                    	core.openapp(coreapps[t]);
        												core.loadApps.Applications(null);
                                                    },
                                                    cat:		'System'
                                           };
                                           core.SystemApps.push(temp);
                                          }
                                          		console.log(prefit.wallpaper);
                                     			window.core.UI.Desktop.style.background = 'URL(\'http://bludotos.com/users/'+core.user+'/sysapps/FileNet/'+prefit.wallpaper+'\')';
                                     			window.core.UI.Desktop.style.backgroundSize = 'cover';
                                     			core.UI.taskbar.username.innerHTML = core.user;
                                     			var taskbarlis = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
                                     			taskbarlis.children[0].addEventListener('click', function() {
                                     				core.loadApps.Prefs();
                                     				core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
                                     			 if(core.Admin == 1) {
													var newop = core.create('div');
													newop.add = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
													newop.className = 'li';
													newop.innerHTML = 'Admin Options';
													newop.add.appendChild(newop);
													newop.addEventListener('click', function() {
														core.loadApps.AdminC();
														core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
                         						};
                         						var newop = core.create('div');
													newop.add = core.UI.taskbar.children[core.UI.taskbar.children.length-2].querySelector('.list');
													newop.className = 'li';
													newop.innerHTML = 'Logout';
													newop.add.appendChild(newop);
													newop.addEventListener('click', function() {
														core.loadApps.logout();
														core.UI.taskbarlist(this.parentNode, this.parentNode.children[0]);
														}, false);
                                     			clearInterval(testt);
                                     		}
                                     	}
                                     	core.GetApps();
                                     }, 500);
                                     //core.OS.Desktop.background.src = 'users/'+core.user+'/sysapps/FileNet/'+prefit.wallpaper;
                                     //core.getscript(prefit.windows[0], 'window', prefit.windows[3]);
                                     core.getstyle(prefit.windows[0], prefit.windows[1], 'window', prefit.windows[2]);
                                		core.windowtheme = prefit.windows[1];
                                     core.getscript(prefit.windows[0], 'window', 'temp');
                                        });
                               }
                         }
                         checkp.send();
                         <? };?>
        
        setTimeout(function() {document.body.style.cssText = 'position:fixed;top:0px;left:0px;right:0px;bottom:0px;height:100%;padding:0px;margin:0px;background:black;overflow:hidden;';}, 5000);
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
    core.checkupdates = function() {
    	var updateitq = new XMLHttpRequest();
updateitq.open('GET', 'appcheck.php', true);
updateitq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
updateitq.onreadystatechange = function() {
        if(updateitq.readyState==4) {
                var respw = JSON.parse(updateitq.responseText);
                window.respw = respw;
                
var getapps = new XMLHttpRequest();
getapps.open('GET', 'apps.php?goto=users/'+core.user+'/sysapps/FileNet/apps/', true);
getapps.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
getapps.onreadystatechange = function() {
        if(getapps.readyState==4) {
        window.respit = window.installed = JSON.parse(getapps.responseText);
core.capps = [];
        for(var i=0; i < respit.dirs.length; i++) {
window.capp = respit.dirs[i];
var cupdateitq = new XMLHttpRequest();
cupdateitq.open('GET', 'users/'+core.user+'/sysapps/FileNet/apps/'+respit.dirs[i]+'/version.txt?t='+new Date().getTime(), true);
cupdateitq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
cupdateitq.onreadystatechange = function() {
        if(cupdateitq.readyState==4) {
                var resp = JSON.parse(cupdateitq.responseText.toString());
                window.resp2 = resp;
                window.resp2.app = window.capp;
                for(var a in  window.respw)
                {
                	for(var b in window.respw[a])
                	{
                		if(window.respw[a][b]['name'] == window.capp)
                		{
                			if(parseFloat(window.resp2.version) < parseFloat(window.respw[a][b]['version'])) {
                				console.log(parseFloat(window.respw[a][b]['version']));
                		core.capps.push(window.resp2.app);
                		};
                		};
                	};
                };
        }
}
cupdateitq.send();
if(i == respit.dirs.length) {
	Object.seal(core);Object.freeze(core);
}
        };
}
}
getapps.send();
}
}
updateitq.send();
};
<? if($isMobile) { ?>
	core.isMobile = true;
<? } else { ?>
	core.isMobile = false;
<? }; ?>
core.testu = function(array, name) {
var test = new XMLHttpRequest();
test.open('GET', 'updateconf.php?user='+core.user+'&array='+array+'&name='+name, true);
test.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
test.onreadystatechange = function() {
if(test.readyState == 4) {
};
};
test.send();
};
core.testus = function(array, name) {
var test = new XMLHttpRequest();
test.open('GET', 'updateconf.php?user='+core.user+'&change='+array+'&name='+name, true);
test.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
test.onreadystatechange = function() {
if(test.readyState == 4) {
};
};
test.send();
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
//window.onload = function(){core.getscript('default', 'script', 'maintools');core.load();document.forms[0].children[0].children[0].focus();};
window.onload = function(){
	//core.getscript('default', 'script', 'maintools', function(){setTimeout(function(){MainTools.Notify("Welcome!!</br>This is the early release of Bludot OS.</br>Sign up and take a look.</br>Click <a href=\"https://bludot.codeplex.com/\">About</a> to find out more.</br></br>   -Bludot Administrator", null, 500);MainTools.Notify("If you are a developer and would</br>like a developer account then</br>signup and follow the email instructions.</br>Apps are developed in the javascript language.</br>More features will come soon.", null, 500);}, 3000);});
	core.getscript('default', 'script', 'maintools');
	core.load();
};
</script>
  </body>
</html>

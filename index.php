<?
include('include/session.php');
include('include/view_active.php');
include('include/coreBC.php');
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
$updateinfo = "<We are almost there!!!!</br>Huge update to most of the system and apps</br>Now runs on Android and iOS!</br>New uploader for wallpapers!</br>New improved Dock</br>ETA:Late August(Hopefully the 26th)!!";
?>
<?
if (!$isMobile) {
?>
<html scrolling="no" style="position:fixed;height:100%;width:100%;top:0px;left:0px;margin:0px;padding:0px;border:0;">
<?
};
?>
<head id="csslinks">
	<meta name="keywords" content="webos, operating system, online os, online operating system, idevice os, oses, apfelsine, apfelsineos, apfelsineoses">
	<title>bludot</title>
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
	<script src="http://s.cdpn.io/298/fastclick.js"></script>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="jqnoconflict.js"></script>
<script src="jqezbgresize.js"></script>
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
}
.menu-sub:hover > ul {
	display:block !important;
}
	</style>
<? if(!$isMobile) { ?>
<link rel="stylesheet" href="loadOS.css" type="text/css"/>
<? }; ?>
<script src="https://rawgithub.com/ajaxorg/ace-builds/master/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
window.addEventListener('load', function() {
  new FastClick(document.body);
}, false);
</script>
<script>
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
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt");
dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Trash', ['close', 'minimize']);
return true
}
},
Appstore:function ()
{
core.checkupdates();
var Appstore=SimpleWin.create("Appstore", "Appstore", "appstore/");
     
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
        window.dock.addIcon({
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
<?
if (!$isMobile) {
?>
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+core.user+"/sysapps/DevCenter/?thefile=file.txt&userN="+core.user+"");
<?
} else if($isMobile) {
?>
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/"+core.user+"/sysapps/DevCenter/mobile.php?thefile=file.txt&userN="+core.user+"");
<?
};
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
dock.removeclick('DevCenter', ['close', 'minimize']);
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
var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+core.user+"/sysapps/FileNet/?userN="+core.user+"", 400, 750, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
} else if($isMobile) {
?>
var FileNet=SimpleWin.create("FileNet", "FileNet", "users/"+core.user+"/sysapps/FileNet/mobile.php?userN="+core.user+"", 400, 750, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
};
?>
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
window.dock.addIcon({
            name:      'icons/Preferences',
            label:     'Prefs',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
<?
if (!$isMobile) {
?>
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+core.user+"/sysapps/Preferences/index.php?userN="+core.user+"", 420, 540, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
} else if($isMobile) {
?>
var Prefer=SimpleWin.create("Preferences", "prefed", "users/"+core.user+"/sysapps/Preferences/mobile.php?userN="+core.user+"", 420, 540, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;});
<?
};
?>
dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){alert('test');}]);
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
window.dock.removeApp('Prefs');
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
	var Uploader=SimpleWin.create("Uploader", "Uploader", "users/"+core.user+"/sysapps/Uploader/index.php?user="+core.user+"&location="+loc+"&type="+type+"", 250, 525, function(obj){
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
var Uploader=SimpleWin.create("Uploader", "Uploader", "users/"+core.user+"/sysapps/Uploader/mobile.php?user="+core.user+"&location="+loc+"&type="+type+"", 250, 525, function(obj){
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
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/"+core.user+"/admin/admin.php")
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true;
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
var aboutos=SimpleWin.create("About", "about", "aboutOSw.php?ver=<? echo $version; ?>", 450, 400, function(obj){var left = (window.innerWidth-obj.clientWidth)/2; return left;}, function(obj){var top = ((window.innerHeight-obj.clientHeight)/2)-23; return top;}, 1, 1);
     
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
core.openapp = function(name) {
var name = name;
var openapp = new XMLHttpRequest();
        var sendit = 'name='+name+'&user='+core.user+'';
        openapp.open('POST', 'openapp.php', true);
	openapp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	openapp.onreadystatechange = function() {
	if (openapp.readyState==4) {
window.dock.addIcon({
            name:      'users/'+core.user+'/sysapps/FileNet/apps/'+name+'/img',
            label:     name,
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){return false;}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
var temp = SimpleWin.create(name, name, "users/"+core.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+core.user+"");
window.tempname = name;
<?
if ($isMobile) {
?>
dock.addclick(name, ['close', 'minimize'], [function(){SimpleWin.close(temp);}, function(){SimpleWin.minimize(temp);}]);
<?
};
?>
temp.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
window.dock.removeApp(thisis[actT.x].id);
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
    core.ajaxlogin = function (user, pass, sub, box)
                {
                     var checkit = new XMLHttpRequest();
                     window.testtemp = checkit;
                         var sendit = 'sublogin='+sub+'&user='+user+'&pass='+pass+'&remember='+box;
                         checkit.open("POST", "process.php", true);
                         checkit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkit.setRequestHeader( "Pragma", "no-cache" );
						checkit.setRequestHeader( "Cache-Control", "no-cache" );
                         checkit.onreadystatechange = function() {
                               if(checkit.readyState == 4){
                                     var resp = JSON.parse(checkit.responseText);
                                     //window.resp = JSON.parse(checkit.responseText);
                                     if (resp.result == 'false'){
                                     	checkit.abort();
                                            alert("LOGIN DOES NOT EXIST");
                                            window.location.href="http://bludotos.com";
                                            delete resp.result;
                                            delete checkit;
                                            delete user;
                                            delete pass;
                                            delete sub;
                                            delete box;
                                            delete resp;
                                            
                                            document.getElementById('loginf').action = "javascript:core.ajaxlogin(document.getElementById('loginf').children[0].value, document.getElementById('loginf').children[2].value, document.getElementById('loginf').children[1].value, document.getElementById('loginf').children[3].checked);";                                            //delete window.resp;';                                            //delete window.resp;
                                     } else if (resp.result == 'true') {
                                        var divit = document.getElementById('logdiv');
                                        document.body.removeChild(divit);
                                        core.user = resp.user;
                                        window.user = resp.user;
                                        core.Admin = resp.Admin;
                                        core.Cversion = <?echo $version;?>;
core.checkupdates();
                     var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/"+window.user+"/config/configB.php", true);
                         checkp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //core.userprefs = prefit;
                                     core.OS.Desktop.background.src = 'users/'+core.user+'sysapps/FileNet/'+prefit.wallpaper;
                                     if (prefit.Dockmag == 'false') {
                                         prefit.Dockmag = false;
                                     } else if (prefit.Dockmag == 'true') {
                                         prefit.Dockmag = true;
                                     }
                                     core.getstyle(prefit.dock[0], prefit.dock[1], 'dock', prefit.dock[2]);
                                     core.docktheme = prefit.dock[1];
                                     core.getscript(prefit.dock[0], 'dock', prefit.dock[3], function(result){
                                     if(result == true)
                                     {
                                     setTimeout(function(){
                                     window.dockit = [];
                                          //window.i = i;
                                          for(var t=0; t < prefit.Dockapps.length; t++) {
                                          var t = t;
                                          window.temp = {
                                                    name:      'icons/'+prefit.Dockapps[t],
                                                    label:     prefit.Dockapps[t],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [core.loadApps[prefit.Dockapps[t]]],
                                                    onclick:   core.loadApps[prefit.Dockapps[t].toString()]
                                          };
                                          window.dockit[t] = window.temp;
                                          };
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
                                        window.dock = SimpleDock;
                                        window.dock.launch(
                                                document.getElementById('dock'),
                                                window.dockit,
                                                parseInt(prefit.Dockmin),
                                                parseInt(prefit.Dockmax),
                                                3,
                                                5,
                                                1,
                                               <? if(!$isMobile){?>
                                                prefit.Dockmag);
                                               <? } else if($isMobile){?>
                                                false);
                                               <?};?>
                                     } else if(core.Admin != 1 && reap.Dev != 1) {
                                      window.docks = [];
                                     for(var i=1; i < window.dockit.length; i++)
                                     {
                                          /*var temp = {
                                                    name:      'icons/'+prefit.Dockapps[i]+'',
                                                    label:     prefit.Dockapps[i],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){prefit.Dockapps[i]();}],
                                                    onclick:   function(){prefit.Dockapps[i]();}
                                          };*/
                                          	window.docks.push(window.dockit[i]);
                                     };
                                        window.dock = SimpleDock;
                                        window.dock.launch(
                                                document.getElementById('dock'),
                                                window.docks,
                                                parseInt(prefit.Dockmin),
                                                parseInt(prefit.Dockmax),
                                                3,
                                                5,
                                                1,
                                               <? if(!$isMobile){?>
                                                prefit.Dockmag);
                                               <? } else if($isMobile){?>
                                                false);
                                               <?};?>
                                     };
                                     }, 3000);
                                     };
                                     });
                                     core.getstyle(prefit.taskbar[0], prefit.taskbar[1], 'taskbar', prefit.taskbar[2]);
                                     core.taskbartheme = prefit.taskbar[1];
                                     core.getscript(prefit.taskbar[0], 'taskbar', prefit.taskbar[3], function()
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
    	core.OS.Taskbar.menu1.menu2sub1.li.a.innerHTML = 'About core OS';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li2 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li2.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2.a);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a.innerHTML = 'System Preferences...';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li3 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.li3.className = 'menu-sub';
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a.innerHTML = 'Dock';
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul = core.create('ul');
    	core.style('position: absolute;display: none;left: 100%;', core.OS.Taskbar.menu1.menu2sub1.li3.ul)
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul.li);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a.innerHTML = dock.mag;
    	core.style('color:white;', core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a);
        core.style('position:relative;display:block;', core.OS.Taskbar.menu1.menu2sub1.li3.ul.li);
    	
    	if(core.Admin == 1)
    	{
    	core.OS.Taskbar.menu1.menu2sub1.li4 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li4.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4.a);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a.innerHTML = 'Admin Center';
    	};
    	
    	core.OS.Taskbar.menu1.menu2sub1.li5 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li5.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5.a);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a.innerHTML = 'Logout '+core.user;
    	
    	core.OS.Taskbar.menu1.menu2sub1.li6 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li6.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6.a);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a.innerHTML = 'Reboot';
    	core.OS.Taskbar.temp = core.OS.Taskbar.menu1.cloneNode(true);
    	document.body.appendChild(core.OS.Taskbar.temp);
    	//core.style('top:-8px', core.OS.Taskbar.temp);
    	core.OS.Taskbar.temp.id = 'menu0';
    	core.OS.Taskbar.temp2 = core.OS.Taskbar.menu1.cloneNode(true);
    	document.body.appendChild(core.OS.Taskbar.temp2);
    	//core.style('top:-8px', core.OS.Taskbar.temp2);
    	core.OS.Taskbar.temp2.id = 'menu2';
			document.getElementById('menubar').style.right = '0px';
    	
    	
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
    //menubar.appendChild(document.querySelector("#menu"+idn).cloneNode(true));
    menubar.appendChild(document.getElementById("menu"+idn).cloneNode(true));

core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
        /*core.OS.Taskbar.children[0].children[1].children[2].children[0].onmouseover = function(){
                movet(this.parentNode.children[1], 1);
        };
        core.OS.Taskbar.children[0].children[1].children[2].children[1].onmouseout = function(){
                movet(this, 0);
        };*/
        core.OS.Taskbar.children[0].children[1].children[2].children[1].children[0].onclick = function(){
                dock.magT();
				this.children[0].innerHTML = dock.mag==true ? 'on' : 'off';
				this.children[0].style.cssText = "color:white";
        };
    	if(core.Admin == 1)
    	{
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	} else {
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	};
};
bar(1);
core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
    	if(core.Admin == 1)
    	{
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	} else {
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	};
    				core.getstyle(prefit.windows[0], prefit.windows[1], 'window', prefit.windows[2]);
                                core.windowtheme = prefit.windows[1];
    				core.getscript(prefit.windows[0], 'window', prefit.windows[3]);
                                     if('<? echo $version; ?>' > prefit.version) {
                                     var updatev = new XMLHttpRequest();
                         updatev.open("GET", "uconf.php?path=users/"+core.user+"/config&change=<? echo $version; ?>", true);
                         updatev.onreadystatechange = function() {
                               if(updatev.readyState == 4){
                                     MainTools.Notify('Version Updatdhtmldhtmled\n<? echo $version; ?>B<br><? echo $updateinfo; ?>', null, 20);
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
                                        //document.getElementById('ajax2').innerHTML += core.user+'...';
                                     }
                               }
                         }
                         checkit.send(sendit);
                };
    core.register = function(){
    	var temp = core.create('div');
    	temp.id="regbox";
    	core.style('position:fixed;top:'+(window.innerHeight-200)/2+'px;left:'+(window.innerWidth-100)/2+'px;width:257px;height:246px;background: #707070;background-image: url("images/zenbg-1.png"), url("images/zenbg-2.png");background-repeat: repeat-x, repeat;border-radius: 20px;border: 10px solid rgba(0,0,0,0.5);z-index:2147487;', temp);
    	document.body.appendChild(temp);
    	core.getreg(temp);
    };
    core.getreg = function(node){
    	var node = node;
    	var ajax = new XMLHttpRequest();
    		ajax.open('GET', 'reg.php', true);
    		ajax.onreadystatechange = function(){
    			if(ajax.readyState == 4) {
    				node.innerHTML = ajax.responseText;
    			}
    		}
    		ajax.send();
    }
    core.sendreg = function(user, pass, mail, sub, beta){
    	var regit = new XMLHttpRequest();
                         var sendit = 'user='+user+'&pass='+pass+'&email='+mail+'&subjoin='+sub+'&betacode='+beta;
                         regit.open("POST", "process.php", true);
                         regit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        regit.onreadystatechange = function() {
                               if(regit.readyState == 4){
                               	window.testresp = regit.responseText;
                               	if(regit.responseText=="success"){
                               		alert('success');
                               		core.getreg(document.getElementById('regbox'));
                               	} else {
                               		alert(regit.responseText);
                               		core.getreg(document.getElementById('regbox'));
                               		setTimeout(function(){location.href.reload();}, 5000);
                               	}
                               };
                         };
                         regit.send(sendit);
    };
    core.load = function(){

	document.body.innerHTML+='<div id="dhtmlwindowholder" style="position: fixed;top: 0px;left: 0px;z-index:30;"></div>';
        this.OS = this.create('div');
        this.OS.id = 'loading';
        this.OS.style.cssText = 'position:absolute;top:0px;left:0px;width:100%;height:100%;z-index:2147486;-webkit-transition:opacity .5s linear;';
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
        this.OS.meter.span.innerHTML = 'Loading';
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
		{
			setTimeout(go, loadTime);
		} else {
		done();
		}
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
        this.OS.logindiv = this.create('div');
        document.body.appendChild(this.OS.logindiv);
        this.style('position:fixed;width:100%;height:100%;left:0px;top:0px;z-index:2147487;background:url(images/BluDot-svg.jpg) no-repeat;background-size:100%;', this.OS.logindiv);
        this.OS.logindiv.id = 'logdiv';
        var loadmain = new XMLHttpRequest();
<?
if(!$isMobile)
{
?>
        	loadmain.open('GET', 'main.php', true);
<?
} else {
?>
        	loadmain.open('GET', 'main-mobile.php', true);
<?
};
?>
        	loadmain.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            loadmain.onreadystatechange = function() {
	            if(loadmain.readyState == 4){
	            	core.OS.logindiv.innerHTML = loadmain.responseText;
	            	$j(document).ready(function() { $j("body").ezBgResize({ img : "images/BluDot__1_-svg.jpg" }) ;});
	            	$j(document).ready(function() { $j('#ss_i_1368247137').cycle({ fx: 'uncover', timeout: 2000, sync: 1, next: '#next_1368247137', prev: '#prev_1368247137' });  });
	            }
            }
            loadmain.send();
        
        
        
        
        
        
        
    	this.OS.Desktop = this.create('div');
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
    	//this.style('', this.OS.Dock.dock);
    	
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
var checkp = new XMLHttpRequest();
                         checkp.open("GET", "users/<? echo $session->username; ?>/config/configB.php", true);
                         checkp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         checkp.onreadystatechange = function() {
                               if(checkp.readyState == 4){
                               	window.testo = checkp.responseText;
                                     window.prefit = JSON.parse(checkp.responseText);
                                     //core.userprefs = prefit;
                                        core.Cversion = <?echo $version;?>;
                                     core.OS.Desktop.background.src = 'users/'+core.user+'sysapps/FileNet/'+prefit.wallpaper;
                                     if (prefit.Dockmag == 'false') {
                                         prefit.Dockmag = false;
                                     } else if (prefit.Dockmag == 'true') {
                                         prefit.Dockmag = true;
                                     }
                                     core.getstyle(prefit.dock[0], prefit.dock[1], 'dock', prefit.dock[2]);
                                     core.docktheme = prefit.dock[1];
                                     core.getscript(prefit.dock[0], 'dock', prefit.dock[3], function(result){
                                     if(result == true)
                                     {
                                     setTimeout(function(){
                                     window.dockit = [];
                                          //window.i = i;
                                          for(var t=0; t < prefit.Dockapps.length; t++) {
                                          var t = t;
                                          window.temp = {
                                                    name:      'icons/'+prefit.Dockapps[t],
                                                    label:     prefit.Dockapps[t],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [core.loadApps[prefit.Dockapps[t]]],
                                                    onclick:   core.loadApps[prefit.Dockapps[t].toString()]
                                          };
                                          window.dockit[t] = window.temp;
                                          };
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
                                     if (core.Admin == 1 || core.Dev == 1) {
                                        window.dock = SimpleDock;
                                        window.dock.launch(
                                                document.getElementById('dock'),
                                                window.dockit,
                                                parseInt(prefit.Dockmin),
                                                parseInt(prefit.Dockmax),
                                                3,
                                                5,
                                                1,
                                               <? if(!$isMobile){?>
                                                prefit.Dockmag);
                                               <? } else if($isMobile){?>
                                                false);
                                               <?};?>
                                     } else if(core.Admin != 1 && core.Dev != 1) {
                                      window.docks = [];
                                     for(var i=1; i < window.dockit.length; i++)
                                     {
                                          /*var temp = {
                                                    name:      'icons/'+prefit.Dockapps[i]+'',
                                                    label:     prefit.Dockapps[i],
                                                    extension: '.png',
                                                    sizes:     [44,100],
                                                    menuItems: ['open'],
                                                    menuClick: [function(){prefit.Dockapps[i]();}],
                                                    onclick:   function(){prefit.Dockapps[i]();}
                                          };*/
                                          	window.docks.push(window.dockit[i]);
                                     };
                                        window.dock = SimpleDock;
                                        window.dock.launch(
                                                document.getElementById('dock'),
                                                window.docks,
                                                parseInt(prefit.Dockmin),
                                                parseInt(prefit.Dockmax),
                                                3,
                                                5,
                                                1,
                                               <? if(!$isMobile){?>
                                                prefit.Dockmag);
                                               <? } else if($isMobile){?>
                                                false);
                                               <?};?>
                                     }
                                     }, 3000);
                                     };
                                     });
                                     core.getstyle(prefit.taskbar[0], prefit.taskbar[1], 'taskbar', prefit.taskbar[2]);
                                     core.taskbartheme = prefit.taskbar[1];
                                     core.getscript(prefit.taskbar[0], 'taskbar', prefit.taskbar[3], function()
                                     {
                                     core.OS.Taskbar = core.create('div');
    	document.body.appendChild(core.OS.Taskbar);
    	core.OS.Taskbar.id = 'menubar';
    	core.OS.br = core.create('br');
    	document.body.appendChild(core.OS.br);
    	core.OS.Taskbar.menu1 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.menu1);
    	core.OS.Taskbar.menu1.id  = 'menu1';
/*    	document.getElementById('menu0').style.display = 'none';
    	document.getElementById('menu1').style.display = 'none';
    	document.getElementById('menu2').style.display = 'none';
    	document.getElementById('menu0').style.zIndex = 1;
    	document.getElementById('menu1').style.zIndex = 1;
    	document.getElementById('menu2').style.zIndex = 1;*/
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
    	core.OS.Taskbar.menu1.menu2sub1.li.a.innerHTML = 'About core OS';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li2 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li2.appendChild(core.OS.Taskbar.menu1.menu2sub1.li2.a);
    	core.OS.Taskbar.menu1.menu2sub1.li2.a.innerHTML = 'System Preferences...';
    	
    	core.OS.Taskbar.menu1.menu2sub1.li3 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.li3.className = 'menu-sub';
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.a.innerHTML = 'Dock';
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul = core.create('ul');
    	core.style('position: absolute;display: none;left: 100%;', core.OS.Taskbar.menu1.menu2sub1.li3.ul)
    	core.OS.Taskbar.menu1.menu2sub1.li3.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul.li);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.appendChild(core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a);
    	core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a.innerHTML = dock.mag;
    	core.style('color:white;', core.OS.Taskbar.menu1.menu2sub1.li3.ul.li.a);
        core.style('position:relative;display:block;', core.OS.Taskbar.menu1.menu2sub1.li3.ul.li);
    	
    	<? if($session->isAdmin()){ ?>
    	core.OS.Taskbar.menu1.menu2sub1.li4 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li4.appendChild(core.OS.Taskbar.menu1.menu2sub1.li4.a);
    	core.OS.Taskbar.menu1.menu2sub1.li4.a.innerHTML = 'Admin Center';
    	<? }; ?>
    	
    	core.OS.Taskbar.menu1.menu2sub1.li5 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li5.appendChild(core.OS.Taskbar.menu1.menu2sub1.li5.a);
    	core.OS.Taskbar.menu1.menu2sub1.li5.a.innerHTML = 'Logout '+core.user;
    	
    	core.OS.Taskbar.menu1.menu2sub1.li6 = core.create('li');
    	core.OS.Taskbar.menu1.menu2sub1.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a = core.create('a');
    	core.OS.Taskbar.menu1.menu2sub1.li6.appendChild(core.OS.Taskbar.menu1.menu2sub1.li6.a);
    	core.OS.Taskbar.menu1.menu2sub1.li6.a.innerHTML = 'Reboot';
    	core.OS.Taskbar.temp = core.OS.Taskbar.menu1.cloneNode(true);
    	document.body.appendChild(core.OS.Taskbar.temp);
    	//core.style('top:-8px', core.OS.Taskbar.temp);
    	core.OS.Taskbar.temp.id = 'menu0';
    	core.OS.Taskbar.temp2 = core.create('ul');
    	document.body.appendChild(core.OS.Taskbar.temp2);
    	//core.style('top:-8px', core.OS.Taskbar.temp2);
    	core.OS.Taskbar.temp2.id = 'menu2';
			document.getElementById('menubar').style.right = '0px';
    	
    	
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
    menubar.children[0].style.display = 'block';
}, false);
window.bar = function(idn){
    var loc = document.location+"";
    clearNodes(menubar);
    //menubar.appendChild(document.querySelector("#menu"+idn).cloneNode(true));
    /*document.getElementById('menu0').innerHTML = '';
document.getElementById('menu0').appendChild(document.getElementById('menu1').children[0].cloneNode(true));
document.getElementById('menu0').appendChild(document.getElementById('menu1').children[1].cloneNode(true));*/
    menubar.appendChild(document.getElementById("menu"+idn).cloneNode(true));
    menubar.children[0].style.display = 'block';
core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
        /*core.OS.Taskbar.children[0].children[1].children[2].children[0].onmouseover = function(){
                movet(this.parentNode.children[1], 1);
        };
        core.OS.Taskbar.children[0].children[1].children[2].children[1].onmouseout = function(){
                movet(this, 0);
        };*/
        core.OS.Taskbar.children[0].children[1].children[2].children[1].onclick = function(){
                dock.magT();
				this.children[0].innerHTML = dock.mag==true ? 'on' : 'off';
				this.children[0].style.cssText = "color:white";
        };
    	<? if($session->isAdmin()){ ?>
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	<? } else { ?>
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	<? }; ?>
}
bar(1);
core.OS.Taskbar.children[0].children[0].onclick = function()
    	{
    	clickt(this);
    	};
    	core.OS.Taskbar.children[0].children[1].children[0].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AboutOS();
    	};
    	core.OS.Taskbar.children[0].children[1].children[1].onclick = function()
    	{
    		clickt(clicked);core.loadApps.Prefs();
    	};
    	<? if($session->isAdmin()){ ?>
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.AdminC();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[5].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	<? } else { ?>
    	core.OS.Taskbar.children[0].children[1].children[3].onclick = function()
    	{
    		clickt(clicked);core.loadApps.logout();
    	};
    	core.OS.Taskbar.children[0].children[1].children[4].onclick = function()
    	{
    		clickt(clicked);
    		window.location.href='http://bludotos.com';
    	};
    	<? }; ?>
                                for (var i=0; i < document.body.children.length; i++) {
                                     if(document.body.children[i].id == 'menu0') {
                                     document.body.children[i].style.display = 'none';
                                     } else if(document.body.children[i].id == 'menu1') {
                                     document.body.children[i].style.display = 'none';
                                     } else if(document.body.children[i].id == 'menu2') {
                                     document.body.children[i].style.display = 'none';
                                     };
                                };
    				core.getstyle(prefit.windows[0], prefit.windows[1], 'window', prefit.windows[2]);
                                core.windowtheme = prefit.windows[1];
    				core.getscript(prefit.windows[0], 'window', prefit.windows[3]);
                                     if('<? echo $version; ?>' > prefit.version) {
                                     var updatev = new XMLHttpRequest();
                         updatev.open("GET", "uconf.php?path=users/"+core.user+"/config&change=<? echo $version; ?>", true);
                         updatev.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         updatev.onreadystatechange = function() {
                               if(updatev.readyState == 4){
                                     MainTools.Notify('Version Updated\n<? echo $version; ?>B<br><? echo $updateinfo; ?>', null, 8);
                               }
                               }
                               updatev.send();
                                     }
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
var updateitq = new XMLHttpRequest();
updateitq.open('GET', 'appstore/apps/'+window.resp2.cat+'/'+window.resp2.app+'/version.txt?t='+new Date().getTime(), true);
updateitq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
updateitq.onreadystatechange = function() {
        if(updateitq.readyState==4) {
                var respw = JSON.parse(updateitq.responseText.toString());
                window.respw = respw;
                if(parseFloat(window.resp2.version) < parseFloat(window.respw.version)) {
                	core.capps.push(window.resp2.app);
                	};
                
        }
}
updateitq.send();
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
};
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
	core.getscript('default', 'script', 'maintools', function(){setTimeout(function(){MainTools.Notify("Welcome!!</br>This is the early release of Bludot OS.</br>Sign up and take a look.</br>Click <a href=\"https://bludot.codeplex.com/\">About</a> to find out more.</br></br>   -Bludot Administrator", null, 500);MainTools.Notify("If you are a developer and would</br>like a developer account then</br>signup and follow the email instructions.</br>Apps are developed in the javascript language.</br>More features will come soon.", null, 500);}, 3000);});
	core.load();
};
</script>
</head>
<body scrolling="no" id="body" ondragstart="return false;" onselectstart="return false;">
<div id="notifications"></div>
</body>
</html>
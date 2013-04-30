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
			swipedElement.style.backgroundColor = 'orange';
		} else if ( swipeDirection == 'right' ) {
			// REPLACE WITH YOUR ROUTINES
			swipedElement.style.backgroundColor = 'green';
		} else if ( swipeDirection == 'up' ) {
			// REPLACE WITH YOUR ROUTINES
			swipedElement.style.backgroundColor = 'maroon';
		} else if ( swipeDirection == 'down' ) {
			// REPLACE WITH YOUR ROUTINES
			swipedElement.style.backgroundColor = 'purple';
		}
	}
MainTools = {

desktopRightClick: function (e){
    // set the event object if the browser does not supply it
    if (!e){ e = window.event;}
    var menuItems = ['bob', 'test'];
    var menuClick = [function(){alert('test1');}, function(){alert('test2');}];
    // find the DOM node on which the mouseover event occured
    if (e.target == document.getElementById('desktop')) {
    var menu = document.createElement('div');
    document.body.appendChild(menu);
    menu.className = 'menu';
    menu.id = 'test';
    menu.style.cssText = 'border-radius:10px;';
    menu.style.width = 'auto';
    menu.style.height = 'auto';
    menu.style.position = 'fixed';
    var menul = document.createElement('ul');
    menu.appendChild(menul);
    menul.style.cssText = 'display: block;margin: 0;padding: 0;position: relative;top: 0px;width: auto;left: 0;list-style: none;';
    menuli = [];
    for (var k=0; k < menuItems.length; k++) {
    menuli[k] = document.createElement('li');
    menul.appendChild(menuli[k]);
    menuli[k].a = document.createElement('a');
    menuli[k].appendChild(menuli[k].a);
    menuli[k].style.cssText = 'position: relative;float: none;margin: 0;padding: 0;left:0px;width: auto;height:auto;display:block;';
    menuli[k].a.style.cssText = 'position: relative;height: auto;font-weight: normal;text-shadow: black 0px 2px 3px;top: 0px;padding-left: 15px;padding-right: 15px;padding-top: 0px;padding-bottom: 0px;color:white;';
    menuli[k].a.innerHTML = menuItems[k];
    menuli[k].a.onclick = menuClick[k];
    }
    menu.style.left = e.pageX-1+'px';
    menu.style.top = e.pageY-1+'px';
    menu.style.background = 'rgba(0, 0, 0, 0.398438)';
    menu.style.zIndex = 2147483640;
    var offsetY2 = (menu.offsetTop+menu.clientHeight-1);
    var offsetY1 = menu.offsetTop;
    var offsetX2 = (menu.offsetLeft+menu.clientWidth);
    var offsetX1 = menu.offsetLeft;
    menu.onmouseout = function (e) {
    if (offsetY1 > e.pageY || offsetY2 < e.pageY || offsetX1 > e.pageX || offsetX2 < e.pageX) {
    document.body.removeChild(menu);
    delete menu;
    }
    };
    }
  },
scrollV:function (ele, elem, eleme, right, top, bottom){
	if (!right) {
		var right = 0;
	};
	if (!top) {
		var top = 0;
	};
	if (!bottom) {
		var bottom = 0;
	};
	var sidebard = document.createElement('div');
	var sidebarinner = document.createElement('div');
	sidebard.style.cssText = 'position:absolute;width:10px;left:'+(ele.clientWidth-10)+'px;top:'+top+'px;background:rgba(225, 225, 225, 1);box-shadow:0px 1px 5px black inset;display:block;bottom:0px;';
	sidebarinner.style.cssText = 'position:relative;width:5px;height:'+(((ele.clientHeight-bottom)/eleme.scrollHeight)*(ele.clientHeight-bottom))+'px;top:0px;left:5px;background:rgba(61, 61, 61, 1);-webkit-border-top-left-radius:10px;-webkit-border-bottom-left-radius:10px;';
	ele.appendChild(sidebard);
	sidebard.appendChild(sidebarinner);
	ele.onmousemove = function (e){
		if (!e) {
			var e = window.event;
		};
		if ((e.pageX-elem.offsetLeft) > (ele.clientWidth-10-right)) {
			//sidebard.style.left = (ele.clientWidth-10-right)+'px';
                        sidebard.style.display = 'block';
		} else if (((e.pageX-elem.offsetLeft) < (ele.clientWidth-right)) || ((e.pageX-elem.offsetLeft) > (ele.clientWidth+10-right))) {
			//sidebard.style.left = (ele.clientWidth)+'px';
                        sidebard.style.display = 'none';
		};
        };
	sidebarinner.onmousedown = function (e){
		if (!e) {
			var e = window.event;
		};
		if (!window.setY) {
		window.setY = e.pageY-sidebarinner.offsetTop;
		};
		window.onmousemove = function (e) {
		eleme.scrollTop = parseInt(sidebarinner.offsetTop/((ele.clientHeight-bottom)/eleme.scrollHeight));
			if ((e.pageY >= (window.setY) && e.pageY <= (sidebard.clientHeight-sidebarinner.clientHeight+window.setY-bottom)) || (sidebarinner.offsetTop >= 0 && sidebarinner.offsetTop <= (sidebard.clientHeight-sidebarinner.clientHeight))) {
				sidebarinner.style.top = e.clientY-window.setY+'px';
			};
		};
		window.onmouseup = function (){window.onmousemove=null;delete window.setY;};
	};
	ele.onmousewheel = elem.onmousewheel = function (e){
		e = e ? e : window.event;
		var wheelData = e.detail ? e.detail * -1 : e.wheelDelta;
		eleme.scrollTop += -(wheelData/4);
		sidebarinner.style.top = eleme.scrollTop*(ele.clientHeight/eleme.scrollHeight)+'px';
	};
	elem.addEventListener('DOMMouseScroll', function (e){
		e = e ? e : window.event;
		var wheelData = e.detail ? e.detail * -1 : e.wheelDelta;
		eleme.scrollTop += -(wheelData*40);
		sidebarinner.style.top = eleme.scrollTop*(ele.clientHeight/eleme.scrollHeight)+'px';
	}, false);
	eleme.onmouseover = function (){
		sidebarinner.style.height = ((ele.clientHeight/eleme.scrollHeight)*ele.clientHeight)+'px';
		sidebarinner.style.top = (eleme.scrollTop*(ele.clientHeight/eleme.scrollHeight))+'px';
	};
        this.mscroll(eleme);
},
mscroll:function(elem){
        var ele = elem;
	if (!e){
		var e = window.event;
	};
        var touch1;
        var scroll;
	ele.ontouchstart = function(e){
		touch1 = e.touches[0].pageY;
                
		scroll = parseInt(ele.scrollTop);
                
	};
	ele.ontouchmove = function(e){
		ele.scrollTop = parseInt(scroll)+(parseInt(touch1)-parseInt(e.touches[0].pageY));
	};
        ele.ontouchend = function(){
                
        };
},
alertsystem:function(text){
if(!window.alertbox) {
window.alertbox = [];
window.cacheTU = [];
window.cacheTD = [];
}
var alertdiv = document.getElementById('alertdiv');
tempt = function(){
var temp = document.createElement('div');
temp.className = 'notifypop';
temp.style.width = 150+'px';
temp.style.height = 35+'px';
temp.style.position = 'relative';
temp.style.left = 43+'%';
temp.style.top = -alertdiv.clientHeight-40+'px';
temp.style.background = 'hsla(0, 100%,0%, 0.8)';
temp.style['border-radius'] = '10px';
temp.style.MozBorderRadius = '10px';
temp.style.MozTransition = 'top .8s';
temp.style['-webkit-border-radius'] = '10px';
temp.style['-webkit-transition-property'] = 'top';
temp.style['-webkit-transition-duration'] = '.8s';
temp.style['border'] = '1px #AAAAAA solid';
temp.style.cssText+='float:left;clear:both;';
temp.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">'+text+'</font>';
return temp;
}
window.alertbox.push(new tempt);
if(alertdiv.lastchild != alertbox[0]){
alertdiv.insertBefore(alertbox[alertbox.length-1], alertbox[alertbox.length-1].nextSibling);
} else {
alertdiv.appendChild(alertbox[alertbox.length-1]);
}
window.cacheTD = function() {
alertbox[alertbox.length-1].style.top = -40+'px';
alertbox[alertbox.length-1].style.top = 0+'px';
setTimeout('window.cacheTU()', 5000);
};
window.cacheTU = function () {
alertbox[0].style.top = -40+'px';
setTimeout("alertdiv.removeChild(alertbox[0]);alertbox.splice(0, 1);if ((alertbox.length-1) > 0){setTimeout('window.cacheTU()', 5000);}", 800);
};
setTimeout('window.cacheTD()', 1000);
},
popup:function (texts, types) {
var div = document.createElement('div');
div.id = 'popup';
div.form = document.createElement('form');
div.form.action = 'javascript:void(0);';
div.form.onsubmit = function(){
     var a = [];
     for (var i=1; i < this.children.length; i+=3)
     {
          a.push(this.children[i].value);
     };
     document.body.removeChild(div);
     thisis[actT.x].form(a);
     return false;
};
div.form.method = 'POST';
div.form.id = 'form';
document.body.appendChild(div);
div.appendChild(div.form);
for (var i=0; i < texts.length; i++) {
var temp3 = document.createElement('br');
var temp = document.createElement('font');
temp.innerText = texts[i]+'\n';
div.form.appendChild(temp);
var temp2 = document.createElement('input');
temp2.type = types[i];
div.form.appendChild(temp2);
div.form.appendChild(temp3);
};
var last = document.createElement('input');
last.type = 'submit';
div.form.appendChild(last);
div.form.children[1].focus();
},
Notify:function(itext, src, duration) {
if(!src) {
var src = 'wallpaper/BluDotlogo.png';
};
if(!duration) {
var duration = 2;
};
if(!itext) {
var itext = '';
};
  if(document.getElementsByClassName('notifymain').length == 1) {
  var len = document.getElementsByClassName('notifymain').length;
    var main = document.createElement('div');
  main.id = 'notifymain';
  main.className = 'notifymain';
  main.style.top = (document.getElementsByClassName('notifymain')[0].clientHeight+5)+30+'px';
  document.body.appendChild(main);
  main.style['-webkit-transition'] = 'top 1s';
    main.style.MozTransition = 'top 1s';
  } else if(document.getElementsByClassName('notifymain').length > 1) {
  var len = document.getElementsByClassName('notifymain').length;
    var main = document.createElement('div');
  main.id = 'notifymain';
  main.className = 'notifymain';
  main.style.top = (document.getElementsByClassName('notifymain')[len-1].clientHeight*(document.getElementsByClassName('notifymain').length))+5*(document.getElementsByClassName('notifymain').length)+30+'px';
  document.body.appendChild(main);
  main.style['-webkit-transition'] = 'top 1s';
    main.style.MozTransition = 'top 1s';
} else if(document.getElementsByClassName('notifymain').length == 0) {
  var main = document.createElement('div');
  main.id = 'notifymain';
  main.className = 'notifymain';
  main.style.top = 30+'px';
  document.body.appendChild(main);
  main.style['-webkit-transition'] = 'top 1s';
  main.style.MozTransition = 'top 1s';
};
  main.innerHTML = '<div id="notifylogo"><img class="notifylogo" src="'+src+'" /></div><div id="notifycontent"><font class="notifytext"></font></div></div>';
  var text = main.children[1].children[0];
text.innerHTML = itext;
  main.style.right=-300+'px';
var run = setInterval(
    function(){
    main.style.right=(parseInt(main.style.right)+10)+'px';
      if(parseInt(main.style.right) == 10) {
        setTimeout(function(){
          var endit = [];
          for(var k=0; k < document.getElementsByClassName('notifymain').length; k++) {
        document.getElementsByClassName('notifymain')[k].style.top = parseInt(document.getElementsByClassName('notifymain')[k].offsetTop)-main.clientHeight+'px';
          };
          document.body.removeChild(main);
        }, duration*1000);
        clearInterval(run);
      };
    }, 1);
}
};
window.addEventListener('contextmenu', function (e){MainTools.desktopRightClick(e);}, false);
window.applicationCache.addEventListener('downloading', function() { MainTools.alertsystem('Downloading'); }, false);

window.applicationCache.addEventListener('updateready', function() { MainTools.alertsystem('Done'); }, false);
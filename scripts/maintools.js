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
	sidebard.style.cssText = 'position:absolute;width:10px;left:'+(ele.clientWidth)+10+'px;top:'+top+'px;background:rgba(225, 225, 225, 1);box-shadow:0px 1px 5px black inset;display:block;bottom:0px;';
	sidebarinner.style.cssText = 'position:relative;width:5px;height:'+(((ele.clientHeight-bottom)/eleme.scrollHeight)*(ele.clientHeight-bottom))+'px;top:0px;left:5px;background:rgba(61, 61, 61, 1);-webkit-border-top-left-radius:10px;-webkit-border-bottom-left-radius:10px;';
	ele.appendChild(sidebard);
	sidebard.appendChild(sidebarinner);
	ele.onmousemove = function (e){
		if (!e) {
			var e = window.event;
		};
		if ((e.pageX-elem.offsetLeft) > (ele.clientWidth-10-right)) {
			sidebard.style.left = (ele.clientWidth-10-right)+'px';
                        sidebard.style.display = 'none';
		} else {
			if (sidebard.offsetLeft !== ele.clientWidth) {
				sidebard.style.left = (ele.clientWidth)+'px';
                        sidebard.style.display = 'block';
			};
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
temp2.type = 'text';
div.form.appendChild(temp2);
div.form.appendChild(temp3);
};
var last = document.createElement('input');
last.type = 'submit';
div.form.appendChild(last);
div.form.children[1].focus();
},
Notify:(function () {
	var notify_enable_queue = false,
		notifydialogs = {},
		notifydialog_queue = [],
		notifydialogIndex = 0,
		notifydialog_removingSpeed = 0,
		notifydialog_opendialogs = 0,
		notifydialogs_oldlatest = null,
		w = window.innerWidth,
		h = window.innerHeight;
	
	function moveNotify(id,dir) {
		var d = notifydialogs[id];
		if(!d) return false;
		d._dir = dir;
		var newPos = (dir==1 && notifydialog_removingSpeed>0) ? d._lastPos : (d._lastPos + (d._dir*d._speed)),
			realNewPos = Math.round((newPos-d._startPos)/d.offsetHeight * (0+d.offsetHeight) + d._startPos);
		
		d.style[("leftright").replace(d._halign,"")] = "auto";
		d.style[("topbottom").replace(d._valign,"")] = "auto";
		d.style[d._halign] = "0px";
		d.style[d._valign] =  realNewPos + "px";
		
		if(d._dir==-1) {
			var o;
			for(var x in notifydialogs) {
				o = notifydialogs[x];
				if(o!=d && o._dir==0 && o._index>d._index && o._deleted!=true && o._valign==d._valign && o._halign==d._halign) {
					o._lastPos += d._dir*d._speed;
					o._startPos += d._dir*d._speed;
					if(o._lastPos < o._startPos)
						o._lastPos = o._startPos;
					o.style[o._valign] = o._lastPos + "px";
				}
			}
		}
		
		if(dir==1 && newPos >= d._startPos+d.offsetHeight) {
			try{ window.clearInterval(d._timer); }catch(e){}
			d.style[d._valign] = realNewPos + "px";
			d._waitOpen = window.setInterval(function() {
				notifydialogs[d._id].Close();
			}, Math.round(d._wait*1000));
			d._dir = 0;
			d.className = d.className.replace(" opening","").replace(" underhalfopen","").replace(" halfopen","") + " latest";
			notifydialogs_oldlatest = d._id;
			for(var x in notifydialogs)
				if(x!=d._id && notifydialogs[x]._valign==d._valign && notifydialogs[x]._halign==d._halign)
					notifydialogs[x].className = notifydialogs[x].className.replace(" latest","").replace(" underhalfcovered","").replace(" halfcovered","");
		}
		else if(dir==1 && Math.abs(d._lastPos - d._startPos - d.offsetHeight/2)<=d._speed && notifydialogs_oldlatest && notifydialogs[notifydialogs_oldlatest]) {
			notifydialogs[notifydialogs_oldlatest].className = notifydialogs[notifydialogs_oldlatest].className.replace(" latest","").replace(" underhalfcovered","").replace(" halfcovered","") + " halfcovered";
			d.className = d.className.replace(" underhalfopen","").replace(" halfopen","") + " halfopen";
		}
		else if(dir==-1 && (newPos < d._startPos || newPos<-d.offsetHeight)) {
			try{ window.clearInterval(d._timer); }catch(e){ d._timer=null; }
			d.parentNode.removeChild(d);
			delete notifydialogs[d._id];
			notifydialog_removingSpeed = 0;
			notifydialog_opendialogs--;
			if(notifydialog_opendialogs==0)
				window.setTimeout(notifydialog_processQueue, 100);
		}
		d._lastPos = newPos;
	};
	
	function notifydialog_processQueue() {
		var n;
		for(var i=0; i<notifydialog_queue.length; i++) {
			n = notifydialog_queue[i];
			notifydialog_hold = false;
			System.Notify(n.text,n.secondsToStayOpen,n.vertical_align,n.horizontal_align,n.speed);
			notifydialog_hold = false;
		}
		notifydialog_hold = true;
		notifydialog_queue = [];
	};
	
	return function( text, secondsToStayOpen, vertical_align, horizontal_align, speed, onclick ){
		if(notify_enable_queue==true && notifydialog_hold==true) {
			notifydialog_queue.push({
				"text" : text ,
				"secondsToStayOpen" : secondsToStayOpen ,
				"vertical_align" : vertical_align || "bottom",
				"horizontal_align" : horizontal_align || "right",
				"speed" : speed
			});
			return "queued";
		}
		var d = document.createElement("div");
		if(onclick && onclick.constructor && onclick.constructor==Function) {
			d.onclick = onclick;
		}
		d._id = Math.floor(Math.random()*99999999999999999);
		d._index = notifydialogIndex++;
		d.className = "notifydialog";

		d.innerHTML = (text||'').replace(/<(\/?(script|iframe|frame|style|[a-z0-9]+\:))/gim,'&lt;$1').replace(/<([a-z][a-z0-9\:]*)(\s.*?)>/gim,function(str,type,attr){
			var r = "<"+type;
			r += (attr||'').replace(/\son[a-z0-9]*?\s*=\s*(['"]).*?\1/gim,'');
			return r + ">";
		});
		document.body.appendChild(d);
		d.style.visibility = "hidden";
		d.style.position = "absolute";
		d.style.display = "block";
		notifydialogs[d._id] = d;
		notifydialog_latest = d._id;
		
		d.Close = function() {
			if(this._mouseover==true)
				return false;
			var d = this;
			d._deleted = true;
			try{ window.clearInterval(d._waitOpen); }catch(e){}
			d._timer = window.setInterval(function() {
				moveNotify(d._id, -1);
			},20);
			d.className += " removing";
			notifydialog_removingSpeed = d._speed;
			var o;
			for(var x in notifydialogs) {
				o = notifydialogs[x];
				if(o!=d && o._dir==0 && o._index>d._index && o._valign==d._valign && o._halign==d._halign)
					o._startPos -= d.offsetHeight;
			}
		};
		
		d._speed = (speed===null || speed===undefined) ? 2 : speed;
		d._valign = ((["top","bottom"]).indexOf(vertical_align)<0) ? ((d.offsetTop<h/2)?"top":"bottom") : vertical_align;		// Default align from CSS: left:0px,right:0px,top:0px, or bottom:0px
		d._halign = ((["left","right"]).indexOf(horizontal_align)<0) ? ((d.offsetLeft<w/2)?"left":"right") : horizontal_align;
		d._wait = (secondsToStayOpen===null || secondsToStayOpen===undefined) ? 5 : secondsToStayOpen;
		d._dir = 1;
		d.className = "notifydialog "+d._valign+" "+d._halign+" opening underhalfopen outermost";
		
		for(var x in notifydialogs)
			if(x!=d._id && notifydialogs[x]._valign==d._valign && notifydialogs[x]._halign==d._halign)
				notifydialogs[x].className = notifydialogs[x].className.replace(" outermost","");
		
		if(notifydialogs_oldlatest && notifydialogs[notifydialogs_oldlatest])
			notifydialogs[notifydialogs_oldlatest].className = notifydialogs[notifydialogs_oldlatest].className.replace(" latest","").replace(" underhalfcovered","").replace(" halfcovered","") + " underhalfcovered";
		
		d._startPos = -d.offsetHeight;
		for(var x in notifydialogs)
			if(x!=d._id && notifydialogs[x]._dir>=0 && notifydialogs[x]._valign==d._valign && notifydialogs[x]._halign==d._halign)
				d._startPos += notifydialogs[x].offsetHeight;
		d._lastPos = d._startPos;
		
		d.style[("leftright").replace(d._halign,"")] = "auto";
		d.style[("topbottom").replace(d._valign,"")] = "auto";
		d.style[d._halign] = "0px";
		d.style[d._valign] = (d._startPos - d.offsetHeight) + "px";
		d.style.visibility = "visible";
		d._timer = window.setInterval(function() {
			moveNotify(d._id, 1);
		}, 2);
		
		notifydialog_hold = true;
		notifydialog_opendialogs++;
		return true;
	};
}()),
dockmag:function(user, change) {
var wall = new XMLHttpRequest();
	wall.open('GET', 'users/'+user+'/sysapps/Preferences/dconf.php?user='+user+'&change='+change, true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		//alert(wall.responseText);
		};
	};
wall.send();
}
};
window.addEventListener('contextmenu', function (e){MainTools.desktopRightClick(e);}, false);
window.applicationCache.addEventListener('downloading', function() { MainTools.alertsystem('Downloading'); }, false);

window.applicationCache.addEventListener('updateready', function() { MainTools.alertsystem('Done'); }, false);
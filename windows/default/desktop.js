window.thisis = [];
var SimpleWin = {
theme:'default',
zindexbase:10,
Winds:0,
init:function(wid, height, width, left, top, size, bar){
        if (!height && !width && !left && !top) {
               var height = window.innerHeight-document.getElementById('background').clientHeight;
               var width= window.innerWidth;
        }
	var windowdiv = document.createElement('div');
        if(!bar) {
	var windowdata = '<div id="topbar" class="drag-topbar" style="position:relative;top:0px;left:0;width:100%;height:20px;cursor:pointer;z-index:10;"><div id="left1" class="drag-left1" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/close-button.png"/></div><div id="left2" class="drag-left2" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/minimize-button.png"/></div><div id="left3" class="drag-left3" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/maximize-button.png"/></div></div>';
	var windowdata2 = '<div id="content" class="drag-content" style="position:absolute;top:20px;left:0px;right:0px;bottom:0px;overflow:hidden;background:transparent;z-index:10;"></div>';
        } else if (bar) {
        var windowdata = '<div id="topbar" class="drag-topbar" style="position:relative;top:0px;left:0;width:100%;height:20px;cursor:pointer;z-index:11;background:transparent;"><div id="left1" class="drag-left1" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/close-button.png"/></div><div id="left2" class="drag-left2" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/minimize-button.png"/></div><div id="left3" class="drag-left3" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;" src="icons/maximize-button.png"/></div></div>';
	var windowdata2 = '<div id="content" class="drag-content" style="position:absolute;top:20px;left:0px;right:0px;bottom:0px;overflow:visible;background:transparent;z-index:10;"></div>';
       }
       if(!size) {
	var windowdata3 = '<div id="resize" class="drag-resize" style="position:absolute;bottom:0px;right:0;width:20px;height:20px;z-index:10;"><img style="position:absolute;bottom:0px;right:0;width:20px;height:20px;z-index:10;" src="icons/resize-button.png"/></div>';
	windowdiv.innerHTML = windowdata+windowdata2+windowdata3;
        } else {
	windowdiv.innerHTML = windowdata+windowdata2;
        }
	windowdiv.id=wid;
	windowdiv.className=wid;
	var wid = windowdiv;
	document.getElementById('dhtmlwindowholder').appendChild(wid);
	wid.style.cssText = 'position:fixed;left:0px;top:23px;width:'+width+'px;height:'+height+'px;display:block;-webkit-border-radius: 30px;-moz-border-radius: 20px;border-radius: 20px;';
        if(left) {
        wid.style.left = left(wid)+'px';
        };
        if(top) {
        wid.style.top = top(wid)+'px';
        };
	wid.children[1].style.height = wid.innerheight+'px';
	wid.style.zIndex=parseInt(SimpleWin.zindexbase)+1;
	SimpleWin.zindexbase=wid.style.zIndex;
	var divs = wid.getElementsByTagName('div');
	for (var i=0; i<divs.length; i++){
		if (/drag-/.test(divs[i].className));
			wid[divs[i].className.replace(/drag-/, "")]=divs[i];
	};
	var divs2 = wid.topbar.getElementsByTagName('div');
	for (var i=0; i<divs2.length; i++){
		if (/drag-/.test(divs2[i].className));
			wid.topbar[divs2[i].className.replace(/drag-/, "")]=divs2[i];
	};
	wid.topbar._parent=wid;
	wid.content._parent=wid;
        if(!size) {
	wid.resize._parent=wid;
	wid.resize.onmousedown=SimpleWin.resize;
        }
	wid.onclose=function(){return true} //custom event handler "onclose"
	wid.onmousedown=function(){SimpleWin.setfocus(this)};
	wid.topbar.onmousedown=SimpleWin.drag;
	wid.topbar.left1.onclick=function(){SimpleWin.close(wid);};
	wid.topbar.left2.onclick=function(){SimpleWin.minimize(wid);};
	wid.topbar.left3.onclick=function(){SimpleWin.maximize(wid);};
	window.actT=wid;
        wid.nim=0;
	return wid;
},

getdata:function(data, callback){
	var callback=callback;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", data,true);
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4) {
			var datad=xmlhttp.responseText;
			callback(datad);
		};
	};
	xmlhttp.send();
},
create:function(wid, title, data, height, width, left, top, size, bar){
	var d=SimpleWin;
	wid=this.init(wid, height, width, left, top, size, bar);
	window.wid=wid;
	this.getdata(data, function(xmlhttp){
		wid.content.innerHTML=xmlhttp;
		if (wid.children[1].getElementsByTagName('script')[0]) {
		wid.scriptd = wid.children[1].getElementsByTagName('script')[0];
		eval(wid.scriptd.innerHTML);
		wid.content.removeChild(wid.scriptd);
		};
		if (wid.children[1].getElementsByTagName('style')[0]) {
		wid.styleC = wid.children[1].getElementsByTagName('style')[0];
		document.head.appendChild(wid.styleC);
		};
		});
	d.Winds+=1;
        this.setfocus(wid);
	return wid;
},
drag:function(e){
	var e=window.event;
	var d=SimpleWin;
	var wid=this._parent;
	document.onmousemove=function(e){
		if(!window.wsetX && !window.wsetY){
			window.wsetX=e.pageX-parseInt(wid.offsetLeft);
			window.wsetY=e.pageY-parseInt(wid.offsetTop);
		};
                if((e.clientY-window.wsetY) > 21) {
		wid.style.top=e.clientY-window.wsetY+'px';
                }
		wid.style.left=e.clientX-window.wsetX+'px';
	};
	document.onmouseup=function(){document.onmousemove=null;delete window.wsetX;delete window.wsetY;};
},
setfocus:function(wid){
	this.zindexbase++;
	wid.style.zIndex = this.zindexbase;
	window.actT = wid;
for (var x=0; x < thisis.length; x++)
{
     if(window.actT == thisis[x])
     {
        var thisislength = x;
        window.actT.x = x;
        thisis[thisislength].menu();
     }
}
	this.lastact = wid;
        
},
close:function(wid){
	var widclosef=wid.onclose();
	if (wid.styleC) {
	document.head.removeChild(wid.styleC);
	};
	if (widclosef){ //if custom event handler function returns true
		window.wid = wid;
		document.getElementById('dhtmlwindowholder').removeChild(wid);
		delete window.wid;
		this.Winds=parseInt(this.Winds)-1;
	};
        //if (actT.x > 0) {
thisis.splice((parseInt(window.actT.x)), 1);
//} else {
//thisis.splice(0, 1);
//}
        window.bar(1);
	return widclosef;
},
resize:function(e){
	var e=window.event;
	var d=SimpleWin;
	var wid=this._parent;
	var shim = document.createElement('div');
	shim.id = 'SHIM';
	shim.style.cssText = 'width:100%;height:100%;position:fixed;z-index:376458;top:0px;left:0px;';
	document.body.appendChild(shim);
	document.onmousemove=function(e){
		if(!window.wsetY && !window.wsetX){
			window.wsetY=parseInt(wid.style.top);
			window.wsetX=parseInt(wid.style.left);
		};
		wid.style.height=(e.pageY-window.wsetY)+'px';
		wid.style.width=(e.pageX-window.wsetX)+'px';
	};
	document.onmouseup=function(){document.onmousemove=null;delete window.wsetX;delete window.wsetY;document.body.removeChild(document.getElementById('SHIM'));};
},
minimize:function(wid){	
	if (!wid.min || wid.min==false){
		wid.attrsleft=wid.style.left;
		wid.attrstop=wid.style.top;
		wid.attrswidth=wid.style.width;
		wid.attrsheight=wid.style.height;
		wid.style.display='none';
                wid.nim+=1;
		dock.AddNew({
                             name:      '../../icons/'+wid.id,
                             label:     wid.id+wid.nim,
                             extension: '.png',
                             sizes:     [30, 100],
                             menuItems: ['restore'],
                             menuClick: [function(){SimpleWin.minimize(wid);}],
                             onclick:   function (){SimpleWin.minimize(wid);}
                             }, dock.findApp('Trash'));
		wid.min=true;
        window.bar(1);
	} else if (wid.min==true){
                dock.removeApp(wid.id+wid.nim);
                wid.nim-=1;
		wid.style.display='block';
		wid.min=false;
this.setfocus(wid);
	};
},
maximize:function(wid){
	if (!wid.max || wid.max==false){
		wid.attrsleft=wid.style.left;
		wid.attrstop=wid.style.top;
		wid.attrswidth=wid.style.width;
		wid.attrsheight=wid.style.height;
		wid.style.top=23+'px';
		wid.style.left=0+'px';
		wid.style.width=100+'%';
		wid.style.height=(parseInt(window.innerHeight)-81)+'px';
		wid.max=true;
	} else if (wid.max==true){
		wid.style.left=wid.attrsleft;
		wid.style.top=wid.attrstop;
		wid.style.width=wid.attrswidth;
		wid.style.height=wid.attrsheight;
		wid.max=false;
	};
},
rememberattr:function(wid){
        	wid.attrsleft=wid.style.left;
		wid.attrstop=wid.style.top;
		wid.attrswidth=wid.style.width;
		wid.attrsheight=wid.style.height;
},
restore:function(wid){
		wid.style.left=wid.attrsleft;
		wid.style.top=wid.attrstop;
		wid.style.width=wid.attrswidth;
		wid.style.height=wid.attrsheight;
                this.zindexbase++;
	wid.style.zIndex = this.zindexbase;
	window.actT = wid;
for (var x=0; x < thisis.length; x++)
{
     if(window.actT == thisis[x])
     {
        var thisislength = x;
        window.actT.x = x;
        thisis[thisislength].menu();
     }
}
	this.lastact = wid;
        
},
};
window.addEventListener('keydown', function(event) {
	if (event.keyCode == 115) {
           var exposeholder = document.getElementById('dhtmlwindowholder');
           window.exposeholder = exposeholder;
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
              window.holder = document.createElement('div');
              document.body.appendChild(holder);
              holder.style.position = 'fixed';
              holder.style.top = 0+'px';
              holder.style.left = 0+'px';
              holder.style.width = 100+'%';
              holder.style.height = 100+'%';
              holder.style.zIndex = 99999999;
              window.appshim = [];
              for (var i=0; i < exposeholder.children.length; i++) {
                  //if (i < 5) {
                  SimpleWin.rememberattr(exposeholder.children[i]);
                  appshim[i] = document.createElement('div');
                  window.holder.appendChild(appshim[i]);
                  appshim[i].border = document.createElement('div');
                  appshim[i].appendChild(appshim[i].border);
                  appshim[i].border.style.cssText = 'width: auto;height: auto;position: absolute;bottom: 0px;top: 0px;left: 0px;right: 0px;';
                  appshim[i].border.id = i;
                  appshim[i].id = i;
                  appshim[i].className = 'hov';
                  appshim[i].style.position = 'relative';
                  appshim[i].style.width = (window.innerWidth/3)-16+'px';
                  appshim[i].style.height = (window.innerHeight/2)-16+'px';
                  appshim[i].style.top = 21+'px';
                  appshim[i].style.left = 0+'px';
                  appshim[i].style.zIndex = 99999999;
                  appshim[i].style.boderRadius = '10px';
                  appshim[i].style.float = 'left';
                  appshim[i].style.margin = 5+'px';
                  appshim[i].onmouseover = function(){
                  	this.children[0].style.border = '5px solid blue';
                  	/*for (var i=0; i < document.querySelectorAll('.hov').length; i++)
                  	{
                  		if (document.querySelectorAll('.hov')[i] != this)
                  		{
                  			document.querySelectorAll('.hov')[i].style.border = '5px solid transparent';
                  		};
                  	};*/
                  };
                  appshim[i].onmouseout = function(){this.children[0].style.border = '';};
                  appshim[i].onclick = function(){
                  	var num = window.event.target.id;
                  	SimpleWin.restore(exposeholder.children[num]);
                  	SimpleWin.setfocus(exposeholder.children[num]);
                  	for (var b=0; b < exposeholder.children.length; b++)
                  	{
                  		//if(b != num)
                  		//{
                  			SimpleWin.restore(exposeholder.children[b]);
                  			exposeholder.children[b].style.position = 'fixed';
                  		//};
                  	};
                  	for (var t=0; t < window.appshim.length; t++)
                  	{
                  		window.holder.removeChild(window.appshim[t]);
                  	};
                  	document.body.removeChild(window.holder);
                  	document.body.removeChild(window.shim);
                  	window.dock.node.style.zIndex = 2147483;
                  };
                  exposeholder.children[i].style.width = (window.innerWidth/3)-16+'px';
                  exposeholder.children[i].style.height = (window.innerHeight/2)-16+'px';
                  exposeholder.children[i].style.top = 21+'px';
                  //exposeholder.children[i].style.left = ((i-1)*(window.innerWidth/4))+2+'px';
                  exposeholder.children[i].style.left = 0+'px';
                  exposeholder.children[i].style.float = 'left';
                  exposeholder.children[i].style.position = 'relative';
                  exposeholder.children[i].style.margin = 5+'px';
                  //}
              }
              document.getElementById('dhtmlwindowholder').style.overflowY = 'hidden';
              window.holder.style.overflowY = 'hidden';
              document.getElementById('dhtmlwindowholder').onmousewheel = document.getElementById('dhtmlwindowholder').onmousewheel = function (e){
		e = e ? e : window.event;
		var wheelData = e.detail ? e.detail * -1 : e.wheelDelta;
		document.getElementById('dhtmlwindowholder').scrollTop += -(wheelData/4);
		window.holder.scrollTop += -(wheelData/4);
		//sidebarinner.style.top = document.getElementById('dhtmlwindowholder').scrollTop*(document.getElementById('dhtmlwindowholder').clientHeight/document.getElementById('dhtmlwindowholder').scrollHeight)+'px';
		};
		window.holder.onmousewheel = window.holder.onmousewheel = function (e){
		e = e ? e : window.event;
		var wheelData = e.detail ? e.detail * -1 : e.wheelDelta;
		document.getElementById('dhtmlwindowholder').scrollTop += -(wheelData/4);
		window.holder.scrollTop += -(wheelData/4);
		//sidebarinner.style.top = document.getElementById('dhtmlwindowholder').scrollTop*(document.getElementById('dhtmlwindowholder').clientHeight/document.getElementById('dhtmlwindowholder').scrollHeight)+'px';
		};
		window.scrollbar = document.createElement('div');
		window.dock.node.style.zIndex = 10;
              } else if (window.expose == true) {
              window.expose = false;
              for (var i=0; i < exposeholder.children.length; i++) {
                 SimpleWin.restore(exposeholder.children[i]);
                 window.holder.removeChild(appshim[i]);
              }
                  	for (var b=0; b < exposeholder.children.length; b++)
                  	{
                  			SimpleWin.restore(exposeholder.children[b]);
                  			exposeholder.children[b].style.position = 'fixed';
                  	};
                 document.body.removeChild(window.holder);
              document.body.removeChild(shim);
              delete shim;
              }
           }
	}
return false;
}, false);
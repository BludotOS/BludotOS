var SimpleWin = {
theme:'default',
zindexbase:10,
Winds:0,
init:function(wid){
	var windowdiv = document.createElement('div');
	var windowdata = '<div id="topbar" class="drag-topbar" style="position:relative;top:0;left:0;width:100%;height:30px;cursor:pointer;background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 1)));z-index:10;background:-moz-linear-gradient(top,  rgba(0, 0, 0, 0.5),  rgba(0, 0, 0, 1));"><div id="left1" class="drag-left1" style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;" src="icons/close-button.png"/></div><div id="left2" class="drag-left2" style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;" src="icons/minimize-button.png"/></div><div id="left3" class="drag-left3" style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;"><img style="position:relative;float:left;top:0;left:0;width:24px;height:24px;cursor:pointer;" src="icons/maximize-button.png"/></div></div>';
	var windowdata2 = '<div id="content" class="drag-content" style="position:relative;width:100%;height:100%;top:0px;left:0px;overflow:hidden;background:white;z-index:10;"></div>';
	var windowdata3 = '<div id="resize" class="drag-resize" style="position:absolute;bottom:-30px;right:0;width:30px;height:30px;z-index:10;"><img style="position:absolute;bottom:0px;right:0;width:30px;height:30px;z-index:10;" src="icons/resize-button.png"/></div>';
	windowdiv.innerHTML = windowdata+windowdata2+windowdata3;
	windowdiv.id=wid;
        windowdiv.className=wid;
	var wid = windowdiv;
	document.getElementById('dhtmlwindowholder').appendChild(wid);
	wid.style.cssText = 'position:fixed;left:0px;top:50px;background-color:blue;width:100%;height:'+(parseInt(window.innerHeight)-130)+'px;display:block;';
	//wid.children[1].style.height = wid.innerheight+'px';
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
	wid.resize._parent=wid;
	wid.onclose=function(){return true} //custom event handler "onclose"
	wid.ontouchstart=function(){SimpleWin.setfocus(this)};
	wid.topbar.ontouchstart=SimpleWin.drag;
	wid.resize.ontouchstart=SimpleWin.resize;
	wid.topbar.left1.onclick=function(){SimpleWin.close(wid);};
	wid.topbar.left2.onclick=function(){SimpleWin.minimize(wid);};
	wid.topbar.left3.onclick=function(){SimpleWin.maximize(wid);};
	window.actT=wid;
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
create:function(wid, title, data, style){
	var d=SimpleWin;
	wid=this.init(wid);
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
		wid.content.removeChild(wid.styleC);
		};
		});
	d.Winds+=1;
	return wid;
},
drag:function(e){
	var e=window.event;
	var d=SimpleWin;
	var wid=this._parent;
        document.ontouchmove=function(e){
		if(!window.wsetX && !window.wsetY){
			window.wsetX=e.touches[0].pageX-parseInt(wid.offsetLeft);
			window.wsetY=e.touches[0].pageY-parseInt(wid.offsetTop);
		};
		wid.style.left=e.touches[0].clientX-window.wsetX+'px';
		wid.style.top=e.touches[0].clientY-window.wsetY+'px';
	};
	document.ontouchend=function(){document.ontouchmove=null;delete window.wsetX;delete window.wsetY;};
},
setfocus:function(wid){
	this.zindexbase++;
	wid.style.zIndex=this.zindexbase;
	window.actT=wid;
	this.lastact=wid;
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
	document.ontouchmove=function(e){
		if(!window.wsetY && !window.wsetX){
			window.wsetY=parseInt(wid.style.top);
			window.wsetX=parseInt(wid.style.left);
		};
		wid.style.height=(e.touches[0].pageY-window.wsetY)+'px';
		wid.style.width=(e.touches[0].pageX-window.wsetX)+'px';
	};
	document.ontouchend=function(){document.ontouchmove=null;delete window.wsetX;delete window.wsetY;document.body.removeChild(document.getElementById('SHIM'));};
},
minimize:function(wid){	
	if (!wid.min || wid.min==false){
		wid.attrsleft=wid.style.left;
		wid.attrstop=wid.style.top;
		wid.attrswidth=wid.style.width;
		wid.attrsheight=wid.style.height;
		wid.style.display='none';
		var minappli = document.createElement('li');
		var minappimg = document.createElement('img');
		minappimg.src = 'icons/'+wid.id+'.png';
		minappimg.style.cssText =  'width:55px;height:55px;left:0;position:relative;border:none;';
		var br = document.createElement('br');
		var minappa = document.createElement('a');
		minappa.style.cssText = 'position:relative;font-size:10px;color:white;top:-20px;';
		minappa.innerHTML = wid.id;
		document.getElementById('Mthelist').appendChild(minappli);
		minappli.appendChild(minappimg);
		minappli.appendChild(minappa);
	        window.wid = wid;
		window.minappli = minappli;
		minappimg.onclick = function() {document.getElementById('Mthelist').removeChild(minappli); document.getElementById('mindock').style.left = 100+'%'; document.getElementById('mindock').style.display = 'none'; SimpleWin.restore(wid, minappli);};
		wid.min=true;
	};
},
restore:function(wid, minappli){
	var minappli=minappli;
	if (wid.min==true){
		wid.style.display='block';
		SimpleWin.setfoucus(wid);
		document.getElementById('Mthelist').removeChild(minappli);
	        document.getElementById('mindock').style.left = 100+'%';
	        document.getElementById('mindock').style.display = 'none';
		wid.style.left=wid.attrsleft;
		wid.style.top=wid.attrstop;
		wid.style.width=wid.attrswidth;
		wid.style.height=wid.attrsheight;
		wid.min=false;
	};
},
maximize:function(wid){
	if (!wid.max || wid.max==false){
		wid.attrsleft=wid.style.left;
		wid.attrstop=wid.style.top;
		wid.attrswidth=wid.style.width;
		wid.attrsheight=wid.style.height;
		wid.style.top=50+'px';
		wid.style.left=0+'px';
		wid.style.width=100+'%';
		wid.style.height=parseInt(window.innerHeight)-130+'px';
		wid.max=true;
	} else if (wid.max==true){
		wid.style.left=wid.attrsleft;
		wid.style.top=wid.attrstop;
		wid.style.width=wid.attrswidth;
		wid.style.height=wid.attrsheight;
		wid.max=false;
	};
},
};
document.write('<div id="dhtmlwindowholder"><span id="deleteref" style="display:none"></span></div>');
var SimpleWin = {
theme:'default',
zindexbase:10,
Winds:0,
init:function(wid, title){
	var windowdiv = document.createElement('div');
 var windowdata = '<div id="topbar" class="drag-topbar" style="position:relative;top:0;left:0;width:100%;height:20px;cursor:pointer;background: -webkit-gradient(linear, left top, left bottom, from(#a9a9a9), to(#7a7a7a));z-index:10;"><div id="left1" class="drag-left1" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;-webkit-border-radius: 30px;-moz-border-radius: 20px;border-radius: 20px;background:-webkit-radial-gradient(center, .7em .7em, #D70000, #FF0000);margin:3px 0 3px 3px;"></div><div id="left2" class="drag-left2" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;-webkit-border-radius: 30px;-moz-border-radius: 20px;border-radius: 20px;background:-webkit-radial-gradient(center, .7em .7em, #FFFF00, #DCDC6A);margin:3px 0 3px 3px;"></div><div id="left3" class="drag-left3" style="position:relative;float:left;top:0;left:0;width:14px;height:14px;cursor:pointer;-webkit-border-radius: 30px;-moz-border-radius: 20px;border-radius: 20px;background:-webkit-radial-gradient(center, .7em .7em, #00FF00, #00AC00);margin:3px 0 3px 3px;"></div></div>';
	var windowdata2 = '<div id="content" class="drag-content" style="position:relative;top:0px;left:0px;width:100%;height:100%;overflow:hidden;background:white;z-index:10;"></div>';
	var windowdata3 = '<div id="resize" class="drag-resize" style="position:absolute;bottom:-20px;;right:0;width:20px;height:20px;background:gray;z-index:10;"></div>';
	windowdiv.innerHTML = windowdata+windowdata2+windowdata3;
	windowdiv.id=wid;
	var wid = windowdiv;
	document.getElementById('dhtmlwindowholder').appendChild(wid);
	wid.style.cssText = 'position:fixed;left:0px;top:20px;background-color:blue;width:300px;height:200px;display:block;';
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
	wid.ontouchstart=function(){SimpleWin.setfocus(this)};
	wid.topbar.ontouchstart=SimpleWin.drag(wid);
	wid.resize.ontouchstart=SimpleWin.resize(wid);
	wid.topbar.left1.onclick=function(){SimpleWin.close(wid);};
	wid.topbar.left2.onclick=function(){SimpleWin.minimize(wid);};
	wid.topbar.left3.onclick=function(){SimpleWin.maximize(wid);};
	SimpleWin.setfocus(wid);
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
	wid=this.init(wid, title);
	window.wid=wid;
	this.getdata(data, function(xmlhttp){wid.content.innerHTML=xmlhttp;});
	d.Winds+=1;
},
drag:function(wid){
	var e=window.event;
	wid.topbar.ontouchmove=function(e){
		if(!window.wsetX){
			window.wsetX=e.touches[0].pageX-parseInt(wid.offsetLeft);
		};
		wid.style.left=e.touches[0].clientX-window.wsetX+'px';
		wid.style.top=e.touches[0].clientY+'px';
	};
	wid.topbar.ontouchend=function(){delete window.wsetX;};
},
setfocus:function(wid){
	this.zindexbase++;
	wid.style.zIndex=this.zindexbase;
	window.actT=wid;
	this.lastact=wid;
},
close:function(wid){
	window.wid = wid;
	document.getElementById('dhtmlwindowholder').removeChild(wid);
	delete window.wid;
	this.Winds=parseInt(this.Winds)-1;
},
resize:function(wid){
	var e=window.event;
	wid.resize.ontouchmove=function(e){
		if(!window.wsetY && !window.wsetX){
			window.wsetY=parseInt(wid.style.top);
			window.wsetX=parseInt(wid.style.left);
		};
		wid.style.height=(e.touches[0].pageY-window.wsetY)+'px';
		wid.style.width=(e.touches[0].pageX-window.wsetX)+'px';
	};
	wid.resize.ontouchend=function(){delete window.wsetX;delete window.wsetY};
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
		minappimg.onclick = function() { SimpleWin.restore(wid, minappli); };
		var br = document.createElement('br');
		var minappa = document.createElement('a');
		minappa.style.cssText = 'position:relative;font-size:10px;color:white;top:-20px;';
		minappa.innerHTML = wid.id;
		document.getElementById('Mthelist').appendChild(minappli);
		minappli.appendChild(minappimg);
		minappli.appendChild(minappa);
	        window.wid = wid;
		window.minappli = minappli;
		wid.min=true;
	};
},
restore:function(wid, minappli){
	var minappli=minappli;
	if (wid.min==true){
		wid.style.display='block';
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
		wid.style.top=0+'px';
		wid.style.left=0+'px';
		wid.style.width=100+'%';
		wid.style.height=parseInt(window.innerHeight)-20+'px';
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
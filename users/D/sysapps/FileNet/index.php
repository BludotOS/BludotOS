<?
$user=$_GET['userN'];
include('images.php');
?>
<script>
window.thisis.push(actT);
for (x in thisis)
{
     if(actT == thisis[x])
     {
        var thisislength = x;
        actT.x = x;
     }
}
thisis[actT.x].menu = function() {
var menu = document.getElementById('menu1').cloneNode(true);
window.bar(0);
menu.innerHTML = '<li onclick="clickt(this);"><a>FileNet</a></li><ul></ul><li><a>File</a></li><ul></ul><li><a>Edit</a></li><ul></ul><li onclick="clickt(this);"><a>View</a></li><ul><li><a onclick="clickt(clicked);thisis[actT.x].listviewt(0);">Listview</a></li><li><a onclick="clickt(clicked);thisis[actT.x].listviewt(1);">Icon View</a></li></ul>';
for(var i = 2; i < menu.children.length; i++)
{
document.getElementById('menu0').appendChild(menu.children[i].cloneNode(true));
}
};
thisis[actT.x].menu();
thisis[actT.x].FileNet = [];
thisis[actT.x].i = -1;
thisis[actT.x].openapp = function(name) {
var name = name.split(".")[0];
        window.tempname = name;
thisis[actT.x].nameit = name;
var openapp = new XMLHttpRequest();
        var sendit = 'name='+name+'.blu';
        openapp.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/fopen.php', true);
	openapp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	openapp.onreadystatechange = function() {
	if (openapp.readyState==4) {
thisis[actT.x].i++;
window.dock.addIcon({
            name:      'icons/gear',
            label:     name,
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){return false;}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
var temp =SimpleWin.create(name, name, "users/"+core.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+core.user+"");
<?
if ($isMobile) {
?>
dock.addclick(name, ['close', 'minimize'], [function(){SimpleWin.close(window.thisis[actT.x].FileNet[thisis[actT.x].i]);}, function(){SimpleWin.minimize(window.thisis[actT.x].FileNet[thisis[actT.x].i]);}]);
<?
};
?>
temp.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
var closeapp = new XMLHttpRequest();
        var sendit2 = 'name='+window.tempname;
        closeapp.open('POST', 'users/'+core.user+'/sysapps/FileNet/resolve.php', true);
	closeapp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit2.length);
	closeapp.onreadystatechange = function() {
	if (closeapp.readyState==4) {
window.dock.removeApp(window.tempname);
}
}
closeapp.send(sendit2);
<?
};
?>
return true;
}
}
}
openapp.send(sendit);
}
thisis[actT.x].innerdivs = 0;
thisis[actT.x].cdivs = 0;
thisis[actT.x].cdiv = 0;
thisis[actT.x].listview = true;
thisis[actT.x].back = function(gotoit) {
thisis[actT.x].gotoit = gotoit;
//var gotoit = gotoit.substring(0, gotoit.length-1);
var goto2 = new XMLHttpRequest();
	if(gotoit.substring(0, 4) != "HDD/"){
	sendit = 'goto=HDD/'+gotoit.substring(thisis[actT.x].response.files[i].indexOf("/") + 1);
	} else {
	sendit = 'goto='+gotoit.substring(0, gotoit.length-1);
	}
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
	if(thisis[actT.x].cdiv == thisis[actT.x].innerdivs && thisis[actT.x].listview != true) {
        window.actT.children[1].children[2].appendChild(window.actT.children[1].children[2].children[thisis[actT.x].innerdivs].cloneNode(true));
        thisis[actT.x].innerdivs+=1;
        window.actT.children[1].children[2].children[thisis[actT.x].innerdivs].id = thisis[actT.x].innerdivs;
        thisis[actT.x].cdivs = thisis[actT.x].innerdivs;
        } else if(thisis[actT.x].cdiv < thisis[actT.x].innerdivs && thisis[actT.x].listview != true) {
        for(var i=0; i < (thisis[actT.x].innerdivs-(thisis[actT.x].cdiv+1)); i++) {
        	window.actT.children[1].children[2].removeChild(window.actT.children[1].children[2].children[i+thisis[actT.x].innerdivs]);
        }        
        thisis[actT.x].innerdivs-=(thisis[actT.x].innerdivs-(thisis[actT.x].cdiv+1));
        thisis[actT.x].cdivs = thisis[actT.x].cdiv+1;
        } else if(thisis[actT.x].listview == true) {
        thisis[actT.x].cdivs = 0;
        };
        if (gotoit != 'Applications' && gotoit != 'HDD/Applications'){
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.children[0].children[1].innerHTML));" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+thisis[actT.x].response.dirs[i]+'</a></div></td><td style="text-align:left;" class="type">Directory</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			var temp = thisis[actT.x].response.files[i].substring(thisis[actT.x].response.files[i].indexOf(".") + 1);
			var newtr = document.createElement('tr');
			if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
				var type = 'image';
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto((this.children[0].children[1].innerHTML+thisis[actT.x].response.location));" class="name"><div><img alt="" src="users/<? echo $user; ?>/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+thisis[actT.x].response.files[i]+'" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			} else {
				var type = 'undefined';
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto((this.children[0].children[1].innerHTML+thisis[actT.x].response.location));" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			}
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        } else if (gotoit == 'Applications' || gotoit == 'HDD/Applications') {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[0]);
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			var temp = thisis[actT.x].response.files[i].substring(thisis[actT.x].response.files[i].indexOf(".") + 1);
			if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
				var type = 'image';
			} else if (temp == 'blu') {
                                var type = 'application';
                        } else {
				var type = 'undefined';
			}
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].openapp((this.children[0].children[1].innerHTML));" class="name"><div><img alt="" src="<? echo $Iapp; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        }
        thisis[actT.x].children[1].children[0].children[2].innerHTML = thisis[actT.x].response.location;
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].lastChild);
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0]);	
				
	};
	};
goto2.send(sendit);
};
thisis[actT.x].delete = function(loc, name){
	var loc = loc+'/';
	var name = name;
	var ajax = new XMLHttpRequest();
	ajax.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/delete.php?loc='+loc+'&file='+name);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4)
		{
			if(thisis[actT.x].response.location == "HDD/" || thisis[actT.x].response.location == "HDD")
			{
				thisis[actT.x].back('HDD/');
			} else {
				thisis[actT.x].goto(thisis[actT.x].response.location);
			};
		}
	}
	ajax.send();
};
thisis[actT.x].stouch = function(node)
{
	var e = window.event;
	if(e.touches[1])
	{
		thisis[actT.x].filelistdropt(node);return false;
	};
};
thisis[actT.x].filelistdropt = function(node){
	var temp = document.createElement('div');
	if(thisis[actT.x].children[1].querySelector('#file-list'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-list');
	} else if(thisis[actT.x].children[1].querySelector('#file-icon'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-icon');
	};
	if(list.children[0].lastChild.tagName == "DIV")
	{
		list.children[0].removeChild(list.children[0].lastChild);
	}
	list.children[0].appendChild(temp);
	window.temp = temp;
	window.num = num;
	window.list = list;
	var shim = document.createElement('div');
	list.children[0].appendChild(shim);
	shim.style.cssText = 'position: absolute;background: transparent;width: 100%;height: 100%;top: 0px;left: 0px;z-index: 1;';
	shim.onclick = function(){
		list.children[0].removeChild(shim);
		thisis[actT.x].removerghtclck();
	};
	window.tempnode = node;
	temp.className = 'arrow_box_upm';
	temp.innerHTML = '<ul><li onclick="thisis[actT.x].open(\''+node.parentNode.children[1].innerHTML+'\', \''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Open</li><li class="openwith">Open with<ul><li></li></ul></li><li onclick="thisis[actT.x].download(\''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Download</li><li>New<ul><li onclick="thisis[actT.x].new(\'file\');">File</li><li onclick="thisis[actT.x].new(\'dir\');">Directory</li></ul></li><li>Edit</li><li>Copy</li><li>Cut</li><li>Paste</li><li onclick="thisis[actT.x].delete(\''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Delete</li></ul>';
	if(node.parentNode.children[1].innerHTML == "image")
	{
		temp.querySelector('.openwith').children[0].innerHTML = '<li>Picture Viewer</li>';
	};
	var num = parseInt(node.parentNode.offsetTop)+40;
	if((list.children[0].clientHeight-num) < temp.clientHeight)
	{
		temp.className = 'arrow_box_downm';
		num = parseInt(node.parentNode.offsetTop)-temp.clientHeight-5;
	}
	temp.style.cssText = 'position: absolute;width: 80px;height: auto;top:'+num+'px;border-radius: 5px;left: '+node.parentNode.offsetLeft+'px;z-index:2;';
	temp.onclick = function(){
		list.children[0].removeChild(shim);
		if(list.children[0].lastChild.tagName == "DIV")
		{
			list.children[0].removeChild(list.children[0].lastChild);
		} else if(list.children[0].lastChild.previousSibling.tagName == "DIV"){
			list.children[0].removeChild(list.children[0].lastChild.previousSibling);
		}
	};
	window.event.preventDefault();
};
thisis[actT.x].new = function(type){
	var loc = thisis[actT.x].response.location+'/';
	var type = type;
	if(thisis[actT.x].children[1].querySelector('#file-list'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-list');
	} else if(thisis[actT.x].children[1].querySelector('#file-icon'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-icon');
	};
	window.list = list;
	
	if(type == "dir")
	{
		console.log('dir');
		var newtr = document.createElement('tr');
		newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.children[0].children[1].innerHTML));" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a><input type="text" /></a></div></td><td style="text-align:left;" class="type">Directory</td>';
		console.log('1');
		window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		console.log('2');
	};
	if(type == "file")
	{
		console.log('file');
		var newtr = document.createElement('tr');
		newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerHTML);" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a><input type="text" /></a></div></td><td class="type" style="text-align:left;">File</td>';
		window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
	};
	window.newtr = newtr;
	newtr.querySelector('input').focus();
	newtr.onkeydown = function(e){
		if(!e)
		{
			var e = window.event;
		}
		var key = e.keyCode || e.which;
		if(key == 13)
		{
			if(type == "dir")
			{
				var text = newtr.querySelector('input').value;
				if(text.split('.').length > 0)
				{
					text = text.split('.')[0];
				}
				loc += text;
			} else {
				var text = newtr.querySelector('input').value;
				if(text.split('.').length > 1)
				{
					text = text.split('.')[0]+'.'+text.split('.')[1];
				}
				loc += text;
			}
			var ajax = new XMLHttpRequest();
	ajax.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/new.php?loc='+loc+'&type='+type);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4)
		{
			if(thisis[actT.x].response.location == "HDD/" || thisis[actT.x].response.location == "HDD")
			{
				thisis[actT.x].back('HDD/');
			} else {
				thisis[actT.x].goto(thisis[actT.x].response.location);
			};
		}
	}
	ajax.send();
		}
	}
};
thisis[actT.x].filelistdrop = function(node){
	var temp = document.createElement('div');
	if(thisis[actT.x].children[1].querySelector('#file-list'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-list');
	} else if(thisis[actT.x].children[1].querySelector('#file-icon'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-icon');
	};
	if(list.children[0].lastChild.tagName == "DIV")
	{
		list.children[0].removeChild(list.children[0].lastChild);
	}
	list.children[0].appendChild(temp);
	window.temp = temp;
	window.num = num;
	window.list = list;
	var shim = document.createElement('div');
	list.children[0].appendChild(shim);
	shim.style.cssText = 'position: absolute;background: transparent;width: 100%;height: 100%;top: 0px;left: 0px;z-index: 1;';
	shim.onclick = function(){
		list.children[0].removeChild(shim);
		thisis[actT.x].removerghtclck();
	};
	window.tempnode = node;
	temp.className = 'arrow_box_up';
	temp.innerHTML = '<ul><li onclick="thisis[actT.x].open(\''+node.parentNode.children[1].innerHTML+'\', \''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Open</li><li class="openwith">Open with<ul><li></li></ul></li><li onclick="thisis[actT.x].download(\''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Download</li><li>New<ul><li onclick="thisis[actT.x].new(\'file\');">File</li><li onclick="thisis[actT.x].new(\'dir\');">Directory</li></ul></li><li>Edit</li><li>Copy</li><li>Cut</li><li>Paste</li><li onclick="thisis[actT.x].delete(\''+thisis[actT.x].response.location+'\', \''+node.children[0].children[1].innerHTML+'\');">Delete</li></ul>';
	if(node.parentNode.children[1].innerHTML == "image")
	{
		temp.querySelector('.openwith').children[0].innerHTML = '<li>Picture Viewer</li>';
	};
	var num = parseInt(node.parentNode.offsetTop)+40;
	if((list.children[0].clientHeight-num) < temp.clientHeight)
	{
		temp.className = 'arrow_box_down';
		num = parseInt(node.parentNode.offsetTop)-temp.clientHeight-5;
	}
	temp.style.cssText = 'position: absolute;width: 80px;height: auto;top:'+num+'px;border-radius: 5px;left: '+node.parentNode.offsetLeft+'px;z-index:2;';
	temp.onclick = function(){
		list.children[0].removeChild(shim);
		if(list.children[0].lastChild.tagName == "DIV")
		{
			list.children[0].removeChild(list.children[0].lastChild);
		} else if(list.children[0].lastChild.previousSibling.tagName == "DIV"){
			list.children[0].removeChild(list.children[0].lastChild.previousSibling);
		}
	};
	window.event.preventDefault();
};
thisis[actT.x].download = function(loc, name)
{
	if(loc != "HDD/")
	{
		var loc = loc+'/';
	}
	window.open('http://bludotos.com/users/<? echo $user; ?>/sysapps/FileNet/'+loc+name, '_blank');
};
thisis[actT.x].removerghtclck = function(){
	if(thisis[actT.x].children[1].querySelector('#file-list'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-list');
	} else if(thisis[actT.x].children[1].querySelector('#file-icon'))
	{
		var list = thisis[actT.x].children[1].querySelector('#file-icon');
	};
	if(list.children[0].lastChild.tagName == "DIV")
		{
			list.children[0].removeChild(list.children[0].lastChild);
		} else if(list.children[0].lastChild.previousSibling.tagName == "DIV"){
			list.children[0].removeChild(list.children[0].lastChild.previousSibling);
		}
};
thisis[actT.x].add = function()
{
	var tempw = thisis[actT.x].children[1];
	if(tempw.querySelector('.arrow_box_left'))
	{
		tempw.removeChild(tempw.querySelector('.arrow_box_left'))
	} else {
	var temp = document.createElement('div');
	tempw.appendChild(temp);
	temp.innerHTML = '<ul><li onclick="thisis[actT.x].upload();">Upload</li><li>New<ul><li onclick="thisis[actT.x].new(\'file\');">File</li><li onclick="thisis[actT.x].new(\'dir\');">Directory</li></ul></li></ul>';
	temp.style.cssText = 'position: absolute;width: 80px;height: auto;left: 82px;top: 5px;';
	temp.className = 'arrow_box_left';
	window.temp = thisis[actT.x];
	temp.onclick = function(){
		tempw.removeChild(temp);
	};
	};
};
thisis[actT.x].open = function(type, loc, name)
{
	if(type == "Directory")
	{
		thisis[actT.x].goto((thisis[actT.x].response.location+'/'+name));
	}
};
thisis[actT.x].upload = function()
{
	core.loadApps.Uploader('../FileNet/'+temp.response.location+'/', '');
};
thisis[actT.x].goto = function(gotoit){
var goto2 = new XMLHttpRequest();
thisis[actT.x].gotoit=gotoit;
	if(gotoit.substring(0, 4) != "HDD/"){
	sendit = 'goto=HDD/'+gotoit;
	} else {
	sendit = 'goto='+gotoit;
	}
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
        if(thisis[actT.x].cdiv == thisis[actT.x].innerdivs && thisis[actT.x].listview != true) {
        window.actT.children[1].children[2].appendChild(window.actT.children[1].children[2].children[thisis[actT.x].innerdivs].cloneNode(true));
        thisis[actT.x].innerdivs+=1;
        window.actT.children[1].children[2].children[thisis[actT.x].innerdivs].id = thisis[actT.x].innerdivs;
        thisis[actT.x].cdivs = thisis[actT.x].innerdivs;
        } else if(thisis[actT.x].cdiv < thisis[actT.x].innerdivs && thisis[actT.x].listview != true) {
        for(var i=0; i < (thisis[actT.x].innerdivs-(thisis[actT.x].cdiv+1)); i++) {
        	window.actT.children[1].children[2].removeChild(window.actT.children[1].children[2].children[i+thisis[actT.x].innerdivs]);
        }        
        thisis[actT.x].innerdivs-=(thisis[actT.x].innerdivs-(thisis[actT.x].cdiv+1));
        thisis[actT.x].cdivs = thisis[actT.x].cdiv+1;
        } else if(thisis[actT.x].listview == true) {
        thisis[actT.x].cdivs = 0;
        };
        if (gotoit != 'Applications' && gotoit != 'HDD/Applications'){
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].click(this);thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.children[0].children[1].innerHTML));" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+thisis[actT.x].response.dirs[i]+'</a></div></td><td style="text-align:left;" class="type">Directory</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			var temp = thisis[actT.x].response.files[i].substring(thisis[actT.x].response.files[i].indexOf(".") + 1);
			var newtr = document.createElement('tr');
			if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
				var type = 'image';
			newtr.innerHTML = '<td style="text-align:left;" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" class="name"><div><img alt="" src="users/<? echo $user; ?>/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+thisis[actT.x].response.files[i]+'" /><a onclick="void(0);">'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			}  else if(temp != 'png' || temp != 'jpg' || temp != 'jpeg' || temp != 'gif'){
				var type = 'undefined';
                        newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerHTML);" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td class="type" style="text-align:left;">'+type+'</td>';
                        };
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        } else if (gotoit == 'Applications' || gotoit == 'HDD/Applications') {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[0]);
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			var temp = thisis[actT.x].response.files[i].substring(thisis[actT.x].response.files[i].indexOf(".") + 1);
			if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
				var type = 'image';
			} else if (temp == 'blu') {
                                var type = 'application';
                        } else {
				var type = 'undefined';
			}
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].openapp((this.children[0].children[1].innerHTML));" class="name"><div><img alt="" src="<? echo $Iapp; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        }
        thisis[actT.x].children[1].children[0].children[2].innerHTML = thisis[actT.x].response.location;
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].lastChild);
//window.actT.children[1].children[2].children[thisis[actT.x].cdivs].style.width = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].clientWidth+'px';
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0], -(parseInt(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].offsetLeft)+150), 45);				
	};
	};
goto2.send(sendit);
};
var goto = new XMLHttpRequest();
	goto.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/goto.php', true);
	goto.onreadystatechange = function() {
	if (goto.readyState==4) {
	thisis[actT.x].testit=function(objectit){
	};
		var response = JSON.parse(goto.responseText);
                thisis[actT.x].response = response;
                if(thisis[actT.x].listview == true) {
                window.actT.children[1].children[2].children[0].style.width='100%';
                window.actT.children[1].children[2].children[0].children[0].style.width='100%';
                window.actT.children[1].children[2].children[0].children[0].children[0].style.width='100%';
                thisis[actT.x].stylesheet = document.styleSheets[document.styleSheets.length-1];
                for(var k=0; k < thisis[actT.x].stylesheet.cssRules.length; k++) {
                if(thisis[actT.x].stylesheet.cssRules[k].selectorText == '#FileNet #content:nth-child(2) tr') {
                thisis[actT.x].stylesheet.cssRules[k].style.width = '100%';
                }
                if(thisis[actT.x].stylesheet.cssRules[k].selectorText == '#FileNet .name') {
                thisis[actT.x].stylesheet.cssRules[k].style.width = '100%';
                thisis[actT.x].namew = document.styleSheets[document.styleSheets.length-1].cssRules[k];
                thisis[actT.x]['namew'].style.width = 400+'px';
                }
                if(thisis[actT.x].stylesheet.cssRules[k].selectorText == '#FileNet .type') {
                thisis[actT.x].typew = document.styleSheets[document.styleSheets.length-1].cssRules[k];
                thisis[actT.x]['typew'].style.width = thisis[actT.x].children[1].children[2].clientWidth - parseInt(thisis[actT.x]['namew'].style.width)+'px';
                }
                }
                if(thisis[actT.x].children[1].querySelector('#splashload'))
                {
                	thisis[actT.x].children[1].removeChild(thisis[actT.x].children[1].querySelector('#splashload'));
                };
                } else {
                };
window.mousedownN = function(node, e){
     if(!e){ e=window.event; };
     document.onmousemove = function(e){
     	//document.getElementsByClassName(node.parentNode.id)[0].style.width = e.pageX-node.parentNode.offsetLeft-150+'px';
     	     if(!thisis[actT.x].tempX)
     {
     	thisis[actT.x].tempX = parseInt(e.clientX);
     };
     	var temp = (thisis[actT.x].tempX-parseInt(e.clientX));
        thisis[actT.x]['namew'].style.width = parseInt(e.clientX)-thisis[actT.x].offsetLeft-150+'px';
        thisis[actT.x]['typew'].style.width = node.parentNode.parentNode.parentNode.parentNode.clientWidth - parseInt(thisis[actT.x]['namew'].style.width)+'px';
        /*if(node.parentNode.id == 'name') {
        thisis[actT.x]['typew'].style.width = thisis[actT.x]['typew'].clientWidth-(e.clientX-node.parentNode.offsetLeft-150)+'px';
        } else if(node.parentNode.id == 'type') {
        thisis[actT.x]['namew'].style.width = thisis[actT.x]['namew'].clientWidth-(e.clientX-node.parentNode.offsetLeft-150)+'px';
        };*/
     	};
node.onmouseup = function(){
	thisis[actT.x].tempX;
     document.onmousemove = null;
};
};
		for(var i=0; i < response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].click(this);thisis[actT.x].goto(this.children[0].children[1].innerHTML);" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+thisis[actT.x].response.dirs[i]+'</a></div></td><td class="type" style="text-align:left;">Directory</td>';
			window.actT.children[1].children[2].children[0].children[0].children[0].appendChild(newtr);
		};
		for(var i=0; i < response.files.length; i++)
		{
			var newtr = document.createElement('tr');
                        var temp = response.files[i].split('.')[1];
                        if(temp != 'png' || temp != 'jpg' || temp != 'jpeg' || temp != 'gif'){
			newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerHTML);" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td class="type" style="text-align:left;">Undefined</td>';
                        } else if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
                        newtr.innerHTML = '<td style="text-align:left;" ontouchstart="thisis[actT.x].stouch(this);" oncontextmenu="thisis[actT.x].filelistdrop(this);return false;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerHTML);" class="name"><div><img alt="" src="users/<? echo $user; ?>/sysapps/FileNet/'+thisis[actT.x].response.location+'/'+thisis[actT.x].response.files[i]+'" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td class="type" style="text-align:left;">Image</td>';
                        };
			window.actT.children[1].children[2].children[0].children[0].children[0].appendChild(newtr);
		};
        thisis[actT.x].response.location = "HDD/";
        thisis[actT.x].children[1].children[0].children[2].innerHTML = thisis[actT.x].response.location;
//window.actT.children[1].children[2].children[thisis[actT.x].cdivs].style.width = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].clientWidth+'px';
		//MainTools.mscroll(thisis[actT.x].children[1].children[0].children[2].children[0]);
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0], (parseInt(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].offsetLeft)+150*(-1)), 45);	
				
	};
	};
goto.send();
thisis[actT.x].listviewt = function(a) {
          //thisis[actT.x].listview = thisis[actT.x].listview==true ? false : true;
          if(thisis[actT.x].querySelector('#file-list') && a == 1)
          {
          	var temp = thisis[actT.x].querySelector('#file-list');
          } else if(thisis[actT.x].querySelector('#file-icon') && a == 0){
          	var temp = thisis[actT.x].querySelector('#file-icon');
          }
          temp.id = temp.id=='file-list' ? 'file-icon' : 'file-list';
};
thisis[actT.x].click = function(node) {
            window.testnode = node;
            for(var i=0; i < node.parentNode.children.length; i++)
            {
                 node.parentNode.children[i].style.background = '';
                 node.parentNode.children[i].style['boxShadow'] = '';
            };
       node.style.background='rgba(70,70,70,1)';
       node.style['boxShadow'] = 'inset 0px 0px 3px 1px black';
};
</script>
<style>
.arrow_box_up {
	background: rgba(0,0,0,1);
	border: 2px solid #0a0af5;
}
.arrow_box_up:after, .arrow_box:before {
	bottom: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box_up:after {
	border-color: rgba(0, 0, 0, 0);
	border-bottom-color: #000000;
	border-width: 10px;
	left: 50%;
	margin-left: -10px;
}
.arrow_box_up:before {
	border-color: rgba(10, 10, 245, 0);
	border-bottom-color: #0a0af5;
	border-width: 13px;
	left: 50%;
	margin-left: -13px;
}

.arrow_box_up ul {
	color: white;
list-style: none;
position: relative;
top: 0px;
padding: 0;
margin: 0;
width: 100%;
height: 100%;
font-size: 14px;
padding: 3px 0px 3px 0px;
}

.arrow_box_up ul ul {
	display: none;
position: absolute;
left: 100%;
width: auto;
height: auto;
background: rgba(0,0,0,1);
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
border-top: 2px solid blue;
border-right: 2px solid blue;
border-bottom: 2px solid blue;
}

.arrow_box_up ul li:hover > ul {
	display: block;
}

.arrow_box_up ul li:hover {
	background: rgb(12,58,265);
}

.arrow_box_up ul li {
	display: block;
	width: 100%;
text-align: center;
position: relative;
cursor: pointer;
white-space: nowrap;
}

.arrow_box_left {
	background: #000000;
	border: 2px solid #0a0af5;
}
.arrow_box_left:after, .arrow_box_left:before {
	right: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box_left:after {
	border-color: rgba(0, 0, 0, 0);
	border-right-color: #000000;
	border-width: 8px;
	top: 25%;
	margin-top: -8px;
}
.arrow_box_left:before {
	border-color: rgba(10, 10, 245, 0);
	border-right-color: #0a0af5;
	border-width: 11px;
	top: 25%;
	margin-top: -11px;
}
.arrow_box_left ul {
	color: white;
list-style: none;
position: relative;
top: 0px;
padding: 0;
margin: 0;
width: 100%;
height: 100%;
font-size: 14px;
padding: 3px 0px 3px 0px;
}

.arrow_box_left ul ul {
	display: none;
position: absolute;
left: 100%;
width: auto;
height: auto;
background: rgba(0,0,0,1);
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
border-top: 2px solid blue;
border-right: 2px solid blue;
border-bottom: 2px solid blue;
}

.arrow_box_left ul li:hover > ul {
	display: block;
}

.arrow_box_left ul li:hover {
	background: rgb(12,58,265);
}

.arrow_box_left ul li {
	display: block;
	width: 100%;
text-align: center;
position: relative;
cursor: pointer;
white-space: nowrap;
}

.arrow_box_down {
	background: #000000;
	border: 2px solid #0a0af5;
}
.arrow_box_down:after, .arrow_box_down:before {
	top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box_down:after {
	border-color: rgba(0, 0, 0, 0);
	border-top-color: #000000;
	border-width: 10px;
	left: 50%;
	margin-left: -10px;
}
.arrow_box_down:before {
	border-color: rgba(10, 10, 245, 0);
	border-top-color: #0a0af5;
	border-width: 13px;
	left: 50%;
	margin-left: -13px;
}
.arrow_box_down ul {
	color: white;
list-style: none;
position: relative;
top: 0px;
padding: 0;
margin: 0;
width: 100%;
height: 100%;
font-size: 14px;
padding: 3px 0px 3px 0px;
}

.arrow_box_down ul ul {
	display: none;
position: absolute;
left: 100%;
width: auto;
height: auto;
background: rgba(0,0,0,1);
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
border-top: 2px solid blue;
border-right: 2px solid blue;
border-bottom: 2px solid blue;
}

.arrow_box_down ul li:hover > ul {
	display: block;
}

.arrow_box_down ul li:hover {
	background: rgb(12,58,265);
}

.arrow_box_down ul li {
	display: block;
	width: 100%;
text-align: center;
position: relative;
cursor: pointer;
white-space: nowrap;
}
.arrow_box_upm {
	background: rgba(0,0,0,1);
	border: 2px solid #0a0af5;
}
.arrow_box_upm:after, .arrow_box:before {
	bottom: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box_upm:after {
	border-color: rgba(0, 0, 0, 0);
	border-bottom-color: #000000;
	border-width: 10px;
	left: 50%;
	margin-left: -10px;
}
.arrow_box_upm:before {
	border-color: rgba(10, 10, 245, 0);
	border-bottom-color: #0a0af5;
	border-width: 13px;
	left: 50%;
	margin-left: -13px;
}

.arrow_box_upm ul {
	color: white;
list-style: none;
position: relative;
top: 0px;
padding: 0;
margin: 0;
width: 100%;
height: 100%;
font-size: 14px;
padding: 3px 0px 3px 0px;
}

.arrow_box_upm ul ul {
	display: none;
position: absolute;
left: 100%;
width: auto;
height: auto;
background: rgba(0,0,0,1);
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
border-top: 2px solid blue;
border-right: 2px solid blue;
border-bottom: 2px solid blue;
}

.arrow_box_upm ul li:hover > ul {
	display: block;
}

.arrow_box_upm ul li:hover {
	background: rgb(12,58,265);
}

.arrow_box_upm ul li {
	display: block;
	width: 100%;
text-align: center;
position: relative;
cursor: pointer;
white-space: nowrap;
font-size:20px;
}
.arrow_box_downm {
	background: #000000;
	border: 2px solid #0a0af5;
}
.arrow_box_downm:after, .arrow_box_downm:before {
	top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.arrow_box_downm:after {
	border-color: rgba(0, 0, 0, 0);
	border-top-color: #000000;
	border-width: 10px;
	left: 50%;
	margin-left: -10px;
}
.arrow_box_downm:before {
	border-color: rgba(10, 10, 245, 0);
	border-top-color: #0a0af5;
	border-width: 13px;
	left: 50%;
	margin-left: -13px;
}
.arrow_box_downm ul {
	color: white;
list-style: none;
position: relative;
top: 0px;
padding: 0;
margin: 0;
width: 100%;
height: 100%;
font-size: 14px;
padding: 3px 0px 3px 0px;
}

.arrow_box_downm ul ul {
	display: none;
position: absolute;
left: 100%;
width: auto;
height: auto;
background: rgba(0,0,0,1);
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
border-top: 2px solid blue;
border-right: 2px solid blue;
border-bottom: 2px solid blue;
}

.arrow_box_downm ul li:hover > ul {
	display: block;
}

.arrow_box_downm ul li:hover {
	background: rgb(12,58,265);
}

.arrow_box_downm ul li {
	display: block;
	width: 100%;
text-align: center;
position: relative;
cursor: pointer;
white-space: nowrap;
font-size:20px;
}

html{
}
#FileNet #topname:hover {
background:none;
box-shadow:none;
}
#FileNet .name {
width:100px;
}
#FileNet .type {
text-align:left;
}
#FileNet tr {
position:relative;
display:block;
}
#FileNet tr:hover {
background:rgba(70,70,70,1);
box-shadow: inset 0px 0px 3px 1px black;
}
/*#FileNet #content tr {

}
#FileNet #content:nth-child(2) tr {
width:150px;
padding: 0px;
margin: 0px;
}
#FileNet #content:nth-child(2) tr div {
position: relative;
width: 100%;
height: 100%;
padding: 0px 10px 0px 10px;
}
#FileNet #content:nth-child(2) tr div img {
position: relative;
float: left;
left: 0px;
top: 0px;
height: 25px;
}
#FileNet #content:nth-child(2) tr div font {
position: relative;
float: left;
height: 25px;
top: 0px;
left: 0px;
line-height: 25px;
padding-left: 5px;
}
#FileNet #content:nth-child(2) tr div a {
position: relative;
float: left;
height: 25px;
top: 0px;
left: 0px;
line-height: 25px;
padding-left: 5px;
}

*/
#FileNet #file-list tr {
	-webkit-transition: left,top,width,height,margin .5s ease;
	-moz-transition: left,top,width,height,margin .5s ease;

}
#FileNet #file-list:nth-child(2) tr {
width:150px;
padding: 0px;
margin: 0px;
}
#FileNet #file-list:nth-child(2) tr div {
position: relative;
width: 100%;
height: 100%;
padding: 0px 10px 0px 10px;
}
#FileNet #file-list tr div img {
height: 30px;
width: 30px;
}
#FileNet #file-list:nth-child(2) tr div font {
position: relative;
float: left;
height: 25px;
top: 0px;
left: 0px;
line-height: 25px;
padding-left: 5px;
}
#FileNet #file-list:nth-child(2) tr div a {
position: relative;
float: left;
height: 25px;
top: 0px;
left: 0px;
line-height: 25px;
padding-left: 5px;
}
#FileNet .topbar-btns {
	top:2px;
width: auto;
height: 30px;
position: relative;
overflow: hidden;
float:left;
}
#FileNet #file-list tr td {
border-right: 1px dotted black;
border-bottom: 1px dotted black;
}

#FileNet #file-icon tr {
	-webkit-transition: all .5s ease;
	-moz-transition: all .5s ease;
width: 100px;
height: 100px;
position: relative;
float: left;
margin: 10px;
overflow: visible;
}
#FileNet #file-icon tr div {
position: relative;
width: 100%;
top: 0px;
left: 0px;
padding: 0;
margin: 0;
height: 100%;
}
#FileNet #file-icon tr div img {
position: relative;
width: 50px;
height: 50px;
padding-left: 25px;
padding-right: 25px;
float: left;
}
#FileNet .topbar-btns {
	top:2px;
width: auto;
height: 30px;
position: relative;
overflow: hidden;
float:left;
padding-left: 5px;
padding-right: 5px;
}
/*#FileNet .list tr td {
border-right: 1px dotted black;
border-bottom: 1px dotted black;
}*/

#FileNet #file-icon tr td
{
	width: 70px;
height: 70px;
position: relative;
padding: 0;
margin: 0;
}

#FileNet #file-icon tr td div a
{
	line-height: 14px;
font-size: 14px;
width: 100px;
text-align: center;
position: relative;
float: left;
height: 50px;
word-wrap: break-word;
}

#FileNet #file-icon tr .type
{
	display:none;
}
#FileNet #sidebar img {
	width:25px;
}
</style>
<div style="position:absolute;left:0px;top:0px;right:0px;height:35px;background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));">
<div class="topbar-btns" onclick="thisis[actT.x].back(thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length-1]))[0].substring(0, thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length]))[0].length-1));"><img src="<? echo $backbtn; ?>"></div>
<div class="topbar-btns" onclick="thisis[actT.x].add();"><img src="<? echo $addbtn; ?>"></div>
<div style="position: relative;width: 300px;border: 1px solid black;margin: 0 auto;top: 6px;height: 20px;border-radius: 20px;padding: 0px 5px 0px 5px;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmNmYyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjE1JSIgc3RvcC1jb2xvcj0iI2U4ZThlOCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2Q2ZDZkNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijg3JSIgc3RvcC1jb2xvcj0iI2U4ZThlOCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);" onmouseover="var node=this;window.rep2=window.setInterval(function(){node.scrollLeft=(node.scrollLeft+1);}, 90);" onmouseout="clearInterval(window.rep2);this.scrollLeft=0;"></div>
<div style="position: absolute;width: 125px;height: 20px;border: 1px solid black;top: 6px;right: 5px;border-radius: 20px;background: white;margin: 0;padding: 0;overflow: hidden;"><input style="position: relative;outline: none;border: none;border-radius: 20px;top: 0px;left: 5px;width: 100px;height: 100%;padding: 0;margin: 0;border-spacing: 0;" /><img src="<? echo $Isearch; ?>" style="position: absolute;width: 20px;height: 20px;top: 0px;right: 0px;border-left: 1px solid gray;" /></div>
</div>
<div id="0" style="position:absolute;left:0px;top:35px;width:150px;bottom:0px;background:rgba(30,30,30,1);border-right:1px solid black;" onmouseover="thisis[actT.x].cdiv=parseInt(this.id);">
<table id="sidebar" style="width:100%;border-spacing:0;">
<tr style="background:rgba(70,70,70,1);box-shadow: inset 0px 0px 3px 1px black;width:150px;">
<td style="width:150px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].back(this.children[0].children[1].innerHTML+'/');thisis[actT.x].cdiv=parseInt(-1);"><div><img alt="" src="<? echo $IHDD; ?>" /><font>HDD</font></div></td>
</tr>
<tr>
<td style="width:150px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerHTML);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>Documents</font></div></td>
</tr>
<tr>
<td style="width:150px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerHTML);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>Applications</font></div></td>
</tr>
<tr>
<td style="width:150px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerHTML);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>MyPictures</font></div></td>
</tr>
</table>
</div>
<div style="position:absolute;left:150px;top:35px;right:0px;bottom:0px;background:rgba(157,201,214, 1);border-left:1px solid black;">
<div id="0" style="position: absolute;float: left;border-left-width: 1px;border-left-style: solid;border-left-color: black;top: 0px;left: 0px;right: 0px;bottom: 0px;" onmouseover="thisis[actT.x].cdiv=parseInt(this.id);">
<table id="file-list" class="list" align="left" style="border-spacing: 0px;top: 0px;left: 0px;position: relative;width: 100%;height: 100%;padding-top: 20px;">
<tbody  style="position: absolute;top: 45px;bottom: 0px;left: 0px;right: 0px;overflow: hidden;">
</tbody>
</table>
<table style="position: absolute;top: 20px;left: 0px;right: 0px;height: 20px;width: 100%;border-spacing: 0;">
<tbody>
<tr id="topname" onmouseover="return false;" style="border-spacing:0;background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));">
<td class="name" id="name" style="position:relative;background:transparent;text-align:left;border-radius:0px;">name</td>
<td class="divider" style="width:5px;height:21px;background:transparent;border:1px solid black;" onmousedown="window.mousedownN(this);"></td>
<td class="type" id="type" style="position:relative;background:transparent;text-align:left;border-radius:0px;">type</td>
</tr>
</tbody>
</table>
</div>
</div>
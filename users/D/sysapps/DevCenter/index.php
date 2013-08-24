<?
include('images.php');
$user = $_GET['userN'];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  };
  if(is_dir($dir)) rmdir($dir); 
}
rrmdir( '../FileNet/HDD/Applications/temp/APP');
mkdir('../FileNet/HDD/Applications/temp/APP');
copy('include/index.php', '../FileNet/HDD/Applications/temp/APP/index.php');
mkdir('../FileNet/HDD/Applications/temp/APP/APP_core');
copy('include/APP_core/notes.txt', '../FileNet/HDD/Applications/temp/APP/APP_core/notes.txt');
copy('include/APP_core/descript.txt', '../FileNet/HDD/Applications/temp/APP/APP_core/descript.txt');
chmod ('../FileNet/HDD/Applications/temp/APP/index.php', 0644);
fopen('../FileNet/HDD/Applications/temp/APP/index.txt', 'w') or die("can't open file");
$filename="users/".$user."/sysapps/FileNet/HDD/Applications/temp/APP/index.txt";
$old = '../FileNet/HDD/Applications/temp/APP';
?>
<script>
window.thisis.push(actT);
//var x = 0;
for (var x=0; x < thisis.length; x++)
{
     if(window.actT == thisis[x])
     {
        var thisislength = x;
        window.actT.x = x;
     }
};
thisis[actT.x].menu = function() {
var menu = document.getElementById('menu1').cloneNode(true);
window.bar(0);
menu.innerHTML += '<li onclick="clickt(this);"><a>DevCenter</a></li><ul><li><a>temp</a></li></ul><li onclick="clickt(this);"><a>File</a></li><ul><li><a onclick="clickt(clicked);thisis[actT.x].prename();">New app</a></li><li><a onclick="clickt(clicked);thisis[actT.x].popen();">open</a></li><li><a onclick="clict(clicked);save();">save</a></li><li><a onclick="clickt(clicked);thisis[actT.x].pnewfile();">new file</a></li></ul><li onclick="clickt(this);"><a>Edit</a></li>';
for(var i = 2; i < menu.children.length; i++)
{
document.getElementById('menu0').appendChild(menu.children[i].cloneNode(true));
}
};
thisis[actT.x].menu();
thisis[actT.x].old = '<? echo $old; ?>';
thisis[actT.x].nameitf = 'APP';
thisis[actT.x].delete = function (name) {
	window.tempname = name;
var nameitf = name;
var newed = new XMLHttpRequest();
        newed.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/deletefile.php?nameit='+(thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1])+'&nameitf='+nameitf, true);
        newed.onreadystatechange = function() {
        if(newed.readyState==4) {
                thisis[actT.x].filemgr(thisis[actT.x].nameit);
                //document.body.removeChild(document.getElementById('popupdev'));
        }
        }
        newed.send();
}
thisis[actT.x].Rclick = function (details, node) {
        var temp = document.createElement('div');
		var list = thisis[actT.x].children[1].querySelector('#leftfilemgr').parentNode;
	if(list.lastChild.className == "arrow_box_up")
	{
		list.removeChild(list.lastChild);
	}
	list.appendChild(temp);
	window.temp = temp;
	window.num = num;
	window.list = list;
	var shim = document.createElement('div');
	list.appendChild(shim);
	shim.style.cssText = 'position: absolute;background: transparent;width: 100%;height: 100%;top: 0px;left: 0px;z-index: 1;';
	shim.onclick = function(){
		list.removeChild(shim);
		//thisis[actT.x].removerghtclck();
		if(list.lastChild.className == "arrow_box_up" || list.lastChild.className == "arrow_box_down")
		{
			list.removeChild(list.lastChild);
		} else if(list.lastChild.previousSibling.className == "arrow_box_up" || list.lastChild.previousSibling.className == "arrow_box_down"){
			list.removeChild(list.lastChild.previousSibling);
		}
	};
	window.tempnode = node;
	temp.className = 'arrow_box_up';
		temp.innerHTML = '<ul><li onclick="thisis[actT.x].view(\''+node.children[1].innerHTML+'\', (thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1]));">Open</li><li>New<ul><li onclick="thisis[actT.x].newobj(\'file\');">File</li><li onclick="thisis[actT.x].newobj(\'dir\');">Directory</li></ul></li><li>Edit</li><li>Copy</li><li>Cut</li><li>Paste</li><li onclick="thisis[actT.x].delete(\''+node.children[1].innerHTML+'\');">Delete</li></ul>';
	var num = parseInt(node.parentNode.offsetTop)+91;
	if((list.clientHeight-num) < temp.clientHeight)
	{
		temp.className = 'arrow_box_down';
		num = parseInt(node.parentNode.offsetTop)-temp.clientHeight-5;
	}
	temp.style.cssText = 'position: absolute;width: 80px;height: auto;top:'+num+'px;border-radius: 5px;left: '+node.parentNode.offsetLeft+'px;z-index:2;';
	temp.onclick = function(){
		if(list.lastChild == shim)
		{
			list.removeChild(shim);
		}
		if(list.lastChild.className == "arrow_box_up" || list.lastChild.className == "arrow_box_down")
		{
			list.removeChild(list.lastChild);
		} else if(list.lastChild.previousSibling.className == "arrow_box_up" || list.lastChild.previousSibling.className == "arrow_box_down"){
			list.removeChild(list.lastChild.previousSibling);
		}
	};
	window.event.preventDefault();

};
thisis[actT.x].newobj = function(type) {
	//var loc = thisis[actT.x].response.location+'/';
	var type = type;
		var list = thisis[actT.x].children[1].querySelector('#leftfilengr');
	window.list = list;
	
	if(type == "dir")
	{
		console.log('dir');
		var newtr = document.createElement('tr');
		newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifolder; ?>"/><a onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);"><input type="text" /></a></td>';
		console.log('1');
		window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
		console.log('2');
	};
	if(type == "file")
	{
		console.log('file');
		var newtr = document.createElement('tr');
		newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked" oncontextmenu="thisis[actT.x].Rclick(this.children[0].innerHTML, this); return false;"; onclick="thisis[actT.x].view(this.children[1].innerHTML, thisis[actT.x].nameit);"><img src="<? echo $Ifile; ?>"/><a><input type="text" /></a></td>';
		window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
	};
	window.newtr = newtr;
	newtr.querySelector('input').focus();
	newtr.onkeydown = function(e){
		if(!e)
		{
			var e = window.event;
		}
		var key = e.keyCode || e.which;
		var text = '';
		if(key == 13)
		{
			if(type == "dir")
			{
				text = newtr.querySelector('input').value;
				if(text.split('.').length > 0)
				{
					text = text.split('.')[0];
				}
				//loc += text;
			} else {
				text = newtr.querySelector('input').value;
				if(text.split('.').length > 1)
				{
					text = text.split('.')[0]+'.'+text.split('.')[1];
				}
				//loc += text;
			}
			var newed = new XMLHttpRequest();
        newed.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/newfile.php?nameit='+(thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1])+'&name='+text+'&type='+type+'&t='+new Date().getTime(), true);
        newed.onreadystatechange = function() {
        if(newed.readyState==4) {
                thisis[actT.x].filemgr(thisis[actT.x].nameit);
        }
        }
        newed.send();
		}
	}
};
thisis[actT.x].newfile = function (name) {
var newed = new XMLHttpRequest();
        newed.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/newfile.php?nameit='+(thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1])+'&name='+name, true);
        newed.onreadystatechange = function() {
        if(newed.readyState==4) {
                thisis[actT.x].filemgr(thisis[actT.x].nameit);
        }
        }
        newed.send();
};
thisis[actT.x].pnewfile = function(){
        MainTools.popup(['Open'], ['text']);
        thisis[actT.x].form = function(a) {
               thisis[actT.x].newfile(a[0]);
        };
};
thisis[actT.x].filemgr = function(name) {
thisis[actT.x].nameit = name;
thisis[actT.x].nameitf = 'index.txt';
var goto = new XMLHttpRequest();
        var sendit3 = 'goto=../FileNet/HDD/Applications/temp/'+name;
	goto.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php?t='+new Date().getTime(), true);
        goto.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	goto.onreadystatechange = function() {
	if (goto.readyState==4) {
	thisis[actT.x].testit=function(objectit){
	};
		thisis[actT.x].response = JSON.parse(goto.responseText);

                var k = window.actT.children[1].children[0].children[1].children[2].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[2].children[0].removeChild(window.actT.children[1].children[0].children[1].children[2].children[0].children[0]);
		}

                if (thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifolder; ?>"/><a onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);">'+thisis[actT.x].response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
		};
                }
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			if(thisis[actT.x].response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			if(thisis[actT.x].response.files[i] == 'index.txt'){
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenterclicked" oncontextmenu="thisis[actT.x].Rclick(this.children[0].innerHTML, this); return false;"; onclick="thisis[actT.x].view(this.children[1].innerHTML, thisis[actT.x].nameit);"><img src="<? echo $Ifile; ?>"/><a>'+thisis[actT.x].response.files[i]+'</a></td>';
			} else {
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked" oncontextmenu="thisis[actT.x].Rclick(this.children[0].innerHTML, this); return false;"; onclick="thisis[actT.x].view(this.children[1].innerHTML, thisis[actT.x].nameit);"><img src="<? echo $Ifile; ?>"/><a>'+thisis[actT.x].response.files[i]+'</a></td>';
			}
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
                }
		};
		thisis[actT.x].editor.renderer.scroller.style.right=0;
		thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";

				
	};
	thisis[actT.x].editor.renderer.scroller.style.right=0;
	thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
	};
	goto.send(sendit3);
thisis[actT.x].editor.renderer.scroller.style.right=0;
thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
}
thisis[actT.x].view = function(name, nameit) {
	var name = name;
	for(var t=0; t < thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children.length; t++)
	{
		if(thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].children[1].innerHTML == name)
		{
			thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].className = 'DevCenterclicked';
		} else {
			thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].className = 'DevCenternotclicked';
		}
	}
	thisis[actT.x].editor.renderer.scroller.style.right=0;
	thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
thisis[actT.x].nameitf = name;
        var ajax4 = new XMLHttpRequest();
	//ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+nameit+'/'+name, true);
	ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?nameit='+nameit+'&name='+name, true);
	//ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?name='+nameit+'&nameit='+name, true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
                        //window.result5 = ajax4;
			thisis[actT.x].editor.setValue(ajax4.responseText, -1);
			thisis[actT.x].editor.renderer.scroller.style.right=0;
			thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
		};
	};			
	ajax4.send();
	thisis[actT.x].editor.renderer.scroller.style.right=0;
	thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";

}
thisis[actT.x].debug = function(name) {
save(function(){
thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
var temp=SimpleWin.create(name, name, "users/"+core.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+core.user+"");
temp.onclose = function() {
thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
thisis[actT.x] = actT;
return true;
}
});
}
thisis[actT.x].checknew = function() {
	if(thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value == "APP")
	{
		MainTools.popup(['Save'], ['text']);
        thisis[actT.x].form = function(a) {
        	thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value = a[0]
               thisis[actT.x].rename(thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value);
               save();
        };
        return false;
	};
	return true;
}
thisis[actT.x].open = function(name) {
        thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value = name;
        thisis[actT.x].nameit = name;
        var nameit0 = name;
        var nameit = name+'.blu';
        var sendit = 'name='+nameit;
        var ajax3 = new XMLHttpRequest();
	ajax3.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/open.php?t='+new Date().getTime(), true);
        ajax3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
                        window.thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
                        var ajax4 = new XMLHttpRequest();
	ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?nameit='+nameit0+'&name=index.txt', true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
			thisis[actT.x].editor.setValue(ajax4.responseText, -1);
thisis[actT.x].children[1].children[0].children[2].children[0].children[0].selectionStart = thisis[actT.x].children[1].children[0].children[2].children[0].children[0].selectionEnd = thisis[actT.x].children[1].children[0].children[2].children[0].children[0].value.length;
thisis[actT.x].children[1].children[0].children[2].children[0].children[0].focus();
var descript = new XMLHttpRequest();
descript.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+thisis[actT.x].nameit+'/APP_core/descript.txt?t='+new Date().getTime(), true);
	descript.onreadystatechange = function() {
		if (descript.readyState==4) {
			thisis[actT.x].descript.setValue(descript.responseText, -1);
			var notes = new XMLHttpRequest();
	notes.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+thisis[actT.x].nameit+'/APP_core/notes.txt?t='+new Date().getTime(), true);
	notes.onreadystatechange = function() {
		if (notes.readyState==4) {
			thisis[actT.x].notes.setValue(notes.responseText, -1);
		};
	};
	notes.send();
		};
	};
	descript.send();
                        thisis[actT.x].filemgr(nameit0);
                        thisis[actT.x].editor.renderer.scroller.style.right=0;
						thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
				
		};
	};			
	ajax4.send();
				
		};
	};			
	ajax3.send(sendit);
}
thisis[actT.x].build = function(name){
MainTools.Notify('Building......', 'icons/DevCenter.png');
var rename = new XMLHttpRequest();
        var nameit = name;
        var sendit2 = 'path=../FileNet/HDD/Applications/temp/&old='+encodeURIComponent(nameit+'/')+'&new='+encodeURIComponent('../FileNet/HDD/Applications/'+nameit+'.blu');
        //var sendit2 = 'old=../FileNet/HDD/Applications/temp/APP2&new=../FileNet/HDD/Applications/temp/APP';
	rename.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/build.php', true);
        rename.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	rename.onreadystatechange = function() {
	if (rename.readyState==4) {
        MainTools.Notify('Done', 'icons/DevCenter.png');
        window.thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+nameit;
	};
	};
rename.send(sendit2);
}
thisis[actT.x].prename = function()
{
	MainTools.popup(['App Name'], ['text']);
        thisis[actT.x].form = function(a) {
               thisis[actT.x].rename(a[0]);
        };
};
thisis[actT.x].popen = function(){
        MainTools.popup(['Open'], ['text']);
        thisis[actT.x].form = function(a) {
               thisis[actT.x].open(a[0]);
        };
};
thisis[actT.x].rename = function(name){
var rename = new XMLHttpRequest();
        var nameit = '../FileNet/HDD/Applications/temp/'+name;
        var sendit2 = 'old='+encodeURIComponent(thisis[actT.x].old)+'&new='+encodeURIComponent(nameit);
        //var sendit2 = 'old=../FileNet/HDD/Applications/temp/APP2&new=../FileNet/HDD/Applications/temp/APP';
	rename.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/rename.php', true);
        rename.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	rename.onreadystatechange = function() {
	if (rename.readyState==4) {
        thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;	
        thisis[actT.x].build(name);
        thisis[actT.x].open(name);
        
	};
	};
rename.send(sendit2);
}
save = function (callback) {

        MainTools.Notify('Saving...', 'icons/DevCenter.png');
	var ajax4 = new XMLHttpRequest();
	if(thisis[actT.x].active == "editor")
	{
		var sendit = 'filedir=../FileNet/HDD/Applications/temp/'+thisis[actT.x].nameit+(thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1])+'/'+thisis[actT.x].nameitf+'&filed='+encodeURIComponent(thisis[actT.x].editor.getValue())+'&uname=<? echo $user; ?>';
	} else
	{
		var sendit = 'filedir=../FileNet/HDD/Applications/temp/'+thisis[actT.x].old.split("/")[thisis[actT.x].old.split("/").length-1]+'/APP_core/'+thisis[actT.x].active+'.txt'+'&filed='+encodeURIComponent(thisis[actT.x][thisis[actT.x].active].getValue())+'&uname=<? echo $user; ?>';
	}
	ajax4.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/update.php', true);
	//Send the proper header information along with the request
	ajax4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ajax4.setRequestHeader("Content-length", sendit.length);
	//ajax4.setRequestHeader("Connection", "close");
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
				MainTools.Notify(ajax4.responseText, 'icons/DevCenter.png');
				if(callback)
				{
					callback();
				}
		};
	};			
	ajax4.send(sendit);
};
thisis[actT.x].back = function(gotoit) {
var goto2 = new XMLHttpRequest();
	if(gotoit.substring(0, 33) != "../FileNet/HDD/Applications/temp/" || gotoit == "../FileNet/HDD/Applications/temp/"){
	//sendit = 'goto=../FileNet/HDD/Aplications/temp/'+gotoit.substring(thisis[actT.x].response.files[i].indexOf("/") + 1);
	return false;
	} else {
	sendit = 'goto='+gotoit.substring(0, gotoit.length-1);
	}
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[0].children[1].children[2].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[2].children[0].removeChild(window.actT.children[1].children[0].children[1].children[2].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;"><img src="<? echo $Ifolder; ?>"/><a oncontextmenu="thisis[actT.x].Rclick(null, this.parentNode);" onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);">'+thisis[actT.x].response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			if(thisis[actT.x].response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;"><img src="<? echo $Ifile; ?>"/><a oncontextmenu="thisis[actT.x].Rclick(null, this.parentNode);"; onclick="thisis[actT.x].view(this.innerHTML, (thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1]));">'+thisis[actT.x].response.files[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
                }
		};
		}
		thisis[actT.x].editor.renderer.scroller.style.right=0;
		thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
				
	};
	};
goto2.send(sendit);
};
thisis[actT.x].goto = function(gotoit, name){
	for(var t=0; t < thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children; t++)
	{
		thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].className = 'DevCenternotclicked';
		if(thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].children[1].innerHTML == name)
		{
			thisis[actT.x].children[1].children[0].children[1].children[2].children[0].children[t].children[0].className = 'DevCenterclicked';
		}
	}
var goto2 = new XMLHttpRequest();
thisis[actT.x].gotoit=gotoit;
	if(gotoit.substring(0, 33) != "../FileNet/HDD/Applications/temp/"){
	sendit = 'goto=../FileNet/HDD/Aplications/temp/'+gotoit;
	} else {
	sendit = 'goto='+gotoit;
	}
	thisis[actT.x].tempsend = sendit;
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[0].children[1].children[2].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[2].children[0].removeChild(window.actT.children[1].children[0].children[1].children[2].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifolder; ?>"/><a onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);">'+thisis[actT.x].response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			if(thisis[actT.x].response.files[i] != "index.php"){
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifile; ?>"/><a oncontextmenu="thisis[actT.x].Rclick(null, this.parentNode);"; onclick="thisis[actT.x].view(this.innerHTML, (thisis[actT.x].nameit+thisis[actT.x].response.location.split(thisis[actT.x].nameit)[1]));">'+thisis[actT.x].response.files[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
            }
		};
		}
		thisis[actT.x].editor.renderer.scroller.style.right=0;
		thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
				
	};
	};
goto2.send(sendit);
var ajax4 = new XMLHttpRequest();
if(gotoit.substring(0, 33) != "../FileNet/HDD/Applications/temp/"){
	sendit = 'goto=../FileNet/HDD/Aplications/temp/'+gotoit;
	} else {
	sendit = 'goto='+gotoit;
	}
ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+thisis[actT.x].nameit+'/APP_core/descript.txt', true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
			thisis[actT.x].descript.setValue(ajax4.responseText, -1);
		};
	};
	ajax4.send();
	var ajax5 = new XMLHttpRequest();
	ajax5.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+thisis[actT.x].nameit+'/APP_core/notes.txt', true);
	ajax5.onreadystatechange = function() {
		if (ajax5.readyState==4) {
			thisis[actT.x].notes.setValue(ajax5.responseText, -1);
		};
	};
	ajax5.send();
};

var ajax = new XMLHttpRequest();
	ajax.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/main.php?userN=<? echo $user; ?>', true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState==4) {
			//thisis[actT.x].children[1].children[0].innerHTML = ajax.responseText;
			/*var ajax2 = new XMLHttpRequest();
	ajax2.open('GET', 'ace-builds-master/src-min-noconflict/ace.js', true);
	ajax2.onreadystatechange = function() {
		if (ajax2.readyState==4) {
			//eval(ajax2.responseText);
                            //var ace = require("../../../../test/editor/ace-master/lib/ace");
                            thisis[actT.x].editor = ace.edit("editor");
    thisis[actT.x].editor.setTheme("ace/theme/ambiance");
    thisis[actT.x].editor.getSession().setMode("ace/mode/javascript");
                        thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value = 'APP';
			//MainTools.mscroll(thisis[actT.x].children[1].children[0].children[2].children[0]);
			//MainTools.scrollV(thisis[actT.x].children[1].children[0].children[2], thisis[actT.x], thisis[actT.x].children[1].children[0].children[2].children[0].children[0]);
				
		};
	};			
	ajax2.send();*/
			var ajax3 = new XMLHttpRequest();
	ajax3.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/include/index.txt', true);
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
			thisis[actT.x].editor = ace.edit("editor");
			thisis[actT.x].notes = ace.edit("notes");
			thisis[actT.x].notes.on("focus", function(){
	thisis[actT.x].active = document.activeElement.parentNode.id;
});
			thisis[actT.x].descript = ace.edit("descript");
			thisis[actT.x].descript.on("focus", function(){
	thisis[actT.x].active = document.activeElement.parentNode.id;
});
thisis[actT.x].editor.setTheme("ace/theme/ambiance");
thisis[actT.x].editor.getSession().setMode("ace/mode/javascript");
thisis[actT.x].editor.setShowPrintMargin(false);
thisis[actT.x].editor.renderer.scroller.style.right=0;
thisis[actT.x].editor.renderer.scrollBar.element.style['overflow-y'] = 'hidden';
thisis[actT.x].editor.on("focus", function(){
	thisis[actT.x].active = document.activeElement.parentNode.id;
});
console.log('1')
MainTools.scrollV(thisis[actT.x].editor.renderer.scrollBar.element.parentNode, thisis[actT.x].editor.renderer.scrollBar.element.children[0], thisis[actT.x].editor.renderer.scrollBar.element);
console.log('2')
			thisis[actT.x].editor.setValue(ajax3.responseText, -1);
			console.log('3')
                        //thisis[actT.x].children[1].children[0].children[2].children[0].children[0].focus();
                        console.log('4')
                        thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";
                        console.log('5')
                        //thisis[actT.x].editor.renderer.scrollbar.element.style['background-image'] = 'url("data:image/png;base64,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")';
                        //thisis[actT.x].editor.renderer.scrollbar.element.style['background-color'] = '#202020';
                        for(var i=0; i < thisis[actT.x].querySelector('#leftsidebar').querySelectorAll('.label').length; i++)
                        {
                        	thisis[actT.x].querySelector('#leftsidebar').querySelectorAll('.label')[i].style.marginLeft = -(thisis[actT.x].querySelector('#leftsidebar').querySelectorAll('.label')[i].clientWidth/2) +"px";
                        }
                        thisis[actT.x].open('APP')
/*var goto = new XMLHttpRequest();
        var sendit3 = 'goto=../FileNet/HDD/Applications/temp/APP';
	goto.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php', true);
        goto.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	goto.onreadystatechange = function() {
	if (goto.readyState==4) {
	thisis[actT.x].testit=function(objectit){
	};
		window.response = JSON.parse(goto.responseText);

                if (response.dirs){
		for(var i=0; i < response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifolder; ?>"/><a onclick="thisis[actT.x].goto(this.innerHTML, this.innerHTML);">'+response.dirs[i]+'</a></td>';
			console.log('6')
			thisis[actT.x].children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
			console.log('7')
		};
                }
		for(var i=0; i < response.files.length; i++)
		{
			if(response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			if(response.files[i] == 'index.txt')
			{
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenterclicked"><img src="<? echo $Ifile; ?>"/><a oncontextmenu="thisis[actT.x].Rclick(null, this.parentNode); return false;"; onclick="thisis[actT.x].view(this.innerHTML, \'APP\', this.innerHTML);">'+response.files[i]+'</a></td>';
			} else {
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><img src="<? echo $Ifile; ?>"/><a oncontextmenu="thisis[actT.x].Rclick(null, this.parentNode); return false;"; onclick="thisis[actT.x].view(this.innerHTML, \'APP\', this.innerHTML);">'+response.files[i]+'</a></td>';
			}
			window.actT.children[1].children[0].children[1].children[2].children[0].appendChild(newtr);
                }
		};
		thisis[actT.x].editor.renderer.scroller.style.right=0;
		thisis[actT.x].editor.renderer.scroller.children[0].style.width = "100%";

		var ajax4 = new XMLHttpRequest();
ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/include/APP_core/descript.txt', true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
			thisis[actT.x].descript.setValue(ajax4.responseText, -1);
		};
	};
	ajax4.send();
	var ajax5 = new XMLHttpRequest();
	ajax5.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/include/APP_core/notes.txt', true);
	ajax5.onreadystatechange = function() {
		if (ajax5.readyState==4) {
			thisis[actT.x].notes.setValue(ajax5.responseText, -1);
		};
	};
	ajax5.send();		
	};
	};
goto.send(sendit3);*/
				
		};
	};			
	ajax3.send();			
		};
	};			
	ajax.send();
thisis[actT.x].nameitf = 'index.txt';
/*window.mousedownN = function(node, e){
     if(!e){ e=window.event; };
     document.onmousemove = function(e){
     	document.getElementsByClassName(node.parentNode.id)[0].style.width = e.pageX-node.parentNode.offsetLeft-150+'px';
     	}
node.onmouseup = function(){
     document.onmousemove = null;
};
};*/
</script>
<style type='text/css'>
#leftsidebar .smallicons div.label {
    position: absolute;
    height: 20px;
    background: hsla(0, 100%,0%, 0.4);
    border-radius: 50px;
    top: -30px;
    color: white;
    padding-left: 5px;
    padding-right: 5px;
    left: 50%;
    text-shadow: 0 2px 3px black;
    opacity: 0;
    -webkit-transition: linear 0.1s all;
    white-space: nowrap;
}
#leftsidebar .smallicons div.label:after {
    position: absolute;
    content: "";
    width: 0;
    height: 0;
    border: 5px solid transparent;
    border-top-color:  hsla(0, 100%,0%, 0.4);
    bottom: -10px;
    left: 50%;
    margin-left: -5px;
}
#leftsidebar .smallicons:hover div{
    opacity: 1;
}
.DevCenternotclicked {
	text-align:left;
}
.DevCenterclicked:after {
content: "";
display: inline-block;
position: absolute;
border: 6px solid black;
border-color: transparent #3A3A3A transparent transparent;
left: 0px;
width: 139px;
margin-top: 4px;
}
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        font-family:monospace;
    }
.topbarfont{
        font-size:13px;
}
#topbarcenter{
        position: absolute;
        float: right;
        right: 20px;
        top: 10px;
}
.topbaricons{
	width:40px;
	height:40px;
        float:left;
	}
.smallicons{
	width:30px;
	height:30px;
	float: left;
	padding: 3px;
	position: absolute;
bottom: 0;
display: inline-block;
background-size: 100% 100%;
position: relative;
float: left;
whitespace: nowrap;
	}

html, body {
    height: 100%;
    width:100%;
}


.base03{
    color: #002b36;
}
.base02 {
    color: #073642;
}
.base01, .base01 * {
    color: #586e75 !important;
}
.base00 {
    color: #657b83;
}
.base0 {
    color: #839496;
}
.base1 {
    color: #93a1a1;
}
.base2 { 
    color: #eee8d5;
}
.base3 {
    color: #fdf6e3;
}
.yellow {
    color: #b58900;
}
.orange {
    color: #cb4b16;
}
.red {
    color: #dc322f;
}
.magenta {
    color: #d33682;
}
.violet {
    color: #6c71c4;
}
.blue {
    color: #268bd2;
}
.cyan, .cyan * {
    color: #2aa198;
}
.green {
    color: #859900;
}
#leftfilemgr tr {
	height: 25px;
border: none;
border-spacing: 0;
padding: 0;
margin: 0;
}
#leftfilemgr tr td {
	height: 25px;
border: none;
border-spacing: 0;
padding: 0;
margin: 0;
text-align: left;
}
#leftfilemgr tr td img {
	position: relative;
height: 25px;
float: left;
}
#leftfilemgr tr td a {
	height: 25px;
position: relative;
float: right;
margin-right: 10px;
line-height: 25px;
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
  </style>
<div style="position: absolute;top: 0px;overflow: hidden;bottom: 0px;right: 0px;left: 0px;width: auto;">
<div id="topbar" style="left:0px; top: 0px; position:relative; height:70px; width:100%; background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);">
<div id="topbarleft" style="float:left; position:relative; height:70px; background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);">
	<div class="topbaricons">
              <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/save.png" onclick="save();"/>
              <br>
              <font class="topbarfont">Save</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/open.png" onclick="thisis[actT.x].popen();">
              <br>
              <font class="topbarfont">Open</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/help.png" onclick="help();"/>
              <br>
              <font class="topbarfont">Help</font>
              </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/gear.png" onclick="thisis[actT.x].build(thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value);"/>
              <br>
              <font class="topbarfont">Build</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/debug.png" onclick="thisis[actT.x].debug(thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value);"/>
              <br>
              <font class="topbarfont">Debug</font>
        </div>
</div>
<div id="topbarcenter">
	<center>
	<form action="javascript:thisis[actT.x].rename(thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value);" style="top: 10px;">
	Appname:<input type="text" name="AppName" id="AppName">
	</form>
	</center>
</div>
</div>
<div id="content" style="position: absolute;top: 70px;width: 150px;bottom: 0px;background:grey;">
	<div id="leftsidebar" style="relative; float:left; width:200px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);">
		<div id="topsidebar" style="position:relative;left:0px;float:left;white-space:nowrap;">
			<div class="smallicons">
				<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/Folderview.png" onclick="for(var i=2; i < thisis[actT.x].children[1].children[0].children[1].children.length; i++){thisis[actT.x].children[1].children[0].children[1].children[i].style.display='none';};thisis[actT.x].children[1].children[0].children[1].children[2].style.display='block';">
				<div class="label" style="margin-left:0px;">File List</div>
			</div>
			<div class="smallicons">
				<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/Function.png" onclick="for(var i=2; i < thisis[actT.x].children[1].children[0].children[1].children.length; i++){thisis[actT.x].children[1].children[0].children[1].children[i].style.display='none';};thisis[actT.x].children[1].children[0].children[1].children[3].style.display='block';">
				<div class="label" style="margin-left:0px;">Functions</div>
			</div>
			<div class="smallicons">
				<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/Notes.png" onclick="for(var i=2; i < thisis[actT.x].children[1].children[0].children[1].children.length; i++){thisis[actT.x].children[1].children[0].children[1].children[i].style.display='none';};thisis[actT.x].children[1].children[0].children[1].children[4].style.display='block';">
				<div class="label" style="margin-left:0px;">Notes</div>
			</div>
			<div class="smallicons">
				<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/Description.png" onclick="for(var i=2; i < thisis[actT.x].children[1].children[0].children[1].children.length; i++){thisis[actT.x].children[1].children[0].children[1].children[i].style.display='none';};thisis[actT.x].children[1].children[0].children[1].children[5].style.display='block';">
				<div class="label" style="margin-left:0px;">Description</div>
			</div>
		</div>
	</div>
	<div id="topbar-back" style="display: block;width: 100%;height: 20px;position: relative;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(160,160,160,1)), color-stop(100%,rgba(63,63,63,1)));background: -moz-linear-gradient(top, rgba(160,160,160,1) 0%, rgba(63,63,63,1) 100%);float: left;">
		<div onclick="thisis[actT.x].back(thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length-1]))[0].substring(0, thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length]))[0].length-1));"style="position: relative;top: 3px;left: 5px;bottom: 3px;width: 40px;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQ1NDg0ZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);border-radius: 10px;color: white;line-height: 14px;font-size: 14px;padding: 0px 5px 0px 5px;margin: 0 auto;text-align: center;">Back</div>
	</div>
                <table id="leftfilemgr" align="left" style="position:relative;top:0px;width:150px;height:auto;">
                <tbody  style="position:relative;overflow:hidden;height:auto;width:100%;top:100px;">
                </tbody>
                </table>
                <div style="display:none;position: absolute;top: 35px;left: 0px;bottom: 0px;right: 0px;background-color: white;">
                </div>
                <div style="display:none;position: absolute;top: 35px;left: 0px;bottom: 0px;right: 0px;background-color: white;">
                	<div id="notes" style="position: absolute;top: 0;right: 0;bottom: 0;left: 0;font-family:monospace;"></div>
                </div>
                <div style="display:none;position: absolute;top: 35px;left: 0px;bottom: 0px;right: 0px;background-color: white;">
                	<div id="descript" style="position: absolute;top: 0;right: 0;bottom: 0;left: 0;font-family:monospace;"></div>
                </div>
	</div>
<div id="divTop" style="position:absolute; top:70px; overflow:auto; overflow-x:hidden; overflow-y:hidden; bottom: 0px; left: 150px;right:0px;">
<div id="editor"></div>
</div>
</div>
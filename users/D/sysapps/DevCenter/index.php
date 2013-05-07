<?
$user = $_GET['userN'];
mkdir('../FileNet/HDD/Applications/temp/'.APP.'');
copy('include/index.php', '../FileNet/HDD/Applications/temp/APP/index.php');
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
}
thisis[actT.x].menu = function() {
window.bar(0);
var menu = document.getElementById('menu0');
menu.innerHTML = '';
menu.innerHTML = '<li onclick="clickt(this);"><a>DevCenter</a></li><ul style="top:11px;"><li><a>temp</a></li></ul><li onclick="clickt(this);"><a>File</a></li><ul style="top:11px;"><li><a onclick="clickt(clicked);thisis[actT.x].popen();">open</a></li><li><a onclick="clict(clicked);save();">save</a></li><li><a onclick="clickt(clicked);thisis[actT.x].pnewfile();">new file</a></li></ul><li onclick="clickt(this);"><a>Edit</a></li>';
};
thisis[actT.x].menu();
thisis[actT.x].old = '<? echo $old; ?>';
thisis[actT.x].nameitf = 'APP';
thisis[actT.x].delete = function (name) {
var nameitf = name;
var newed = new XMLHttpRequest();
        newed.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/deletefile.php?nameit='+thisis[actT.x].nameit+'&nameitf='+nameitf, true);
        newed.onreadystatechange = function() {
        if(newed.readyState==4) {
                thisis[actT.x].filemgr(thisis[actT.x].nameit);
                //document.body.removeChild(document.getElementById('popupdev'));
        }
        }
        newed.send();
}
thisis[actT.x].Rclick = function (details) {
        thisis[actT.x].det = details;
	var div = document.createElement('div');
	 div.ul = document.createElement('ul');
         div.values = ['open', 'delete', 'new file'];
         div.funcs = [function(){thisis[actT.x].view(thisis[actT.x].det, thisis[actT.x].nameit);}, function(){thisis[actT.x].delete(details);}, function(){thisis[actT.x].pnewfile();}];
         div.ul.li = [];
         div.ul.a = [];
         thisis[actT.x].children[1].appendChild(div);
         div.appendChild(div.ul);
         for (var i=0; i < div.values.length; i++) {
         div.ul.li[i] = document.createElement('li');
         div.ul.li[i].style.display = 'block';
         if(i == 0) {
         div.ul.li[i].style.cssText += 'border-top-right-radius:6px;';
         div.ul.li[i].style.cssText += 'border-top-left-radius:6px;';
         };
         if(i == (div.values.length-1)) {
         div.ul.li[i].style.cssText += 'border-bottom-right-radius:6px;';
         div.ul.li[i].style.cssText += 'border-bottom-left-radius:6px;';
         };
         div.ul.li[i].onmouseover = function(){this.style.background = 'blue';};
         div.ul.li[i].onmouseout = function(){this.style.background = 'transparent';};
         div.ul.a[i] = document.createElement('a');

         div.ul.a[i].onclick= div.funcs[i];
         div.ul.a[i].innerHTML = div.values[i];
         div.ul.a[i].style.cssText = 'padding-left:4px;padding-right:4px;';
         div.ul.appendChild(div.ul.li[i]);
         div.ul.li[i].appendChild(div.ul.a[i]);
         }
	div.style.cssText = 'display:block;z-index:3647;top:0;left:0;position:fixed;border-color:gray;border:0.5pxsolid;width:auto;height:auto;background:white;opacity:.8;border-radius:10px;';
         div.ul.style.cssText = 'display: block;margin: 0;padding: 0;position: relative;top: 0px;width: auto;left: 0;list-style: none;';
         div.style.top = window.event.pageY-5+'px';
         div.style.left = window.event.pageX-5+'px';
        var offsetY2 = (div.offsetTop+div.clientHeight);
        var offsetY1 = div.offsetTop;
        var offsetX2 = (div.offsetLeft+div.clientWidth);
        var offsetX1 = div.offsetLeft;
         div.onmouseout = function(e) {
               if (offsetY1 > e.pageY || offsetY2 < e.pageY || offsetX1 > e.pageX || offsetX2 < e.pageX) {
                          thisis[actT.x].children[1].removeChild(div);
               }
         }

}
thisis[actT.x].newfile = function (name) {
var newed = new XMLHttpRequest();
        newed.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/newfile.php?nameit='+thisis[actT.x].nameit+'&name='+name, true);
        newed.onreadystatechange = function() {
        if(newed.readyState==4) {
                thisis[actT.x].filemgr(thisis[actT.x].nameit);
        }
        }
        newed.send();
}
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
	goto.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php', true);
        goto.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	goto.onreadystatechange = function() {
	if (goto.readyState==4) {
	thisis[actT.x].testit=function(objectit){
	};
		window.response = JSON.parse(goto.responseText);

                var k = window.actT.children[1].children[0].children[1].children[1].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[1].children[0].removeChild(window.actT.children[1].children[0].children[1].children[1].children[0].children[0]);
		}

                if (response.dirs){
		for(var i=0; i < response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a onclick="thisis[actT.x].goto(this.innerHTML);">'+response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[1].children[0].appendChild(newtr);
		};
                }
		for(var i=0; i < response.files.length; i++)
		{
			if(response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			if(response.files[i] == 'index.txt'){
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenterclicked"><a oncontextmenu="thisis[actT.x].Rclick(this.innerHTML); return false;"; onclick="thisis[actT.x].view(this.innerHTML, thisis[actT.x].nameit);">'+response.files[i]+'</a></td>';
			} else {
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a oncontextmenu="thisis[actT.x].Rclick(this.innerHTML); return false;"; onclick="thisis[actT.x].view(this.innerHTML, thisis[actT.x].nameit);">'+response.files[i]+'</a></td>';
			}
			window.actT.children[1].children[0].children[1].children[1].children[0].appendChild(newtr);
                }
		};
1		//MainTools.mscroll(thisis[actT.x].children[1].children[0].children[1].children[1]);
			MainTools.scrollV(thisis[actT.x].children[1].children[0].children[1].children[1], thisis[actT.x], thisis[actT.x].children[1].children[0].children[1].children[1].children[0]);
				
	};
	};
goto.send(sendit3);
}
thisis[actT.x].view = function(name, nameit) {
	var name = name;
	for(var t=0; t < thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children.length; t++)
	{
		if(thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].children[0].innerHTML == name)
		{
			thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].className = 'DevCenterclicked';
		} else {
			thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].className = 'DevCenternotclicked';
		}
	}
thisis[actT.x].nameitf = name;
        var ajax4 = new XMLHttpRequest();
	//ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/'+nameit+'/'+name, true);
	ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?nameit='+nameit+'&name='+name, true);
	//ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?name='+nameit+'&nameit='+name, true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
                        //window.result5 = ajax4;
			thisis[actT.x].editor.setValue(ajax4.responseText);
		};
	};			
	ajax4.send();

}
thisis[actT.x].debug = function(name) {
save(function(){
thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
var temp=SimpleWin.create(name, name, "users/"+core.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+core.user+"");
temp.onclose = function() {
//thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
//thisis[actT.x] = actT;
return true;
}
});
}
thisis[actT.x].open = function(name) {
        thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value = name;
        thisis[actT.x].nameit = name;
        var nameit0 = name;
        var nameit = name+'.blu';
        var sendit = 'name='+nameit;
        var ajax3 = new XMLHttpRequest();
	ajax3.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/open.php', true);
        ajax3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
                        window.thisis[actT.x].old = '../FileNet/HDD/Applications/temp/'+name;
                        var ajax4 = new XMLHttpRequest();
	ajax4.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/pastephp.php?nameit='+nameit0+'&name=index.txt', true);
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
			thisis[actT.x].editor.setValue(ajax4.responseText);
thisis[actT.x].children[1].children[0].children[2].children[0].children[0].selectionStart = thisis[actT.x].children[1].children[0].children[2].children[0].children[0].selectionEnd = thisis[actT.x].children[1].children[0].children[2].children[0].children[0].value.length;
thisis[actT.x].children[1].children[0].children[2].children[0].children[0].focus();
                        thisis[actT.x].filemgr(nameit0);
				
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
	};
	};
rename.send(sendit2);
}
save = function (callback) {
        MainTools.Notify('Saving...', 'icons/DevCenter.png');
	var ajax4 = new XMLHttpRequest();
	var sendit = 'filedir=../FileNet/HDD/Applications/temp/'+thisis[actT.x].old.split("/")[thisis[actT.x].old.split("/").length-1]+'/'+thisis[actT.x].nameitf+'&filed='+encodeURIComponent(thisis[actT.x].editor.getValue())+'&uname=<? echo $user; ?>';
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
	if(gotoit.substring(0, 33) != "../FileNet/HDD/Applications/temp/"){
	sendit = 'goto=../FileNet/HDD/Aplications/temp/'+gotoit.substring(thisis[actT.x].response.files[i].indexOf("/") + 1);
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
		var k = window.actT.children[1].children[0].children[1].children[0].children[2].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].removeChild(window.actT.children[1].children[0].children[1].children[0].children[2].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;"><a oncontextmenu="thisis[actT.x].Rclick();"; onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);">'+thisis[actT.x].response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			if(response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;"><a oncontextmenu="thisis[actT.x].Rclick();"; onclick="thisis[actT.x].goto((this.innerHTML+thisis[actT.x].response.location), this.innerHTML);">'+thisis[actT.x].response.files[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].appendChild(newtr);
                }
		};
		}
		MainTools.scrollV(thisis[actT.x].children[1].children[0].children[1].children[0].children[2], thisis[actT.x], thisis[actT.x].children[1].children[0].children[1].children[0].children[2].children[0]);
				
	};
	};
goto2.send(sendit);
};
thisis[actT.x].goto = function(gotoit, name){
	for(var t=0; t < thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children; t++)
	{
		thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].className = 'DevCenternotclicked';
		if(thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].children[0].innerHTML == name)
		{
			thisis[actT.x].children[1].children[0].children[1].children[1].children[0].children[t].children[0].className = 'DevCenterclicked';
		}
	}
var goto2 = new XMLHttpRequest();
thisis[actT.x].gotoit=gotoit;
	if(gotoit.substring(0, 33) != "../FileNet/HDD/Applications/temp/"){
	sendit = 'goto=../FileNet/HDD/Aplications/temp/'+gotoit;
	} else {
	sendit = 'goto='+gotoit;
	}
	goto2.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/goto.php', true);
	goto2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//goto2.setRequestHeader("Content-length", sendit.length);
	goto2.onreadystatechange = function() {
	if (goto2.readyState==4) {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[0].children[1].children[0].children[2].children[0].children.length;
		for(var i=0; i < k; i++)
		{
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].removeChild(window.actT.children[1].children[0].children[1].children[0].children[2].children[0].children[0]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.innerHTML), this.innerHTML);">'+thisis[actT.x].response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].appendChild(newtr);
		};
		}
		if(thisis[actT.x].response.files){
		for(var i=0; i < thisis[actT.x].response.files.length; i++)
		{
			if(response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a oncontextmenu="thisis[actT.x].Rclick();"; onclick="thisis[actT.x].goto((this.innerHTML+thisis[actT.x].response.location), this.innerHTML);">'+thisis[actT.x].response.files[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[0].children[2].children[0].appendChild(newtr);
                }
		};
		}
		MainTools.scrollV(thisis[actT.x].children[1].children[0].children[1].children[0].children[2], thisis[actT.x], thisis[actT.x].children[1].children[0].children[1].children[0].children[2].children[0]);
				
	};
	};
goto2.send(sendit);
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
thisis[actT.x].children[1].children[0].children[0].children[1].children[0].children[0].children[0].value = 'APP';
			var ajax3 = new XMLHttpRequest();
	ajax3.open('GET', 'users/<? echo $user; ?>/sysapps/DevCenter/include/index.txt', true);
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
			thisis[actT.x].editor = ace.edit("editor");
thisis[actT.x].editor.setTheme("ace/theme/ambiance");
thisis[actT.x].editor.getSession().setMode("ace/mode/javascript");
thisis[actT.x].editor.setShowPrintMargin(false);
			thisis[actT.x].editor.setValue(ajax3.responseText);
                        thisis[actT.x].children[1].children[0].children[2].children[0].children[0].focus();
var goto = new XMLHttpRequest();
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
			newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a onclick="thisis[actT.x].goto(this.innerHTML, this.innerHTML);">'+response.dirs[i]+'</a></td>';
			window.actT.children[1].children[0].children[1].children[1].children[0].appendChild(newtr);
		};
                }
		for(var i=0; i < response.files.length; i++)
		{
			if(response.files[i] != 'index.php'){
			var newtr = document.createElement('tr');
			if(response.files[i] == 'index.txt')
			{
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenterclicked"><a oncontextmenu="thisis[actT.x].Rclick(); return false;"; onclick="thisis[actT.x].view(this.innerHTML, \'APP\', this.innerHTML);">'+response.files[i]+'</a></td>';
			} else {
				newtr.innerHTML = '<td style="text-align:left;" class="DevCenternotclicked"><a oncontextmenu="thisis[actT.x].Rclick(); return false;"; onclick="thisis[actT.x].view(this.innerHTML, \'APP\', this.innerHTML);">'+response.files[i]+'</a></td>';
			}
			window.actT.children[1].children[0].children[1].children[1].children[0].appendChild(newtr);
                }
		};
1		//MainTools.mscroll(thisis[actT.x].children[1].children[0].children[1].children[1]);
			MainTools.scrollV(thisis[actT.x].children[1].children[0].children[1].children[1], thisis[actT.x], thisis[actT.x].children[1].children[0].children[1].children[1].children[0]);
				
	};
	};
goto.send(sendit3);
				
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

  </style>
<div style="position: absolute;top: 0px;overflow: hidden;bottom: 0px;right: 0px;left: 0px;width: auto;">
<div id="topbar" style="left:0px; top: 0px; position:relative; height:100px; width:100%; background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);background: -moz-linear-gradient(top, rgba(184,186,185,1) 0%, rgba(140,140,138,1) 43%, rgba(59,58,58,1) 100%);">
<div id="topbarleft" style="float:left; position:relative; height:100px; background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);">
	<div class="topbaricons">
              <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/save.png" onclick="save();"/>
              <br>
              <font class="topbarfont">Save</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png" onclick="newproj();"/>
              <br>
              <font class="topbarfont">New Proj</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/open.png" onclick="thisis[actT.x].popen();">
              <br>
              <font class="topbarfont">Open</font>
        </div>
	<div class="topbaricons">
             <img class="topbaricons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png" onclick="upload();"/>
              <br>
              <font class="topbarfont">Upload</font>
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
<div id="content" style="position: absolute;top: 100px;width: 150px;bottom: 0px;background:grey;">
	<div id="leftsidebar" style="relative; float:left; width:200px;background:-webkit-linear-gradient(bottom, rgb(59,58,58) 25%, rgb(140,140,138) 63%, rgb(184,186,185) 82%);">
		<div id="topsidebar" style="position:relative;left:0px;float:left;">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/newfolder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/deletefile-folder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png">
		</div>
                <div id="topsidebar" style="position:relative;left:0px;float:left;">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/new.png" onclick="thisis[actT.x].pnewfile();"/>
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/newfolder.png">
			<img class="smallicons" src="users/<? echo $user; ?>/sysapps/DevCenter/images/deletefile-folder.png">
			<img class="smallicons" onclick="thisis[actT.x].back(thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length-1]))[0].substring(0, thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length]))[0].length-1));" src="users/<? echo $user; ?>/sysapps/DevCenter/images/upload.png"/>
		</div>
	</div>
                <table id="leftfilemgr" align="left" style="position:relative;top:0px;width:150px;height:auto;">
                <tbody  style="position:relative;overflow:hidden;height:auto;width:100%;top:100px;">
                </tbody>
                </table>
	</div>
<div id="divTop" style="position:absolute; top:100px; overflow:auto; overflow-x:hidden; overflow-y:hidden; bottom: 0px; left: 150px;right:0px;">
<div id="editor"></div>
</div>
</div>
<?
$user=$_GET['userN'];
//$filename="users/".$user."/sysapps/FileNet/HDD/Applications/file.txt";
//include("../../../../include/session.php");
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
	document.getElementById('menu0').innerHTML = '';
	window.bar(0);
};
window.updatecon = function(change) {
var wall = new XMLHttpRequest();
	wall.open('GET', 'users/'+core.user+'/sysapps/Preferences/uconf.php?user='+core.user+'&name=wallpaper&change='+change, true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		
		};
	};
wall.send();
};
window.setrangedockmax = function(node) {
    node.value = window.dock.max;
};
window.setrangedockmin = function(node) {
    node.value = window.dock.min;
};
window.thumbnail = function(tempim, imt, name, id, len) {
/*var tempim = tempim,
      imt = imt,
      c  = document.createElement( 'canvas' ),
      cx = c.getContext( '2d' ),
      thumbwidth = thumbheight = 90,
      crop = false,
      background = 'white',
      jpeg = false,
      quality = 1;*/
      
function loadImage(file, num) {
   var num = num;
   var file = file;
   if(name.split('.')[1] != 'svg') {
    var img = new Image();
    var test = new XMLHttpRequest();
    console.log(file);
	var sendit = 'file=../FileNet'+file;
		test.open('POST', 'users/'+core.user+'/sysapps/Preferences/images.php', true);
		test.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		test.onload = function() {
			var res = test.responseText;
			img.src = res;
			console.log(res);
				addtothumbslist2(res, name, num, len);
		}
		test.send(sendit);
    //img.src = file;
    /*img.onload = function() {
      grabformvalues();
      imagetocanvas( this, thumbwidth, thumbheight, crop, background, name, num );
    };*/
	} else {
		var res = 'users/'+core.user+'/sysapps/FileNet'+file;
		addtothumbslist2(res, name, num, len);
	}
  }
/*  function grabformvalues() {
    //thumbwidth  = document.querySelector( '#width' ).value;
    //thumbheight = document.querySelector( '#height' ).value;
    //crop = document.querySelector( '#crop' ).checked;
    //background = document.querySelector( '#bg' ).value;
    //jpeg  = document.querySelector( '#jpeg' ).checked,
    //quality = document.querySelector( '#quality ').value / 100;
  }
  function imagetocanvas( img, thumbwidth, thumbheight, crop, background, name ) {
    c.width = thumbwidth;
    c.height = thumbheight;
    var dimensions = resize( img.width, img.height, thumbwidth, thumbheight );
    if ( crop ) {
      c.width = dimensions.w;
      c.height = dimensions.h;
      dimensions.x = 0;
      dimensions.y = 0;
    }
    if ( background !== 'transparent' ) {
      cx.fillStyle = background;
      cx.fillRect ( 0, 0, thumbwidth, thumbheight );
    }
    cx.drawImage( 
      img, dimensions.x, dimensions.y, dimensions.w, dimensions.h 
    );
    addtothumbslist( jpeg, quality, name );
  };*/
  function addtothumbslist2( data, name, num, len ) {
  	if(data.substring(0,6) == "users/" || data.substring(0,11) == "data:image/") {
    var thumb = new Image();
        //url = jpeg ? c.toDataURL( 'image/jpeg' , quality ) : c.toDataURL();
    thumb.title = name;
    thumb.id = imt;
    thumb.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
    tempim.children[2].children[0].insertBefore( thumb, tempim.children[2].children[0].querySelector('.loader'));
    //thumb.onload = function() {
    	thumb.src = data;
    	console.log('num: '+num);
    	console.log('len: '+thisis[actT.x].len);
    //}
    console.log(thumb);
			//tempimg.onclick = function(){document.getElementById('thedesktop').src = this.src;};
			thumb.oncontextmenu = function(e){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
            	if(!e)
            	{
            		var e = window.event;
            	}
            	var div = document.createElement('div');
            	div.innerHTML = "<ul><li>Set as Background</li><li>Delete</li></ul>";
            	div.children[0].children[0].onclick = function(){
            		window.change = 'users/'+core.user+'/sysapps/FileNet'+e.target.id;
            		if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
            	};
            	div.children[0].children[1].onclick = function(){
            		alert(e.target.title);
            		var ajax = new XMLHttpRequest();
            		var sendit = "loc="+e.target.title;
            		ajax.open('POST', 'users/'+core.user+'/sysapps/Preferences/delete.php', false);
            		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            		ajax.onreadystatechange = function() {
            			if(ajax.readyState == 4)
            			{
            				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				};
            			};
            		};
            		ajax.send(sendit);
            	};
            	div.className = "wallpaperdrop";
            	div.style.width = 100+'px';
            	div.style.height = 26+'px';
            	div.style.background = 'rgba(0,0,0,0.7)';
            	div.style.position = 'absolute';
            	div.style.zIndex = 99999;
            	div.style.left = e.target.offsetLeft+'px';
            	div.style.top = e.target.offsetTop+e.target.clientHeight+'px';
            	div.style.borderRadius = 5+'px';
            	div.children[0].style.cssText = "display: block;padding: 0px;margin: 0px;text-align:center;"
            	div.children[0].children[0].style.cssText = div.children[0].children[1].style.cssText = "display: block;color: white;font-size: 11px;line-height: 10px;float: left;position: relative;top: 0px;left: 0px;padding: 2px 0 2px 0px;width:100%;"
            	thisis[actT.x].pobj.children[2].children[0].children[2].children[0].appendChild(div);
            	return false;
            };
			thumb.onclick = function(){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
				window.change = 'users/'+core.user+'/sysapps/FileNet'+this.id;
				if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
			};
  	}
  	if(num == (thisis[actT.x].len-1)) {
			tempim.children[2].children[0].removeChild(tempim.children[2].children[0].querySelector('.loader'));
    	}
  };
  function addtothumbslist( jpeg, quality, name, num, len ) {
    var thumb = new Image(),
        url = jpeg ? c.toDataURL( 'image/jpeg' , quality ) : c.toDataURL();
    thumb.src = url;
    thumb.title = name;
    thumb.id = imt;
    thumb.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
    tempim.children[2].children[0].insertBefore( thumb, tempim.children[2].children[0].querySelector('.loader') );
    if(num == (len-1)) {
		tempim.children[2].children[0].removeChild(tempim.children[2].children[0].querySelector('.loader'));
    }
			//tempimg.onclick = function(){document.getElementById('thedesktop').src = this.src;};
			thumb.oncontextmenu = function(e){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
            	if(!e)
            	{
            		var e = window.event;
            	}
            	var div = document.createElement('div');
            	div.innerHTML = "<ul><li>Set as Background</li><li>Delete</li></ul>";
            	div.children[0].children[0].onclick = function(){
            		window.change = e.target.id;
            		if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
            	};
            	div.children[0].children[1].onclick = function(){
            		alert(e.target.title);
            		var ajax = new XMLHttpRequest();
            		var sendit = "loc="+e.target.title;
            		ajax.open('POST', 'users/'+core.user+'/sysapps/Preferences/delete.php', false);
            		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            		ajax.onreadystatechange = function() {
            			if(ajax.readyState == 4)
            			{
            				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				};
            			};
            		};
            		ajax.send(sendit);
            	};
            	div.className = "wallpaperdrop";
            	div.style.width = 100+'px';
            	div.style.height = 26+'px';
            	div.style.background = 'rgba(0,0,0,0.7)';
            	div.style.position = 'absolute';
            	div.style.zIndex = 99999;
            	div.style.left = e.target.offsetLeft+'px';
            	div.style.top = e.target.offsetTop+e.target.clientHeight+'px';
            	div.style.borderRadius = 5+'px';
            	div.children[0].style.cssText = "display: block;padding: 0px;margin: 0px;text-align:center;"
            	div.children[0].children[0].style.cssText = div.children[0].children[1].style.cssText = "display: block;color: white;font-size: 11px;line-height: 10px;float: left;position: relative;top: 0px;left: 0px;padding: 2px 0 2px 0px;width:100%;"
            	thisis[actT.x].pobj.children[2].children[0].children[2].children[0].appendChild(div);
            	return false;
            };
			thumb.onclick = function(){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
				window.change = this.id;
				if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
			};
  };
function resize( imagewidth, imageheight, thumbwidth, thumbheight ) {
    var w = 0, h = 0, x = 0, y = 0,
        widthratio  = imagewidth / thumbwidth,
        heightratio = imageheight / thumbheight,
        maxratio    = Math.max( widthratio, heightratio );
    if ( maxratio > 1 ) {
        w = imagewidth / maxratio;
        h = imageheight / maxratio;
    } else {
        w = imagewidth;
        h = imageheight;
    }
    x = ( thumbwidth - w ) / 2;
    y = ( thumbheight - h ) / 2;
    return { w:w, h:h, x:x, y:y };
  };
loadImage(imt, id);
};
window.themeup = function(type, string) {
//var string = '  array (\n    0 => "default",\n    1 => "default",\n    2 => "check",\n    3 => "check",\n  ),';
var wall = new XMLHttpRequest();
if(type == 'windows'){
core.getstyle('default', string, 'window', 'check');
var string = 'default,'+string+',check,check';
} else if(type == 'taskbar') {
core.getstyle('default', string, 'taskbar', 'check');
var string = 'default,'+string+',check,script';
} else if(type == 'dock') {
core.getstyle('default', string, 'dock', 'check');
var string = 'default,'+string+',check,script';
};
	wall.open('GET', 'users/'+core.user+'/sysapps/Preferences/uconf.php?array=true&user='+core.user+'&name='+type+'&change='+encodeURIComponent(string), true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		};
	};
wall.send();
};
window.Themes = function() {
var div = thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0];
	var win = new XMLHttpRequest();
	win.open('GET', 'users/'+core.user+'/sysapps/Preferences/themes.php?user='+core.user+'&type=windows', true);
	win.onreadystatechange = function() {
		if (win.readyState==4) {
                var temp = JSON.parse(win.responseText);
                //alert(temp.dirs);
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[0].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].innerHTML+='<li style="display:block;"><a onclick="window.themeup(\'windows\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.windowtheme == temp.dirs[i]) {
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
win.send();
var div = thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0];
	var task = new XMLHttpRequest();
	task.open('GET', 'users/'+core.user+'/sysapps/Preferences/themes.php?user='+core.user+'&type=taskbars', true);
	task.onreadystatechange = function() {
		if (task.readyState==4) {
                var temp = JSON.parse(task.responseText);
                //alert(temp.dirs);
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[1].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].innerHTML+='<li  style="display:block;"><a onclick="window.themeup(\'taskbar\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.taskbartheme == temp.dirs[i]) {
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
task.send();
var div = thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0];
	var dock = new XMLHttpRequest();
	dock.open('GET', 'users/'+core.user+'/sysapps/Preferences/themes.php?user='+core.user+'&type=docks', true);
	dock.onreadystatechange = function() {
		if (dock.readyState==4) {
                var temp = JSON.parse(dock.responseText);
                //alert(temp.dirs);
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[2].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].innerHTML+='<li style="display:block;"><a onclick="window.themeup(\'dock\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.docktheme == temp.dirs[i]) {
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
thisis[actT.x].pobj.getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
dock.send();
};
window.loadwall = function(folder, obj, tempload) {
	obj.children[2].children[0].innerHTML = '';
	var wall = new XMLHttpRequest();
	wall.open('GET', 'users/'+core.user+'/sysapps/Preferences/getwall.php?user='+core.user+'&folder='+folder, true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		window.results = JSON.parse(wall.responseText);
		var thumb = document.createElement('img');
    thumb.className = 'img loader';
    thumb.src = 'http://bludotos.com/images/loader.gif';
    thumb.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
    obj.children[2].children[0].appendChild(thumb);
		for(var i=0; i < results.files.length; i++) {
			thisis[actT.x].num = i;
			thisis[actT.x].len = results.files.length;
                        //if(('users/'+core.user+'/sysapps/FileNet/'+folder+'/'+results.files[i]).split('.')[1] != 'svg') {
			window.thumbnail(obj, '/'+folder+'/'+results.files[i], results.files[i], i, results.files.length);
                        /*} else {
                        var tempimg = document.createElement('img');
                        tempimg.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
                        tempimg.title = results.files[i];
                        tempimg.src = 'users/'+core.user+'/sysapps/FileNet/'+folder+'/'+results.files[i];
                        obj.children[2].children[0].insertBefore( tempimg, obj.children[2].children[0].querySelector('.loader') );
			//tempimg.onclick = function(){document.getElementById('thedesktop').src = this.src;};
			tempimg.oncontextmenu = function(e){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
            	if(!e)
            	{
            		var e = window.event;
            	}
            	var div = document.createElement('div');
            	div.innerHTML = "<ul><li>Set as Background</li><li>Delete</li></ul>";
            	div.children[0].children[0].onclick = function(){
            		window.change = e.target.src;
            		if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
            	};
            	div.className = "wallpaperdrop";
            	div.children[0].children[1].onclick = function(){
            		alert(e.target.title);
            		var ajax = new XMLHttpRequest();
            		var sendit = "loc="+e.target.title;
            		ajax.open('POST', 'users/'+core.user+'/sysapps/Preferences/delete.php', false);
            		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            		ajax.onreadystatechange = function() {
            			if(ajax.readyState == 4)
            			{
            				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				};
            			};
            		};
            		ajax.send(sendit);
            	};
            	div.style.width = 100+'px';
            	div.style.height = 26+'px';
            	div.style.background = 'rgba(0,0,0,0.7)';
            	div.style.position = 'absolute';
            	div.style.zIndex = 99999;
            	div.style.left = e.target.offsetLeft+'px';
            	div.style.top = e.target.offsetTop+e.target.clientHeight+'px';
            	div.style.borderRadius = 5+'px';
            	div.children[0].style.cssText = "display: block;padding: 0px;margin: 0px;text-align:center;"
            	div.children[0].children[0].style.cssText = div.children[0].children[1].style.cssText = "display: block;color: white;font-size: 11px;line-height: 10px;float: left;position: relative;top: 0px;left: 0px;padding: 2px 0 2px 0px;width:100%;"
            	thisis[actT.x].pobj.children[2].children[0].children[2].children[0].appendChild(div);
            	return false;
            };
			tempimg.onclick = function(){
				if(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0])
				{
					thisis[actT.x].pobj.children[2].children[0].children[2].children[0].removeChild(thisis[actT.x].pobj.children[2].children[0].children[2].children[0].getElementsByTagName('div')[0]);
				}
				window.change = this.src;
				if(core.UI) {
	            		core.UI.Desktop.style.opacity = 0;
            			setTimeout(function() {
            				core.UI.Desktop.style.background = 'url(\''+change+'\') no-repeat center fixed';
            				core.UI.Desktop.style.backgroundSize = 'cover';
							core.UI.Desktop.style.opacity = 1;
							window.updatecon(change.split('FileNet/')[1]);
            			},500);
            			
            		} else {
            			document.getElementById('thedesktop').style.opacity = 0;
            			setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change.split('FileNet/')[1]);",500);
            		};
			};
                        };*/
			if(core.UI) {
				core.UI.Desktop.style['-webkit-transition'] = "opacity .5s linear";
				core.UI.Desktop.style.MozTransition = "opacity .5s linear";
			} else {
				document.getElementById('thedesktop').style['-webkit-transition'] = "opacity .5s linear";
				document.getElementById('thedesktop').style.MozTransition = "opacity .5s linear";
			}
		};
                //if(tempload) {
                //obj.children[1].removeChild(tempload);
                //}
                MainTools.scrollV(obj.children[2], document.getElementById('Preferences').children[1], obj.children[2].children[0]);
		};
	};
wall.send();
};
window.useredit = function () {
	var usered2 = new XMLHttpRequest();
	usered2.open('GET', 'useredit.php', true);
	usered2.onreadystatechange = function() {
		if (usered2.readyState==4) {
		thisis[actT.x].pobj.children[3].children[0].innerHTML = usered2.responseText;
		thisis[actT.x].pobj.getElementsByTagName('form')[0].onsubmit = function (){
					var usered = new XMLHttpRequest();
					var senditt = 'subedit='+this.subedit.value+'&curpass='+this.curpass.value+'&newpass='+this.newpass.value+'&email='+this.email.value;
					usered.open('POST', 'process.php', true);
					usered.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					usered.onreadystatechange = function() {
						if (usered.readyState==4) {
						thisis[actT.x].pobj.children[3].children[0].innerHTML = usered.responseText;
						};
					};
				usered.send(senditt);
				};
		};
	};
usered2.send();
};
window.saveit = function() {
var ajax4 = new XMLHttpRequest();
	var sendit = 'filedir=../FileNet/HDD/Applications/file.txt'+'&filed='+encodeURIComponent("test")+'&uname='+core.user+'';
	ajax4.open('POST', 'users/'+core.user+'/sysapps/DevCenter/update.php', true);
	//Send the proper header information along with the request
	ajax4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ajax4.setRequestHeader("Content-length", sendit.length);
	//ajax4.setRequestHeader("Connection", "close");
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
		alert(ajax4.responseText);
		};
	};			
	ajax4.send(sendit);
};

window.selectpic = function(val) {
        if(val == 'HDD/Wallpapers')
        {
            var folder = 'wallpaper';
        } else {
            var folder = val;
        }
        var setr = window.pobj.getElementsByTagName('div');
        window.temptr = setr;
        var tempi = setr[12].children[0].children[1].children[0].children.length;
        tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
        for(var i=0; i < tempi; i++) {
        setr[12].children[0].children[1].children[0].removeChild(setr[12].children[0].children[1].children[0].children[0]);
        }
        tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
                setr[12].children[0].children[1].appendChild(tempload);
	loadwall(folder, setr[12].children[0], tempload);
}

window.clickicon = function(obj, name) {
	if (name != 'Main') {
	var objc = obj.cloneNode(true);
	console.log('0');
	console.log(thisis[actT.x].pobj.innerHTML);
	thisis[actT.x].pobj.children[0].appendChild(objc);
	console.log('1');
	objc.style.top = 0+'px';
	objc.style.left = 50+'px';
	objc.style.width = 40+'px';
	objc.style.height = 40+'px';
	objc.style.padding = '5px 5px 5px 5px';
	objc.style.borderRadius= 13+'px';
	objc.style.position = 'absolute';
	var setr = thisis[actT.x].pobj.getElementsByTagName('div');
	for(var i=0; i < setr.length; i++) {
		if (setr[i].id == name) {
		setr[1].style.display = 'none';
		setr[i].style.display = 'block';
		window.tempsetr = setr[i];
		if (setr[i].id == 'Display') {
                tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
                setr[i].children[0].children[1].appendChild(tempload);
                console.log('2');
                var folder = 'wallpaper';
		loadwall(folder, setr[i].children[0], tempload);
		}
		}
	}
	} else if (name == 'Main') {
	var setr = thisis[actT.x].pobj.getElementsByTagName('div');
	var tope = thisis[actT.x].pobj.children[0].getElementsByTagName('img');
	for(var i=1; i < tope.length; i++) {
		thisis[actT.x].pobj.children[0].removeChild(tope[i]);
	}
	for(var i=0; i < setr.length; i++) {
		if (setr[i].id == name) {
		window.tempsetr.style.display = 'none';
		setr[i].style.display = 'block';
		}
	}
	}		
	
};
console.log('username:'+core.user);
var ajax = new XMLHttpRequest();
	ajax.open('GET', 'users/'+core.user+'/sysapps/Preferences/main.php?userN='+core.user+'', true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState==4) {
			document.getElementById('dhtmlwindowholder').lastChild.children[1].children[0].innerHTML = ajax.responseText;
			thisis[actT.x].pobj = document.getElementById('dhtmlwindowholder').lastChild.children[1].children[0];
			window.pobj = document.getElementById('dhtmlwindowholder').lastChild.children[1].children[0];
			//console.log(ajax.responseText);
			var ajax2 = new XMLHttpRequest();
	ajax2.open('GET', 'users/'+core.user+'/sysapps/Preferences/editor.js', true);
	ajax2.onreadystatechange = function() {
		if (ajax2.readyState==4) {
			eval(ajax2.responseText);
			//MainTools.mscroll(thisis[actT.x].pobj.children[2].children[0]);
			//MainTools.scrollV(thisis[actT.x].pobj.children[2], document.getElementById('Preferences'), thisis[actT.x].pobj.children[2].children[0].children[1]);				
		};
	};			
	ajax2.send();	
			var ajax3 = new XMLHttpRequest();
	ajax3.open('GET', '<? echo $filename; ?>', true);
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
			document.getElementById('dhtmlwindowholder').lastChild.children[1].children[0].children[2].children[0].children[1].value = ajax3.responseText;
				
		};
	};			
	ajax3.send();			
		};
	};			
	ajax.send();
save = function () {
	var ajax4 = new XMLHttpRequest();
	var sendit = 'filedir=../FileNet/HDD/Applications/file.txt'+'&filed='+encodeURIComponent(document.getElementById("Preferences").children[1].children[0].children[2].children[0].children[1].value)+'&uname='+core.user+'';
	ajax4.open('POST', 'users/'+core.user+'/sysapps/Preferences/update.php', true);
	//Send the proper header information along with the request
	ajax4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ajax4.setRequestHeader("Content-length", sendit.length);
	//ajax4.setRequestHeader("Connection", "close");
	ajax4.onreadystatechange = function() {
		if (ajax4.readyState==4) {
				
		};
	};			
	ajax4.send(sendit);
};
</script>
<style type='text/css'>
.wallpaperdrop li:hover {
	background: blue;
}
.topbaricons{
	width:30px;
	height:30px;
	}
.smallicons{
	width:30px;
	height:30px;
	float: left;
	padding: 3px;
	}
textarea,p,blockquote,th,td { 
    margin:0;
    padding:0;
}
table {
    border-collapse:collapse;
    border-spacing:0;
}
fieldset,img { 
    border:0;
}
address,caption,cite,code,dfn,em,strong,th,var {
    font-style:normal;
    font-weight:normal;
}
ol,ul {
    list-style:none;
}
caption,th {
    text-align:left;
}
h1,h2,h3,h4,h5,h6 {
    font-size:100%;
    font-weight:normal;
}
q:before,q:after {
    content:'';
}
abbr,acronym { border:0;}

    .numbered_textarea table {
    width: 100%;
    heigth: 100%;
    position: absolute;
    left: 0px;
    top: 0px;
    
}
tr.currentLine {
    background: #073642 !important;
}
.numbered_textarea table tr  td.lineNumber {
    min-width: 2.5em !important;
    max-width: 2.5em !important;
    width: 2.5em !important;
    vertical-align: top;
    overflow-y:hidden;
    font-family: monospace;
    border-right: 1px solid #aaa;
    text-align: left;
    color: #586e75;
    background: #073642;
}
.numbered_textarea table tr td.line {
    /* 268 */
    /*width: 268px !important;*/
    max-width: 500px !important;
    word-wrap:break-word;
    padding: 0;
    margin: 0;
    white-space: pre-wrap;
    overflow-y:hidden;
    overflow-x: hidden;
    color: #93a1a1;
    text-align: left;
}
.numbered_textarea {
    outline: 1px solid #aaa;
    letter-spacing: 0;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    background: #002b36;
}
.numbered_textarea textarea {
    border: 0px solid transparent;
    border-left: 1px solid #777;
    position: absolute;
    left: 2.5em;
    top: 0;
    width:-moz-calc(100% - 2.5em);
    height: 100%;
    bottom: 0;
    right: 0;
    background: rgba(255,255,255,0);
    -webkit-appearance: none;
    overflow-y: hidden;
    color: rgba(255,255,255,0.1);
    resize: none;
    outline: none;
}
.numbered_textarea * {
    font-family: monospace;
    font-size: 11pt;
    line-spacing: 0;
    overflow:hidden;
}
html, body {
    height: 100%;
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
</div>
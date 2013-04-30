<?
$user = $_GET['userN'];
//$filename="users/".$user."/sysapps/FileNet/HDD/Applications/file.txt";
include("../../../../include/session.php");
?>
<script>
window.updatecon = function(change) {
var wall = new XMLHttpRequest();
	wall.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/uconf.php?user=<? echo $user; ?>&name=wallpaper&change='+change, true);
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
window.thumbnail = function(tempim, imt) {
var tempim = tempim,
      imt = imt,
      c  = document.createElement( 'canvas' ),
      cx = c.getContext( '2d' ),
      thumbwidth = thumbheight = 90,
      crop = false,
      background = 'white',
      jpeg = false,
      quality = 1;
function loadImage(file) {
    var img = new Image();
    img.src = file;
    img.onload = function() {
      grabformvalues();
      imagetocanvas( this, thumbwidth, thumbheight, crop, background );
    };
  }
  function grabformvalues() {
    //thumbwidth  = document.querySelector( '#width' ).value;
    //thumbheight = document.querySelector( '#height' ).value;
    //crop = document.querySelector( '#crop' ).checked;
    //background = document.querySelector( '#bg' ).value;
    //jpeg  = document.querySelector( '#jpeg' ).checked,
    //quality = document.querySelector( '#quality ').value / 100;
  }
  function imagetocanvas( img, thumbwidth, thumbheight, crop, background ) {
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
    addtothumbslist( jpeg, quality );
  };
  function addtothumbslist( jpeg, quality ) {
    var thumb = new Image(),
        url = jpeg ? c.toDataURL( 'image/jpeg' , quality ) : c.toDataURL();
    thumb.src = url;
    thumb.title = Math.round( url.length / 1000 * 100 ) / 100 + ' KB';
    thumb.id = imt;
    thumb.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
    tempim.children[1].children[0].appendChild( thumb );
			//tempimg.onclick = function(){document.getElementById('thedesktop').src = this.src;};
			thumb.onclick = function(){window.change = this.id;document.getElementById('thedesktop').style.opacity = 0;setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change);",500);};
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
loadImage(imt);
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
core.getstyle('default', string, 'dock', 'style');
var string = 'default,'+string+',style,script';
};
	wall.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/uconf.php?array=true&user=<? echo $user; ?>&name='+type+'&change='+encodeURIComponent(string), true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		};
	};
wall.send();
};
window.Themes = function() {
var div = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0];
	var win = new XMLHttpRequest();
	win.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/themes.php?user=<? echo $user; ?>&type=windows', true);
	win.onreadystatechange = function() {
		if (win.readyState==4) {
                var temp = JSON.parse(win.responseText);
                //alert(temp.dirs);
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[0].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].innerHTML+='<li style="display:block;"><a onclick="window.themeup(\'windows\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.windowtheme == temp.dirs[i]) {
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[0].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
win.send();
var div = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0];
	var task = new XMLHttpRequest();
	task.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/themes.php?user=<? echo $user; ?>&type=taskbars', true);
	task.onreadystatechange = function() {
		if (task.readyState==4) {
                var temp = JSON.parse(task.responseText);
                //alert(temp.dirs);
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[1].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].innerHTML+='<li  style="display:block;"><a onclick="window.themeup(\'taskbar\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.taskbartheme == temp.dirs[i]) {
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[1].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
task.send();
var div = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0];
	var dock = new XMLHttpRequest();
	dock.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/themes.php?user=<? echo $user; ?>&type=docks', true);
	dock.onreadystatechange = function() {
		if (dock.readyState==4) {
                var temp = JSON.parse(dock.responseText);
                //alert(temp.dirs);
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[2].innerHTML+='<ul></ul>';
                for(var i=0; i < temp.dirs.length; i++) {
                document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].innerHTML+='<li style="display:block;"><a onclick="window.themeup(\'dock\', \''+temp.dirs[i]+'\');">'+temp.dirs[i]+'</a></li>';
if(core.docktheme == temp.dirs[i]) {
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].children[i].style.cssText+="background: -webkit-linear-gradient(top, #b5bdc8 0%,#828c95 52%,#676868 100%);margin: 5px 0px 5px 0px;";
};
                };
document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div')['Themes'].children[0].children[0].children[2].children[1].style.cssText ="height: auto;position: absolute;left: 5px;right: 5px;bottom: 5px;top: 20px;list-style: none;text-align: center;margin: 0px;padding: 0px;background: white;box-shadow: inset 0px 0px 10px 5px grey;border-radius: 5px;"
                };
        };
dock.send();
};
window.loadwall = function(folder, obj, tempload) {
	var wall = new XMLHttpRequest();
	wall.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/getwall.php?user=<? echo $user; ?>&folder='+folder, true);
	wall.onreadystatechange = function() {
		if (wall.readyState==4) {
		window.results = JSON.parse(wall.responseText);
		for(var i=0; i < results.files.length; i++) {
                        if(('users/<? echo $user; ?>/sysapps/FileNet/'+folder+'/'+results.files[i]).split('.')[1] != 'svg') {
			window.thumbnail(obj, 'users/<? echo $user; ?>/sysapps/FileNet/'+folder+'/'+results.files[i]);
                        } else {
                        var tempimg = document.createElement('img');
                        tempimg.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
                        tempimg.src = 'users/<? echo $user; ?>/sysapps/FileNet/'+folder+'/'+results.files[i];
                        obj.children[1].children[0].appendChild( tempimg );
			//tempimg.onclick = function(){document.getElementById('thedesktop').src = this.src;};
			tempimg.onclick = function(){window.change = this.src;document.getElementById('thedesktop').style.opacity = 0;setTimeout("document.getElementById('thedesktop').src = change;document.getElementById('thedesktop').style.opacity = 1;window.updatecon(change);",500);};
                        };
			document.getElementById('thedesktop').style['-webkit-transition'] = "opacity .5s linear";
		}
                if(tempload) {
                obj.children[1].removeChild(tempload);
                }
                MainTools.scrollV(obj.children[1], document.getElementById('Preferences').children[1], obj.children[1].children[0]);
		};
	};
wall.send();
};
window.useredit = function () {
	var usered2 = new XMLHttpRequest();
	usered2.open('GET', 'useredit.php', true);
	usered2.onreadystatechange = function() {
		if (usered2.readyState==4) {
		document.getElementById('Preferences').children[1].children[0].children[3].children[0].innerHTML = usered2.responseText;
		document.getElementById('Preferences').children[1].children[0].getElementsByTagName('form')[0].onsubmit = function (){
					var usered = new XMLHttpRequest();
					var senditt = 'subedit='+this.subedit.value+'&curpass='+this.curpass.value+'&newpass='+this.newpass.value+'&email='+this.email.value;
					usered.open('POST', 'process.php', true);
					usered.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					usered.onreadystatechange = function() {
						if (usered.readyState==4) {
						document.getElementById('Preferences').children[1].children[0].children[3].children[0].innerHTML = usered.responseText;
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
	var sendit = 'filedir=../FileNet/HDD/Applications/file.txt'+'&filed='+encodeURIComponent("test")+'&uname=<? echo $user; ?>';
	ajax4.open('POST', 'users/<? echo $user; ?>/sysapps/DevCenter/update.php', true);
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
        var setr = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div');
        var tempi = setr[11].children[0].children[1].children[0].children.length;
        tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
        for(var i=0; i < tempi; i++) {
        setr[11].children[0].children[1].children[0].removeChild(setr[11].children[0].children[1].children[0].children[0]);
        }
        tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
                setr[11].children[0].children[1].appendChild(tempload);
	loadwall(folder, setr[11].children[0], tempload);
}

window.clickicon = function(obj, name) {
	if (name != 'Main') {
	var objc = obj.cloneNode(true);
	document.getElementById('Preferences').children[1].children[0].children[0].appendChild(objc);
	objc.style.top = 0+'px';
	objc.style.left = 50+'px';
	objc.style.width = 40+'px';
	objc.style.height = 40+'px';
	objc.style.padding = '5px 5px 5px 5px';
	objc.style.borderRadius= 13+'px';
	objc.style.position = 'absolute';
	var setr = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div');
	for(var i=0; i < setr.length; i++) {
		if (setr[i].id == name) {
		setr[1].style.display = 'none';
		setr[i].style.display = 'block';
		window.tempsetr = setr[i];
		if (setr[i].id == 'Display') {
                tempload = document.createElement('img');
                tempload.src = 'icons/load_progress.gif';
                setr[i].children[0].children[1].appendChild(tempload);
                var folder = 'wallpaper';
		loadwall(folder, setr[i].children[0], tempload);
		}
		}
	}
	} else if (name == 'Main') {
	var setr = document.getElementById('Preferences').children[1].children[0].getElementsByTagName('div');
	var tope = document.getElementById('Preferences').children[1].children[0].children[0].getElementsByTagName('img');
	for(var i=1; i < tope.length; i++) {
		document.getElementById('Preferences').children[1].children[0].children[0].removeChild(tope[i]);
	}
	for(var i=0; i < setr.length; i++) {
		if (setr[i].id == name) {
		window.tempsetr.style.display = 'none';
		setr[i].style.display = 'block';
		}
	}
	}		
	
};
var ajax = new XMLHttpRequest();
	ajax.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/main.php?userN=<? echo $user; ?>', true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState==4) {
			document.getElementById('Preferences').children[1].children[0].innerHTML = ajax.responseText;
			var ajax2 = new XMLHttpRequest();
	ajax2.open('GET', 'users/<? echo $user; ?>/sysapps/Preferences/editor.js', true);
	ajax2.onreadystatechange = function() {
		if (ajax2.readyState==4) {
			eval(ajax2.responseText);
			//MainTools.mscroll(document.getElementById('Preferences').children[1].children[0].children[2].children[0]);
			//MainTools.scrollV(document.getElementById('Preferences').children[1].children[0].children[2], document.getElementById('Preferences'), document.getElementById('Preferences').children[1].children[0].children[2].children[0].children[1]);				
		};
	};			
	ajax2.send();	
			var ajax3 = new XMLHttpRequest();
	ajax3.open('GET', '<? echo $filename; ?>', true);
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
			document.getElementById('Preferences').children[1].children[0].children[2].children[0].children[1].value = ajax3.responseText;
				
		};
	};			
	ajax3.send();			
		};
	};			
	ajax.send();
save = function () {
	var ajax4 = new XMLHttpRequest();
	var sendit = 'filedir=../FileNet/HDD/Applications/file.txt'+'&filed='+encodeURIComponent(document.getElementById("Preferences").children[1].children[0].children[2].children[0].children[1].value)+'&uname=<? echo $user; ?>';
	ajax4.open('POST', 'users/<? echo $user; ?>/sysapps/Preferences/update.php', true);
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
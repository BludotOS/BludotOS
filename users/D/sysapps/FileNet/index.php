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
window.bar(0);
var menu = document.getElementById('menu0');
menu.innerHTML = '<li onclick="clickt(this);"><a>FileNet</a></li><ul></ul><li><a>File</a></li><ul></ul><li><a>Edit</a></li><ul></ul><li onclick="clickt(this);"><a>View</a></li><ul><li onclick="clickt(this);"><a onclick="clickt(clicked);thisis[actT.x].listviewt();">Splitview</a></li><li onclick="clickt(this);"><a onclick="clickt(clicked);thisis[actT.x].listviewt();">List View</a></li></ul>';
}
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
window.dock.AddNew({
            name:      'icons/gear',
            label:     name,
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){return false;}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
thisis[actT.x].FileNet[thisis[actT.x].i]=SimpleWin.create(name, name, "users/"+window.user+"/sysapps/FileNet/HDD/Applications/temp/"+name+"/index.php?name="+name+"&userN="+window.user+"");
<?
if ($isMobile) {
?>
dock.addclick(name, ['close', 'minimize'], [function(){SimpleWin.close(window.thisis[actT.x].FileNet[thisis[actT.x].i]);}, function(){SimpleWin.minimize(window.thisis[actT.x].FileNet[thisis[actT.x].i]);}]);
<?
};
?>
thisis[actT.x].onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
var closeapp = new XMLHttpRequest();
        var sendit2 = 'name='+window.tempname;
        closeapp.open('POST', 'users/<? echo $user; ?>/sysapps/FileNet/resolve.php', true);
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
		for(var i=1; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[1]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.children[0].children[1].innerText));" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+thisis[actT.x].response.dirs[i]+'</a></div></td><td style="text-align:left;" class="type">Size</td>';
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
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto((this.children[0].children[1].innerText+thisis[actT.x].response.location));" class="name"><div><img alt="" src="<? echo $Iimage; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			} else {
				var type = 'undefined';
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto((this.children[0].children[1].innerText+thisis[actT.x].response.location));" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			}
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        } else if (gotoit == 'Applications' || gotoit == 'HDD/Applications') {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=1; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[1]);
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
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].openapp((this.children[0].children[1].innerText));" class="name"><div><img alt="" src="<? echo $Iapp; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        }
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[1].innerText = thisis[actT.x].response.location;
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].lastChild);
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0]);	
				
	};
	};
goto2.send(sendit);
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
		for(var i=1; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[1]);
		}
		if(thisis[actT.x].response.dirs){
		for(var i=0; i < thisis[actT.x].response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].click(this);thisis[actT.x].goto((thisis[actT.x].response.location+\'/\'+this.children[0].children[1].innerText));" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+thisis[actT.x].response.dirs[i]+'</a></div></td><td style="text-align:left;" class="type">Size</td>';
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
			newtr.innerHTML = '<td style="text-align:left;" class="name"><div><img alt="" src="<? echo $Iimage; ?>" /><a onclick="void(0);">'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			}  else if(temp != 'png' || temp != 'jpg' || temp != 'jpeg' || temp != 'gif'){
				var type = 'undefined';
                        newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerText);" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+response.files[i]+'</a></div></td><td class="type" style="text-align:left;">Size</td>';
                        };
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        } else if (gotoit == 'Applications' || gotoit == 'HDD/Applications') {
		thisis[actT.x].response2 = goto2.responseText;
		thisis[actT.x].response = JSON.parse(goto2.responseText);
		var k = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children.length;
		for(var i=1; i < k; i++)
		{
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].children[1]);
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
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].openapp((this.children[0].children[1].innerText));" class="name"><div><img alt="" src="<? echo $Iapp; ?>" /><a>'+thisis[actT.x].response.files[i]+'</a></div></td><td style="text-align:left;" class="type">'+type+'</td>';
			window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].appendChild(newtr);
		};
		}
        }
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[1].innerText = thisis[actT.x].response.location;
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].removeChild(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].lastChild);
window.actT.children[1].children[2].children[thisis[actT.x].cdivs].style.width = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].clientWidth+'px';
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0], -(parseInt(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].offsetLeft)+150));				
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
                }
                if(thisis[actT.x].stylesheet.cssRules[k].selectorText == '#FileNet .type') {
                thisis[actT.x].typew = document.styleSheets[document.styleSheets.length-1].cssRules[k];
                }
                }
                } else {
                };
window.mousedownN = function(node, e){
     if(!e){ e=window.event; };
     document.onmousemove = function(e){
     	//document.getElementsByClassName(node.parentNode.id)[0].style.width = e.pageX-node.parentNode.offsetLeft-150+'px';
        thisis[actT.x][node.parentNode.id+'w'].style.width = e.pageX-node.parentNode.offsetLeft-150+'px';
        if(node.parentNode.id == 'name') {
        thisis[actT.x]['typew'].style.width = node.parentNode.parentNode.clientWidth-(e.pageX-node.parentNode.offsetLeft-150)+'px';
        } else if(node.parentNode.id == 'type') {
        thisis[actT.x]['namew'].style.width = node.parentNode.parentNode.clientWidth-(e.pageX-node.parentNode.offsetLeft-150)+'px';
        };
     	}
node.onmouseup = function(){
     document.onmousemove = null;
};
};
		for(var i=0; i < response.dirs.length; i++)
		{
			var newtr = document.createElement('tr');
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].click(this);thisis[actT.x].goto(this.children[0].children[1].innerText);" class="name"><div><img alt="" src="<? echo $Ifolder; ?>" /><a>'+response.dirs[i]+'</a></div></td><td class="type" style="text-align:left;">Size</td>';
			window.actT.children[1].children[2].children[0].children[0].children[0].appendChild(newtr);
		};
		for(var i=0; i < response.files.length; i++)
		{
			var newtr = document.createElement('tr');
                        var temp = response.files[i].split('.')[1];
                        if(temp != 'png' || temp != 'jpg' || temp != 'jpeg' || temp != 'gif'){
			newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerText);" class="name"><div><img alt="" src="<? echo $Ifile; ?>" /><a>'+response.files[i]+'</a></div></td><td class="type" style="text-align:left;">Size</td>';
                        } else if(temp == 'png' || temp == 'jpg' || temp == 'jpeg' || temp == 'gif'){
                        newtr.innerHTML = '<td style="text-align:left;" onclick="thisis[actT.x].goto(this.children[0].children[1].innerText);" class="name"><div><img alt="" src="<? echo $Iimage; ?>" /><a>'+response.files[i]+'</a></div></td><td class="type" style="text-align:left;">Size</td>';
                        };
			window.actT.children[1].children[2].children[0].children[0].children[0].appendChild(newtr);
		};
        thisis[actT.x].response.location = "HDD/";
        window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[1].innerText = thisis[actT.x].response.location;
window.actT.children[1].children[2].children[thisis[actT.x].cdivs].style.width = window.actT.children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0].clientWidth+'px';
		//MainTools.mscroll(thisis[actT.x].children[1].children[0].children[2].children[0]);
		MainTools.scrollV(thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs], thisis[actT.x], thisis[actT.x].children[1].children[2].children[thisis[actT.x].cdivs].children[0].children[0], (parseInt(window.actT.children[1].children[2].children[thisis[actT.x].cdivs].offsetLeft)+150*(-1)));	
				
	};
	};
goto.send();
thisis[actT.x].listviewt = function() {
       var temp = false;
       if(thisis[actT.x].listview == false) {
for(var i=thisis[actT.x].innerdivs; i > 0; i--) {
        	window.actT.children[1].children[2].removeChild(window.actT.children[1].children[2].children[i]);
        }        
          thisis[actT.x].listview = true;
        thisis[actT.x].innerdivs=0;
       var temp = true;
       } else if(temp != true && thisis[actT.x].listview == true) {
          thisis[actT.x].listview = false;
       };
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
#FileNet #content tr {
border-radius:20px;
}
#FileNet #content:nth-child(2) tr {
width:142px;
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
#FileNet #back {
width: 20px;
height: 40px;
position: relative;
overflow: hidden;
box-shadow: 0 16px -10px -15px rgba(0, 0, 0, 0.5);
}
#FileNet #back:after {
content: "";
position: absolute;
width: 20px;
height: 20px;
background: #999;
transform: rotate(45deg);
-ms-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-webkit-transform: rotate(45deg);
-o-transform: rotate(45deg);
top: 10px;
left: 10px;
box-shadow: -1px -1px 8px 0px rgba(0, 0, 0, 0.5);
}​
</style>
<div style="position:absolute;left:0px;top:0px;right:0px;height:35px;background: -moz-linear-gradient(top, rgba(206,220,231,1) 0%, rgba(89,106,114,1) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(206,220,231,1)), color-stop(100%,rgba(89,106,114,1)));">
<div id="back" onclick="thisis[actT.x].back(thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length-1]))[0].substring(0, thisis[actT.x].response.location.split((thisis[actT.x].response.location.split('/')[(thisis[actT.x].response.location.split('/')).length]))[0].length-1));"></div>
</div>
<div id="0" style="position:absolute;left:0px;top:35px;width:150px;bottom:0px;background:rgba(30,30,30,1);border-right:1px solid black;box-shadow:inset -3px 0px 3px gray;background-image: url(data:image/png;base64,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);
" onmouseover="thisis[actT.x].cdiv=parseInt(this.id);">
<table style="width:100%;">
<tr style="background:rgba(70,70,70,1);box-shadow: inset 0px 0px 3px 1px black;width:142px;">
<td style="width:142px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].back(this.children[0].children[1].innerText+'/');thisis[actT.x].cdiv=parseInt(-1);"><div><img alt="" src="<? echo $IHDD; ?>" /><font>HDD</font></div></td>
</tr>
<tr>
<td style="width:142px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerText);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>Documents</font></div></td>
</tr>
<tr>
<td style="width:142px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerText);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>Applications</font></div></td>
</tr>
<tr>
<td style="width:142px;" onclick="thisis[actT.x].click(this.parentNode);thisis[actT.x].goto(this.children[0].children[1].innerText);"><div><img alt="" src="<? echo $Ifolder; ?>" /><font>MyPictures</font></div></td>
</tr>
</table>
</div>
<div style="position:absolute;left:150px;top:35px;right:0px;bottom:0px;background:#C2E3FF;background:#C2E3FF;border-left:1px solid black;background-image: url(data:image/png;base64,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);
">
<div id="0" style="position:relative;height:100%;float:left;box-shadow: -3px 0px 3px gray;border-left: 1px solid black;padding-right:10px;" onmouseover="thisis[actT.x].cdiv=parseInt(this.id);">
<table id="content" align="left" style="position:relative;top:20px;left:0px;width:auto;height:100%;">
<tbody  style="position:absolute;overflow:hidden;height:100%;width:auto;">
<tr id="topname" onmouseover="return false;">
<td class="name" id="name" style="position:relative;background:grey;text-align:left;border-radius:0px;">name<div style="position: absolute; right: 0px; top: 0px; width: 10px; height: 100%; background: green;" onmousedown="window.mousedownN(this);"></div></td>
<td class="type" id="type" style="position:relative;background:red;text-align:left;border-radius:0px;">type<div style="position: absolute; right: 0px; top: 0px; width: 10px; height: 100%; background: green;" onmousedown="window.mousedownN(this);"></div></td>
</tr>
</tbody>
</table>
<div style="position: absolute;top: 0px;left: 0px;width: 100%;height: 20px;font-size: 15px;font-weight: bold;white-space:nowrap;overflow:hidden;" onmouseover="var node=this;window.rep2=window.setInterval(function(){node.scrollLeft=(node.scrollLeft+1);}, 90);" onmouseout="clearInterval(window.rep2);this.scrollLeft=0;"></div>
</div>
</div>
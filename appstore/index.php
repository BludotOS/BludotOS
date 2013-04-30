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
menu.innerHTML = '<li onclick="clickt(this);"><a>Appstore</a></li><ul></ul><li><a>File</a></li><ul></ul></li>';
}
thisis[actT.x].menu();
var installed;
var getapps = new XMLHttpRequest();
getapps.open('GET', 'apps.php?goto=users/'+core.user+'/sysapps/FileNet/apps/', true);
getapps.onreadystatechange = function() {
        if(getapps.readyState==4) {
        window.testit = getapps.responseText;
        window.installed = JSON.parse(getapps.responseText);
var ajax = new XMLHttpRequest();
ajax.open('GET', 'appstore/apps/apps.txt', true);
ajax.onreadystatechange = function() {
        if(ajax.readyState==4) {
                var resp = JSON.parse(ajax.responseText);
                window.resp = resp;
                thisis[actT.x].resp = resp;
                for(var propName in resp.categories) {
    if(resp.categories.hasOwnProperty(propName)) {
                var temp = document.createElement('tr');
                temp.td = document.createElement('td');
                temp.td.innerHTML = propName;
                thisis[actT.x].children[1].children[1].children[0].children[0].appendChild(temp);
                temp.appendChild(temp.td);
                temp.td.style.cssText = "border:1px solid black;";
                temp.td.onclick = function(){thisis[actT.x].catselect(this.innerHTML);};
    }
}
                for(var propName in resp.categories) {
    if(resp.categories.hasOwnProperty(propName) && resp.categories[propName].length > 0) {
               var temp = document.createElement('div');
                temp.img = document.createElement('img');
                temp.img.src = 'appstore/apps/'+propName+'/'+resp.categories[propName][0]+'/img.png';
                temp.name = document.createElement('div');
                temp.install = document.createElement('div');
                for(var h=0; h < window.installed.dirs.length; h++){
                if(window.installed.dirs[h] == resp.categories[propName][0]) {
                for(var l=0; l < core.capps.length; l++) {
                if(resp.categories[propName][0] == core.capps[l]) {
                temp.install.innerHTML = 'update';
                temp.install.onclick = function(){thisis[actT.x].updateapp(propName, this.parentNode.children[1].innerHTML);};
                } else {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                };
                if(core.capps.length == 0) {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                break;
                };
                if(window.installed.dirs[h] != resp.categories[propName][0]) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);};
                };
                };
                if(window.installed.dirs.length == 0) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);};
                };
                temp.name.innerHTML = resp.categories[propName][0];
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);position:relative;float:left;";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
         
    }
}
        }
        }
        ajax.send();
thisis[actT.x].updateq = function(app, name) {
var updateitq = new XMLHttpRequest();
updateitq.open('GET', 'appstore/apps/'+name+'/'+app+'/version.txt', true);
updateitq.onreadystatechange = function() {
        if(updateitq.readyState==4) {
                var resp = updateitq.responseText;
                window.resp = resp;
                thisis[actT.x].resp2 = resp;
                //window.testr = thisis[actT.x].cupdate(app, name, resp);
                //alert(thisis[actT.x].cupdate(app, name, resp));
        }
}
updateitq.send();
return thisis[actT.x].resp2;
};
thisis[actT.x].updateapp = function(name, app) {
var cupdateapp = new XMLHttpRequest();
cupdateapp.open('GET', 'appstore/update.php?app='+app+'&cat='+name+'&name='+core.user+'', true);
cupdateapp.onreadystatechange = function() {
        if(cupdateapp.readyState==4) {
                var resp = cupdateapp.responseText;
                window.resp2 = resp;
                thisis[actT.x].resp1 = resp;
                MainTools.Notify(resp)
        }
}
cupdateapp.send();
};
thisis[actT.x].cupdate = function(app, name) {
var cupdateitq = new XMLHttpRequest();
cupdateitq.open('GET', 'users/'+core.user+'/sysapps/FileNet/apps/'+app+'/version.txt', true);
cupdateitq.onreadystatechange = function() {
        if(cupdateitq.readyState==4) {
                var resp = cupdateitq.responseText;
                window.resp2 = resp;
                thisis[actT.x].resp1 = resp;
        }
}
cupdateitq.send();
return thisis[actT.x].resp1;
};
thisis[actT.x].catselect = function(Name) {
thisis[actT.x].children[1].children[1].children[1].innerHTML = '';
if(Name != 'All') {
for(var i=0; i < thisis[actT.x].resp.categories[Name].length; i++)
	{
	var temp = document.createElement('div');
                temp.img = document.createElement('img');
                temp.img.src = 'appstore/apps/'+Name+'/'+thisis[actT.x].resp.categories[Name][i]+'/img.png';
                temp.name = document.createElement('div');
                temp.install = document.createElement('div');
                for(var h=0; h < window.installed.dirs.length; h++){
                if(window.installed.dirs[h] == resp.categories[Name][0]) {
                for(var l=0; l < core.capps.length; l++) {
                if(resp.categories[Name][0] == core.capps[l]) {
                temp.install.innerHTML = 'update';
                temp.install.onclick = function(){thisis[actT.x].updateapp(Name, this.parentNode.children[1].innerHTML);};
                } else {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                };
                if(core.capps.length == 0) {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                break;
                };
                //};
                /*if(window.installed.dirs[h] == resp.categories[Name][0]) {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                break;
                };*/
                if(window.installed.dirs[h] != resp.categories[Name][0]) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);};
                };
                };
                if(window.installed.dirs.length == 0) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);};
                };
                temp.name.innerHTML = thisis[actT.x].resp.categories[Name][i];
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                
        }
} else {
                for(var propName in resp.categories) {
    if(resp.categories.hasOwnProperty(propName) && resp.categories[propName].length > 0) {
               var temp = document.createElement('div');
                temp.img = document.createElement('img');
                temp.img.src = 'appstore/apps/'+propName+'/'+resp.categories[propName][0]+'/img.png';
                temp.name = document.createElement('div');
                temp.install = document.createElement('div');
                for(var h=0; h < window.installed.dirs.length; h++){
                if(window.installed.dirs[h] == resp.categories[propName][0]) {
                for(var l=0; l < core.capps.length; l++) {
                if(resp.categories[propName][0] == core.capps[l]) {
                temp.install.innerHTML = 'update';
                temp.install.onclick = function(){thisis[actT.x].updateapp(propName, this.parentNode.children[1].innerHTML);};
                } else {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                };
                if(core.capps.length == 0) {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                };
                break;
                };
                /*for(var h=0; h < window.installed.dirs.length; h++){
                if(window.installed.dirs[h] == resp.categories[propName][0]) {
                temp.install.innerHTML = 'Installed';
                window.tempit = 'true';
                break;
                };*/
                if(window.installed.dirs[h] != resp.categories[propName][0]) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);this.parentNode.children[2].innerHTML="Installed";};
                };
                };
                if(window.installed.dirs.length == 0) {
                temp.install.innerHTML = 'Install';
                temp.install.onclick = function(){ thisis[actT.x].installapp(this.parentNode.children[1].innerHTML);this.parentNode.children[2].innerHTML="Installed";};
                };
                temp.name.innerHTML = resp.categories[propName][0];
                temp.img.style.cssText = "height: 100%;position: relative;width: 75px;left: 0px;top: 0px;float: right;";
                temp.name.style.cssText = "position: relative;width: 125px;left: 0px;top: 0px;float: left;height:20px;font-weight: bold;text-decoration: underline;";
                temp.install.style.cssText = "position: relative;width: 75px;left: 20px;top: 30px;float: left;height:20px;backgroud: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3));border-radius: 20px;font-size: 15px;text-align: center;line-height: 20px;font-weight: bold;color: white;box-shadow: 0px 0px 10px 0px gray;";
                if(navigator.userAgent.indexOf("Firefox") != -1){
                temp.install.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';
                } else {
                temp.install.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';
                };
                thisis[actT.x].children[1].children[1].children[1].appendChild(temp);
                temp.appendChild(temp.img);
                temp.appendChild(temp.name);
                temp.appendChild(temp.install);
                temp.style.cssText = "border:1px solid black;width:200px;height:75px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);position:relative;float:left;";
                temp.install.onmousedown = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#009ec3 0%, #00b7ea 100%)';} else {this.style.background = '-webkit-gradient(linear, left bottom, left top, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
                temp.install.onmouseup = function(){if(navigator.userAgent.indexOf("Firefox") != -1){this.style.background = '-moz-linear-gradient(top ,#00b7ea 0%, #009ec3 100%)';} else {this.style.background = '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#00b7ea), color-stop(100%,#009ec3))';};};
         
    }
}
};
};
thisis[actT.x].installapp = function(app) {
var app = app;
for(var propName in resp.categories) {
    if(resp.categories.hasOwnProperty(propName) && resp.categories[propName].length > 0) {
       for(var i=0; i < resp.categories[propName].length; i++) {
       if(resp.categories[propName][i] == app) {
       var install = new XMLHttpRequest();
           install.open('GET', 'appstore/install.php?cat='+propName+'&app='+app+'&name='+core.user+'', true);
           install.onreadystatechange = function() {
        if(install.readyState==4) {
        if(install.responseText == 'installed'){
        core.checkupdates();
        //thisis[actT.x].catselect(propName);
        MainTools.Notify('app installed!');
        delete window.installed;
        } else if(install.responseText == 'error') {
        alert('There was an error with installing');
        };
        };
        };
        install.send();
       };
       };
    };
};

};
}
}
getapps.send();
</script>
<style>
</style>
    <div style="position:relative;top:0px;left:0px;height:30px;width:100%;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(206, 220, 231, 1)), color-stop(100%,rgba(89, 106, 114, 1)));background: -moz-linear-gradient(top, rgba(206,220,231,1) 0%, rgba(89,106,114,1) 100%);box-shadow:0px 3px 9px rgba(50, 50, 50, 1);z-index:1;">
    </div>
    <div style="position:absolute;top:30px;left:0px;right:0px;bottom:0px;height:auto;width:100%;background:red;">
        <div style="position:absolute;top:0px;right:0px;height:auto;bottom:0px;width:150px;background:white;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(181,189,200,1)), color-stop(36%,rgba(165,165,165,1)), color-stop(100%,rgba(124,124,124,1)));background:-moz-linear-gradient(top, rgba(181,189,200,1) 0%, rgba(165,165,165,1) 36%, rgba(124,124,124,1) 100%);">
        <table style="width:100%;">
        </table>
        </div>
        <div style="position: absolute;top: 0px;right: 150px;height: auto;bottom: 0px;width: auto;background: white;left: 0px;border-right:1px solid black;background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e696), color-stop(100%,#d1d360));background:-moz-linear-gradient(top, rgba(229,230,150,1) 0%, rgba(209,211,96,1) 100%);box-shadow: inset -2px 0px 5px black;">
        </div>
    </div>
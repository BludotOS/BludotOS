<?
$user = $_GET['userN'];
$name = $_GET['name'];
include('users/'.$user.'/sysapps/FileNet/HDD/Applications/temp/'.$name.'/prefs.php');
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
        var ajax3 = new XMLHttpRequest();
	ajax3.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/<? echo $name; ?>/index.txt', true);
	ajax3.onreadystatechange = function() {
		if (ajax3.readyState==4) {
                  var Doc = thisis[actT.x].children[1];
                  Doc.innerHTML = '';
                  Doc.onclose = thisis[actT.x].onclose;
                  Doc.Notify = function(itext, src, duration) {
                  	MainTools.Notify(itext, src, duration);
                  }
                  Doc.command = function(name, command) {
                  	thisis[actT.x][name] = command;
                  }
                  Doc.Run = function(command) {
                  	thisis[actT.x][command]();
                  }
                  Doc.menu = function(main, lower, action)
                  {
                  	Doc.command('menu', function() {
						window.bar(0);
						var nmenu = document.getElementById('menu0');
						var menu = '';
						for(var i=0; i < main.length; i++)
						{
							menu+='<li onclick="clickt(this);"><a>'+main[i]+'</a></li><ul>';
							for(var b=0; b < lower[i].length; b++)
							{
								if(action[i][b])
								{
									menu+='<li><a onclick="'+action[i][b]+'">'+lower[i][b]+'</a></li>';
								} else {
									menu+='<li><a>'+lower[i][b]+'</a></li>';
								}
							}
							menu+= '</ul>';
						}
						nmenu.innerHTML = menu;
					});
					Doc.Run('menu')	;
                  }
                  		var include = function(file) {
    var xhr2 = new XMLHttpRequest();
	xhr2.open('GET', file, true);
	xhr2.onreadystatechange = function() {
		if(xhr2.readyState == 4) {
			var test=xhr2.responseText;
			var tmpFunc = new Function(test);
			tmpFunc();
		};
	};
    xhr2.send();
};
		Doc.create = function(type)
    	{
        	return document.createElement(type);
    	};
    	Doc.boot = function()
    	{
    	
    	};
    	Doc.style = function(style, node)
    	{
    	    node.style.cssText = style;
    	};
                  Doc.ajax = function (url, callback, type, send, sync) {  
        var sync = sync || true;
        var xhr;  
        if(typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();  
        else {  
            var versions = ["MSXML2.XmlHttp.5.0",  
                            "MSXML2.XmlHttp.4.0",  
                            "MSXML2.XmlHttp.3.0",  
                            "MSXML2.XmlHttp.2.0",  
                            "Microsoft.XmlHttp"]  
             for(var i = 0, len = versions.length; i < len; i++) {  
                try {  
                    xhr = new ActiveXObject(versions[i]);  
                    break;  
                }  
                catch(e){}  
             } // end for  
        }  
        xhr.onreadystatechange = ensureReadiness;  
        function ensureReadiness() {  
            if(xhr.readyState < 4) {  
                return;  
            }  
            if(xhr.status !== 200) {  
                return;  
            }  
            // all is well  
            if(xhr.readyState === 4) {
          if(type.toLowerCase() == 'html') {
          var html = xhr.responseText;
	  if(html.length > 0){
	    var obj = document.createElement('div');
	    if(obj){
	      obj.innerHTML = html;
	      var div = obj.firstChild;
	    }
	  } 
                callback(obj);  
            } else if (type.toLowerCase() == 'json') {
              var obj = JSON.parse(xhr.responseText);
              callback(obj);
            } else if (type.toLowerCase() == 'text') {
              var obj = xhr.responseText;
              callback(obj);
            }
            }  
        }  
        if(!send){
        xhr.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/<? echo $name; ?>/'+url, sync);  
        } else {
        xhr.open('GET', 'users/<? echo $user; ?>/sysapps/FileNet/HDD/Applications/temp/<? echo $name; ?>/'+url+'?'+send, sync); 
        } 
        xhr.send('');  
    }
                  eval(ajax3.responseText);
		};
	};			
	ajax3.send();
</script>
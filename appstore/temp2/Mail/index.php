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
              var obj = JSON.parse(xhr.responseText);
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
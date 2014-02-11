<?php

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Untitled Document
	</title>
	<style>
		.img-div {
			position: relative;
			top: 0;
			left: 0;
			width: 200px;
			height: 260px;
			float: left;
			border-radius: 6px;
			margin: 10px;
			border: 1px solid black;
		}
		.img-div div {
			position: absolute;
			width: 185px;
			height: 200px;
			float: left;
			display: block;
			padding: 0px;
			top: 10px;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			bottom: 40px;
		}
		.img {
			position: absolute;
			width: auto;
			height: auto;
			float: left;
			display: block;
			padding: 0px;
			max-height: 200px;
			max-width: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
		}
		.img-div font {
			position: absolute;
			width: 100%;
			height: 40px;
			line-height: 20px;
			float: left;
			word-wrap: break-word;
			text-align: center;
			bottom: 0px;
			padding-bottom:5px;
		}
		.img-big {
			position: fixed;
			text-align: center;
			background: white;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			box-shadow:0px 0px 10px 0px black;
			border-radius: 8px;
		}
		.big-img {
			position: absolute;
			width: auto;
			height: auto;
			max-height: 100%;
			max-width: 100%;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			margin: auto;
		}
		.big-close {
			position: absolute;
			top: -10px;
			width: 30px;
			height: 30px;
			background: white;
			border-radius: 30px;
			border: 1px solid black;
			right: -10px;
		}
		.big-close:after {
			content: 'X';
			position: absolute;
			width: 26px;
			height: 26px;
			background: black;
			top: 2px;
			right: 2px;
			border-radius: 26px;
			color: white;
			font-family: monospace;
			font-size: 20px;
			line-height: 26px;
			text-align: center;
			font-weight: bold;
		}
		.download {
			border:1px solid #25729a; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
			background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
			background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
			background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
			background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
			background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
			background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
			position: absolute;
			top: 10px;
			right: 37px;
		}
		.download:hover {
			border:1px solid #1c5675;
			 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
			 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
			 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
			 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
			 background-image: -o-linear-gradient(top, #26759e, #133d5b);
			 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
		}
		.loading {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: white;
			z-index: 1;
			opacity: 0.8;
		}
		.loading img {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
		}
	</style>
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<body>
	<script>
	
	function openimg(img) {
			var div = function() {
				var temp = document.createElement('div');
				temp.className = 'img-big';
				temp.style.width = window.innerWidth - 60+'px';
				temp.style.height = window.innerHeight - 60+'px';
				temp.img = document.createElement('img');
				temp.img.className = 'big-img';
				temp.close = document.createElement('div');
				temp.close.className = 'big-close';
				temp.close.addEventListener('click', function() {
					document.body.removeChild(this.parentNode);
				}, false);
				temp.download = document.createElement('a');
				temp.download.innerHTML = 'Download';
				temp.download.className = 'download';
				temp.download.addEventListener('click', function (){
					open(img);
				}, false);
				temp.appendChild(temp.img);
				temp.appendChild(temp.close);
				temp.appendChild(temp.download);
				//temp.innerHTML += '<a class="download" href="'+img+'" download>Download</a>';
				return temp;
			};
			var temp = new div();
			console.log(temp);
			temp.img.src = img;
			document.body.appendChild(temp);
		};
	window.thumbnail = function(tempim, imt, name, num) {
var tempim = tempim,
      imt = imt,
      c  = document.createElement( 'canvas' ),
      cx = c.getContext( '2d' ),
      thumbwidth = thumbheight = 200,
      crop = false,
      background = 'white',
      jpeg = false,
      quality = 1;
function loadImage(file, num) {
    var img = new Image();
    var test = new XMLHttpRequest();
    console.log(file);
	var sendit = 'file='+file;
		test.open('POST', 'images.php', true);
		test.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		test.onload = function() {
			var res = test.responseText;
			img.src = res;
			//console.log(res);
		}
		test.send(sendit);
    //img.src = file;
    img.onload = function() {
      grabformvalues();
      imagetocanvas( this, thumbwidth, thumbheight, crop, background, name, num );
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
  function imagetocanvas( img, thumbwidth, thumbheight, crop, background, name, num ) {
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
    addtothumbslist( jpeg, quality, name, img.src, num, img );
  };
  function addtothumbslist( jpeg, quality, name, org, num, imgd ) {
    var thumb = new Image();
        url = jpeg ? c.toDataURL( 'image/jpeg' , quality ) : c.toDataURL();
        
	/*var test = new XMLHttpRequest();
	var sendit = 'file='+name;
		test.open('POST', 'images.php', true);
		test.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		test.onload = function() {
			var res = test.responseText;
			thumb.src = res;
			console.log(res);
		}
		test.send(sendit);*/
        //console.log(reader.readAsBinaryString(url));
        //console.log(fileReader.readAsBinaryString(url));
        //url.replace('png', 'gif');
    thumb.title = name;
    thumb.id = imt;
    //thumb.style.cssText = 'width:90px;height:90px;position:relative;float:left;top:0px;left:0px;padding:2px;background:transparent;';
    thumb.className = 'img';
    var div = document.createElement('div');
    div.className = 'img-div';
    div.addEventListener('click', function() {
    	openimg(name);
    }, false);
    div.div = document.createElement('div');
    div.appendChild(div.div);
    
    //<div class=\"img-div\" onclick=\"openimg('".$temp."');\"><div><img class=\"img\" src=\"".$temp."\"/></div><font>".$temp."</font></div>";
    div.div.appendChild(thumb);
    div.font = document.createElement('font');
    div.font.innerHTML = name;
    div.appendChild(div.font);
	document.body.insertBefore(div, document.body.querySelector('.loader'));
	thumb.src = url;
	if(num < (window.res.length-1)) {
		num++;
		if(num == (window.res.length-1)) {
			document.body.removeChild(document.body.querySelector('.loader'));
		}
		thumbnail('test', res[num], res[num], num);
	}
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
loadImage(imt, num);
};
/*var div = document.createElement('div');
		div.className = 'loading';
		div.img = document.createElement('img');
		div.img.src = 'loader.gif';
		div.appendChild(div.img);
		document.body.appendChild(div);*/
var div = document.createElement('div');
    div.className = 'img-div loader';
    div.addEventListener('click', function() {
    	openimg(org);
    }, false);
    div.div = document.createElement('div');
    div.appendChild(div.div);
    
    //<div class=\"img-div\" onclick=\"openimg('".$temp."');\"><div><img class=\"img\" src=\"".$temp."\"/></div><font>".$temp."</font></div>";
    var thumb = document.createElement('img');
    thumb.className = 'img';
    thumb.src = 'http://bludotos.com/images/loader.gif';
    div.div.appendChild(thumb);
    div.font = document.createElement('font');
    div.font.innerHTML = name;
    div.appendChild(div.font);
    document.body.appendChild(div);
var ajax = new XMLHttpRequest();
	ajax.open('get', 'get.php', true);
	ajax.onload = function() {
		var res = ajax.responseText.split(',');
		res.pop();
		//console.log(res);
		window.res = res;
		res.sort();
		window.res.sort();
		console.log(res);
		//for(var i in res) {
			//thumbnail('test', res[i], res[i], i);
			thumbnail('test', res[0], res[0], 0);
		//}
	}
	ajax.send();
</script>
</body>
</html>
<?php
?>
<html>
	<head>
		<title>BludotOS</title>
		<link  type="text/css"  rel="stylesheet"  href="/test/home2/main.css" />
		<link rel="shortcut icon" href="/test/home2/logo.png">
		<meta name="viewport" content="width=device-width" />
		<style>
		</style>
	</head>
	<body>
		<div  class="topbar">
			<div  class="logo">
				<a href="/"><div  class="m1">
					
				</div>
				<div  class="m2">
					
				</div>
				<div  class="mist1">
					
				</div>
				<div  class="mist2">
					
				</div>
				</a>
			</div>
			<div  class="name">
				<a href="/">BludotOS</a>  
			</div>
			<ul class="menu">
				<li><a style="color:black;" href="http://bludotos.com/">Home</a></li>
				<li><a href="http://about.bludotos.com">About</a></li>
				<li><a href="http://dev.bludotos.com">Developer</a></li>
				<li><a href="http://login.bludotos.com">Login</a></li>
				<li><a href="javascript:core.register();">Register</a></li>
			</ul>
		</div>
		<div  class="header">
				<div class="arrowl">
						
					</div>
					<div class="slider">
					
					<div class="pic1">
						
					</div>
					<div class="pic2">
						
					</div>
					<div class="pic3">
						
					</div>
					
				</div>
				<div class="arrowr">
						
				</div>
				<ul class="slider_dots">
					
				</ul>
				<div class="blur">
					
				</div>
			</div>
		<div  class="container">
			<div  class="our_goal">
				<div class="head">
					BludotOS
					<div class="sub">
						An Online Desktop Environment
					</div>
				</div>
				<p>
					Welcome to BludotOS. Bludot offers the desktop experince on the go. It is optimized for laptops and mobile devices. 
					The idea behind Bludot was to be able to use everyday applications from where ever one is without having to wait for it to load. 
					BludotOS is run in the "cloud". This means that your files and work is safe when you lose internet or your computer crashes.
				</p>
				<div class="head">
					Beta
					<div class="sub">
						We are currently in beta
					</div>
				</div>
				<p>
					We are currently in beta and welcome anybody to join and test out Bludot. 
					BludotOS is imporving rapidly allowing new features to be avaliable for users to try weekly.
				</p>
			</div>
			
		</div>
		<footer>
			<div class="head">
				BludotOS
			</div>
		</footer>
		<script>
			var slider = document.querySelector('.slider');
			var arrowl = slider.parentNode.querySelector('.arrowl');
			var arrowr = slider.parentNode.querySelector('.arrowr');
			var dots = slider.parentNode.querySelector('.slider_dots');
			var pictures = ['/images/slider0.jpg', '/images/slider1.jpg', '/images/slider2.jpg', '/images/slider3.jpg', '/images/slider4.jpg', ];
			var i = 0;
			var len = pictures.length-1;
			var pic1 = document.querySelector('.slider').querySelector('.pic1');
			var pic2 = document.querySelector('.slider').querySelector('.pic2');
			var pic3 = document.querySelector('.slider').querySelector('.pic3');
			var blur = slider.parentNode.querySelector('.blur');
			var interval;
			for(var a=0; a < (len+1); a++) {
				var temp = document.createElement('li');
				temp.id = a;
				temp.addEventListener('click', function() {
					clearInterval(interval);
					clearTimeout(interval.timeout);
					clearTimeout(interval.timeout2);
					console.log(i);
					var temp = i;
					i = parseInt(this.id);
					console.log(i);
					//resume();
				if(i>temp) {
					pic1.style.background = 'url('+pictures[temp]+') no-repeat center';
					pic2.style.background = 'url('+pictures[temp]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i]+') no-repeat center';
				pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.width = 0+'px';
					dots.children[temp].style.border = 'none';
					dots.children[i].style.border = '1px solid white';
					this.timeout2 = setTimeout(function() {
						if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}
						blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
						blur.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.width = '';
						resume();
					}, 1000);
				} else if(i<temp) {
					pic1.style.background = 'url('+pictures[i]+') no-repeat center';
					pic2.style.background = 'url('+pictures[temp]+') no-repeat center';
					pic3.style.background = 'url('+pictures[temp]+') no-repeat center';
				pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.marginLeft = '0px';
					this.timeout2 = setTimeout(function() {
						if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}
						blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
						blur.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.marginLeft = '-495px';
						dots.children[temp].style.border = 'none';
						dots.children[i].style.border = '1px solid white';
						resume();
					}, 1000);
				}
				/*if(temp < i) {
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.width = 0+'px';
					setTimeout(function() {
							pic1.style.background = 'url('+pictures[i]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i]+') no-repeat center';
					pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.width = '';
						resume();
					}, 1000);
				} else if(temp > i){
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.marginLeft = 0+'px';
					setTimeout(function() {
						pic1.style.background = 'url('+pictures[i]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i]+') no-repeat center';
					pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.marginLeft = '-495px';
						resume();
					}, 1000);
				}*/
				
				}, false);
				dots.appendChild(temp);
			}
			pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
			blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
					blur.style.backgroundSize = 'cover';
					dots.children[i].style.border = '1px solid white';
					i++;
			function resume() {
					interval = setInterval(function(){
						var temp = i-1;
						if(temp<0) {
							temp = len;
						}
						dots.children[temp].style.border = 'none';
					dots.children[i].style.border = '1px solid white';
						blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
				blur.style.backgroundSize = 'cover';
				if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}
				pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
				var temp = i;
				var temp2 = i-1;
				i++;
				if(i>len) {
					i=0;
				}
				this.timeout = setTimeout(function() {
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.width = 0+'px';
					this.timeout2 = setTimeout(function() {
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.width = '';
					}, 1000);
				}, 3000);
			}, 4000);
					}
			arrowl.addEventListener('click', function() {
					clearInterval(interval);
					clearTimeout(interval.timeout);
					clearTimeout(interval.timeout2);
					var temp = i;
					i--;
					if(i<0) {
						i = len;
					}
					console.log(i);
					//resume();
					pic1.style.background = 'url('+pictures[i]+') no-repeat center';
					pic2.style.background = 'url('+pictures[temp]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i]+') no-repeat center';
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.marginLeft = '0px';
					this.timeout2 = setTimeout(function() {
						if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}
						blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
						blur.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.marginLeft = '-495px';
						dots.children[temp].style.border = 'none';
						dots.children[i].style.border = '1px solid white';
						resume();
					}, 1000);
				/*if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}*/
				pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
				/*i++;
				if(i>len) {
					i=0;
				}*/
				//this.timeout = setTimeout(function() {
					
				//}, 3000);
				//resume();
			}, false);
			arrowr.addEventListener('click', function() {
					clearInterval(interval);
					clearTimeout(interval.timeout);
					clearTimeout(interval.timeout2);
					var temp = i;
					i++;
					if(i>len) {
						i = 0;
					}
					console.log(i);
					//resume();
					pic1.style.background = 'url('+pictures[i]+') no-repeat center';
					pic2.style.background = 'url('+pictures[temp]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i]+') no-repeat center';
					pic1.style['-webkit-transition'] = 'all 1s ease';
					pic1.style.width = 0+'px';
					this.timeout2 = setTimeout(function() {
						if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}
						blur.style.background = 'url('+pictures[i].substr(0,pictures[i].length-4)+'_blur.jpg) no-repeat center';
						blur.style.backgroundSize = 'cover';
						pic1.style['-webkit-transition'] = 'all 0s ease';
						pic1.style.width = '';
						dots.children[temp].style.border = 'none';
						dots.children[i].style.border = '1px solid white';
						resume();
					}, 1000);
				/*if(i==0) {
					pic1.style.background = 'url('+pictures[len]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				} else if(i==len) {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[0]+') no-repeat center';
				} else {
					pic1.style.background = 'url('+pictures[i-1]+') no-repeat center';
					pic2.style.background = 'url('+pictures[i]+') no-repeat center';
					pic3.style.background = 'url('+pictures[i+1]+') no-repeat center';
				}*/
				pic1.style.backgroundSize = 'cover';
				pic2.style.backgroundSize = 'cover';
				pic3.style.backgroundSize = 'cover';
				/*i++;
				if(i>len) {
					i=0;
				}*/
				//this.timeout = setTimeout(function() {
					
				//}, 3000);
				//resume();
			}, false);
			resume();
			
			
			
			var core = {
			register: function(){
    	var temp = document.createElement('div');
    	temp.id="regbox";
    	temp.style.cssText = 'position:absolute;top:0px;left:0px;width:257px;height:250px;right:0px;bottom:0px;background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#eaeaea\',GradientType=0 );border-radius: 10px;border: 1px solid gray;z-index:2147487;margin:auto;padding:5px;';
    	document.body.appendChild(temp);
    	core.getreg(temp);
    },
    popup: function() {
    	var temp = document.createElement('div');
    	temp.id="regbox";
    	temp.style.cssText = 'position:absolute;top:0px;left:0px;width:257px;height:60px;right:0px;bottom:0px;background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#ffffff\', endColorstr=\'#eaeaea\',GradientType=0 );border-radius: 10px;border: 1px solid gray;z-index:2147487;margin:auto;padding:5px;';
    	document.body.appendChild(temp);
    	temp.innerHTML = '<div style="position: absolute;top: -13px;right: -15px;background: black;border-radius: 20px;width: 25px;height: 25px;text-align: center;font-weight: bold;color: white;line-height: 25px;font-size: 16px;box-shadow: 0px 0px 10px 0px black;cursor: pointer;font-family: sans-serif;border: 1px solid white;" onclick="this.parentNode.style[\'transform\'] = \'scale(0.1)\';this.parentNode.style[\'-ms-transform\'] = \'scale(0.1)\'; this.parentNode.style[\'-webkit-transform\'] = \'scale(0.1)\'; var temp = this;window.setTimeout(function(){document.body.removeChild(temp.parentNode);}, 200)">X</div><div style="position: relative;width: 250px;left: 0;right: 0;margin: auto;text-align: left;font-family: open sans;font-weight: normal;font-size: 20px;">Please check your email to complete the registration</div>';
    },
    getreg: function(node){
    	var node = node;
    	node.style['-webkit-transition'] = 'all 1s ease';
    	var ajax = new XMLHttpRequest();
    		ajax.open('GET', 'registerBeta.php', true);
    		ajax.onreadystatechange = function(){
    			if(ajax.readyState == 4) {
    				node.innerHTML = ajax.responseText;
    				eval(node.getElementsByTagName('script')[0].innerHTML);
    				var head = document.createElement('div');
    				head.style.cssText = 'position: relative;height: 50px;font-family: open sans;font-size: 30px;font-weight: normal;text-align: center;';
    				head.appendChild(document.createTextNode('Register'));
    				var temp = document.createElement('form');
    				temp.style['font-family'] = 'open sans';
    				temp.username = document.createElement('input');
    				temp.username.className = 'username';
    				temp.username.style.cssText = 'position: relative;border: 1px solid grey;width: 250px;left: 0;right: 0;margin: 0 auto;display: block;border-radius: 5px;height: 30px;margin-top: 5px;font-size: 20px;font-family: open sans;padding: 0 5px;background: -moz-linear-gradient(top, #e5e5e5 0%, #f6f6f6 53%, #ffffff 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e5e5), color-stop(53%,#f6f6f6), color-stop(100%,#ffffff));background: -webkit-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: -o-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: -ms-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: linear-gradient(to bottom, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);';
    				temp.username.head = document.createElement('div');
    				temp.username.head.style.cssText = 'position: relative;width: 100%;text-align: center;height: 30px;line-height: 30px;font-size: 20px;';
    				temp.username.head.appendChild(document.createTextNode('Username:'));
    				temp.email = document.createElement('input');
    				temp.email.className = 'email';
    				temp.email.style.cssText = 'position: relative;border: 1px solid grey;width: 250px;left: 0;right: 0;margin: 0 auto;display: block;border-radius: 5px;height: 30px;margin-top: 5px;font-size: 20px;font-family: open sans;padding: 0 5px;background: -moz-linear-gradient(top, #e5e5e5 0%, #f6f6f6 53%, #ffffff 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e5e5), color-stop(53%,#f6f6f6), color-stop(100%,#ffffff));background: -webkit-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: -o-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: -ms-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);background: linear-gradient(to bottom, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%);';
    				temp.email.head = document.createElement('div');
    				temp.email.head.style.cssText = 'position: relative;width: 100%;text-align: center;height: 30px;line-height: 30px;font-size: 20px;';
    				temp.email.head.appendChild(document.createTextNode('Email:'));
    				temp.send = document.createElement('input');
    				temp.send.style.cssText = 'position: relative;top: 10px;border: 1px solid gray;outline: none;border-radius: 5px;height: 35px;width: 250px;left: 0;right: 0;margin: 0 5px;background: -moz-linear-gradient(top, #fcfcfc 0%, #ededed 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#ededed));background: -webkit-linear-gradient(top, #fcfcfc 0%,#ededed 100%);background: -o-linear-gradient(top, #fcfcfc 0%,#ededed 100%);background: -ms-linear-gradient(top, #fcfcfc 0%,#ededed 100%);background: linear-gradient(to bottom, #fcfcfc 0%,#ededed 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#fcfcfc\', endColorstr=\'#ededed\',GradientType=0 );';
    				temp.username.type = 'text';
    				temp.email.type = 'text';
    				temp.send.type = 'submit';
    				temp.appendChild(head);
    				temp.appendChild(temp.username.head);
    				temp.appendChild(temp.username);
    				temp.appendChild(temp.email.head);
    				temp.appendChild(temp.email);
    				temp.appendChild(temp.send);
    				temp.action = 'javascript:void(0);';
    				temp.onsubmit = function() {
    					var temp = this;
    					core.sendreg(temp.querySelector('.username').value,
							temp.querySelector('.email').value,
							temp.parentNode.querySelector('.beta').innerHTML
						);
						return false;
    				};
    				/*var temp = new FormMkr ('Sign-up', function() {
	var temp = document.querySelector('.FormMkr');
	core.sendreg(temp.querySelector('.username').value,
		temp.querySelector('.email').value,
		temp.querySelector('.beta').value
	);
	return false;
	},
 {text: 'Sign-up', css: 'height:50px; font-weight: bold; color: white;border-radius:8px;'},
 [
  {type: ''    , text: 'Username:', css: '', placeholder:'Username', class:'username'},
  {type: 'email', text: 'Email:', css: '', placeholder:'Email', class:'email'},
   {type: 'hidden'   , text: 'beta:'   , css: ''                        , class:'beta', value:node.getElementsByTagName('betacode')[0].innerHTML}
 ],
 [
  {type: 'submit', text: 'Sign-up'}
 ]
);

temp.design = 'round';
//temp.design = 'flat';
temp.themecolors = ['rgba(0,0,0,0.5)', 'transparent', 'rgba(0,0,0,0.5)'];*/
node.appendChild(temp);
    			}
    		}
    		ajax.send();
    },
    sendreg: function(user, mail, beta){
    	var regit = new XMLHttpRequest();
                         var sendit = 'username='+user+'&email='+mail+'&betacode='+beta+'&t='+new Date().getTime();
                         regit.open("POST", "Betaprocess.php", true);
                         regit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        regit.onreadystatechange = function() {
                               if(regit.readyState == 4){
                               	window.testresp = regit.responseText;
                               	if(regit.responseText=="Records added to the database<p>Message successfully sent!</p>"){
                               		//MainTools.Notify(regit.responseText);
                               		//document.getElementById('regbox').innerHTML += '<div style="position: relative;width: 100%;text-align: center;color: blue;font-weight: bold;">An Email has been sent to you to verify you email account.</div>'
                               		document.body.removeChild(document.getElementById('regbox'));
                               		core.popup();
                               		<? if($_GET["sub"]){ ?>
                               		var sub = new XMLHttpRequest();
                         var sendit2 = 'user='+user+'&sub=<? echo $sub; ?>&key=<? echo $_GET["key"] ?>';
                         sub.open("POST", "subdomains/signup.php", true);
                         sub.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                         //checkit.setRequestHeader("Content-length", sendit.length);
                         //checkit.setRequestHeader("Connection", "close");
                        sub.onreadystatechange = function() {
                               if(sub.readyState == 4){
                               		alert(sub.responseText);
                               }
                        }
                        sub.send(sendit2);
                        <? }; ?>
                               	} else {
                               		//MainTools.Notify(regit.responseText);
                               		core.getreg(document.getElementById('regbox'));
                               		//setTimeout(function(){location.href.reload();}, 5000);
                               	}
                               	console.log(regit.responseText);
                               };
                         };
                         regit.send(sendit);
    }
			};
			
		</script>
		
	</body>
</html>
canvas = document.querySelector("canvas");
progress = document.querySelector(".progressText");
progressMeter = document.querySelector(".meter progress");
context = canvas.getContext("2d");
radius = 48;
//14, 10
//var bluDot = {x: 14, y: 10};
var bluDot = {x: 11, y: 6};
gradient1 = context.createRadialGradient(radius+bluDot.x*radius*2, radius+bluDot.y*radius*2, 0,radius+bluDot.x*radius*2, radius+bluDot.y*radius*2,1400);
gradient1.addColorStop(0, "#666");
gradient1.addColorStop(1, "#333");
gradient2 = context.createRadialGradient(radius+bluDot.x*radius*2, radius+bluDot.y*radius*2, 0,radius+bluDot.x*radius*2, radius+bluDot.y*radius*2,1400);
gradient2.addColorStop(0, "rgba(102,102,102,0)");
gradient2.addColorStop(1, "#333");
var lerp = function(s,e,i){
	return s+(e-s)*i;
};
var rgba = function(r,g,b,a){
	return "rgba("+[Math.round(r),Math.round(g),Math.round(b),Math.round(a)].join(',')+")";
}
var draw = function(loaded){
//	loaded %= 1;
	context.fillStyle = gradient1;
	context.fillRect(0,0,1600,1200);
	
	context.lineWidth = 10;
	context.fillStyle="#333";
	context.strokeStyle="#777";
	for(var x = 0; x <= 19; x++){
		for(var y = 0; y <= 14; y++){
			if(x == bluDot.x && y == bluDot.y)
				continue;
			context.beginPath();
			context.arc(radius+x*radius*2,radius+y*radius*2,radius-10, 0, Math.PI*2);
			context.fill();
			context.stroke();
			context.closePath();
		}
	}
	context.beginPath();
	
	context.fillStyle = gradient2;
	context.fillRect(0,0,1600,1200);
	
	//context.fillStyle="#2a7fff";
	var fillP = Math.min(loaded/0.5,1);
	context.fillStyle=rgba(lerp(0x33,0x2a,fillP), lerp(0x33,0x7f,fillP), 
						   lerp(0x33,0xff,fillP), 255);
	//context.strokeStyle = "#0055d4";
	context.strokeStyle=rgba(lerp(0x77,0x00,fillP), lerp(0x77,0x75,fillP), 
						   lerp(0x77,0xd4,fillP), 255);
	context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, radius-10, 0, Math.PI*2);
	context.fill();
	context.stroke();
	context.closePath();
	if(loaded > 0.5){
		var circlePercent = Math.min((loaded-0.5)/0.25, 1);
		context.beginPath();
		//#156ae9
		context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, lerp(radius-10,radius*2, circlePercent), 0, Math.PI*2);
		context.strokeStyle="rgba("+0x15+","+0x6a+","+0xe9+","+circlePercent+")";
		context.stroke();
		context.closePath();
	}
	if(loaded > 0.75){
		var circlePercent = Math.min((loaded-0.75)/0.25, 1);
		context.beginPath();
		//#156ae9
		context.arc(radius + bluDot.x*radius*2, radius+bluDot.y*radius*2, lerp(radius-10,radius*3, circlePercent), 0, Math.PI*2);
		context.strokeStyle="rgba("+0x55+","+0x99+","+0xff+","+circlePercent*0.75+")";
		context.lineWidth*=3;
		context.stroke();
		context.closePath();
	}
};
var percentLoaded = 0;
draw(1);
setInterval(function(){
                if(progressMeter.value < 1) {
                      progressMeter.value += .1;
                } else {
                      progressMeter.value = 0;
                }
           }, 10);
var loadCore = function(every, done){
	//progress.innerHTML = "Loading the core";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
var loadDock = function(every, done){
	//progress.innerHTML = "Loading the dock";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
var loadPrefs = function(every, done){
	//progress.innerHTML = "Loading user preferences";
	var loadTime = 10;
	var packets = 10;
	window.loadedPackets = 0;
	every = every || function(){};
	done = done || function(){};
	function go(){
		//every(progressMeter.value = loadedPackets/packets*2);
		loadedPackets++;
		if(packets > loadedPackets)
			setTimeout(go, loadTime);
		else
			done();
	};
	go();
}
	
	loadCore(function(percent){
		draw(percent*0.5);
	},function(){loadDock(function(percent){
		draw(0.50 + percent*0.25);
	},function(){
		loadPrefs(function(percent){
			draw(0.75+percent*0.25);
		},function(){
			var audio = document.querySelector("audio");
			audio.play();
			/*canvas.style.display='none';
			progress.style.display='none';
			progressMeter.style.display='none';*/
			setTimeout("document.getElementById('loading').style.opacity=0;", 500);
			setTimeout("document.body.removeChild(document.getElementById('loading'));", 500);
		});
	})});
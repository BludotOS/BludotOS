<html>
<head>
<style>
body {
background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea));
background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);
background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);
background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);
background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 );
}
h2 {
	color:grey;
}
h3 {
	color:grey;
}
h4 {
	color:grey;
}
p {
	color:grey;
}






body {
  font-family: Arial, freesans, sans-serif;
  margin:0;
  padding:0;
}

.FormMkr {
  position:relative;
  width:230px;
  height:auto;
  padding:0px;
  margin:0 auto;
  top:0px;
  background:transparent;
  
}

.FormMkr .topbar {
  position:relative;
  top:0px;
  left:0px;
  width:100%;
  text-align:center;
  margin:0;
  margin-bottom:25px;
  padding:0;
  border-spacing:0;
  
}

.FormMkr .holder {
  position: relative;
width: 230px;
height: auto;
background-color: #fff;
  padding:0 5px;
margin:0 auto 30px auto;
  line-height:32px;
  
}

.FormMkr .holder .text {
  position:relative;
  width:100%;
  height:35px;
  margin:0;
  padding:0;
  color:white;
  
  font-size:25px;
  line-height:35px;
  text-align:center;
  
}

.FormMkr input {
  position:relative;
  width:100%;
  height:30px;
  border-spacing:0;
  padding:0;
  border:1px solid grey;
  outline:none;
  margin:8px auto;
  font-size:25px;
  line-height:30px;
  margin-bottom:8px;
}

.range-container {
  position:relative;
  width:100%;
  height:40px;
  background:transparent;
  left:0px;
  padding:0px;
  top:50%;
  margin-top:-5px;
}

.range-container .range {
  position:absolute;
  background:#d1d1d1;
  right:10px;
  height:4px;
  left:10px;
  top:15px;
  border-radius:4px;
}

.range-container .range .knob {
  position:absolute;
  width:15px;
  height:15px;
  background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iNDElIiBzdG9wLWNvbG9yPSIjMDAyZDYyIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwNTRlNSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9yYWRpYWxHcmFkaWVudD4KICA8cmVjdCB4PSItNTAiIHk9Ii01MCIgd2lkdGg9IjEwMSIgaGVpZ2h0PSIxMDEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
  top:-5px;
  border-radius:15px;
  text-align:center;
}

.range-container .info {
position: absolute;
height: auto;
background: white;
  border:1px solid grey;
  top: -38px;
color: grey;
left: 50%;
  border-radius:3px;
opacity: 0;

white-space: nowrap;
  padding:0;
  margin:0;
  margin-left:-9px;
}

.range-container .info .font {
  width: auto;
height: 8px;
  line-height:8px;
  text-size:5px;
margin: 0;
  left:0px;
padding: 0px 5px;
}

.range-container .info:after, .range-container .info:before {
  top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.range-container .info:after {
  border-color: rgba(136, 183, 213, 0);
	border-top-color: white;
	border-width: 4px;
	left: 50%;
	margin-left: -4px;
}

.range-container .info:before {
  border-color: rgba(194, 225, 245, 0);
	border-top-color: grey;
	border-width: 5px;
	left: 50%;
	margin-left: -5px;
}


</style>
</head>
<body>
<?
$betacoded = base_convert(mt_rand(0x1D39D3E06400000, 0x41C21CB8E0FFFFFF), 36, 15);
?>
<div style="position: absolute;top: -13px;right: -15px;background: black;border-radius: 20px;width: 25px;height: 25px;text-align: center;font-weight: bold;color: white;line-height: 25px;font-size: 16px;box-shadow: 0px 0px 10px 0px black;cursor: pointer;font-family: sans-serif;border: 1px solid white;" onclick="this.parentNode.style['transform'] = 'scale(0.1)';this.parentNode.style['-ms-transform'] = 'scale(0.1)'; this.parentNode.style['-webkit-transform'] = 'scale(0.1)'; var temp = this;window.setTimeout(function(){document.body.removeChild(temp.parentNode);}, 200)">X</div>
<script>
var FormMkr = function(classname, action, title, inputs, end) {
  this.Form = function() {
    return document.createElement('form');
  };
  var form = new this.Form();
  form.onsubmit = action;
  form.action = 'javascript:void(0);';
  form.className = 'FormMkr '+classname;
  form.append = function(node) {
    this.appendChild(node);
  };
  this.Title = function(info) {
    var temp              = document.createElement('div');
    temp.className        = 'topbar';
    temp.text        = document.createTextNode(info.text);
    temp.style.cssText   += info.css;
    temp.style.lineHeight = temp.style.height;
    temp.appendChild(temp.text);
    return temp;
  };
  
  if(title) {
    form.topbar = new this.Title(title);
    //form.append(form.topbar);
  };
  var range = {
  
  container: function() {
    var temp       = document.createElement('div');
    temp.className = 'range-container';
    return temp;
  },
  range: function() {
    var temp       = document.createElement('div');
    temp.className = 'range';
    return temp;
  },
  knob: function() {
   var temp       = document.createElement('div');
   temp.className = 'knob';
   return temp;
  },
  info: function() {
    var temp            = document.createElement('div');
    temp.className      = 'info';
    temp.font           = document.createElement('font');
    temp.font.text = document.createTextNode('0');
    temp.font.className = 'font';
    temp.appendChild(temp.font);
    temp.font.appendChild(temp.font.text);
    return temp;
  },
  constructor: function(start, end) {
    var start = start;
    var end = end;
    var temp        = new this.container();
    temp.range      = new this.range();
    temp.range.knob = new this.knob();
    temp.info       = new this.info();
    temp.appendChild(temp.range);
    temp.range.appendChild(temp.range.knob);
    temp.range.knob.appendChild(temp.info);
    var mouseup = function(){
      temp.info.style.opacity = 0;
      document.removeEventListener('mousemove', mousemove, false);
      delete mousemove.temp;
      delete mousemove.tempY;
    };
    var mousemove = function(e) {
      var e = e || window.event;
      this.temp = this.temp || e.pageX;
      this.tempY = this.tempY || e.pageY;
      if((e.pageX-this.temp) >= 0 && (e.pageX-this.temp) <= (temp.range.clientWidth-10)) {
        this.val                   = (e.pageX-this.temp);
        temp.info.style.opacity    = 1;
        temp.info.font.text.data   = Math.floor(((this.val)/(temp.range.clientWidth-10))*end);
        temp.info.style.marginLeft = -(temp.info.clientWidth/2)-1+'px';
      } else {
        if(e.page-this.temp <= 0) {
          this.val = 0;
        } else if(e.pageX-this.temp >= (temp.range.clientWidth-10)) {
          this.val = (temp.range.clientWidth-10);
        }
      }
      console.log(e.pageY-this.tempY);
      if((e.pageY-this.tempY) < -40 || (e.pageY-this.tempY) > 30)
      {
        //mouseup();
      }
      temp.range.knob.style.left = this.val+'px';
      window.addEventListener('mouseup', mouseup, false);
    };
    var mousedown = function() {
      //temp.parentNode.addEventListener('mousemove', mousemove, false);
      document.addEventListener('mousemove', mousemove, false);
    };
    temp.range.knob.addEventListener('mousedown', mousedown, false);
    
    return temp;
  }
};
  this.Input = function(info) {
    var div            = document.createElement('div');
    if(info.type == 'range') {
      div.className       = 'holder '+info.type;
      div.text            = document.createElement('div');
      div.text.text       = document.createTextNode(info.text);
      div.text.className  = 'text';
      div.input           = range.constructor(info.start, info.end);
      div.input.className += ' '+info.class;
      div.appendChild(div.text);
      div.appendChild(div.input);
      div.text.appendChild(div.text.text);
      div.onselectstart = function(){return false};
    } else if(info.type == 'button' || info.type == 'submit') {
      div.className           = 'holder input-'+info.type;
      div.input               = document.createElement('input');
      div.input.className 	  = info.class;
      div.input.type          = info.type;
      div.input.value         = info.text;
      if(info.style) {
        div.style.cssText    += info.css;
      }
      if(info.placeholder) {
        div.input.placeholder = info.placeholder;
      }
      div.appendChild(div.input);
    } else if(info.type == 'hidden') {
    	div = document.createElement('input');
    	div.type = info.type;
    	div.className = info.class || 'input';
    	div.value = info.value;
    	div.style.css = '';
    } else {
      div.className           = 'holder input-'+info.type;
      div.text                = document.createElement('div');
      div.text.text           = document.createTextNode(info.text);
      div.text.className      = 'text';
      div.appendChild(div.text);
      div.input               = document.createElement('input');
      div.input.className 	  = info.class;
      div.input.type          = info.type;
      if(info.style) {
        div.style.cssText    += info.css;
      }
      if(info.placeholder) {
        div.input.placeholder = info.placeholder;
      }
      div.appendChild(div.input);
      div.text.appendChild(div.text.text);
    }
    return div;
  };
  
  if(inputs) {
    form.inputs = [];
  for(var i in inputs) {
    var input = new this.Input(inputs[i]);
    form.inputs.push(input);
  };
  };
  for(var i in form) {
    if(form[i] instanceof Node) {
      console.log(i);
      var blackL = ['lastElementChild', 'firstElementChild', 'ownerDocument', 'lastChild', 'firstChild'];
      if(blackL.indexOf(i) == -1){
        if(form[i].tagName) {
          form.append(form[i]);
        }
      }
    } else if((form[i]) instanceof Array) {
      for(var a in form[i]) {
        form.append(form[i][a]);
      }
    }
  };
  if(end) {
    //form.last = [];
    var num = form.inputs.length;
   for(var i in end) {
    form.inputs.push(new this.Input(end[i]));
   }
    for(var a in form.inputs) {
      if(a >= num)
      {
       form.append(form.inputs[a]); 
      }
    }
  }
  form.designV = 'default';
  Object.defineProperties(form, {
    "design_": {
      get: function ()
      {
        return this.designV;
      }
    },
    "design": {
      set: function (x) {
        if(x == 'flat') {
          this.style.borderRadius        = 0+'px';
          this.topbar.style.borderRadius = 0+'px';
          for(var i in this.inputs) {
            this.inputs[i].style.borderRadius       = 0+'px'; 
            this.inputs[i].input.style.borderRadius = 0+'px';
            this.inputs[i].input.style.textIndent   = 0+'px';
          }
        } else if(x == 'round') {
          this.topbar.style['border-top-left-radius']  = 8+'px';
          this.topbar.style['border-top-right-radius'] = 8+'px';
          this.style.borderRadius                      = 8+'px';
          for(var i in this.inputs) {
            if(this.inputs[i].input) {
            	this.inputs[i].style.borderRadius       = 5+'px';
	            this.inputs[i].input.style.borderRadius = 5+'px';
            	this.inputs[i].input.style.textIndent   = 4+'px';
            };
          }
        };
      }
    },
    "themecolors_": {
      get: function() {
       return 0; 
      }
    },
    "themecolors": {  
      set: function(x) {
        this.topbar.style.background      = x[0];
        this.style.background             = x[1];
        for(var i in this.inputs) {
          this.inputs[i].style.background = x[2];
          
        }
      }
    }
});
  return form;
};

</script>
<betacode class="beta" style="display: none;"><? echo $betacoded; ?></betacode>
</body>
</html>
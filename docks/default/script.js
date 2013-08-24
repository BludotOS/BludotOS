var SimpleDock = {
    alertme:function()
    {
        alert('test');
    },
    docklock:function()
    {
    	this.lock = this.lock==true ? false : true;
    },
    addIcon:function(node)
    {
        var iconNodes = document.getElementById('iconNodes');
        var iconC = document.createElement('div');
        var label = document.createElement('div');
        var icon = document.createElement('img');
        var Ricon = document.createElement('img');
        icon.className = "icon";
        Ricon.className = "Ricon";
        iconC.className = "iconcontainer";
        label.className = "label";
        label.innerHTML = '<font style="width:auto;height:20px;margin:0;padding: 0px 5px 0px 5px;">'+node.label+'</font>';
        icon.src = node.name+node.extension;
        Ricon.src = node.name+node.extension;
        if(this.findApp('Trash') != null)
        {
        	iconNodes.insertBefore(iconC, iconNodes.children[iconNodes.children.length-1]);
        	SimpleDock.nodes.push(node);
        } else {
        	iconNodes.appendChild(iconC);
        }
        iconC.appendChild(label);
        iconC.appendChild(icon);
        iconC.appendChild(Ricon);
        iconC.id = node.label;
        iconC.style.width = this.min+'px';
        iconC.style.marginTop = (-(this.min/2))+this.height+'px';
        var shim = document.createElement('div');
        shim.style.cssText = 'position:absolute;top:0px;left:0px;bottom:0px;right:0px;background:transparent;z-index:5;';
        shim.onclick = node.onclick;
        iconC.appendChild(shim);
        icon.style.zIndex = 1;
        Ricon.style.zIndex = 1;
        Ricon.style.top = this.height+'px';
        label.style.zIndex = 1;
        label.style.marginLeft = -(label.clientWidth/2)+'px';
        this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
        iconC.oncontextmenu = function(){
            label.innerHTML = '<ul class="label-R" style="display:block;width:100px;text-align:center;overflow:hidden;border-radius:10px;"></ul>';
            label.onmouseout = function(){
                label.timeout = setTimeout(function(){
                    label.innerHTML = '<font style="width:auto;height:20px;margin:0;padding: 0px 5px 0px 5px;">'+node.label+'</font>';
                    label.style.marginLeft = -(label.clientWidth/2)+'px';
                    label.style.top = parseInt(label.style.top)-label.clientHeight+'px';
                }, 1);
            };
            label.style.zIndex = 6;
            for(i in node.menuItems)
            {
                var temp = document.createElement('li');
                temp.innerHTML = node.menuItems[i];
                temp.onclick = node.menuClick[i];
                temp.style.cssText = 'display:block;width:100%;padding:0px;margin:0px;';
                temp.onmouseover = function(){
                    window.clearTimeout(label.timeout);
                    temp.style.background = 'blue';
                };
                temp.onmouseout = function(){
                    temp.style.background = 'transparent';
                };
            }
            label.children[0].appendChild(temp);
            label.style.top = parseInt(label.style.top)-label.clientHeight+'px';
            label.style.borderRadius = 10+'px';
            label.style.marginLeft = -(label.clientWidth/2)+'px';
            return false;
        };
    },
    update:function(node)
    {
        var node = this.docklets.children[node];
        node.style.width = this.min+'px';
        node.children[2].style.top = this.height+'px';
        node.style.marginTop = (-(this.min/2))+this.height+'px';
        this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
        this.dock.style.height = this.min+'px';
    },
    findApp:function(app){
        for (var f = 0; f < this.docklets.children.length; f++) {
            if (this.docklets.children[f].id == app) {
                return f;
            }
        }
        return null;
    },
    removeApp:function(app){
        var appr = this.findApp(app);
        this.docklets.removeChild(this.docklets.children[appr]);
    },
    findmenuClick:function (addapp2, onclicked3){
        for (var s=0; s < this.nodes[addapp2].menuClick.length; s++) {
            if (this.nodes[addapp2].menuClick[s] !== onclicked3) {
                
            } else {
                return s;
            }
        }
    },
    findmenuItems:function (addapp3, name3){
        for (var p=0; p < this.nodes[addapp3].menuItems.length; p++) {
            if (this.nodes[addapp3].menuItems[p] !== name3) {
                
            } else {
                return p;
            }
        }
    },
    addclick:function (app, name, onclicked){
        var addapp = this.findApp(app);
        for (var j=0; j < name.length; j++) {
            if(this.nodes[addapp].menuItems)
            {
            	this.nodes[addapp].menuItems.push(name[j]);
            }
            if(this.nodes[addapp].menuClick)
            {
            	this.nodes[addapp].menuClick.push(onclicked[j]);
            }
        }
    },
    removeclick:function (app, name2){
        var addapp = this.findApp(app);
        for (var u=0; u < name2.length; u++) {
            var aname = this.findmenuItems(addapp, name2[u]);
            this.nodes[addapp].menuItems.splice(aname, 1);
            this.nodes[addapp].menuClick.splice(aname, 1);
        };
    },
    cheight:function(size)
    {
    	for(i in this.docklets.children)
    	{
    		this.docklets.children[i].margintTop = (-(this.min/2))-size+'px';
    	};
    },
    minsize:function(size)
    {
    	this.min = size;
    	for(i in this.docklets.children)
    	{
    		this.update(i);
    	};
    },
    maxsize:function(size)
    {
    	this.max = size;
    },
    magT:function()
    {
    	this.mag = this.mag==true ? false : true;
    },
    mousemove:function(){
        if(this.mag == true && this.lock == false)
        {
            if(this.closeTimeout)
            {
                clearTimeout(this.closeTimeout);
            }
            this.openInterval = true;
            //var speed = 3000;
            //var range = 3;
            if(!scale)
            {
                var scale = 0;
            };
            scale = 0.125;
            this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
            var e = window.event;
            var target = e.target || e.srcElement;
            var index = 0;
            while(this.docklets.children[index].lastChild != target) index++;
            var across = (e.layerX || e.offsetX) / this.docklets.children[index].clientWidth;
            var size = this.min + scale * (this.max - this.min);
            document.getElementById('iconNodes').style.top = -(this.max-this.min)+'px';
            //scale = 0.125;
            for(i in this.docklets.children)
            {
                if(i < (index-this.range) || i > (index+this.range))
                {
                    if(this.docklets.children[i])
                    {
                        this.docklets.children[i].style.width = this.min+'px';
                        this.docklets.children[i].style.top = -(this.max-this.min)+'px';
                    };
                } else if(this.docklets.children[i] && i < index )
                {
                    var acrosst = this.min+Math.round((this.max - this.min-1)*(Math.cos((i - index - across + 1) / this.range * Math.PI)+1) / 2);
                    this.docklets.children[i].style.width = acrosst+'px';
                    this.docklets.children[i].style.top = acrosst-this.max+'px';
                } else if(i == index)
                {
                    this.docklets.children[i].style.width = this.max+'px';
                    this.docklets.children[i].style.top = this.max-this.max+'px';
                } else if(this.docklets.children[i] && i > index)
                {
                    var acrosstt = this.min+Math.round((this.max - this.min-1)*(Math.cos((i - index - across) / this.range * Math.PI)+1) / 2);
                    this.docklets.children[i].style.width = acrosstt+'px';
                    this.docklets.children[i].style.top = acrosstt-this.max+'px';
                };
            };
        };
    },
    restoreapp:function()
    {
        for(a in this.docklets.children)
			        {
			            if(this.docklets.children[a])
			            {
                			this.docklets.children[a].style.width = this.min+'px';
			                this.docklets.children[a].style.top = 0+'px';
			            };
			            this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
			        };
    },
    mouseout:function()
    {
    	if(this.lock == false)
    	{
        	this.closeTimeout = window.setTimeout(
	            function(){
                	if(SimpleDock.openInterval == true)
	                {
                    	SimpleDock.openInterval = false;
	                }
        			//this.docklets = document.getElementById('iconNodes');
			        document.getElementById('iconNodes').style.top = 0+'px';
			        SimpleDock.restoreapp();
				}, 1);
    	}
    },
    launch:function(dock, nodes, min, max, range, height, speed, mag){
    this.mag = mag;
    this.min = min;
    this.max = max;
    this.range = range;
    this.height = height;
    this.speed = speed;
    this.nodes = nodes;
    this.dock = document.getElementById('dock');
    this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
    this.iconSizes = [];
    this.dock.style.height = min+'px';
    this.lock = false;
    this.docklets = document.getElementById('iconNodes');
    this.dock.onmousemove = function(){
        SimpleDock.mousemove();
    };
    this.dock.onmouseout = function(){
        SimpleDock.mouseout();
    };
    for(i in nodes)
    {
        this.addIcon(nodes[i]);
    };
    var previousOrientation = window.orientation;
var checkOrientation = function(){
        setTimeout(function(){
        	window.dock.dock.style.left = (window.innerWidth/2)-(window.dock.dock.clientWidth/2)+'px';
        }, 500);
};

window.addEventListener("resize", checkOrientation, false);
window.addEventListener("orientationchange", checkOrientation, false);

// (optional) Android doesn't always fire orientationChange on 180 degree turns
setInterval(checkOrientation, 2000);
    return this;
    }
};
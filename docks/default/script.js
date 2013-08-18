function SimpleDock(dock, nodes, min, max, range, height, speed, mag) {
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
    lock = false;
    this.docklock = function()
    {
    	lock = lock==true ? false : true;
    };
    this.addIcon = function(node)
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
        } else {
        	iconNodes.appendChild(iconC);
        }
        iconC.appendChild(label);
        iconC.appendChild(icon);
        iconC.appendChild(Ricon);
        iconC.id = node.label;
        iconC.style.width = min+'px';
        iconC.style.marginTop = (-(min/2))+height+'px';
        var shim = document.createElement('div');
        shim.style.cssText = 'position:absolute;top:0px;left:0px;bottom:0px;right:0px;background:transparent;z-index:5;';
        shim.onclick = node.onclick;
        iconC.appendChild(shim);
        icon.style.zIndex = 1;
        Ricon.style.zIndex = 1;
        Ricon.style.top = height+'px';
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
        nodes.push(node);
    };
    this.update = function(node)
    {
        var node = docklets.children[node];
        node.style.width = min+'px';
        node.children[2].style.top = height+'px';
        node.style.marginTop = (-(min/2))+height+'px';
        dock.style.left = (window.innerWidth/2)-(dock.clientWidth/2)+'px';
        dock.style.height = min+'px';
    };
    var docklets = document.getElementById('iconNodes');
    this.dock.onmousemove = function(){
        if(mag == true && lock == false)
        {
            if(window.closeTimeout)
            {
                clearTimeout(window.closeTimeout);
            }
            this.openInterval = true;
            var speed = 3000;
            var range = 3;
            if(!scale)
            {
                var scale = 0;
            };
            scale = 0.125;
            dock.style.left = (window.innerWidth/2)-(dock.clientWidth/2)+'px';
            var e = window.event;
            var target = e.target || e.srcElement;
            var index = 0;
            while(docklets.children[index].lastChild != target) index++;
            var across = (e.layerX || e.offsetX) / docklets.children[index].clientWidth;
            var size = min + scale * (max - min);
            document.getElementById('iconNodes').style.top = -(max-min)+'px';
            //scale = 0.125;
            for(i in docklets.children)
            {
                if(i < (index-range) || i > (index+range))
                {
                    if(docklets.children[1])
                    {
                        docklets.children[i].style.width = min+'px';
                        docklets.children[i].style.top = -(max-min)+'px';
                    };
                } else if(docklets.children[i] && i < index )
                {
                    var acrosst = min+Math.round((max - min-1)*(Math.cos((i - index - across + 1) / range * Math.PI)+1) / 2);
                    docklets.children[i].style.width = acrosst+'px';
                    docklets.children[i].style.top = acrosst-max+'px';
                } else if(i == index)
                {
                    docklets.children[i].style.width = max+'px';
                    docklets.children[i].style.top = max-max+'px';
                } else if(docklets.children[i] && i > index)
                {
                    var acrosstt = min+Math.round((max - min-1)*(Math.cos((i - index - across) / range * Math.PI)+1) / 2);
                    docklets.children[i].style.width = acrosstt+'px';
                    docklets.children[i].style.top = acrosstt-max+'px';
                };
            };
        };
    };
    this.findApp = function(app){
        for (var f = 0; f < docklets.children.length; f++) {
            if (docklets.children[f].id == app) {
                return f;
            }
        }
        return null;
    }
    this.removeApp = function(app){
        var appr = this.findApp(app);
        docklets.removeChild(docklets.children[appr]);
    };
    this.findmenuClick = function (addapp2, onclicked3){
        for (var s=0; s < nodes[addapp2].menuClick.length; s++) {
            if (nodes[addapp2].menuClick[s] !== onclicked3) {
                
            } else {
                return s;
            }
        }
    }
    this.findmenuItems = function (addapp3, name3){
        for (var p=0; p < nodes[addapp3].menuItems.length; p++) {
            if (nodes[addapp3].menuItems[p] !== name3) {
                
            } else {
                return p;
            }
        }
    };
    this.addclick = function (app, name, onclicked){
        var addapp = this.findApp(app);
        for (var j=0; j < name.length; j++) {
            if(nodes[addapp].menuItems)
            {
            	nodes[addapp].menuItems.push(name[j]);
            }
            if(nodes[addapp].menuClick)
            {
            	nodes[addapp].menuClick.push(onclicked[j]);
            }
        }
    };
    this.removeclick = function (app, name2){
        var addapp = this.findApp(app);
        for (var u=0; u < name2.length; u++) {
            var aname = this.findmenuItems(addapp, name2[u]);
            nodes[addapp].menuItems.splice(aname, 1);
            nodes[addapp].menuClick.splice(aname, 1);
        };
    };
    this.cheight = function(size)
    {
    	for(i in docklets.children)
    	{
    		docklets.children[i].margintTop = (-(min/2))-size+'px';
    	};
    };
    this.minsize = function(size)
    {
    	min = size;
    	for(i in docklets.children)
    	{
    		this.update(i);
    	};
    };
    this.maxsize = function(size)
    {
    	max = size;
    };
    this.magT = function()
    {
    	mag = mag==true ? false : true;
    }
    this.dock.onmouseout = function()
    {
    	if(lock == false)
    	{
        	window.closeTimeout = window.setTimeout(
	            function(){
                	if(this.openInterval == true)
	                {
                    	this.openInterval = false;
	                }
        			var docklets = document.getElementById('iconNodes');
			        document.getElementById('iconNodes').style.top = 0+'px';
			        for(a in docklets.children)
			        {
			            if(docklets.children[a])
			            {
                			docklets.children[a].style.width = min+'px';
			                docklets.children[a].style.top = 0+'px';
			            };
			            dock.style.left = (window.innerWidth/2)-(dock.clientWidth/2)+'px';
			        };
				}, 1);
    	}
    };
    for(i in nodes)
    {
        this.addIcon(nodes[i]);
    };
    return this;
};
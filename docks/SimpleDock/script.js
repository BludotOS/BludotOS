function SimpleDock(dock, nodes, min, max, range, height, speed, mag) {
    this.mag = mag;
    this.dock = document.getElementById('dock');
    this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
    this.iconSizes = [];
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
        iconC.onclick = node.onclick;
        icon.src = node.name+node.extension;
        Ricon.src = node.name+node.extension;
        iconNodes.appendChild(iconC);
        iconC.appendChild(label);
        iconC.appendChild(icon);
        iconC.appendChild(Ricon);
        var shim = document.createElement('div');
        shim.style.cssText = 'position:absolute;top:0px;left:0px;bottom:0px;right:0px;background:transparent;z-index:5;';
        iconC.appendChild(shim);
        icon.style.zIndex = 1;
        Ricon.style.zIndex = 1;
        label.style.zIndex = 1;
        label.style.marginLeft = -(label.clientWidth/2)+'px';
        this.dock.style.left = (window.innerWidth/2)-(this.dock.clientWidth/2)+'px';
        iconC.oncontextmenu = function(){
            label.innerHTML = '<ul class="label-R" style="width:100px;text-align:center;overflow:hidden;border-radius:10px;"></ul>';
            label.onmouseout = function(){
                label.timeout = setTimeout(function(){
                    label.innerHTML = '<font style="width:auto;height:20px;margin:0;padding: 0px 5px 0px 5px;">'+node.label+'</font>';
                    label.style.marginLeft = -(label.clientWidth/2)+'px';
                }, 1);
            };
            label.style.zIndex = 20;
            for(i in node.menuItems)
            {
                var temp = document.createElement('li');
                temp.innerHTML = node.menuItems[i];
                temp.onclick = node.menuClick[i];
                temp.style.cssText = 'width:100%;padding:0px;margin:0px;';
                temp.onmouseover = function(){
                    window.clearTimeout(label.timeout);
                    temp.style.background = 'blue';
                };
                temp.onmouseout = function(){
                    temp.style.background = 'transparent';
                };
            }
            label.children[0].appendChild(temp);
            label.style.top = -label.clientHeight+20+'px';
            label.style.borderRadius = 10+'px';
            label.style.marginLeft = -(label.clientWidth/2)+'px';
            return false;
        };
    };
    var docklets = document.getElementById('iconNodes');
    this.dock.onmousemove = function(){
        if(mag == true)
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
            scale = 0.125*range;
            dock.style.left = (window.innerWidth/2)-(dock.clientWidth/2)+'px';
            var e = window.event;
            var target = e.target || e.srcElement;
            var index = 0;
            while(docklets.children[index].lastChild != target) index++;
            var across = (e.layerX || e.offsetX) / docklets.children[index].clientWidth;
            var size = 44 + scale * (docklets.children[index].clientWidth - 44);
            document.getElementById('iconNodes').style.top = -100-Math.round(scale*44)+'px';
            //scale = 0.125;
            for(i in docklets.children)
            {
                if(i < (index-range) || i > (index+range))
                {
                    if(docklets.children[1])
                    {
                        docklets.children[i].style.width = 44+'px';
                        docklets.children[i].style.top = 0+'px';
                    };
                } else if(docklets.children[i] && i < index )
                {
                    var acrosst = 44+Math.round((100 - 44-1)*(Math.cos((i - index - across + 1) / range * Math.PI)+1) / 2);
                    docklets.children[i].style.width = acrosst+'px';
                    docklets.children[i].style.top = acrosst-44+'px';
                } else if(i == index)
                {
                    docklets.children[i].style.width = 100+'px';
                    docklets.children[i].style.top = 100-44+'px';
                } else if(docklets.children[i] && i > index)
                {
                    var acrosstt = 44+Math.round((100 - 44-1)*(Math.cos((i - index - across) / range * Math.PI)+1) / 2);
                    docklets.children[i].style.width = acrosstt+'px';
                    docklets.children[i].style.top = acrosstt-44+'px';
                };
            };
        };
    };
    this.dock.onmouseout = function()
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
                docklets.children[a].style.width = 44+'px';
                docklets.children[a].style.top = 0+'px';
            };
            dock.style.left = (window.innerWidth/2)-(dock.clientWidth/2)+'px';
        };
}, 1);
    }
    for(i in nodes)
    {
        this.addIcon(nodes[i]);
    };
    return this;
};
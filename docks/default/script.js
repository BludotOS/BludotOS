function SimpleDock(node, imageDetails, minimumSize, maximumSize, range, height, speed, skip){
    
    SimpleDock.prototype.max = maximumSize;
    SimpleDock.prototype.min = minimumSize;
    // create a container for the icons and add it to the dock container
    var iconsNode = document.createElement('div');
    node.appendChild(iconsNode);
    node.style.top = SimpleDock.prototype.max-(height*2)-3+'px';
    this.node = node.parentNode;
    // create a container for the reflected icons and add it to the dock container
    var reflectedIconsNode = document.createElement('div');
    node.appendChild(reflectedIconsNode);
    // set the icon containers to centre its contents
    iconsNode.style.textAlign          = 'center';
    iconsNode.style.marginTop = -(SimpleDock.prototype.max+SimpleDock.prototype.min)+'px';
    reflectedIconsNode.style.textAlign = 'center';
    reflectedIconsNode.style.marginTop  = 0 + 'px';
    
    // set the height of the dock containers to equal that of the maximised icons


    iconsNode.style.height  = SimpleDock.prototype.min + 'px';
    reflectedIconsNode.style.height  = SimpleDock.prototype.min + 'px';
    
    // initialise the maximum width to 0
    var maximumWidth  = 0;
    
    // initialise the scale factor to 0
    var scale  = 0;
    var scale2 = 0;
    var size3 = SimpleDock.prototype.min;
    var size2 = 0;
    window.docklock = false;
    SimpleDock.prototype.skip= skip;
    
    // initialise the time-outs and intervals to 0
    var closeTimeout  = null;
    var closeInterval = null;
    var openInterval  = null;
    var newInterval   = null;
    
    // create an array to store images
    var images = [];
    
    // create an array to store the DOM nodes of the icons
    var iconNodes = [];
    
    
    // create an array to store the DOM nodes of reflections of the icons
    var reflectedIconNodes = [];
    
    // create an array to store the sizes of the icons
    var iconSizes = [];
    
    // create label
    var label = [];
    
    
    /* Sets a toolbar image to the specified size. The parameter is:
     *
     * index - the 0-based index of the image to be sized
     */
    SimpleDock.prototype.updateIconPropertiesa = function(index){
    	iconsNode.style.height  = SimpleDock.prototype.min + 'px';
    reflectedIconsNode.style.height  = SimpleDock.prototype.min + 'px';
    	node.style.top = SimpleDock.prototype.max-(height*2)-3+'px';
    	iconsNode.style.marginTop = -(SimpleDock.prototype.max+SimpleDock.prototype.min)+'px';
        iconNodes[index].style.top = -(SimpleDock.prototype.max-SimpleDock.prototype.min)+'px';
        label[index].style.marginLeft = (iconNodes[index].offsetLeft-20+((iconNodes[index].clientWidth-label[index].clientWidth)/2))+'px';
        // set the leftoffset of dock
        document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
        // determine the size for the icon, taking into account the scale factor
        var size = SimpleDock.prototype.min + scale * (iconSizes[index] - SimpleDock.prototype.min);
        // find the index of the appropriate image size
        var sizeIndex = 0;
        while (imageDetails[index].sizes[sizeIndex] < size
               && sizeIndex + 1 < imageDetails[index].sizes.length){
            sizeIndex++;
        }
        
        // check whether the full icon with its caption should be displayed
        if (size == SimpleDock.prototype.max){
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 1;
            
        }else{
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 0;
            
        }
        
        // set the src attribute of the image for the icon's reflection
        reflectedIconNodes[index].setAttribute('src',
                                               imageDetails[index].name
                                               + imageDetails[index].extension);
        
        // set the width and height of the image for the icon and its reflection
        iconNodes[index].setAttribute('width',  size);
        iconNodes[index].setAttribute('height', size);
        reflectedIconNodes[index].setAttribute('width',  size);
        reflectedIconNodes[index].setAttribute('height', size);
        
        // set the top margin of the image for the icon
        iconNodes[index].style.marginTop = (SimpleDock.prototype.max - size) + 'px';
        reflectedIconNodes[index].style.marginBottom = (SimpleDock.prototype.max - size) + 'px';
        reflectedIconNodes[index].style.marginTop = height+'px';
        
    }
    window.onmousemove = function(){
    if(window.event.pageX > 0) {
    window.testnew = setInterval(function(){document.getElementById('dockContainer').style.bottom=parseInt(document.getElementById('dockContainer').style.bottom)-1+'px';}, 10);
    };
};
    
    /* Sets a toolbar image to the specified size. The parameter is:
     *
     * index - the 0-based index of the image to be sized
     */
    SimpleDock.prototype.updateIconPropertiesr = function(index){
        iconNodes[index].style.top = -(SimpleDock.prototype.max-SimpleDock.prototype.min)+'px';
        label[index].style.marginLeft = (iconNodes[index].offsetLeft-20+((iconNodes[index].clientWidth-label[index].clientWidth)/2))+'px';
        // set the leftoffset of dock
        document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
        // determine the size for the icon, taking into account the scale factor
        var size = SimpleDock.prototype.min + scale * (iconSizes[index] - SimpleDock.prototype.min);
        // find the index of the appropriate image size
        var sizeIndex = 0;
        while (imageDetails[index].sizes[sizeIndex] < size
               && sizeIndex + 1 < imageDetails[index].sizes.length){
            sizeIndex++;
        }
        
        // check whether the full icon with its caption should be displayed
        if (size == SimpleDock.prototype.max){
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 1;
            
        }else{
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 0;
            
        }
        
        // set the src attribute of the image for the icon's reflection
        reflectedIconNodes[index].setAttribute('src',
                                               imageDetails[index].name
                                               + imageDetails[index].extension);
        
        // set the width and height of the image for the icon and its reflection
        newInterval = window.setInterval(
                                         function(){
                                         iconNodes[index].setAttribute('width',  size3);
                                         iconNodes[index].setAttribute('height', size3);
                                         reflectedIconNodes[index].setAttribute('width',  size3);
                                         reflectedIconNodes[index].setAttribute('height', size3);
                                         
                                         // set the top margin of the image for the icon
                                         iconNodes[index].style.marginTop = (SimpleDock.prototype.max - size3) + 'px';
                                         reflectedIconNodes[index].style.marginBottom = (SimpleDock.prototype.max - size3) + 'px';
                                         reflectedIconNodes[index].style.marginTop = height+'px';
                                         document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
                                         if (size3 == 0) {
                                         size3 = SimpleDock.prototype.min;
                                         window.clearInterval(newInterval);
                                         iconsNode.removeChild(label[index]);
                                         iconsNode.removeChild(iconNodes[index]);
                                         reflectedIconsNode.removeChild(reflectedIconNodes[index]);
                                         label.splice(index, 1);
                                         iconNodes.splice(index, 1);
                                         reflectedIconNodes.splice(index, 1);
                                         images.splice(index, 1);
                                         imageDetails.splice(index, 1);
                                         } else {
                                         size3-= 1;
                                         }
                                         },
                                         10);
        
    }
    
    SimpleDock.prototype.updateIconPropertiesrM = function(index){
        
        //document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
        iconsNode.removeChild(label[index]);
        iconsNode.removeChild(iconNodes[index]);
        reflectedIconsNode.removeChild(reflectedIconNodes[index]);
        label.splice(index, 1);
        iconNodes.splice(index, 1);
        reflectedIconNodes.splice(index, 1);
        images.splice(index, 1);
        imageDetails.splice(index, 1);
    }
    
    SimpleDock.prototype.findApp = function(app){
        for (var f = 0; f < iconsNode.children.length; f++) {
            if (iconNodes[f].id == app) {
                return f;
            }
        }
        return null;
    }
    
    SimpleDock.prototype.removeApp = function(app){
        var appr = this.findApp(app);
        this.updateIconPropertiesr(appr);
    }
    SimpleDock.prototype.removeAppM = function(app){
        //var appr = this.findApp(app);
        this.updateIconPropertiesrM(app);
    }
    
    /* Sets a toolbar image to the specified size. The parameter is:
     *
     * index - the 0-based index of the image to be sized
     */
    SimpleDock.prototype.updateIconProperties = function(index){
        iconNodes[index].style.top = -(SimpleDock.prototype.max-SimpleDock.prototype.min)+'px';
        label[index].style.marginLeft = (iconNodes[index].offsetLeft-20+((iconNodes[index].clientWidth-label[index].clientWidth)/2))+'px';
        // set the leftoffset of dock
        document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
        // determine the size for the icon, taking into account the scale factor
        var size = SimpleDock.prototype.min + scale * (iconSizes[index] - SimpleDock.prototype.min);
        // find the index of the appropriate image size
        var sizeIndex = 0;
        while (imageDetails[index].sizes[sizeIndex] < size
               && sizeIndex + 1 < imageDetails[index].sizes.length){
            sizeIndex++;
        }
        
        // check whether the full icon with its caption should be displayed
        if (size == SimpleDock.prototype.max){
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 1;
            
        }else{
            
            // set the src attribute of the image for the icon
            iconNodes[index].setAttribute('src',
                                          imageDetails[index].name
                                          + imageDetails[index].extension);
            label[index].style.opacity = 0;
            
        }
        
        // set the src attribute of the image for the icon's reflection
        reflectedIconNodes[index].setAttribute('src',
                                               imageDetails[index].name
                                               + imageDetails[index].extension);
        
        // set the width and height of the image for the icon and its reflection
        newInterval = window.setInterval(
                                         function(){
                                         iconNodes[index].setAttribute('width',  size2);
                                         iconNodes[index].setAttribute('height', size2);
                                         reflectedIconNodes[index].setAttribute('width',  size2);
                                         reflectedIconNodes[index].setAttribute('height', size2);
                                         
                                         // set the top margin of the image for the icon
                                         iconNodes[index].style.marginTop = (SimpleDock.prototype.max - size2) + 'px';
                                         reflectedIconNodes[index].style.marginBottom = (SimpleDock.prototype.max - size2) + 'px';
                                         reflectedIconNodes[index].style.marginTop = height+'px';
                                         document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
                                         if (size2 == SimpleDock.prototype.min) {
                                         size2 = 0;
                                         window.clearInterval(newInterval);
                                         } else {
                                         size2+= 1;
                                         }
                                         },
                                         2);
    }
    
    /* Sets a toolbar image to the specified size. The parameter is:
     *
     * index - the 0-based index of the image to be sized
     */
    SimpleDock.prototype.updateIconPropertiest = function(index){
        if (SimpleDock.prototype.skip== false) {
            label[index].style.marginLeft = (iconNodes[index].offsetLeft-20+((iconNodes[index].clientWidth-label[index].clientWidth)/2))+'px';
if (SimpleDock.prototype.skip== false) {
            label[index].style.marginTop = -(SimpleDock.prototype.max*2)+20+'px';
        } else {
            label[index].style.marginTop = -(SimpleDock.prototype.min*2)-SimpleDock.prototype.min+'px';
        }
            // set the leftoffset of dock
            document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
            // determine the size for the icon, taking into account the scale factor
            var size = SimpleDock.prototype.min + scale * (iconSizes[index] - SimpleDock.prototype.min);
            // find the index of the appropriate image size
            var sizeIndex = 0;
            while (imageDetails[index].sizes[sizeIndex] < size
                   && sizeIndex + 1 < imageDetails[index].sizes.length){
                sizeIndex++;
            }
            
            // check whether the full icon with its caption should be displayed
            if (size == SimpleDock.prototype.max){
                
                // set the src attribute of the image for the icon
                //iconNodes[index].setAttribute('src',
                //    imageDetails[index].name
                //        + imageDetails[index].extension);
                label[index].style.opacity = 1;
                
            }else{
                
                // set the src attribute of the image for the icon
                //iconNodes[index].setAttribute('src',
                //    imageDetails[index].name
                //        + imageDetails[index].extension);
                label[index].style.opacity = 0;
                
            }
            
            // set the src attribute of the image for the icon's reflection
            //reflectedIconNodes[index].setAttribute('src',
            //    imageDetails[index].name
            //        + imageDetails[index].extension);
            
            // set the width and height of the image for the icon and its reflection
            iconNodes[index].setAttribute('width',  size);
            iconNodes[index].setAttribute('height', size);
            reflectedIconNodes[index].setAttribute('width',  size);
            reflectedIconNodes[index].setAttribute('height', size);
            
            // set the top margin of the image for the icon
            iconNodes[index].style.marginTop = (SimpleDock.prototype.max - size) + 'px';
            reflectedIconNodes[index].style.marginBottom = (SimpleDock.prototype.min - size) + 'px';
            reflectedIconNodes[index].style.marginTop = height+'px';
        } else {
            label[index].style.marginLeft = (iconNodes[index].offsetLeft-20+((iconNodes[index].clientWidth-label[index].clientWidth)/2))+'px';
            // determine the size for the icon, taking into account the scale factor
            var size = SimpleDock.prototype.min + scale * (iconSizes[index] - SimpleDock.prototype.min);
            // find the index of the appropriate image size
            var sizeIndex = 0;
            while (imageDetails[index].sizes[sizeIndex] < size
                   && sizeIndex + 1 < imageDetails[index].sizes.length){
                sizeIndex++;
            }
            
            // check whether the full icon with its caption should be displayed
            if (size == SimpleDock.prototype.max){
                label[index].style.opacity = 1;
                
            }else{
                label[index].style.opacity = 0;
                
            }
        }
    }
    
    /* Processes a mousemove event on an image in the 'dock'. The parameter is:
     *
     * e - the event object. window.event will be used if this is undefined.
     */
    SimpleDock.prototype.processMouseMove = function(e){
        if (window.docklock !== true) {
            // set the leftoffset of dock
            document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2);
            // clear the closing interval and time-out
            window.clearTimeout(closeTimeout);
            closeTimeout = null;
            window.clearInterval(closeInterval);
            closeInterval = null;
            
            // check that the opening interval is required but does not yet exist
            if (scale != 1 && !openInterval){
                
                // create the opening interval
                openInterval = window.setInterval(
                                                  function(){
                                                  if (scale < 1) scale += 0.125;
                                                  if (scale >= 1){
                                                  scale = 1;
                                                  window.clearInterval(openInterval);
                                                  openInterval = null;
                                                  }
                                                  for (var i = 0; i < iconNodes.length; i++){
                                                  SimpleDock.prototype.updateIconPropertiest(i);
                                                  }
                                                  },
                                                  speed);
                
            }
            
            // set the event object if the browser does not supply it
            if (!e) e = window.event;
            
            // find the DOM node on which the mouseover event occured
            var target = e.target || e.srcElement;
            
            // obtain the index of the icon on which the mouseover event occured
            var index = 0;
            while (iconNodes[index] != target) index++;
            
            // obtain the fraction across the icon that the mouseover event occurred
            var across = (e.layerX || e.offsetX) / iconSizes[index];
            
            // check a distance across the icon was found (in some cases it will not be)
            if (across){
                
                // initialise the current width to 0
                var currentWidth = 0;
                
                // loop over the icons
                for (var i = 0; i < iconNodes.length; i++){
                    
                    // check whether the icon is in the range to be resized
                    if (i < index - range || i > index + range){
                        
                        // set the icon size to the minimum size
                        iconSizes[i] = SimpleDock.prototype.min;
                        
                    }else if (i == index){
                        
                        // set the icon size to be the maximum size
                        iconSizes[i] = SimpleDock.prototype.max;
                        
                    }else if (i < index){
                        
                        // set the icon size to the appropriate value
                        iconSizes[i] =
                        SimpleDock.prototype.min
                        + Math.round(
                                     (SimpleDock.prototype.max - SimpleDock.prototype.min - 1)
                                     * (
                                        Math.cos(
                                                 (i - index - across + 1) / range * Math.PI)
                                        + 1)
                                     / 2);
                        
                        // add the icon size to the current width
                        currentWidth += iconSizes[i];
                        
                    }else{
                        
                        // set the icon size to the appropriate value
                        iconSizes[i] =
                        SimpleDock.prototype.min
                        + Math.round(
                                     (SimpleDock.prototype.max - SimpleDock.prototype.min - 1)
                                     * (
                                        Math.cos(
                                                 (i - index - across) / range * Math.PI)
                                        + 1)
                                     / 2);
                        
                        // add the icon size to the current width
                        currentWidth += iconSizes[i];
                        
                    }
                    
                    
                }
                
                // update the maximum width if necessary
                if (currentWidth > maximumWidth) maximumWidth = currentWidth;
                
                // detect if the total size should be corrected
                if (index >= range
                    && index < iconSizes.length - range
                    && currentWidth < maximumWidth){
                    
                    // correct the size of the smallest magnified icons
                    iconSizes[index - range] += Math.floor((maximumWidth - currentWidth) / 2);
                    iconSizes[index + range] += Math.ceil((maximumWidth - currentWidth) / 2);
                    
                }
                
                // update the sizes of the images
                for (var i = 0; i < iconNodes.length; i++) {
                    SimpleDock.prototype.updateIconPropertiest(i);
                }
                
            }
        }
        
    }
    
    // Processes a mouseout event on an image in the dock.
    SimpleDock.prototype.processMouseOut = function(){
        if (window.docklock !== true) {
            // set the leftoffset of dock
            document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2);
            // check that neither the closing interval nor time-out are set
            if (!closeTimeout && !closeInterval){
                
                // create the closing time-out
                closeTimeout = window.setTimeout(
                                                 function(){
                                                 closeTimeout = null;
                                                 if (openInterval){
                                                 window.clearInterval(openInterval);
                                                 openInterval = null;
                                                 }
                                                 closeInterval = window.setInterval(
                                                                                    function(){
                                                                                    if (scale > 0) scale -= 0.125;
                                                                                    if (scale <= 0){
                                                                                    scale = 0;
                                                                                    window.clearInterval(closeInterval);
                                                                                    closeInterval = null;
                                                                                    }
                                                                                    for (var i = 0; i < iconNodes.length; i++){
                                                                                    SimpleDock.prototype.updateIconPropertiest(i);
                                                                                    }
                                                                                    },
                                                                                    speed);
                                                 },
                                                 1);
                
            }
        }
        
    }
    SimpleDock.prototype.processMouseDown = function (e){
        var e=window.event;
        var target = e.target || e.srcElement;
        var appd = SimpleDock.prototype.findApp(target.id);
        var node = iconNodes[appd].cloneNode(true);
	node.lclick = iconNodes[appd].listeners.click;
	window.testnode = iconNodes[appd];
        var nodei = node.src.substring(0, node.src.length - 4);
        window.nodel = label[appd].innerText;
        SimpleDock.prototype.tempnodel = window.nodel;
        if(window.nodel != 'Trash' && window.nodel != 'Applications') {
        document.body.appendChild(node);
        SimpleDock.prototype.removeAppM(appd);
        node.style.position = 'fixed';
        node.style.left=e.pageX-(node.clientWidth/2)+'px';
        node.style.top=e.pageY-(node.clientHeight/2)+'px';
        node.style.zIndex = 9999999;
        node.style.removeProperty('margin-top');
        node.style.width = 44+'px';
        node.style.height = 44+'px';
        SimpleDock.prototype.tempnode = node;
        node.ondragstart = function() { return false; };
        document.onmousemove=function(e){
            if(!window.wsetX && !window.wsetY){
                window.wsetX=e.pageX-parseInt(node.offsetLeft);
                window.wsetY=e.pageY-parseInt(node.offsetTop);
            };
            node.style.left=e.pageX-(node.clientWidth/2)+'px';
            node.style.top=e.pageY-(node.clientHeight/2)+'px';
            var dock = document.getElementById('dockContainer');
            //console.log(e.target);
            if (!window.newapp)
            {
                window.newapp = 0;
            }
            if (node.offsetTop > (dock.offsetTop-node.clientHeight) && node.offsetLeft < (dock.offsetWidth+dock.offsetLeft) && node.offsetLeft > (dock.offsetLeft-44))
            {
                console.log('over');
                if (window.newapp == 0)
                {
                    SimpleDock.prototype.AddNew({
                                                name:      ''+nodei+'',
                                                label:     ''+window.nodel+'',
                                                extension: '.png',
                                                sizes:     [30, 100],
                                                menuItems: ['open'],
                                                menuClick: [function(){Trash();}],
                                                onclick:   function (){node.lclick()}
                                                }, 1);
                    window.newapp = 1;
                }
                if (window.newapp == 1)
                {
                    if ((e.pageX) < (dock.offsetWidth+dock.offsetLeft-64))
                    {
                        iconNodes[1].style.left = window.event.pageX-dock.offsetLeft-node.clientWidth+'px';
                        reflectedIconNodes[1].style.left = window.event.pageX-dock.offsetLeft-node.clientWidth+'px';
                    }
                    for (var w=0; w < iconNodes.length; w++)
                    {
                        if (iconNodes[1].offsetLeft > iconNodes[w].offsetLeft && w != 0)
                        {
                            iconNodes[w].style.left = -((iconNodes[1].clientWidth*(w-1))/(w-1))+'px';
                            reflectedIconNodes[w].style.left = -((reflectedIconNodes[1].clientWidth*(w-1))/(w-1))+'px';
                        } else if (iconNodes[1].offsetLeft < iconNodes[w].offsetLeft && w != 0)
                        {
                            iconNodes[w].style.left = 0+'px';
                            reflectedIconNodes[w].style.left = 0+'px';
                        } else if (iconNodes[1].offsetLeft < (iconNodes[0].offsetLeft+(iconNodes[0].clientWidth/4)))
                        {
                            iconNodes[0].style.left = iconNodes[1].clientWidth+'px';
                            reflectedIconNodes[0].style.left = reflectedIconNodes[1].clientWidth+'px';
                        } else if (iconNodes[1].offsetLeft > iconNodes[0].offsetLeft)
                        {
                            iconNodes[0].style.left = 0+'px';
                            reflectedIconNodes[0].style.left = 0+'px';
                        }
                    }
                }
                window.node = node;
            }
        };
        document.onmouseup=function(e){
			
            var dock = document.getElementById('dockContainer');
            if (e.pageY < (window.innerHeight+dock.children[1].offsetTop)) {
                document.onmousemove=null;
                delete window.wsetX;
                delete window.wsetY;
                var tlabel = '';
                for(var w=0; w < iconNodes.length; w++)
                {
                if(label[w].innerHTML == SimpleDock.prototype.tempnodel) {
                SimpleDock.prototype.removeApp(SimpleDock.prototype.tempnodel);
                };
                    if(w < (iconNodes.length-2) && label[w].innerHTML != window.nodel) {
                    tlabel+=label[w].innerHTML+',';
                    } else if(w == (iconNodes.length-2) && label[w].innerHTML != window.nodel) {
                    tlabel+=label[w].innerHTML;
                    };
                    iconNodes[w].style.left = 0+'px';
                    reflectedIconNodes[w].style.left = 0+'px';
                }
                core.testu(tlabel, 'Dockapps');
                document.body.removeChild(SimpleDock.prototype.tempnode);
                window.newapp = 0;
            } else if (e.pageY > (window.innerHeight+dock.children[1].offsetTop)){
                document.onmousemove=null;
                delete window.wsetX;
                delete window.wsetY;
                var xcor = iconNodes[1].offsetLeft;
                window.arraytemp = [];
                var tempnodes = [];
                var iconnodes = [];
                var labels = [];
                var reflect = [];
                var tempiconsizes = [];
                var tempdetails = [];
                var tempimage = [];
                window.placeit = Math.round(((iconNodes.length*44)+(iconNodes.length*10))/(iconNodes[1].offsetLeft));
                //window.placeit = iconNodes[1].offsetLeft;
                if (window.placeit > iconNodes.length)
                {
                    window.placeit = iconNodes.length-1;
                }
                window.placeit = (window.placeit-iconNodes.length)*(-1);
                var nodeit = iconNodes[1];
                var nodeitr = reflectedIconNodes[1];
                var nodeitl = label[1];
                var nodeiti = imageDetails[1];
                var nodeitis = iconSizes[1];
                var nodeitim = images[1];
                
                
                //for(var w=0; w < iconNodes.length; w++)
                //{
                iconsNode.insertBefore(nodeit, iconNodes[window.placeit+1]);
                iconsNode.insertBefore(nodeitl, label[window.placeit+1]);
                reflectedIconsNode.insertBefore(nodeitr, reflectedIconNodes[window.placeit+1]);
                for(var w=0; w < iconNodes.length; w++)
                {
                    iconNodes[w].style.left = 0+'px';
                    reflectedIconNodes[w].style.left = 0+'px';
                }
                for (var w=0; w < iconNodes.length; w++)
                {
                    if (window.placeit != w)
                        //window.arraytemp[w] = Math.round(((5*44))/(iconNodes[w].offsetLeft-20));
                        //if (w <= (window.placeit))
                    {
                        window.arraytemp[w] = w;
                    } else {
                        window.arraytemp[w] = (w-(window.placeit+1))*(-1);
                        for (var e = window.arraytemp[w]; e < (window.placeit); e++)
                        {
                            window.arraytemp[e] = window.arraytemp[w]+e;
                        }
                    }
                    //window.arraytemp[w] = (window.arraytemp[w]-5)*(-1);
                    //window.arraytemp[w] -= 1;
                }
                var tlabel = '';
                for (var w=0; w < iconNodes.length; w++)
                {
                    iconnodes.push(iconNodes[window.arraytemp[w]]);
                    labels.push(label[window.arraytemp[w]]);
                    reflect.push(reflectedIconNodes[window.arraytemp[w]]);
                    tempiconsizes.push(iconSizes[window.arraytemp[w]]);
                    tempdetails.push(imageDetails[window.arraytemp[w]]);
                    tempimage.push(images[window.arraytemp[w]]);
                }
                //core.testu(nodeitl.innerHTML, 'Dockapps');
                window.nodesit = [];
                for (var t=0; t < iconNodes.length; t++)
                {
                    if(t < (iconNodes.length-2)) {
                    tlabel+=labels[t].innerHTML+',';
                    } else if(t == (iconNodes.length-2)) {
                    tlabel+=labels[t].innerHTML;
                    };
                    iconNodes = iconnodes;
                    label = labels;
                    reflectedIconNodes = reflect;
                    iconSizes = tempiconsizes;
                    imageDetails = tempdetails;
                    images = tempimage;
                    window.nodesit[t] = iconNodes[t];
                }
                core.testu(tlabel, 'Dockapps');
                document.body.removeChild(node);
                document.onmousemove=null;
                document.onmouseup = '';
                window.newapp = 0;
            }
        };
	};
        }
    SimpleDock.prototype.processRightClick = function (e){
        window.docklock = true;
        // set the event object if the browser does not supply it
        if (!e){ e = window.event;}
        
        // find the DOM node on which the mouseover event occured
        var target = e.target || e.srcElement;
        var appd = SimpleDock.prototype.findApp(target.id);
        iconNodes[appd].style.zIndex = 5;
        var menu = document.createElement('div');
        document.body.appendChild(menu);
        menu.className = 'dockmenu';
        menu.id = 'test';
        menu.style.cssText = 'border-radius:10px;';
        menu.style.width = 'auto';
        menu.style.height = 'auto';
        menu.style.position = 'fixed';
        var menul = document.createElement('ul');
        menu.appendChild(menul);
        menul.style.cssText = 'display: block;margin: 0;padding: 0;position: relative;top: 0px;width: auto;left: 0;list-style: none;';
        menuli = [];
        for (var k=0; k < imageDetails[appd].menuItems.length; k++) {
            menuli[k] = document.createElement('li');
            menul.appendChild(menuli[k]);
            menuli[k].a = document.createElement('a');
            menuli[k].appendChild(menuli[k].a);
            menuli[k].style.cssText = 'position: relative;float: none;margin: 0;padding: 0;left:0px;width: auto;height:auto;display:block;';
            menuli[k].a.style.cssText = 'position: relative;height: auto;font-weight: normal;text-shadow: black 0px 2px 3px;top: 0px;padding-left: 15px;padding-right: 15px;padding-top: 0px;padding-bottom: 0px;color:white;';
            menuli[k].a.innerHTML = imageDetails[appd].menuItems[k];
            menuli[k].a.onclick = imageDetails[appd].menuClick[k];
        }
        if (SimpleDock.prototype.skip== false) {
            menu.style.left = target.offsetLeft+document.getElementById('dockContainer').offsetLeft+((target.clientWidth/2)-(menu.clientWidth/2))+'px';
            menu.style.top = window.innerHeight-menu.clientHeight-SimpleDock.prototype.max-(height*2)-8+'px';
        } else {
            menu.style.left = target.offsetLeft+document.getElementById('dockContainer').offsetLeft+((target.clientWidth/2)-(menu.clientWidth/2))+'px';
            menu.style.top = window.innerHeight-menu.clientHeight-SimpleDock.prototype.min-(height*2)-8+'px';
        }
        menu.style.background = 'rgba(0, 0, 0, 0.398438)';
        menu.style.zIndex = 2147483640;
        window.clearTimeout(closeTimeout);
        closeTimeout = null;
        window.clearInterval(openInterval);
        openInterval = null;
        for (var v=0; v < iconNodes.length; v++) {
            if (iconNodes[v].id !== target.id){
                iconNodes[v].style.opacity = 0.2;
            } else {
                iconNodes[v].style.opacity = 1;
            }
            label[v].style.opacity = 0;
            label[v].style.marginTop = 0+'px';
        }
        var offsetY2 = (menu.offsetTop+menu.clientHeight);
        var offsetY1 = menu.offsetTop;
        var offsetX2 = (menu.offsetLeft+menu.clientWidth);
        var offsetX1 = menu.offsetLeft;
        menu.onmouseout = function (e) {
            if (offsetY1 > e.pageY || offsetY2 < e.pageY || offsetX1 > e.pageX || offsetX2 < e.pageX) {
                window.docklock = false;
                for (var y=0; y < iconNodes.length; y++) {
                    scale = 0;
                    iconNodes[y].style.opacity = 1;
                    label[y].style.opacity = 1;
                    if (SimpleDock.prototype.skip== false) {
                        label[y].style.marginTop = -(SimpleDock.prototype.max*2)+20+'px';
                    } else {
                        label[y].style.marginTop = -(SimpleDock.prototype.min*2)-SimpleDock.prototype.min+'px';
                    }
                    SimpleDock.prototype.updateIconPropertiest(y);
                    iconNodes[y].style.zIndex = 0;
                }
                document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2);
                document.body.removeChild(menu);
                delete menu;
            }
        };
    }
    SimpleDock.prototype.AddNew = function(Details, Before) {
        var tested = document.createElement('img');
        tested.id = Details.label;
        // give icon a class
        tested.className = 'app';
        tested.ondragstart = function() { return false; };
        
        
        // position the icon for this image relatively
        tested.style.position = 'relative';
        
        // label
        var testl = document.createElement('div');
        testl.style.cssText = 'position: absolute;height: 20px;background: hsla(0, 100%,0%, 0.4);border-radius: 50px;margin-top: -176px;color: white;padding-left: 5px;padding-right: 5px;text-shadow: 0 2px 3px black;opacity: 0;-webkit-transition: linear 0.1s top;white-space: nowrap;';
        if (SimpleDock.prototype.skip== false) {
            testl.style.marginTop = -(SimpleDock.prototype.max*2)+20+'px';
        } else {
            testl.style.marginTop = -(SimpleDock.prototype.min*2)-SimpleDock.prototype.min+'px';
        }
        testl.innerHTML = Details.label;
        testl.className = 'label';
        
        // reflect icon
        var retested = document.createElement('img');
        tested.setAttribute('width',  0);
        tested.setAttribute('height',  0);
        retested.setAttribute('width',  0);
        retested.setAttribute('height',  0);
        
        // make reflected icon upsidedown
        retested.style.webkitTransform = 'rotate(180deg)';
        retested.style.position = 'relative';
        
        // make reflected icon look reflected
        retested.style.opacity = '0.5';
        
        // set height
        retested.style.marginBottom = '-20px';
        // store the initial size of the icon for this image
        var tests = SimpleDock.prototype.min;
        if (!Before){
            iconSizes.push(tests);
            label.push(testl);
            reflectedIconNodes.push(retested);
            iconNodes.push(tested);
            
            
            // add the appropriate event listeners to the icon for this image
            if (tested.addEventListener){
                tested.addEventListener('mousemove', this.processMouseMove, false);
                tested.addEventListener('mouseout', this.processMouseOut, false);
                tested.addEventListener('click', Details.onclick, false);
                tested.addEventListener('contextmenu', this.processRightClick, false);
                //tested.addEventListener('mousedown', void(0), false);
                tested.addEventListener('dragstart', this.processMouseDown, false);
            }else if (tested.attachEvent){
                tested.attachEvent('onmousemove', this.processMouseMove);
                tested.attachEvent('onmouseout', this.processMouseOut);
                tested.attachEvent('onclick', Details.onclick);
                tested.attachEvent('contextmenu', this.processRightClick, false);
                //tested.attachEvent('onmousedown', void(0), false);
                tested.attachEvent('ondragstart', this.processMouseDown, false);
            }
	    tested.listeners = {
				click: Details.onclick
                               };
            imageDetails.push(Details);
            for (var h = imageDetails.length; h <= imageDetails.length; h++) {
                // loop over the sizes available for this image
                for (var j = 0; j < imageDetails[h-1].sizes.length; j++){
                    
                    // create a DOM node containing this image at this size
                    var image = document.createElement('img');
                    image.setAttribute(
                                       'src',
                                       imageDetails[h-1].name + imageDetails[h-1].extension);
                    
                    // add the DOM node to the array of stored images
                    images.push(image);
                    
                }
            }
            for (var i = iconNodes.length; i <= iconNodes.length; i++) {
                iconsNode.appendChild(iconNodes[i-1]);
                iconsNode.appendChild(label[i-1]);
                reflectedIconsNode.appendChild(reflectedIconNodes[i-1]);
                this.updateIconProperties(i-1);
            }
        } else {
            var image = document.createElement('img');
            image.setAttribute(
                               'src',
                               Details.name + Details.extension);
            
            iconsNode.insertBefore(tested, iconNodes[Before]);
            iconsNode.insertBefore(testl, label[Before]);
            reflectedIconsNode.insertBefore(retested, reflectedIconNodes[Before]);
            // add the appropriate event listeners to the icon for this image
            if (tested.addEventListener){
                tested.addEventListener('mousemove', this.processMouseMove, false);
                tested.addEventListener('mouseout', this.processMouseOut, false);
                tested.addEventListener('click', Details.onclick, false);
                tested.addEventListener('contextmenu', this.processRightClick, false);
                //tested.addEventListener('mousedown', void(0), false);
                tested.addEventListener('dragstart', this.processMouseDown, false);
            }else if (tested.attachEvent){
                tested.attachEvent('onmousemove', this.processMouseMove);
                tested.attachEvent('onmouseout', this.processMouseOut);
                tested.attachEvent('onclick', Details.onclick, false);
                tested.attachEvent('contextmenu', this.processRightClick, false);
                //tested.attachEvent('onmousedown', void(0), false);
                tested.attachEvent('ondragstart', this.processMouseDown, false);
            }
	    tested.listeners = {
				click: Details.onclick
                               };
            //var tempiconNodes = iconNodes[app];
            //var templabel = label[app];
            //var tempreflectedIconNodes = reflectedIconNodes[app];
            //reflectedIconNodes.splice((reflectedIconNodes.length-1), 1);
            //iconNodes.splice((iconNodes.length-1), 1);
            //label.splice((label.length-1), 1);
            //iconSizes.splice((iconSizes.length-1), 1);
            var iconnodes = [];
            var labels = [];
            var reflect = [];
            var tempiconsizes = [];
            var tempdetails = [];
            var tempimage = [];
            for (var i=0; i < iconNodes.length; i++) {
                iconnodes.push(iconNodes[i]);
                labels.push(label[i]);
                reflect.push(reflectedIconNodes[i]);
                tempiconsizes.push(iconSizes[i]);
                tempdetails.push(imageDetails[i]);
                tempimage.push(images[i]);
                if (iconNodes[i+1] && iconNodes[i+1] == iconNodes[Before]) {
                    iconnodes.push(tested);
                    labels.push(testl);
                    reflect.push(retested);
                    tempiconsizes.push(tests);
                    tempdetails.push(Details);
                    tempimage.push(image);
                }
            }
            iconNodes = iconnodes;
            label = labels;
            reflectedIconNodes = reflect;
            iconSizes = tempiconsizes;
            imageDetails = tempdetails;
            images = tempimage;
        }
        this.updateIconProperties(this.findApp(Details.label));
    }
    document.getElementById('dockContainer').style.left = ((window.innerWidth-document.getElementById('dockContainer').clientWidth)/2)+'px';
    //return AddNew;
    // loop over the images
    for (var i = 0; i < imageDetails.length; i++){
        
        // create and store a node for the icon for this image
        iconNodes[i] = document.createElement('img');
        iconNodes[i].id = imageDetails[i].label;
        
        label[i] = document.createElement('div');
        label[i].style.cssText = 'position: absolute;height: 20px;background: hsla(0, 100%,0%, 0.4);border-radius: 50px;margin-top: -176px;color: white;padding-left: 5px;padding-right: 5px;text-shadow: 0 2px 3px black;opacity: 0;-webkit-transition: linear 0.1s top;white-space: nowrap;';
        if (SimpleDock.prototype.skip== false) {
            label[i].style.marginTop = -(SimpleDock.prototype.max*2)+20+'px';
        } else {
            label[i].style.marginTop = -(SimpleDock.prototype.min*2)-SimpleDock.prototype.min+'px';
        }
        label[i].innerHTML = imageDetails[i].label;
        label[i].className = 'label';
        
        // give icon a class
        iconNodes[i].className = 'app';
        
        // position the icon for this image relatively
        iconNodes[i].style.position = 'relative';
        
        // store the initial size of the icon for this image
        iconSizes[i] = SimpleDock.prototype.min;
        
        // create and store a node for the reflected icon for this image
        reflectedIconNodes[i] = document.createElement('img');
        
        // make reflected icon upsidedown
        reflectedIconNodes[i].style.webkitTransform = 'rotate(180deg)';
        reflectedIconNodes[i].style.MozTransform = 'rotate(180deg)';
        reflectedIconNodes[i].style.webkitTransform = 'rotateX(180deg)';
        reflectedIconNodes[i].style.MozTransform = 'rotateX(180deg)';
        reflectedIconNodes[i].style.position = 'relative';
        
        // make reflected icon look reflected
        reflectedIconNodes[i].style.opacity = '0.5';
        
        // set height
        reflectedIconNodes[i].style.marginBottom = '-20px';
        
        // update the properties of the icon for this image
        this.updateIconPropertiesa(i);
        
        // add the span for this image to the dock
        iconsNode.appendChild(iconNodes[i]);
        iconsNode.appendChild(label[i]);
        
        // add the span for this image to the dock
        reflectedIconsNode.appendChild(reflectedIconNodes[i]);
        
        // add the appropriate event listeners to the icon for this image
        if (iconNodes[i].addEventListener){
            iconNodes[i].addEventListener('mousemove', this.processMouseMove, false);
            iconNodes[i].addEventListener('mouseout', this.processMouseOut, false);
            iconNodes[i].addEventListener('click', imageDetails[i].onclick, false);
            iconNodes[i].addEventListener('contextmenu', this.processRightClick, false);
            //iconNodes[i].addEventListener('mousedown', void(0), false);
            iconNodes[i].addEventListener('dragstart', this.processMouseDown, false);
        }else if (iconNodes[i].attachEvent){
            iconNodes[i].attachEvent('onmousemove', this.processMouseMove);
            iconNodes[i].attachEvent('onmouseout', this.processMouseOut);
            iconNodes[i].attachEvent('onclick', imageDetails[i].onclick);
            iconNodes[i].attachEvent('contextmenu', this.processRightClick, false);
            //iconNodes[i].attachEvent('onmousedown', void(0), false);
            iconNodes[i].attachEvent('ondragstart', this.processMouseDown, false);
        }
	    iconNodes[i].listeners = {
				click: imageDetails[i].onclick
                               };
        
        // loop over the sizes available for this image
        for (var j = 0; j < imageDetails[i].sizes.length; j++){
            
            // create a DOM node containing this image at this size
            var image = document.createElement('img');
            image.setAttribute(
                               'src',
                               imageDetails[i].name + imageDetails[i].extension);
            
            // add the DOM node to the array of stored images
            images.push(image);
            
        }
        
    }
    SimpleDock.prototype.findmenuClick = function (addapp2, onclicked3){
        for (var s=0; s < imageDetails[addapp2].menuClick.length; s++) {
            if (imageDetails[addapp2].menuClick[s] !== onclicked3) {
                
            } else {
                return s;
            }
        }
    }
    SimpleDock.prototype.findmenuItems = function (addapp3, name3){
        for (var p=0; p < imageDetails[addapp3].menuItems.length; p++) {
            if (imageDetails[addapp3].menuItems[p] !== name3) {
                
            } else {
                return p;
            }
        }
    }
    SimpleDock.prototype.removeclick = function (app, name2){
        var addapp = this.findApp(app);
        for (var u=0; u < name2.length; u++) {
            var aname = this.findmenuItems(addapp, name2[u]);
            imageDetails[addapp].menuItems.splice(aname, 1);
            imageDetails[addapp].menuClick.splice(aname, 1);
        }
    }
    SimpleDock.prototype.addclick = function (app, name, onclicked){
        var addapp = this.findApp(app);
        for (var j=0; j < name.length; j++) {
            imageDetails[addapp].menuItems.push(name[j]);
            imageDetails[addapp].menuClick.push(onclicked[j]);
        }
    }
    SimpleDock.prototype.insertbefore = function (app, before) {
        iconsNode.insertBefore(iconNodes[app], iconNodes[before]);
        iconsNode.insertBefore(label[app], label[before]);
        reflectedIconsNode.insertBefore(reflectedIconNodes[app], reflectedIconNodes[before]);
        //var tempiconNodes = iconNodes[app];
        //var templabel = label[app];
        //var tempreflectedIconNodes = reflectedIconNodes[app];
        //reflectedIconNodes.splice((reflectedIconNodes.length-1), 1);
        //iconNodes.splice((iconNodes.length-1), 1);
        //label.splice((label.length-1), 1);
        //iconSizes.splice((iconSizes.length-1), 1);
        var iconnodes = [];
        var labels = [];
        var reflect = [];
        var iconsizes = [];
        var details = [];
        var tempimage = [];
        for (var i=0; i < iconNodes.length; i++) {
            if (iconNodes[i+1] && iconNodes[i+1]==iconNodes[before]) {
                iconnodes.push(iconNodes[app]);
                labels.push(label[label.length-1]);
                reflect.push(reflectedIconNodes[reflectedIconNodes.length-1]);
                iconsizes.push(iconSizes[iconSizes.length-1]);
                details.push(imageDetails[imageDetails.length-1]);
                tempimage.push(images[images.length-1]);
            }
            iconnodes.push(iconNodes[i]);
            labels.push(label[i]);
            reflect.push(reflectedIconsNode[i]);
            iconsizes.push(iconSizes[i]);
            details.push(imageDetails[i]);
            tempimage.push(images[i]);
        }
        //iconNodes = iconnodes;
        //label = labels;
        //reflectedIconNodes = reflect;
        //iconSizes = iconsizes;
        //imageDetails = details;
        //images = tempimage;
        //for (var x=0; x < iconNodes.length; x++) {
        //this.updateIconPropertiest(x)
        //}
    }
    SimpleDock.prototype.maxsize = function(csize) {
    	SimpleDock.prototype.max = csize;
    	for(var y=0; y < iconNodes.length; y++) {
    		SimpleDock.prototype.updateIconPropertiesa(y);
    	};
    }
    SimpleDock.prototype.minsize = function(csize) {
    	SimpleDock.prototype.min = csize;
    	for(var y=0; y < iconNodes.length; y++) {
    		SimpleDock.prototype.updateIconPropertiesa(y);
    	};
    }
    SimpleDock.prototype.skipT = function(skipt) {
        SimpleDock.prototype.skip= skipt;
        for (var y=0; y < iconNodes.length; y++) {
                    scale = 0;
                    iconNodes[y].style.opacity = 1;
                    label[y].style.opacity = 1;
                    if (SimpleDock.prototype.skip== false) {
                        label[y].style.marginTop = -(SimpleDock.prototype.max*2)+20+'px';
                    } else {
                        label[y].style.marginTop = -(SimpleDock.prototype.min*2)-SimpleDock.prototype.min+'px';
                    }
                    SimpleDock.prototype.updateIconPropertiest(y);
                    iconNodes[y].style.zIndex = 0;
                }
    }
}
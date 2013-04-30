/* * * * * * * * * * * * * * * * * */
/*           |  mDock4  |          */
/*           '----------'          */
/*       Copyright 2006-2009       */
/*     developIT Web Solutions     */
/*                --               */
/*    UNAUTHORIZED USE STRICTLY    */
/*  PROHIBITED, SEE WEBSITE BELOW  */
/*                --               */
/*      mDock4 is a product of     */
/*     developIT Web Solutions     */
/*       http://developit.ca/      */
/* * * * * * * * * * * * * * * * * */



window.mDock4_docks = [];

setTimeout(function() {
	var resized = function() {
		var ds=window.mDock4_docks, d, x;
		if(ds) {
			for (x=ds.length; x--; ) {
				d = ds[x];
				if (d && d.base && d.base.parentNode && d._refreshBase) {
					d._refreshBase();
				}
			}
		}
	};
	if (window.addEventListener) {
		window.addEventListener('resize', resized, false);
	}
	else if (window.attachEvent) {
		window.attachEvent('onresize', resized);
	}
	resized = null;
}, 100);



function mDock4(dockItems, minimumSize, maximumSize, position, growWidth, growSpeed, appendTo, enabledPlugins, defaultIcon, nullGifLocation, skipEffect) {
	this.isIE6 = navigator.userAgent.toLowerCase().indexOf("msie")>-1 && parseFloat(navigator.appVersion)<7;
	this.minSize = this.ParamCheck(minimumSize,40);
	this.maxSize = this.ParamCheck(maximumSize,80);
	this.position = this.ParamCheck(position,"bottom");
	this.growWidth = this.ParamCheck(growWidth,7);
	this.growSpeed = this.ParamCheck(growSpeed,3)*(this.isIE6?2:1);
	this.defaultIcon = this.ParamCheck(defaultIcon,"images/null.gif");
	this.nullGifLocation = this.ParamCheck(nullGifLocation,"images/null.gif");
	this.labelInners = 3;
	this.callbackZone = 5;
	this.shrinkSpeed = 4;
	this.bounceHeight = null;	// when null, defaultBounceHeight() is called.
	this.bounceSpeed = 7;
	this.defaultBounceHeight = function(){ return this.minSize-1; };
	this.onAdd = [];
	
	this.loadedItems = [];
	this.failedItems = [];
	this.onload = [];
	this.onprogress = [];
	this.dockItems = [];
	this.activePlugins = [];
	this.mouseover = false;
	this.dockWidth = 0;
	this.dockWidthMax = 0;
	this.absolutePositioning = true;
	
	this.hor = (this.position=="top" || this.position=="bottom")==true;
	
	this.base = document.createElement("div");
	this.base.id = "mDock_base_"+Math.floor(Math.random()*99999999999);
	this.base.parentDock = this;
	this.base.className = "mdock mDock mdock_base mDock_base mDock_base_bottom mdock_base_bottom";
	if(this.hor==true)
		this.base.style.cssText = "height:"+this.minSize+"px; width:4px; display:block; position:relative; margin:auto; text-align:center; overflow:visible;";
	else
		this.base.style.cssText = "width:"+this.minSize+"px; height:4px; display:block; position:relative; margin:auto; text-align:center; overflow:visible;";

	this.base.inner1 = document.createElement("span");
	this.base.inner2 = document.createElement("span");
	this.base.inner3 = document.createElement("span");
	this.base.inner4 = document.createElement("span");
	this.base.inner1.className = "mdock_base_inner1";
	this.base.inner2.className = "mdock_base_inner2";
	this.base.inner3.className = "mdock_base_inner3";
	this.base.inner4.className = "mdock_base_inner4";
	this.base.appendChild(this.base.inner1);
	this.base.appendChild(this.base.inner2);
	this.base.appendChild(this.base.inner3);
	this.base.appendChild(this.base.inner4);
	
	
	this.posSin = function(v){ return v>0?Math.sin(v):0; };
	
	
	this.base.onmouseover = function(e) {
		if(!e) e=window.event;
		var mx = e.pageX?e.pageX:((document.documentElement?document.documentElement:document.body).scrollLeft + e.clientX);
		var my = e.pageY?e.pageY:((document.documentElement?document.documentElement:document.body).scrollTop + e.clientY);
		this.parentDock.StartFishEye(mx,my);
	};
	
	
	if(enabledPlugins==null || (enabledPlugins.constructor && enabledPlugins.constructor!=Array))
		enabledPlugins = [];
	if(this.plugins==null || (this.plugins.constructor && this.plugins.constructor!=Object))
		this.plugins = {};

	for(var x=0; x<enabledPlugins.length; x++) {
		var plugin = this.plugins[enabledPlugins[x]];
		if(plugin)
			this.LoadPlugin(this.plugins[x]);
	}
	
	
	firstItems = this.ParamCheck(dockItems,{});
	for(var x in firstItems) {
		if(firstItems[x]!=null && firstItems[x].constructor==Object && firstItems[x].icon) {
			if(!firstItems[x].label && x.constructor==String)
				firstItems[x].label = x;
			this.AddItem(firstItems[x], null, skipEffect!==false);
		}
	}
	
	if(appendTo!=false)
		this.AppendTo(this.ParamCheck(appendTo,document.body));
	this.Position(this.position,this.absolutePositioning);
	
	window.mDock4_docks.push(this);
}

mDock4.prototype.ParamCheck = function(param,defaultValue,supportedValues) {
	if(param!=null && param!="undefined") {
		if(supportedValues!=null && supportedValues.constructor && supportedValues.constructor==Array)
			for(var x=0; x<supportedValues.length; x++)
				if(supportedValues[x]==param)
					return param;
		else
			return defaultValue;
		return param;
	}
	else
		return defaultValue;
};

mDock4.prototype.StartFishEye = function(mx,my) {
	if(this.mouseover==true)
		return false;
	this.mouseover = false;
	window.mDock_currentActiveDock = this;
	
	var mdnode = this.base;
	this.dockTop = 0;
	this.dockLeft = 0;
	while((mdnode=mdnode.parentNode) && mdnode!=document) {
		this.dockLeft+=mdnode.offsetLeft?mdnode.offsetLeft:0;
		this.dockTop+=mdnode.offsetTop?mdnode.offsetTop:0;
	}
	
	this.lastX = mx - (this.dockLeft+this.base.offsetLeft);
	this.lastY = my - (this.dockTop+this.base.offsetTop);
	
	this.winW = window.innerWidth?window.innerWidth:(document.documentElement?document.documentElement.offsetWidth:document.body.offsetWidth);
	this.winH = window.innerHeight?window.innerHeight:(document.documentElement?document.documentElement.offsetHeight:document.body.offsetHeight);
	
	// Grow effect here!
	if(this.mouseover==false) {
		this.GrowEffect(1);
		this.dockWidthMax = null;
	}
	
	this.oldDocumentMouseMove = document.onmousemove ? document.onmousemove : function(e){};
	if(this.hor==true) {
		document.onmousemove = function(e) {
			var dock = window.mDock_currentActiveDock;
			if(!dock)
				return false;
			if(!e) e=window.event;
			var mx = e.pageX ? e.pageX : ((document.documentElement?document.documentElement:document.body).scrollLeft + e.clientX);
			var my = e.pageY ? e.pageY : ((document.documentElement?document.documentElement:document.body).scrollTop + e.clientY);
			
			var x = dock.dockLeft+dock.base.offsetLeft;
			var y = dock.dockTop+dock.base.offsetTop;
	
			if(mx>x && mx<x+dock.base.offsetWidth && 
				my>(y+dock.base.offsetHeight-dock.maxSize-(dock.position=="bottom"?dock.callbackZone:0)) && 
				my<(y+dock.maxSize+(dock.position=="top"?dock.callbackZone:0))
				) {
				dock.DoFishEye( mx-x , my-y );
				/*
				if(dock._fishyTime!=null) {
					try{ window.clearTimeout(dock._fishyTime); }catch(e){}
					dock._fishyTime = null;
				}
				dock._fishyTime = window.setTimeout("var b=document.getElementById('"+dock.base.id+"'); if(b&&b.parentDock){ b.parentDock.DoFishEye(b.parentDock.lastX,b.parentDock.lastY); }", 10);
				*/
			}
			else
				dock.StopFishEye(mx,my);
			return dock.NullFunction(e);
		};
	}
	else {
		document.onmousemove = function(e) {
			var dock = window.mDock_currentActiveDock;
			if(!dock)
				return false;
			if(!e) e=window.event;
			var mx = e.pageX ? e.pageX : ((document.documentElement?document.documentElement:document.body).scrollLeft + e.clientX);
			var my = e.pageY ? e.pageY : ((document.documentElement?document.documentElement:document.body).scrollTop + e.clientY);
			
			var x = dock.dockLeft+dock.base.offsetLeft;
			var y = dock.dockTop+dock.base.offsetTop;
	
			if(my>y && my<y+dock.base.offsetHeight && 
					mx>(x+dock.base.offsetWidth-dock.maxSize-(dock.position=="right"?dock.callbackZone:0)) && 
					mx<(x+dock.maxSize+(dock.position=="left"?dock.callbackZone:0))
					) {
				dock.DoFishEye( mx-x , my-y );
			}
			else
				dock.StopFishEye(mx,my);
			return dock.NullFunction(e);
		};
	}
};


mDock4.prototype.DoFishEye = function(x, y, forcedMaxSize, req) {
	//y = Math.floor(y);
	//x = Math.floor(x);
	
	if(this.dockItems.length==0)
		return false;
	if(forcedMaxSize==null || forcedMaxSize=="undefined") {
		this.lastX = x;
		this.lastY = y;
		if(this.isGrowing==true)
			return false;
	}
	else if(this.currentGrowthDirection==1)
		this.mouseover = true;
	
	
	var offsetProperty = this.hor ? 'offsetLeft' : 'offsetTop',
		totalsize = 0,
		labelIcon = null,
		rMaxSize = forcedMaxSize || this.maxSize,
		icon,
		iconmiddle;
	for(var ind=0; ind<this.dockItems.length; ind++) {
		icon = this.dockItems[ind].dockItem;
		if(icon.parentItem.isRemoving!=true && icon.parentItem.isAdding!=true) {
			iconmiddle = icon[offsetProperty] + (icon.mDock4_tempNewSize || icon.offsetWidth)/2;
			
			//icon.mDock4_tempNewSize = Math.floor(this.posSin((( rMaxSize-Math.abs(Math.ceil((this.hor?x:y)-iconmiddle)) / this.growWidth )-this.minSize)/Math.floor(rMaxSize-this.minSize)*Math.PI/2)*(rMaxSize-this.minSize) * 10)/10  +  this.minSize;
			// without rounding
			icon.mDock4_tempNewSize = this.posSin((
				(rMaxSize-Math.abs(Math.ceil((this.hor?x:y)-iconmiddle)) / this.growWidth) - this.minSize
			) / Math.floor(rMaxSize-this.minSize)*Math.PI/2) 
			* (rMaxSize-this.minSize) + this.minSize;
			icon.mDock4_tempNewSize = Math.ceil(icon.mDock4_tempNewSize);
			//icon.mDock4_tempNewSize = this.posSin((( rMaxSize-Math.abs(Math.ceil((this.hor?x:y)-iconmiddle)) / this.growWidth )-this.minSize)/Math.floor(rMaxSize-this.minSize)*Math.PI/2)*(rMaxSize-this.minSize)  +  this.minSize;
			
			if(icon.mDock4_tempNewSize < this.minSize)
				icon.mDock4_tempNewSize = this.minSize;
		}
		if(icon.mDock4_tempNewSize>this.minSize && (labelIcon==null || icon.mDock4_tempNewSize > labelIcon.mDock4_tempNewSize))
			labelIcon = icon;
		totalsize += icon.mDock4_tempNewSize;
	}
	
	//if(this.isGrowing!=true && rMaxSize==this.maxSize && this.dockWidthMax==null)
	//	this.dockWidthMax = totalsize;
	
		//if(Math.abs(this.dockWidthMax-totalsize) > this.minSize/4)
	if(this.isGrowing!=true && rMaxSize==this.maxSize && (this.dockWidthMax==null /*|| Math.abs(this.dockWidthMax-totalsize)>this.minSize/2*/ || this._m_count!=this.dockItems.length || this._m_position!=this.position || this._m_minSize!=this.minSize || this._m_maxSize!=this.maxSize || this._m_growWidth!=this.growWidth) && this.dockItems[0].dockItem.mDock4_tempNewSize==this.minSize && this.dockItems[this.dockItems.length-1].dockItem.mDock4_tempNewSize==this.minSize) {
		/*
		if(this.dockWidthMax!=null && Math.abs(this.dockWidthMax-totalsize)>this.minSize/2) {
			totalsize += this.dockWidthMax<this.totalsize ? 2 : -2;
			this.dockWidthMax += this.dockWidthMax<this.totalsize ? 2 : -2;
		}
		else
			this.dockWidthMax = totalsize;
		*/
		this.dockWidthMax = totalsize;
		this._m_count = this.dockItems.length+0;
		this._m_position = this.position;
		this._m_minSize = this.minSize;
		this._m_maxSize = this.maxSize;
		this._m_growWidth = this.growWidth;
	}
	
	var di,
		minSizeTest = (this.dockWidthMax-totalsize)<this.minSize*2,
		sizeAdjustment = (this.dockWidthMax-totalsize) / 2;
	if (Math.abs(sizeAdjustment)>2) {
		sizeAdjustment = 2 * sizeAdjustment/Math.abs(sizeAdjustment);
	}
	if(labelIcon && rMaxSize==this.maxSize && this.dockItems[0].dockItem.mDock4_tempNewSize==this.minSize && this.dockItems[this.dockItems.length-1].dockItem.mDock4_tempNewSize==this.minSize) {
		for(var ind=0; ind<this.dockItems.length; ind++) {
			di = this.dockItems[ind].dockItem;
			if (minSizeTest && di.mDock4_tempNewSize>this.minSize) {
				if(this.dockItems[ind-1].dockItem.mDock4_tempNewSize===this.minSize) {
					di.mDock4_tempNewSize += Math.floor(sizeAdjustment);
					//di.mDock4_tempNewSize += Math.floor( (this.dockWidthMax-totalsize) / 2 *10)/10;
				}
				else if(this.dockItems[ind+1].dockItem.mDock4_tempNewSize===this.minSize) {
					di.mDock4_tempNewSize += Math.ceil(sizeAdjustment);
					//di.mDock4_tempNewSize += Math.ceil( (this.dockWidthMax-totalsize) / 2 *10)/10;
				}
			}
		}
		totalsize = this.dockWidthMax;
	}
	
	
	this.dockWidth = totalsize;
	
	//var viz = this.base.style.visibility=="hidden" ? "hidden" : "visible";
	//this.base.style.visibility = "hidden";
	
	if(this.hor) {
		this.base.style.width = this.dockWidth+"px";
		if(this.absolutePositioning==true)
			this.base.style.left = (this.winW-this.dockWidth)/2+"px";
	}
	else {
		this.base.style.height = this.dockWidth+"px";
		if(this.absolutePositioning==true)
			this.base.style.top = (this.winH-this.dockWidth)/2+"px";
	}
	
	
	//var di;	//defined above
	
	var perFunc, changed, ind;
	
	if (this.position==="bottom") {
		perFunc = function(di, changed) {
			if (di.parentItem.isBouncing==true) {
				di.parentItem._bounceHeight += (di.mDock4_tempNewSize - di.offsetHeight)/2;
			}
			else if (changed) {
				di.style.marginTop = (this.minSize - di.mDock4_tempNewSize) + "px";
			}
		};
	}
	else if (this.position==="right") {
		perFunc = function(di, changed) {
			if (di.parentItem.isBouncing==true) {
				di.parentItem._bounceHeight += (di.mDock4_tempNewSize - di.offsetHeight)/2;
			}
			else if (changed) {
				di.style.marginLeft = (this.minSize - di.mDock4_tempNewSize) + "px";
			}
		};
	}
	
	for(ind=0; ind<this.dockItems.length; ind++) {
		di = this.dockItems[ind].dockItem;
		changed = di.mDock4_tempNewSize!==di.mDock4_currentSize;
		if(di.isRemoving!=true) {
			if (perFunc) {
				perFunc.apply(this, [di, changed]);
			}
			if (changed) {
				di.mDock4_currentSize = di.mDock4_tempNewSize;
				di.style.height = di.mDock4_tempNewSize+"px";
				di.style.width = di.mDock4_tempNewSize+"px";
			}
		}
	}
	
	perFunc = changed = null;
	
	
	
	if(labelIcon!=null && !(this.isGrowing==true && this.currentGrowthDirection==-1)) {
		var lx = labelIcon.offsetLeft+labelIcon.offsetWidth/2;
		var ly = labelIcon.offsetTop+labelIcon.offsetHeight/2;
		if(this.label==null) {
			this.label = document.createElement("span");
			this.label.className = "mDock4 mDock_label mdock_label";
			this.base.appendChild(this.label);
			this.label.style.cssText = "position:absolute; visibility:hidden;";

			//this.label.assocIcon = labelIcon;
			this.label.innerTexts = [];
			for(var ind=0; ind<this.labelInners; ind++) {
				this.label.innerTexts[ind] = document.createElement("span");
				this.label.innerTexts[ind].className = "mDock4 mDock_label_innerText"+(ind+1)+" mdock_label_innertext"+(ind+1);
				this.label.appendChild(this.label.innerTexts[ind]);
			}
		}
		
		if(this.label.assocIcon!=labelIcon) {
			this.label.style.visibility = "hidden";
			this.label.assocIcon = labelIcon;
			this.label.style.width = "auto";
			for(var ind=0; ind<this.labelInners; ind++)
				this.label.innerTexts[ind].innerHTML = labelIcon.parentItem.label;
			this.label.style.display = "inline";
			this.label.style.top = "-999em";
			this.label.style.left = "-999em";
			this.label.style.width = (this.label.offsetWidth+3) + "px";
			this.label.style.display = "block";
		}
		if(this.hor) {
			this.label.style.left = ( lx - this.label.offsetWidth/2 ) + "px";
			if(this.position=="top")
				this.label.style.top = ( ly + this.maxSize/2 + 10 ) + "px";
			else
				this.label.style.top = ( ly - this.maxSize/2 - 10 - this.label.offsetHeight ) + "px";
		}
		else {
			this.label.style.top = ( ly - this.label.offsetHeight/2 ) + "px";
			if(this.position=="left")
				this.label.style.left = ( lx + this.maxSize/2 + 10 ) + "px";
			else
				this.label.style.left = ( lx - this.maxSize/2 - 10 - this.label.offsetWidth ) + "px";
		}
		this.label.style.visibility = "visible";
	}
	
	//this.base.style.visibility = viz;
};


mDock4.prototype.StopFishEye = function(mx,my) {
	window.mDock_currentActiveDock = null;
	this.mouseover = false;
	document.onmousemove = this.oldDocumentMouseMove;
	this.GrowEffect(-1);
	if(this.label) {
		this.label.assocIcon = null;
		this.label.style.display = "none";
	}
	// this.dockWidthMax = 0;
};


// new growth code
mDock4.prototype.GrowEffect = function(direction) {
	var useStartFraction = false;
	if(this.isGrowing===true) {
		useStartFraction = !!(this.grow_currentMax && this.currentGrowthDirection);
		if (direction===this.currentGrowthDirection) {
			return true;
		}
		else {
			this.StopGrowEffect(true);
		}
	}
	if(!direction)
		direction = 1;
	this.currentGrowthDirection = direction;
	this.isGrowing = true;
	if(!this.grow_currentMax)
		this.grow_currentMax = direction==1?(this.minSize+this.growSpeed):(this.maxSize-this.growSpeed);
	var startFraction = useStartFraction ? (direction===1 ? (this.grow_currentMax-this.minSize)/(this.maxSize-this.minSize) : (this.maxSize-this.grow_currentMax)/(this.maxSize-this.minSize)) : 0,
		duration = 1000 / this.growSpeed * (1-startFraction),
		self = this,
		startTime = new Date().getTime(),
		frame, kill;
	this.killGrowEffect = kill = function() {
		if (self.growthInterval) {
			clearTimeout(self.growthInterval);
			delete self.growthInterval;
		}
		self.killGrowEffect = null;
		self = frame = kill = null;
	};
	frame = function() {
		var time = new Date().getTime(),
			fraction = startFraction + (time-startTime)/duration,
			fractionEased = startFraction + (Math.sin(Math.PI*(fraction-1/2))+1)/2;
		if (fraction<=1 && fractionEased<=1) {
			if (direction===-1) {
				fractionEased = 1 - fractionEased;
			}
			self.growToFraction(fractionEased);
			self.growthInterval = setTimeout(frame, 10);
		}
		else {
			self.StopGrowEffect();
		}
	};
	frame();
};

mDock4.prototype.StopGrowEffect = function(forced) {
	if (this.killGrowEffect) {
		this.killGrowEffect();
	}
	if(forced!==true) {
		this.DoFishEye(this.lastX,this.lastY,this.currentGrowthDirection===1?(this.maxSize-0.1):this.minSize);
	}
	this.isGrowing = false;
	this.currentGrowthDirection = 0;
	return false;
};

mDock4.prototype.growToFraction = function(fraction) {
	this.grow_currentMax = fraction*(this.maxSize-this.minSize) + this.minSize;
	if (fraction>1 || this.grow_currentMax>this.maxSize) {
		//console.log('cmax=',this.grow_currentMax, ', frac=',fraction, ', min=',this.minSize, ', max=',this.maxSize);
	}
	var odw = this.dockWidth;
	this.DoFishEye(this.lastX,this.lastY,this.grow_currentMax);
	if(!this.hor)
		this.lastY += (this.dockWidth-odw)/2;
	else
		this.lastX += (this.dockWidth-odw)/2;
};


// old growth code
/*
mDock4.prototype.GrowEffect = function(direction) {
	if(this.isGrowing==true) {
		if (direction===this.currentGrowthDirection) {
			return true;
		}
		else {
			this.StopGrowEffect(true);
		}
	}
	if(!direction)
		direction = 1;
	this.currentGrowthDirection = direction;
	this.isGrowing = true;
	if(this.grow_currentMax==null)
		this.grow_currentMax = direction==1?(this.minSize+this.growSpeed):(this.maxSize-this.growSpeed);
	var self = this;
	this.growthInterval = setInterval(function() {
		self.DoGrowOnce(direction);
	}, 20);
	this._killGrow = function(){
		delete self._killGrow;
		self = null;
	};
};

mDock4.prototype.StopGrowEffect = function(forced) {
	try{ clearInterval(this.growthInterval); }catch(e){}
	if (this._killGrow){ this._killGrow(); }
	//if (this.killGrowEffect) {
	//	this.killGrowEffect();
	//}
	if(forced!=true) {
		this.DoFishEye(this.lastX,this.lastY,this.currentGrowthDirection==1?(this.maxSize-2):this.minSize);
	}
	this.isGrowing = false;
	this.currentGrowthDirection = 0;
	//window.mDock4_currentGrowthDock = null;
	return false;
};

mDock4.prototype.DoGrowOnce = function(direction) {
	// this function will hopefully not be used anymore. (actually it has to be temporarily)
	if((direction==1 && this.grow_currentMax>=this.maxSize-this.growSpeed-1) || (direction==-1 && this.grow_currentMax<=this.minSize+this.growSpeed))
		return this.StopGrowEffect();
	this.grow_currentMax += direction*this.growSpeed;
	
	var odw = this.dockWidth;
	this.DoFishEye(this.lastX,this.lastY,this.grow_currentMax);
	if(!this.hor)
		this.lastY += (this.dockWidth-odw)/2;
	else
		this.lastX += (this.dockWidth-odw)/2;
};

mDock4.prototype.growToFraction = function(fraction) {
	//this.grow_currentMax += fraction*(this.maxSize-this.minSize) + this.minSize;
	this.grow_currentMax = fraction*(this.maxSize-this.minSize) + this.minSize;
	
	var odw = this.dockWidth;
	this.DoFishEye(this.lastX,this.lastY,this.grow_currentMax);
	if(!this.hor)
		this.lastY += (this.dockWidth-odw)/2;
	else
		this.lastX += (this.dockWidth-odw)/2;
};
*/


mDock4.prototype._setImage = function(dockItem,image) {
	if(this.isIE6==true && image.substring(image.lastIndexOf("."),image.length)==".png") {
		dockItem.dockItem.src = this.nullGifLocation;
		dockItem.dockItem.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+image+"', sizingMethod='scale')";
	}
	else
		dockItem.dockItem.src = image;
};


mDock4.prototype.NullFunction = function(e,mod) {
	if(!e) e = window.event;
	if(e) {
		if(mod && (mod+"").toLowerCase().indexOf("allowbubble")<0) {
			try { e.cancelBubble = true; } catch(err){}
			if(e.stopPropagation)
				try { e.stopPropagation(); }catch(err){}
		}
		if(e.preventDefault)
			try { e.preventDefault(); }catch(err){}
		e.returnValue = false;
	}
	return false;
};





// Public Functions:

	// Places the dock inside of an HTML element/node
mDock4.prototype.AppendTo = function(node) {
	if(this.ParamCheck(node,false)==false)
		return false;
	
	if(node.constructor==String)
		if(!(node=document.getElementById(node)))
			node=eval("document."+node);
	
	node.appendChild(this.base);
};

	// Makes the specified icon bounce (attention effect);
mDock4.prototype.BounceIcon = function(dockItem, bounces, height, speed) {
	var origParam = dockItem;
	if(this.Item(dockItem)!=null)
		dockItem = this.Item(dockItem);
	else if(dockItem.constructor && dockItem.constructor==String)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].label==dockItem || this.dockItems[x].id.toString()==dockItem)
				dockItem = this.dockItems[x];
	
	if(dockItem.isBouncing==true)
		return false;
	
	if(dockItem!=null && dockItem!= "undefined") {
		dockItem.isBouncing = true;
		if(bounces==null || bounces=="undefined")
			bounces = 1;
		if(height==null || height=="undefined")
			height = this.bounceHeight!=null ? this.bounceHeight : this.defaultBounceHeight();
		if(speed==null || speed=="undefined" || speed<=0)
			speed = this.bounceSpeed;
		var delay = 10-speed;
		var index = null;
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].id == dockItem.id)
				index = x;
		if(index==null)
			return false;
		var b,i;
		for(b=0; b<3; b++) {
			for(i=0; i<height; i+=height>20?(height/10):1)
				window.setTimeout("document.getElementById(\""+this.base.id+"\").parentDock._DoBounceIcon('"+dockItem.id+"',"+i/Math.pow(b+1,2)+");", (height*2*delay*b)+(delay*i));
			for(i=height; i<=(height*2); i+=height>20?(height/10):1)
				window.setTimeout("document.getElementById(\""+this.base.id+"\").parentDock._DoBounceIcon('"+dockItem.id+"',"+(height*2-i)/Math.pow(b+1,2)+");", (height*2*delay*b)+(delay*i));
		}
		window.setTimeout("var dock=document.getElementById(\""+this.base.id+"\").parentDock; dock.Item('"+dockItem.id+"').isBouncing=false; dock.Item('"+dockItem.id+"')._bounceHeight=0;",  (height*2*delay*2) + (delay*height*2) );
		if(bounces>1)
			setTimeout("document.getElementById(\""+this.base.id+"\").parentDock.BounceIcon('"+dockItem.id+"',"+(bounces-1)+","+height+","+speed+");",  (height*2*delay*2) + (delay*height*2) + 50 );
		return ((height*2*delay*2) + (delay*height*2))*bounces + 50;
	}
	else {
		throw(new Error("mDock4 >> Could not find icon using supplied search parameter: "+origParam));
		return false;
	}
};

mDock4.prototype._DoBounceIcon = function(dockItemID,heightPercent) {
	var item = this.Item(dockItemID);
	item._bounceHeight = Math.round(parseFloat((this.position=="bottom"||this.position=="right") ? (this.minSize-(parseInt(item.dockItem.offsetHeight)>0?item.dockItem.offsetHeight:item.dockItem.mDock4_tempNewSize)-heightPercent) : heightPercent));
	//if(this.isGrowing!=true) {
		item.dockItem.style.visibility = "hidden";
		if(this.position=="left" || this.position=="right")
			item.dockItem.style.marginLeft = item._bounceHeight+'px';
		else if(this.position=="bottom" || this.position=="top")
			item.dockItem.style.marginTop = item._bounceHeight+'px';
		
		if(this.label && this.label.assocIcon && this.label.assocIcon==item.dockItem) {
			var labelIcon = this.label.assocIcon;
			this.label.style.visibility = "hidden";
			if(this.hor) {
				var ly = labelIcon.offsetTop+labelIcon.offsetHeight/2;
				if(this.position=="top")
					this.label.style.top = ( ly + this.maxSize/2 + 10 ) + "px";
				else
					this.label.style.top = ( ly - this.maxSize/2 - 10 - this.label.offsetHeight ) + "px";
			}
			else {
				var lx = labelIcon.offsetLeft+labelIcon.offsetWidth/2;
				if(this.position=="left")
					this.label.style.left = ( lx + this.maxSize/2 + 10 ) + "px";
				else
					this.label.style.left = ( lx - this.maxSize/2 - 10 - this.label.offsetWidth ) + "px";
			}
			this.label.style.visibility = "visible";
		}
		item.dockItem.style.visibility = "visible";
	//}
};


mDock4.prototype.StartBouncing = function(dockItem, height, speed) {
	if(this.Item(dockItem)!=null)
		dockItem = this.Item(dockItem);
	else if(dockItem.constructor && dockItem.constructor==String)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].label==dockItem || this.dockItems[x].id.toString()==dockItem)
				dockItem = this.dockItems[x];
	if(dockItem!=null && dockItem!="undefined") {
		if(height==null || height=="undefined" || height>300)
			height = this.bounceHeight!=null ? this.bounceHeight : this.defaultBounceHeight();
		if(speed==null || speed=="undefined" || speed<=0)
			speed = this.bounceSpeed;
		if(dockItem.isBouncingAtInterval==true)
			this.StopBouncing(dockItem);
		dockItem.isBouncingAtInterval=true;
		var interval = this.BounceIcon(dockItem, 1, height, speed);
		dockItem.currentBouncingInterval = setInterval("var dock=document.getElementById(\""+this.base.id+"\").parentDock; dock.BounceIcon(\""+dockItem.id+"\", 1, "+height+", "+speed+");", interval*2);
	}
};

mDock4.prototype.StopBouncing = function(dockItem) {
	if(this.Item(dockItem)!=null)
		dockItem = this.Item(dockItem);
	else if(dockItem.constructor && dockItem.constructor==String)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].label==dockItem || this.dockItems[x].id.toString()==dockItem)
				dockItem = this.dockItems[x];
	if(dockItem!=null && dockItem!="undefined") {
		if(dockItem.currentBouncingInterval!=null)
			clearTimeout(dockItem.currentBouncingInterval);
		dockItem.isBouncingAtInterval=false;
	}
};



mDock4.prototype.Item = function(id) {
	if(this.ParamCheck(id,false)!=false)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x] && (this.dockItems[x].id==id || this.dockItems[x].id==parseInt(id)))
				return this.dockItems[x];
	return null;
};



mDock4.prototype.Position = function(position, absolute) {
	position = (position+"").toLowerCase();
	if(position!="top" && position!="right" && position!="bottom" && position!="left")
		return false;
	
	if(this._positionInvisibilityTimer)
		try{ window.clearTimeout(this._positionInvisibilityTimer); }catch(e){}
	
	var gone =  this.base.style.display!=="none";
	this.base.style.display = "none";
	this.position = position;
	this.hor = this.position=="top" || this.position=="bottom";
	if(absolute==true || this.hor) {
		if(this.base.parentNode!=document.body) {
			this.base.parentNode.removeChild(this.base);
			document.body.appendChild(this.base);
		}
		this.absolutePositioning = true;
		this.base.style.position = "absolute";
		this.base.style.left = this.position=="left"?"0px":"auto";
		this.base.style.right = this.position=="right"?"0px":"auto";
		this.base.style.top = this.position=="top"?"0px":"auto";
		this.base.style.bottom = this.position=="bottom"?"0px":"auto";
	}
	else if(absolute!=true && this.absolutePositioning==true) {
		this.base.style.position = "relative";
		this.base.style.left = "auto";
		this.base.style.top = "auto";
		this.absolutePositioning = false;
	}
	
	this.base.style.height = (this.hor==true?this.minSize:this.dockWidth) + "px";
	this.base.style.width = (this.hor==false?this.minSize:this.dockWidth) + "px";
	
	for(var x=0; x<this.dockItems.length; x++) {
		this.dockItems[x].dockItem.style.marginRight = (this.hor && x==this.dockItems.length-1) ? "-999px" : "0";
		this.dockItems[x].dockItem.style.marginLeft = "0";
		this.dockItems[x].dockItem.style.marginTop = "0";
		this.dockItems[x].dockItem.style.marginBottom = position=="bottom"?(this.minSize+"px"):"0";
		this.dockItems[x].dockItem.style.clear = this.hor?"none":"left";
	}
	
	this.base.className = this.base.className.replace(/ mdock_base_(bottom|top|left|right)/mgi,"") + " mdock_base_"+this.position + " mDock_base_"+this.position;
	
	this.Refresh();
	if(gone!=true)
		this._positionInvisibilityTimer = window.setTimeout("document.getElementById('"+this.base.id+"').style.display='block';", 25);
};



mDock4.prototype.Refresh = function() {
	this.winW = window.innerWidth?window.innerWidth:(document.documentElement?document.documentElement.offsetWidth:document.body.offsetWidth);
	this.winH = window.innerHeight?window.innerHeight:(document.documentElement?document.documentElement.offsetHeight:document.body.offsetHeight);
	if(this.label && this.label.assocIcon)
		this.label.assocIcon = null;
	var mo = this.mouseover==true;
	this.StartFishEye(this.lastX||0,this.lastY||0,this.grow_currentMax||this.maxSize);
	if(!mo)
		this.StopFishEye(this.lastX||0,this.lastY||0,this.grow_currentMax||this.maxSize);
};


mDock4.prototype._refreshBase = function() {
	this.winW = window.innerWidth?window.innerWidth:(document.documentElement?document.documentElement.offsetWidth:document.body.offsetWidth);
	this.winH = window.innerHeight?window.innerHeight:(document.documentElement?document.documentElement.offsetHeight:document.body.offsetHeight);
	if(this.hor) {
		this.base.style.width = this.dockWidth+"px";
		if(this.absolutePositioning==true)
			this.base.style.left = (this.winW-this.dockWidth)/2+"px";
	}
	else {
		this.base.style.height = this.dockWidth+"px";
		if(this.absolutePositioning==true)
			this.base.style.top = (this.winH-this.dockWidth)/2+"px";
	}
};

mDock4.prototype.itemsIndex = 0;
mDock4.prototype.AddItem = function(dockItem, insertBefore, skipEffect){
	var item = dockItem;
	var itemDefaults = {
		"id" : this.ParamCheck(dockItem.id, (++this.itemsIndex)+"_"+Math.floor(Math.random()*9999999999999)) ,
		"label" : this.ParamCheck(dockItem.label,"") ,
		"icon" : this.ParamCheck(dockItem.icon,this.defaultIcon) ,
		"largeIcon" : this.ParamCheck(dockItem.largeIcon, this.ParamCheck(dockItem.icon,this.defaultIcon) ) ,
		"action" : this.ParamCheck(dockItem.action,function(){}) ,
		"menuItems" : this.ParamCheck(dockItem.menuItems,function(){}) ,
		"type" : this.ParamCheck(dockItem.type,"default") ,
		"dockItem" : document.createElement("img") ,
		"Bounce" : function(bounces,height,speed){ this.parentDock.BounceIcon(this,bounces,height,speed); } ,
		"StartBouncing" : function(height,speed){ this.parentDock.StartBouncing(this,height,speed); } ,
		"StopBouncing" : function(){ this.parentDock.StopBouncing(this); } ,
		"Remove" : function(){ this.parentDock.RemoveItem(this); } ,
		"SetImage" : function(newSrc,onLoad){ this.parentDock.SetImage(this,newSrc,onLoad); } ,
		"setImage" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
		"SetIcon" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
		"setIcon" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
		"setLabel" : function(newLabel){ if(this.parentDock.ParamCheck(newLabel,null)!=null){ while(newLabel!=(newLabel=newLabel.replace(" ","&nbsp;"))){} this.label=newLabel; return true; } return false; } ,
		"getLabel" : function(){ var lab=this.label; while(lab!=(lab=lab.replace("&nbsp;"," "))){} return lab; } ,
		"SetLabel" : function(newLabel){ return this.setLabel(newLabel) } ,
		"GetLabel" : function(){ return this.getLabel; } ,
		"parentDock" : this ,
		"isDockItemObj" : true ,
		"created" : (new Date())
	};
	
	for(var x in itemDefaults)
		item[x] = itemDefaults[x];

	while(item.label!=(item.label=item.label.replace(" ","&nbsp;"))){}
	
	item.dockItem.parentItem = item;
	item.dockItem.parentDock = this;
	item.isDockItem = true;
	item.dockItem.className = "mDock4 mdock4 mDock_icon mdock_icon";
	item.dockItem.style.cssText = "display:block; position:relative; float:left; clear:"+(this.hor?"none":"left")+"; width:"+this.minSize+"px; height:"+this.minSize+"px; margin:0; padding:0; border:none;";
	item.dockItem.onmousedown = this.NullFunction;
	item.dockItem.onmouseup = this.NullFunction;
	item.dockItem.onselectstart = this.NullFunction;
	item.dockItem.ondragstart = this.NullFunction;
	item.dockItem.oncontextmenu = function(e) {
		if(!e) e=window.event;
		this.tempMenued = this.parentItem.menuItems;
		this.tempMenued({
			"event" : e ,
			"item" : this.parentItem ,
			"icon" : this ,
			"dock" : this.parentItem.parentDock ,
			"clicked" : (new Date())
		}, this.parentItem, this.parentItem.parentDock);
		return this.parentItem.parentDock.NullFunction(e);
	};
	item.dockItem.onclick = function(e) {
		if(!e) e=window.event;
		this.tempAction = this.parentItem.action;
		this.tempAction({
			"event" : e ,
			"item" : this.parentItem ,
			"icon" : this ,
			"dock" : this.parentItem.parentDock ,
			"clicked" : (new Date())
		}, this.parentItem, this.parentItem.parentDock);
		return this.parentItem.parentDock.NullFunction(e);
	};
	item.dockItem._onLoadOrError = function() {
		this.parentDock.loadedItems.push(this.parentItem);
		this.parentItem.loaded = true;
		for(var x=0; x<this.parentDock.onprogress.length; x++)
			this.parentDock.onprogress[x].apply(this.parentDock,[this.parentItem,this.parentDock.loadedItems.length,this.parentDock.dockItems.length]);
		if(this.parentDock.loadedItems.length==this.parentDock.dockItems.length)
			for(var x=0; x<this.parentDock.onload.length; x++)
				this.parentDock.onload[x].apply(this.parentDock,[this.parentItem]);
	};
	item.dockItem._onload = function() {
		this.parentDock._setImage(this.parentItem,this.parentItem.loader.src);
		this.parentItem.failed = false;
		this._onLoadOrError();
	};
	item.dockItem._onerror = function() {
		this.parentDock._setImage(this.parentItem,this.parentDock.defaultIcon);
		this.parentDock.failedItems.push(this.parentItem);
		this.parentItem.failed = true;
		this._onLoadOrError();
		var i = this.parentItem;
		setTimeout(function() {
			var x = i;
			i = null;
			throw(new Error("mDock4: Error loading icon "+x.id+".", x.icon, x.id));
		}, 1);
	};
	

	item.loader = new Image();
	item.loader.parentItem = item;
	item.loader.onload = function() { this.parentItem.dockItem._onload(); };
	item.loader.onerror = function() { this.parentItem.dockItem._onerror(); };
	item.loader.src = item.icon;
	
	
	//var doInsertBefore = insertBefore!=null && insertBefore!="undefined" && insertBefore.getLabel;
	//if(insertBefore==true)
	var doInsertBefore = false;
	if(insertBefore!=null && insertBefore!="undefined")
		try { var test=insertBefore.isDockItemObj==true; doInsertBefore=true; } catch(err){ doInsertBefore=false; }
	
	if(doInsertBefore==false || insertBefore==null || insertBefore=="undefined") {
		this.base.appendChild(item.dockItem);
		this.dockItems.push(item);
	}
	else if(doInsertBefore==true && this.ParamCheck(insertBefore) && insertBefore.isDockItem && insertBefore.isDockItem==true && insertBefore.dockItem) {
		this.base.insertBefore(item.dockItem,insertBefore.dockItem);
		var newItems = [];
		for(var x=0; x<this.dockItems.length; x++) {
			newItems.push(this.dockItems[x]);
			if(this.dockItems[x+1] && this.dockItems[x+1]==insertBefore)
				newItems.push(item);
		}
		this.dockItems = newItems;
	}
	
	for(var x=0; x<this.dockItems.length-1; x++)
		this.dockItems[x].dockItem.style.marginRight = "0";
	if(this.position=="bottom")
		for(var x=0; x<this.dockItems.length-1; x++)
			this.dockItems[x].dockItem.style.marginBottom = this.minSize+"px";
	this.dockItems[this.dockItems.length-1].dockItem.style.marginRight = "-999px";
	
	if(skipEffect==true) {
		this.dockWidth += this.minSize;
		this._refreshBase();
		this.Refresh();
	}
	else {
		var dockItem = item;
		// grow effect
		if(dockItem._removing_origSize==null)
			dockItem._removing_origSize = 0;
		dockItem.isRemoved = false;
		dockItem.isRemoving = true;
		dockItem.dockItem.isRemoved = false;
		dockItem.dockItem.isRemoving = true;
		dockItem.dockItem._GrowOnce = function(origSize) {
			var size = this.mDock4_tempNewSize!=null ? this.mDock4_tempNewSize : 0;
			var dock = this.parentDock;
			var GrowSpeed = parseInt(this.parentDock.growSpeed)*2;
			if(Math.abs(this.parentDock.minSize-size)>GrowSpeed) {
				this.style.height = (size+GrowSpeed)+"px";
				this.style.width = (size+GrowSpeed)+"px";
				
				this.mDock4_tempNewSize = size+GrowSpeed;
				this.parentItem.mDock4_tempNewSize = this.mDock4_tempNewSize;
				
				this.parentDock.dockWidth += GrowSpeed;
				this.parentDock.dockWidthMax = null;
				
				if(this.parentDock.position=="bottom")
					this.style.marginTop = (this.parentDock.minSize-size)/2 + "px";
				else if(this.parentDock.position=="right")
					this.style.marginLeft = (this.parentDock.minSize-size)/2 + "px";
				
				if(this.parentDock.mouseover==true) {
					this.parentDock[this.parentDock.hor?"lastX":"lastY"] += GrowSpeed/2;
					this.parentDock.DoFishEye( this.parentDock.lastX , this.parentDock.lastY );
				}
				else
					this.parentDock.Refresh();
			}
			else {
				if(this.parentItem._mDock4_removeInterval)
					window.clearInterval(this.parentItem._mDock4_removeInterval);
				this.isRemoved = null;
				this.isRemoving = false;
				this.parentItem.isRemoved = null;
				this.parentItem.isRemoving = false;
				if(this.parentDock.mouseover==true) {
					this.parentDock[this.parentDock.hor?"lastX":"lastY"] += GrowSpeed/2;
					this.parentDock.DoFishEye( this.parentDock.lastX , this.parentDock.lastY );
				}
				else
					this.parentDock.Refresh();
			}
		};
		if(!window.mDock4_dockItemID_counter)
			window.mDock4_dockItemID_counter = 0;
		window.mDock4_dockItemID_counter++;
		if(!dockItem.dockItem.id)
			dockItem.dockItem.id = "mDock4_adding_icon_"+dockItem.id+"_"+window.mDock4_dockItemID_counter;
		dockItem.dockItem._GrowOnce(this.minSize);
		dockItem._mDock4_removeInterval = window.setInterval("document.getElementById(\""+dockItem.dockItem.id+"\")._GrowOnce("+this.minSize+");", 30);
	}
	
	for(var x=0; x<this.onAdd.length; x++)
		try{ this.onAdd[x].apply(this,[item]); }catch(e){window.setTimeout("throw(new Error(decodeURIComponent('"+encodeURIComponent(e.message?e.message:(e+""))+"',decodeURIComponent('"+encodeURIComponent(e.filename?e.filename:"[onAdd]")+"'),"+e.lineNumber||0+"));",1);}
	
	return item;
};
mDock4.prototype.addItem = mDock4.prototype.AddItem;
mDock4.prototype.AddIcon = mDock4.prototype.AddItem;
mDock4.prototype.addIcon = mDock4.prototype.AddItem;



mDock4.prototype.RemoveItem = function(dockItem, skipEffect, sizeLeft, forced) {
	if(this.dockItems.length==1 && forced!==true)
		return false;
	if(this.dockItems[dockItem]!=null)
		dockItem = this.dockItems[dockItem];
	else if(dockItem.constructor && dockItem.constructor==String)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].label==dockItem || this.dockItems[x].id.toString()==dockItem)
				dockItem = this.dockItems[x];
	if(dockItem!=null && dockItem!="undefined") {
		if(dockItem._removing_origSize==null)
			dockItem._removing_origSize = dockItem.dockItem.offsetWidth;
		dockItem.isRemoved = false;
		dockItem.isRemoving = true;
		dockItem.dockItem.isRemoved = false;
		dockItem.dockItem.isRemoving = true;
		if(skipEffect!=null && skipEffect==true) {
			dockItem.isRemoved = true;
			dockItem.isRemoving = false;
			dockItem.dockItem.isRemoved = true;
			dockItem.dockItem.isRemoving = false;
			
			for(var x=0; x<this.dockItems.length; x++)
				if(this.dockItems[x]==dockItem)
					this.dockItems.splice(x,1);
			
			for(var x=0; x<this.dockItems.length; x++)
				if(this.dockItems[x].id == x+1)
					this.dockItems[x].id = x;
			
			if(this.dockItems.length>0) {
				for(var x=0; x<this.dockItems.length-1; x++)
					this.dockItems[x].dockItem.style.marginRight = "0";
				if(this.position=="bottom")
					for(var x=0; x<this.dockItems.length-1; x++)
						this.dockItems[x].dockItem.style.marginBottom = this.minSize+"px";
				this.dockItems[this.dockItems.length-1].dockItem.style.marginRight = "-999px";
			}
			
			dockItem.dockItem.parentNode.removeChild(dockItem.dockItem);
			this.dockWidth -= parseInt(sizeLeft)>0 ? sizeLeft : dockItem._removing_origSize;
			
			this.DoFishEye( this.lastX , this.lastY );
			
			return dockItem;
		}
		if(!window.mDock4_dockItemID_counter)
			window.mDock4_dockItemID_counter = 0;
		window.mDock4_dockItemID_counter++;
		dockItem.dockItem.id = "mDock4_removing_icon_"+dockItem.id+"_"+window.mDock4_dockItemID_counter;
		dockItem.dockItem._ShrinkOnce = function(origSize) {
			var size = this.mDock4_tempNewSize!=null ? this.mDock4_tempNewSize : this.offsetHeight;
			var dock = this.parentDock;
			var ShrinkSpeed = parseInt(this.parentDock.shrinkSpeed)*2;
			if(size>ShrinkSpeed) {
				this.style.height = (size-ShrinkSpeed)+"px";
				this.style.width = (size-ShrinkSpeed)+"px";
				
				this.mDock4_tempNewSize = size-ShrinkSpeed;
				this.parentItem.mDock4_tempNewSize = this.mDock4_tempNewSize;
				
				this.parentDock.dockWidth -= ShrinkSpeed;
				this.parentDock.dockWidthMax = null;
				
				if(this.parentDock.position=="bottom")
					this.style.marginTop = (this.parentDock.minSize-size)/2 + "px";
				else if(this.parentDock.position=="right")
					this.style.marginLeft = (this.parentDock.minSize-size)/2 + "px";
				
				if(this.parentDock.mouseover==true) {
					this.parentDock[this.parentDock.hor?"lastX":"lastY"] -= ShrinkSpeed/2;
					this.parentDock.DoFishEye( this.parentDock.lastX , this.parentDock.lastY );
				}
				else
					this.parentDock.Refresh();
			}
			else {
				if(this.parentItem._mDock4_removeInterval)
					window.clearInterval(this.parentItem._mDock4_removeInterval);
				dock.RemoveItem(this.parentItem,true,size);
			}
		};
		dockItem._mDock4_removeInterval = window.setInterval("document.getElementById(\""+dockItem.dockItem.id+"\")._ShrinkOnce("+dockItem.dockItem.offsetHeight+");", 30);
	}
};
mDock4.prototype.removeItem = mDock4.prototype.RemoveItem;
mDock4.prototype.RemoveIcon = mDock4.prototype.RemoveItem;
mDock4.prototype.removeIcon = mDock4.prototype.RemoveItem;



mDock4.prototype.SetImage = function(dockItem, newSrc, onLoad) {
	if(this.dockItems.length==1)
		return false;
	if(this.dockItems[dockItem]!=null)
		dockItem = this.dockItems[dockItem];
	else if(dockItem.constructor && dockItem.constructor==String)
		for(var x=0; x<this.dockItems.length; x++)
			if(this.dockItems[x].label==dockItem || this.dockItems[x].id.toString()==dockItem)
				dockItem = this.dockItems[x];
	if(dockItem!=null && dockItem!="undefined" && newSrc && newSrc.constructor && newSrc.constructor==String) {
		dockItem.icon = newSrc;
		dockItem.loader = new Image();
		dockItem.loader.parentItem = dockItem;
		dockItem.loader._userOnLoad = onLoad;
		dockItem.loader.onload = function() {
			this.parentItem.dockItem._onload();
			if(this._userOnLoad && this._userOnLoad.constructor && this._userOnLoad.constructor==Function) {
				this.parentItem._setImage_OnLoad = this._userOnLoad;
				this.parentItem._setImage_OnLoad(true);
			}
		};
		dockItem.loader.onerror = function() {
			this.parentItem.dockItem._onerror();
			if(this._userOnLoad && this._userOnLoad.constructor && this._userOnLoad.constructor==Function) {
				this.parentItem._setImage_OnLoad = this._userOnLoad;
				this.parentItem._setImage_OnLoad(false);
			}
		};
		dockItem.loader.src = dockItem.icon;
		return true;
	}
	return false;
};
mDock4.prototype.setImage = mDock4.prototype.SetImage;
mDock4.prototype.SetIcon = mDock4.prototype.SetImage;
mDock4.prototype.setIcon = mDock4.prototype.SetImage;


mDock4.prototype.LoadPlugin = function(plugin) {
	plugin = this.ParamCheck(plugin,"");
	if(plugin.constructor==String && this.plugins[plugin]!=null && this.plugins[plugin].initialize) {
		this.activePlugins.push(plugin);
		if(this.plugins[plugin].initialize!=null && this.plugins[plugin].initialize.constructor==Function) {
			this.plugins[plugin].initialize.apply(this,[]);
		}
		return true;
	}
	if(plugin.constructor==Object && plugin.initialize) {
		var pName = "";
		if(plugin.name)
			pName = plugin.name;
		else
			pName = Math.floor(Math.random()*99999999999)+"";
		this.plugins[pName] = plugin;
		//this.plugins[pName].initialize();
		this.LoadPlugin(pName);
		return true;
	}
	return false;
};
mDock4.prototype.AddPlugin = mDock4.prototype.LoadPlugin;










// mDock4 supports plugins.
// There are a few starter plugins already:

mDock4.prototype.plugins = {
	reflection : {
		heightPercent		: 1/3 ,
		compressionFactor	: 1/2 ,
		topOffsetCSS		: "-6px",
		resolution			: 1,
		minOpac				: 0 ,
		maxOpac				: 40 ,
		initialize : function() {
			this._setImage = function(dockItem,image) {
				var di = dockItem.dockItem;
				di.style.overflow = "visible";
				// Set an image, using IE png hack:
				var si = function(el,image,dock) {
					if(dock.isIE6==true && image.substring(image.lastIndexOf("."),image.length)==".png") {
						el.src = dock.nullGifLocation;
						el.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+image+"', sizingMethod='scale')";
					}
					else
						el.src = "images/lighton.png";
				};
				
				// quick & dirty clearing of icon contents
				di.innerHTML = "";
				
				di._reflection_icon = document.createElement("img");
				di._reflection_icon.style.cssText = "position:relative; height:100%; width:100%; margin:0; padding:0; border:none;";
				if(this.position=="bottom")
					di._reflection_icon.style.marginBottom = this.minSize+"px";
				si(di._reflection_icon, image, this);
				di.appendChild(di._reflection_icon);
				
				var heightPercent = this.plugins.reflection.heightPercent;
				if(heightPercent>1)
					heightPercent /= 100;
				var compFact = 1/this.plugins.reflection.compressionFactor;		// /heightPercent;
				var resolution = this.plugins.reflection.resolution ? (Math.round(this.plugins.reflection.resolution*10)/10) : 1;
				var topOffset = this.plugins.reflection.topOffsetCSS ? this.plugins.reflection.topOffsetCSS : "0";
				var max = this.minSize*heightPercent/resolution;
				
				di._reflection_base = document.createElement("div");
				di._reflection_base.style.cssText = "position:absolute; top:100%; left:0; height:"+(this.minSize*heightPercent)+"px; width:100%; margin:"+topOffset+" 0 0; padding:0px; border:none; z-index:990; overflow:visible;";
				di.appendChild(di._reflection_base);
				
				di.reflection_lines = [];
				for(var x=0; x<max; x++) {
					di.reflection_lines[x] = document.createElement("div");
					di.reflection_lines[x].style.cssText = "position:relative; height:"+resolution+"px; width:100%; margin:0; padding:0; border:none; z-index:999; overflow:hidden;";
					var opac = (1-x/max)*Math.abs(this.plugins.reflection.maxOpac-this.plugins.reflection.minOpac) + this.plugins.reflection.minOpac;
					if(document.all && navigator.userAgent.toLowerCase().indexOf("msie ")>-1 && parseFloat(navigator.appVersion)<8)
						di.reflection_lines[x].style.filter = "alpha(opacity="+opac+")";
					else
						di.reflection_lines[x].style.opacity = opac/100;
					di.reflection_lines[x].rfImg = document.createElement("img");
					di.reflection_lines[x].rfImg.style.cssText = "position:absolute; width:100%; height:"+Math.round(this.minSize*resolution*40)/10+"px; left:0; bottom:"+(-x*resolution*4)+"px;";
					si(di.reflection_lines[x].rfImg, image, this);
					di.reflection_lines[x].appendChild(di.reflection_lines[x].rfImg);
					di._reflection_base.appendChild(di.reflection_lines[x]);
				}
				
			};

			this.AddItem = function(dockItem, insertBefore){
				var item = dockItem;
				var itemDefaults = {
					"id" : this.ParamCheck(dockItem.id, Math.floor(Math.random()*9999999999999)) ,
					"label" : this.ParamCheck(dockItem.label,"") ,
					"icon" : this.ParamCheck(dockItem.icon,this.defaultIcon) ,
					"largeIcon" : this.ParamCheck(dockItem.largeIcon, this.ParamCheck(dockItem.icon,this.defaultIcon) ) ,
					"action" : this.ParamCheck(dockItem.action,function(){}) ,
					"menuItems" : this.ParamCheck(dockItem.menuItems,function(){}) ,
					"type" : this.ParamCheck(dockItem.type,"default") ,
					"dockItem" : document.createElement("div") ,
					"Bounce" : function(bounces,height,speed){ this.parentDock.BounceIcon(this,bounces,height,speed); } ,
					"StartBouncing" : function(height,speed){ this.parentDock.StartBouncing(this,height,speed); } ,
					"StopBouncing" : function(){ this.parentDock.StopBouncing(this); } ,
					"Remove" : function(){ this.parentDock.RemoveItem(this); } ,
					"SetImage" : function(newSrc,onLoad){ this.parentDock.SetImage(this,newSrc,onLoad); } ,
					"setImage" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
					"SetIcon" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
					"setIcon" : function(newSrc,onLoad){ this.SetImage(newSrc,onLoad); } ,
					"setLabel" : function(newLabel){ if(this.parentDock.ParamCheck(newLabel,null)!=null){ while(newLabel!=(newLabel=newLabel.replace(" ","&nbsp;"))){} this.label=newLabel; return true; } return false; } ,
					"getLabel" : function(){ var lab=this.label; while(lab!=(lab=lab.replace("&nbsp;"," "))){} return lab; } ,
					"SetLabel" : function(newLabel){ return this.setLabel(newLabel) } ,
					"GetLabel" : function(){ return this.getLabel; } ,
					"parentDock" : this ,
					"isDockItemObj" : true ,
					"created" : (new Date())
				};
				
				for(var x in itemDefaults)
					item[x] = itemDefaults[x];
				
				while(item.label!=(item.label=item.label.replace(" ","&nbsp;"))){}
				
				item.dockItem.parentItem = item;
				item.dockItem.parentDock = this;
				item.isDockItem = true;
				item.dockItem.className = "mDock4 mdock4 mDock_icon mdock_icon";
				item.dockItem.style.cssText = "display:block; position:relative; float:left; clear:none; width:"+this.minSize+"px; height:"+this.minSize+"px; margin:0px; padding:0px; border:none;";
				item.dockItem.onmousedown = this.NullFunction;
				item.dockItem.onmouseup = this.NullFunction;
				item.dockItem.onselectstart = this.NullFunction;
				item.dockItem.ondragstart = this.NullFunction;
				item.dockItem.dockItem.oncontextmenu = function(e) {
					if(!e) e=window.event;
					this.tempMenued = this.parentItem.menuItems;
					this.tempMenued({
						"event" : e ,
						"item" : this.parentItem ,
						"icon" : this ,
						"dock" : this.parentItem.parentDock ,
						"clicked" : (new Date())
					}, this.parentItem, this.parentItem.parentDock);
					return this.parentItem.parentDock.NullFunction(e);
				};
				item.dockItem.onclick = function(e) {
					if(!e) e=window.event;
					this.tempAction = this.parentItem.action;
					this.tempAction({
						"event" : e ,
						"item" : this.parentItem ,
						"icon" : this ,
						"dock" : this.parentItem.parentDock ,
						"clicked" : (new Date())
					}, this.parentItem, this.parentItem.parentDock);
					return this.parentItem.parentDock.NullFunction(e);
				};
				item.dockItem._onload = function() {
					this.parentDock._setImage(this.parentItem,this.parentItem.loader.src);
					this.parentDock.loadedItems.push(this.parentItem);
					this.parentItem.loaded = true;
					this.parentItem.failed = false;
					if(this.parentDock.loadedItems.length==this.parentDock.dockItems.length) {
						for(var x=0; x<this.parentDock.onload.length; x++) {
							this.parentDock.TempLoadFunction = this.parentDock.onload[x];
							this.parentDock.TempLoadFunction(this.parentItem);
						}
					}
				};
				item.dockItem._onerror = function() {
					this.parentDock._setImage(this.parentItem,this.parentDock.defaultIcon);
					this.parentDock.loadedItems.push(this.parentItem);
					this.parentDock.failedItems.push(this.parentItem);
					this.parentItem.loaded = true;
					this.parentItem.failed = true;
					if(this.parentDock.loadedItems.length==this.parentDock.dockItems.length) {
						for(var x=0; x<this.parentDock.onload.length; x++) {
							this.parentDock.TempLoadFunction = this.parentDock.onload[x];
							this.parentDock.TempLoadFunction(this.parentItem);
						}
					}
					throw(new Error("mDock4 >> Error loading icon "+this.parentItem.id+" ("+this.parentItem.icon+")"));
				};
				
				
				item.loader = new Image();
				item.loader.parentItem = item;
				item.loader.onload = function() { this.parentItem.dockItem._onload(); };
				item.loader.onerror = function() { this.parentItem.dockItem._onerror(); };
				item.loader.src = item.icon;
				
				
				var doInsertBefore = false;
				if(insertBefore!=null && insertBefore!="undefined")
					try { var test=insertBefore.isDockItemObj==true; doInsertBefore=true; } catch(err){ doInsertBefore=false; }
				
				if(doInsertBefore==false || insertBefore==null || insertBefore=="undefined") {
					this.base.appendChild(item.dockItem);
					this.dockItems.push(item);
				}
				else if(doInsertBefore==true && this.ParamCheck(insertBefore) && insertBefore.isDockItem && insertBefore.isDockItem==true && insertBefore.dockItem) {
					this.base.insertBefore(item.dockItem,insertBefore.dockItem);
					var newItems = [];
					for(var x=0; x<this.dockItems.length; x++) {
						newItems.push(this.dockItems[x]);
						if(this.dockItems[x+1] && this.dockItems[x+1]==insertBefore)
							newItems.push(item);
					}
					this.dockItems = newItems;
				}
				
				for(var x=0; x<this.dockItems.length-1; x++)
					this.dockItems[x].dockItem.style.marginRight = "0";
				this.dockItems[this.dockItems.length-1].dockItem.style.marginRight = "-999px";
				
				this.dockWidth += this.minSize;
				if(this.hor)
					this.base.style.width = this.dockWidth+"px";
				else
					this.base.style.height = this.dockWidth+"px";
				
				this.Refresh();
				
				for(var x=0; x<this.onAdd.length; x++)
					try{ this.onAdd[x].apply(this,[item]); }catch(e){window.setTimeout("throw(new Error(decodeURIComponent('"+encodeURIComponent(e.message?e.message:(e+""))+"',decodeURIComponent('"+encodeURIComponent(e.filename?e.filename:"[onAdd]")+"'),"+e.lineNumber||0+"));",1);}
				
				return item;
			};
			this.addItem = this.AddItem;
			this.AddIcon = this.AddItem;
			this.addIcon = this.AddItem;
			
			var items = [];
			var len = this.dockItems.length+0;
			for(var x=0; x<len; x++) {
				items[x] = this.dockItems[x];
			}
			for(var t=0; t<len; t++)
				this.RemoveItem(this.dockItems[0],true,null,true);	// fourth parameter forces last icon to be removable
			
			for(var y=0; y<len; y++) {
				var _defaults = {
					dockItem		: true,
					Bounce			: true,
					StartBouncing	: true,
					StopBouncing	: true,
					Remove			: true,
					SetImage		: true,
					setImage		: true,
					SetIcon			: true,
					setIcon			: true,
					SetLabel		: true,
					setLabel		: true,
					parentDock		: true,
					isDockItemObj	: true
				};
				
				var obj = {};
				for(var i in items[y])
					if(!_defaults[i])
						obj[i] = items[y][i];
				
				this.AddItem(obj);
			}
		},
		name		: "Reflection",
		description	: "The &quot;Reflection&quot; plugin for mDock4 automatically adds a &quot;Leopard&quot;-style reversed reflection below dock icons when enabled on a &quot;bottom&quot;-aligned mDock4 dock. This plugin is one of the &quot;core plugins&quot;, and was created during the making of mDock4. Visit http://devleopit.ca/ for more information on mDock4, the reflection plugin, and the other core plugins available.",
		version		: "3.1.2"
	},
	apptools	: {
		initialize : function() {
			// For dragging items into the dock:
			for(var x=0; x<this.dockItems.length; x++) {
				this.dockItems[x].dockItem.onmouseup = function(e) {
					if(!e)e=window.event;
					if(ApplicationFramework.currentDragDropControl && ApplicationFramework.currentDragDropControl._dragDrop) {
						ApplicationFramework.currentDragDropControl._dragDrop._dragData.data.dockItem = this.parentItem;
						return true;
					}
					else
						return this.parentDock.NullFunction(e);
				};
			}
			this.onAdd.push(function(item) {
				item.dockItem.onmouseup = function(e) {
					if(!e)e=window.event;
					if(ApplicationFramework.currentDragDropControl && ApplicationFramework.currentDragDropControl._dragDrop) {
						ApplicationFramework.currentDragDropControl._dragDrop._dragData.data.dockItem = this.parentItem;
						return true;
					}
					else
						return this.parentDock.NullFunction(e);
				};
			});
			this.base._apptools_oldmouseover = this.base.onmouseover;
			this.base.onmouseover = function(e) {
				if(ApplicationFramework.currentDragDropControl && ApplicationFramework.currentDragDropControl._dragDrop)
					return false;
				this._apptools_oldmouseover(e);
			};
		} , 
		name		: "App Tools",
		description	: "Provides a selection of useful plugins for integrating mDock with application.js.",
		version		: "0.9"
	}
};
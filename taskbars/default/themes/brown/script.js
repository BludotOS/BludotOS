function clickt(clickth) {
Object.prototype.nextObject = function() {
	var n = this;
	do n = n.nextSibling;
	while (n && n.nodeType != 1);
	return n;
}
 
Object.prototype.previousObject = function() {
	var p = this;
	do p = p.previousSibling;
	while (p && p.nodeType != 1);
	return p;
}
window.clicked = clickth;
clicked.nextObject().style.left=clicked.offsetLeft+'px';
if (clicked.click !== 1) {
clicked.children[0].style.background = '-webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF))';
clicked.children[0].style.background = '-moz-linear-gradient(top,  #7a7a7a,  #6E24FF)';
clicked.nextObject().style.display='block'; 
clicked.click=1;
} else if (clicked.click == 1) {
clicked.children[0].style.background='transparent';
clicked.nextObject().style.display='none';
delete clicked.click; delete clicked; }
}
function movet(clickth, val) {
Object.prototype.nextObject = function() {
	var n = this;
	do n = n.nextSibling;
	while (n && n.nodeType != 1);
	return n;
}
 
Object.prototype.previousObject = function() {
	var p = this;
	do p = p.previousSibling;
	while (p && p.nodeType != 1);
	return p;
}
var clicked = clickth;
clicked.style.left=clicked.parentNode.clientWidth+'px';
clicked.style.width = 'auto';
if (val == 1) {
clicked.style.background = '-webkit-gradient(linear, left top, left bottom, from(#7a7a7a), to(#6E24FF))';
clicked.style.background = '-moz-linear-gradient(top,  #7a7a7a,  #6E24FF)';
clicked.style.display='block'; 
clicked.click=1;
} else if (val == 0) {
clicked.style.background='transparent';
clicked.style.display='none';
delete clicked.click; delete clicked; }
}
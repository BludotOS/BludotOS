if (navigator.onLine == true) {
/*function onlineT() {
window.connectionT = document.createElement('div');
connectionT.className = 'notifypop';
connectionT.style.width = 150+'px';
connectionT.style.height = 35+'px';
connectionT.style.position = 'fixed';
connectionT.style.zIndex = 3645;
connectionT.style.left = 43+'%';
connectionT.style.top = -40+'px';
connectionT.style.background = 'hsla(0, 100%,0%, 0.8)';
connectionT.style['border-radius'] = '10px';
connectionT.style.MozBorderRadius = '10px';
connectionT.style.MozTransition = 'top .8s';
connectionT.style['-webkit-border-radius'] = '10px';
connectionT.style['-webkit-transition-property'] = 'top';
connectionT.style['-webkit-transition-duration'] = '.8s';
connectionT.style['border'] = '1px #AAAAAA solid';
connectionT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Online</font>';
document.body.appendChild(connectionT);
setTimeout('onlineTD()', 1000);
};
function onlineTD() {
connectionT.style.top = -40+'px';
connectionT.style.top = 8+'px';
setTimeout('onlineTU()', 5000);
};
function onlineTU() {
connectionT.style.top = -40+'px';
};
setTimeout('onlineT()', 5000);*/
//mainTools.alertsystem('offline');
} else if (navigator.onLine == false) {
function onlineF() {
window.connectionT = document.createElement('div');
connectionT.className = 'notifypop';
connectionT.style.width = 150+'px';
connectionT.style.height = 35+'px';
connectionT.style.position = 'fixed';
connectionT.style.zIndex = 3845;
connectionT.style.left = 43+'%';
connectionT.style.top = -40+'px';
connectionT.style.background = 'hsla(0, 100%,0%, 0.8)';
connectionT.style['border-radius'] = '10px';
connectionT.style.MozBorderRadius = '10px';
connectionT.style.MozTransition = 'top .8s';
connectionT.style['-webkit-border-radius'] = '10px';
connectionT.style['-webkit-transition-property'] = 'top';
connectionT.style['-webkit-transition-duration'] = '.8s';
connectionT.style['border'] = '1px #AAAAA solid';
connectionT.innerHTML = '<font style="position:relative;top:6px;color:white;text-align:center;font-size:15px;">Offline</font>';
document.body.appendChild(connectionT);
setTimeout('onlineFD()', 1000);
};
function onlineFD() {
connectionT.style.top = -40+'px';
connectionT.style.top = 8+'px';
setTimeout('onlineTU()', 5000);
};
function onlineFU() {
connectionT.style.top = -40+'px';
};
setTimeout('onlineF()', 5000);
};
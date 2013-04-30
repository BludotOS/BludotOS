function Trash()
{
var dividofapps = "trashwin"
var trash=SimpleWin.create("Trash", "trash", "sysapps/trash.txt", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Trash', ['close', 'minimize'], [function(){SimpleWin.close(trash);}, function(){SimpleWin.minimize(trash);}]);
     
trash.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Trash', ['close', 'minimize']);
return true
}
}
function AmoebaChat()
{
<?
if (!$isMobile) {
?>
var AchatS = prompt('Username');
     // OR var favorite = window.prompt('What is your favorite color?', 'RED');

     // if (favorite) equivalent to if (favorite != null && favorite != "");
     if (AchatS) {
        window.dock.AddNew({
            name:      'images/AmoebaChat',
            label:     'AmoebaChat',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
     	var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", 'http://amoeba.im/#username='+AchatS, "width=590px,height=350px,resize=1,scrolling=1,center=1");
        dock.addclick('AmoebaChat', ['close', 'minimize'], [function(){SimpleWin.close(AmoebaChat);}, function(){SimpleWin.minimize(AmoebaChat);}]);
     } else {
     	alert("You pressed Cancel or no value was entered!");
     }
<?
} else if ($isMobile) {
?>
var AchatS = prompt('Username');
     // OR var favorite = window.prompt('What is your favorite color?', 'RED');

     // if (favorite) equivalent to if (favorite != null && favorite != "");
     if (AchatS) {
var AmoebaChat=SimpleWin.create("AmoebaChat", "amoebachat", "sysapps/amoebachat.txt", "width=590px,height=350px,resize=1,scrolling=1,center=1");
     } else {
     	alert("You pressed Cancel or no value was entered!");
     }
<?
};
?>
AmoebaChat.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
dock.removeclick('AmoebaChat', ['close', 'minimize']);
window.dock.removeApp('AmoebaChat');
return true;
<?
} else if ($isMobile) { };
?>
return true;
}
}
function DevCenter()
{
var DevCenter=SimpleWin.create("DevCenter", "DevCenter", "users/<? echo $user; ?>/sysapps/DevCenter/?thefile=file.txt&userN=<? echo $user; ?>", "width=590px,height=350px,resize=1,scrolling=1,center=1");
<?
if (!$isMobile) {
?>
dock.addclick('DevCenter', ['close', 'minimize'], [function(){SimpleWin.close(DevCenter);}, function(){SimpleWin.minimize(DevCenter);}]);
<?
};
?>
DevCenter.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
dock.removeclick('DevCenter', ['close', 'minimize']);
<?
};
?>
return true;
}
}
function FileNet()
{

var FileNet=SimpleWin.create("FileNet", "FileNet", "users/<? echo $user; ?>/sysapps/FileNet/?userN=<? echo $user; ?>", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('FileNet', ['close', 'minimize'], [function(){SimpleWin.close(FileNet);}, function(){SimpleWin.minimize(FileNet);}]);
     
FileNet.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('FileNet', ['close', 'minimize']);
return true
}
}
function Prefs()
{
alert('This is still being developed. You can only edit your user information at this time');
<?
if (!$isMobile) {
?>
window.dock.AddNew({
            name:      'icons/prefsicon',
            label:     'Prefs',
            extension: '.png',
            sizes:     [44, 100],
            menuItems: ['open'],
            menuClick: [function(){this.name();}],
            onclick:   function (){return false;}
          }, dock.findApp('Trash'));
var Prefer=SimpleWin.create("Preferences", "prefed", "prefs/prefs.php", "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Prefs', ['close', 'minimize'], [function(){SimpleWin.close(Prefer);}, function(){SimpleWin.minimize(Prefer);}]);
<?
} else if ($isMobile) {
?>
var Prefer=SimpleWin.create("pref", "prefed", "prefs/prefs.php", "width=590px,height=350px,resize=1,scrolling=1,center=1");
<?
};
?>
Prefer.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
<?
if (!$isMobile) {
?>
//dock.removeclick('Prefs', ['close', 'minimize']);
window.dock.removeApp('Prefs');
<?
} else if ($isMobile) { };
?>
return true;
}
}
function AdminC()
{
var AdminC=SimpleWin.create("AdminC", "AdminC", "users/<? echo $user; ?>/admin/admin.php", "width=590px,height=350px,resize=1,scrolling=1,center=1")
AdminC.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
function Safari()
{
var googlewin=SimpleWin.create("Safari", "safari", 'browserT/browser.html', "width=590px,height=350px,resize=1,scrolling=1,center=1");
dock.addclick('Safari', ['close', 'minimize'], [function(){SimpleWin.close(googlewin);}, function(){SimpleWin.minimize(googlewin);}]);
googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
dock.removeclick('Safari', ['close', 'minimize']);
return true;
}
}
function AboutOS()
{
alert('I\'m sorry but this is not yet avaliable');
// var googlewin=SimpleWin.create("safari", "iframe", <? echo "\"$homepage\""; ?>, "width=590px,height=350px,resize=0,scrolling=0,center=1")
     
// googlewin.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
// return true
// }
}
function logout()
{
setTimeout("location.href = 'process.php';",1500);
var logout=SimpleWin.create("logout", "logout", "sysapps/logout.txt", "width=590px,height=175px,resize=1,scrolling=1,center=1")
     
logout.onclose=function(){ //Run custom code when window is being closed (return false to cancel action):
return true
}
}
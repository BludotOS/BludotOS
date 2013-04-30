<style>
#about {
    width: 399px;
    height:469px;
top: -56px;
position:relative;
right: 0;
background-color: #555;
background-image: -webkit-gradient(linear, left top, left bottom, from(#555), to(#333));
background-image: -webkit-linear-gradient(top, #555, #333);
background-image: -moz-linear-gradient(top, #555, #333);
background-image: -ms-linear-gradient(top, #555, #333);
background-image: -o-linear-gradient(top, #555, #333);
background-image: linear-gradient(top, #555, #333);
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#555555', EndColorStr='#333333');
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -1px 0 rgba(255,255,255,0.3), inset 1px 0 0 rgba(255,255,255,0.3), inset -1px 0 0 rgba(255,255,255,0.3), 0 0 4px rgba(0,0,0,0.6);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.3), inset 1px 0 0 rgba(255, 255, 255, 0.3), inset -1px 0 0 rgba(255, 255, 255, 0.3), 0 0 4px rgba(0, 0, 0, 0.6);
-webkit-text-shadow: 0 -1px 0 rgba(0,0,0,0.6);
-moz-text-shadow: 0 -1px 0 rgba(0,0,0,0.6);
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.6);
border: 1px solid #333;
border-bottom-color: #222;
border-top-color: #444;
color: #EEE;
overflow: hidden;
-webkit-transform: translateY(36px);
-moz-transform: translateY(36px);
transform: translateY(36px);
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
transition: all 0.3s ease;
opacity: 0.8;
z-index: 970;
}
canvas {
    width: 100%;
    height: 100%;
    position:fixed;
    top:0px;
    left:0px;
    z-index:2147486;
}
.meter {
    position: absolute;
    left: 50%;
    width: 200px;
    margin-left: -100px;
    top: 75%;
    text-align: center;
    color: white;
    z-index:2147486;
}
.meter progress {
    apearance: none;
    -webkit-appearance: none;
}
.meter progress::-webkit-progress-bar {
    background: rgba(1, 1, 1, 0.4);
    border-radius: 4px;
}
.meter progress::-webkit-progress-value {
    border-radius: 5px;
    background: -webkit-linear-gradient(top, #217fff 0%, #0075d4 100%);
}
.meter progress[aria-valuenow]:before {
    border-radius: 5px;

}
html, body {
    height: 100%;
}​
</style>
<?
$version = $_GET['ver'];
?>
<div id="about">
    <center style="position:relative;top:3px;">
        <img src="http://bludot.tk/wallpaper/BluDotlogo.png" style="width:150px;height:150px"/>
        <br>
        <font style="font-weight:bold;">
            BluDot
        </font>
        <br>
        <font>
            Version <? echo $version; ?>B
        </font>
    </center>
        <br>
        <p>
            BluDot was created in August of 2011. It was built to satisfy the need of having files everywhere. Not only that but having a full OS everywhere, where one could edit files, make new files, and even just make or edit anything. The files will all be online but also offline for easy access. 
        </p>
        <br>
        <font>
            Credits:
        </font>
        <center>
        <font>
            James Trotter(Owner & creator); Nick Beeuwsaert(Co. Core and graphics)
        </font>
    </center>
</div>
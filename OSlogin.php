<html>
  <head>
  	<style>
  		@import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

::selection {
  color:white;
  background:#706f70;
}

.login-desktop {
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background: url(images/wall1.jpg) no-repeat center fixed;
  background-size:cover;
  overflow:hidden;
}

.login-taskbar {
  position:absolute;
  top:0;
  left:0;
  right:0;
  height:20px;
  background:rgba(0,0,0,0.7);
  z-index: 1;
}

.login-taskbar ul {
  list-style:none;
  /*display:inline;*/
  padding:0;
  margin:0;
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
}

.login-taskbar > ul {
  margin:0px 5px;
}

.login-taskbar .power {
  position:relative;
  width:20px;
  height:20px;
  float:right;
  padding:0;
  margin:0;
  top:0;
  left:0;
  margin:0px 5px;
}

.login-taskbar .power:after {
  content:'';
  position:absolute;
  top:2px;
  left:9px;
  width:0;
  height:8px;
  border-left:2px solid white;
}

.login-taskbar .power:before {
  content:'';
  position:absolute;
  bottom:3px;
  left:2px;
  width:12px;
  height:12px;
  border-radius:16px;
  border-bottom:2px solid white;
  border-right:2px solid white;
  border-left:2px solid white;
  border-top:2px solid transparent;
}

.login-taskbar .power div {
  position: absolute;
top: 32px;
width: auto;
height: auto;
background: transparent;
margin: 0;
list-style: none;
padding: 0px 0px;
  padding-bottom:0px;
clear: both;
white-space: nowrap;
right: -5px;
  overflow:hidden;
}

.login-taskbar .power > div {
  overflow:visible;
  box-shadow:0px 0px 10px 0px black;
}

.login-taskbar .power.on > div:after {
  bottom: 100%;
	right: 5px;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-color: transparent;
	border-bottom-color: white;
	border-width: 10px;
	margin-left: 18px;
}

.login-taskbar .power ul {
  position:relative;
  background:white;
  list-style:none;
  margin-top:-1px;
  overflow:hidden;
  border-radius:2px;
}

.login-taskbar .power.off ul {
  display:none;
}

.login-taskbar .power.on ul {
  display:block;
}

.login-taskbar .power ul li {
  position:relative;
  width:auto;
  height:auto;
  padding:0px 5px;
  margin:0px 0px;
  text-align:center;
  cursor:pointer;
}

.login-taskbar .power ul li div {
  position:relative;
  top:0px;
  left:0px;
  width:auto;
  height:22px;
  line-height:22px;
  padding:0;
  clear:both;
  border: 0 solid;
  border-color:#d1d1d1;
  border-width: 0px 0 1px 0;
  margin:0px 8px;
  margin-bottom:-1px;
  font-family:open sans;
  font-size:13px;
}

.login-taskbar .power ul li:hover {
  background: -moz-linear-gradient(top, #ededed 0%, #d8d8d8 47%, #c1c1c1 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededed), color-stop(47%,#d8d8d8), color-stop(100%,#c1c1c1)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ededed 0%,#d8d8d8 47%,#c1c1c1 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ededed 0%,#d8d8d8 47%,#c1c1c1 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ededed 0%,#d8d8d8 47%,#c1c1c1 100%); /* IE10+ */
background: linear-gradient(to bottom, #ededed 0%,#d8d8d8 47%,#c1c1c1 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#c1c1c1',GradientType=0 ); /* IE6-9 */
}

.widget {
  position:absolute;
  width:400px;
  height:150px;
  /*background:rgba(0,0,0,0.7);*/
  top:0;
  right:0;
  left:0;
  bottom:0;
  margin:auto;
  margin-right:30px;
  
}

.login-container {
  margin-top: -150px;
top: 50%;
position: absolute;
  width:400px;
}

.login-box {
    position:relative;
  width:400px;
  height:150px;
  top:0;
  right:0;
  left:0;
  bottom:0;
  margin:auto;
  margin-left:30px;
  border:1px solid;
  border-color:#403f40;
  border-radius:5px;
  box-shadow: 0px 0px 15px 0px black;
  background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 47%, #eaeaea 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f7f7f7), color-stop(100%,#eaeaea)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%); /* IE10+ */
background: linear-gradient(to bottom, #ffffff 0%,#f7f7f7 47%,#eaeaea 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 ); /* IE6-9 */
  margin-top:30px;
  float:left;
}

.login-box.not-current {
  background:transparent;
  box-shadow:none;
  border:none;
}

.login-box.not-current .pic {
  display:none;
}

.login-box.not-current input {
  display:none;
}

.login-box.not-current .login-username
  color:white;
  text-shadow: 0px 0px 3px black;
}

.login-names {
  margin-top:-115px;
top: 50%;
position: absolute;
  bottom:0;
  width:400px;
  -webkit-transition:all .3s ease;
}

.username-input {
  position:absolute;
  top:-3px;
  outline:none;
  border:none;
  height:50px;
  line-height:40px;
  font-size:35px;
  width:250px;
  margin:25px 12px;
  left:88px;
  font-family:Open Sans;
  z-index:1;
  background:transparent;
  text-indent:6px;
}

.login-username
  position:relative;
  top:0px;
  width:250px;
  height:40px;
  line-height:40px;
  font-size:35px;
  /*font-family: raleway;*/
  font-family:Open Sans;
  margin:25px 12px 98px 12px;
  left:125px;
  float:left;
}

.login-username.not-current {
  position:relative;
  top:0px;
  width:250px;
  height:40px;
  line-height:40px;
  font-size:35px;
  /*font-family: raleway;*/
  font-family:Open Sans;
  /*margin:12px 12px 98px 12px;*/
  margin:10px 12px;
  left:125px;
  float:left;
  color:white;
  text-shadow:0px 0px 3px black;
  float:left;
}

.login-box .pic {
  position:absolute;
  top:0;
  left:0;
  margin:12px;
  width:75px;
  height:75px;
  background:url(http://bludotos.com/images/bludot_logo.jpg) no-repeat center;
  background-size:cover;
}

.input {
  position:absolute;
  outline:none;
  width:270px;
  top:75px;
  left:105px;
  border:1pt solid #B8C1D2;
  border-color:#a6a3a6;
  border-radius:3px;
  padding:2px 5px;
  background: -moz-linear-gradient(top, #e5e5e5 0%, #f6f6f6 53%, #ffffff 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e5e5), color-stop(53%,#f6f6f6), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); /* IE10+ */
background: linear-gradient(to bottom, #e5e5e5 0%,#f6f6f6 53%,#ffffff 100%); /* W3C */
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  z-index:1;
}

.lbutton {
  position:absolute;
  width:75px;
  height:22px;
  bottom:15px;
  right:12px;
  line-height:16px;
  font-family:Open Sans;
  font-size:12px;
  background: -moz-linear-gradient(top, #fcfcfc 0%, #ededed 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#ededed)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #fcfcfc 0%,#ededed 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #fcfcfc 0%,#ededed 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #fcfcfc 0%,#ededed 100%); /* IE10+ */
background: linear-gradient(to bottom, #fcfcfc 0%,#ededed 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfcfc', endColorstr='#ededed',GradientType=0 ); /* IE6-9 */
  outline:none;
  border:1px solid #D6D6D6;
  border-radius:3px;
  z-index:1;
}

.input:hover {
  background: -moz-linear-gradient(top, #dddddd 0%, #fcfcfc 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#dddddd), color-stop(100%,#fcfcfc)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #dddddd 0%,#fcfcfc 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #dddddd 0%,#fcfcfc 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #dddddd 0%,#fcfcfc 100%); /* IE10+ */
background: linear-gradient(to bottom, #dddddd 0%,#fcfcfc 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dddddd', endColorstr='#fcfcfc',GradientType=0 ); /* IE6-9 */
  border-color:#8c8c8c;
}

.lbutton:hover {
  background: -moz-linear-gradient(top, #e8e8e8 0%, #fcfcfc 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e8e8e8), color-stop(100%,#fcfcfc)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #e8e8e8 0%,#fcfcfc 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #e8e8e8 0%,#fcfcfc 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #e8e8e8 0%,#fcfcfc 100%); /* IE10+ */
background: linear-gradient(to bottom, #e8e8e8 0%,#fcfcfc 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8e8e8', endColorstr='#fcfcfc',GradientType=0 ); /* IE6-9 */
}

.error {
  position:absolute;
  top:0px;
  left:0;
  right:0;
  bottom:0;
  width:350px;
  height:30px;
  margin:auto;
  top:225px;
  background:rgba(0,0,0,0.8);
  /*color:#b0adad;*/
  /* goood green */
  /*color:#11eb1f;*/
  /* good red */
  color:#B94A48;
  font-weight:bold;
  line-height:30px;
  text-align:center;
  opacity:0;
  -webkit-transition:all .5s ease;
  left:50px;
}
  	</style>
  </head>
  <body>
    <div class="login-desktop">
      <div class="login-taskbar">
        <ul>
          <li class="power off">
            <div>
            <ul>
              <li onclick="window.location.reload();">
                <div>Restart</div>
              </li>
              <li onclick="window.location.href='./index.php';">
                <div>Shutdown</div>
              </li>
              <li onclick="core.lockedout();">
              	<div>I'm locked out!</div>
              </li>
              <li onclick="core.forgotpass()">
              	<div>Forgot Password</div>
              </li>
            </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="login-container">
        <form class="current login-box" method="POST" action="javascript:logmein();" >
          <div class="pic" style="background-image: url(http://bludotos.com/images/bludot_logo.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat no-repeat;">
            
          </div>
          <input type="text" class="username-input" name="username" placeholder="Username" autocomplete="off"/>
          <input class="input" type="password" name="password" />
          <input class="lbutton" type="submit" value="Login" />
        </form>
        <div class="error">
        	
        </div>
      </div>
      <div class="login-names">
      </div>
    </div>
    <script src="OSlogin.js"></script>
  </body>
</html>
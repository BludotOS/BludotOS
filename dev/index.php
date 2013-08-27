<!doctype html>
<html>
  
  <head>
    <title>DevAPI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://app.divshot.com/css/bootstrap.css">
    <link rel="stylesheet" href="https://app.divshot.com/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="/style/style.css">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40966109-1', 'bludotos.com');
  ga('send', 'pageview');

</script>
    <script src="https://app.divshot.com/js/jquery.min.js"></script>
    <script src="https://app.divshot.com/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function tabs(num)
      {
        for(var i=0; i < document.getElementsByClassName('content').length; i++)
        {
          if(i != num)
          {
            document.getElementsByClassName('content')[i].style.display = 'none';
          } else if (i == num) {
            document.getElementsByClassName('content')[i].style.display = 'block';
          }
        };
      }
      window.onload = function(){
        tabs(0);
      }
    </script>
  </head>
  
  <body>
    <div class="tabsholder">
      <div class="tab" onclick="tabs(0);">Dev API</div>
      <div class="tab" onclick="tabs(1);">OS API</div>
      <div class="tab" onclick="tabs(2);">About OS</div>
      <div class="tab" onclick="tabs(3);">History</div>
      <div class="tab" onclick="tabs(4);">Gallery</div>
    </div>
    <div class="content">
      <div class="container page">
        <h1 class="page-header align-center">Dev API</h1>
        <p>You do not need to learn an entirely new language to build apps. This is
          a little helper to make building apps easy. It also sandboxes the environment.
          New functions will be added on request from developers. To be able to build
          apps, all you need is knowledge of javascript. Due to limited services
          for hosting, there are no special evnvironments offered. This API offers
          total freedom to developers to write their code any way they want and not
          be too restricted as to what functions they can use. Since the OS is based
          off using Ajax, it is expected that developers also base their apps off Ajax
          as much as possible to make communication between apps compatible. Developers
          will soon be able to submit their apps to the Appstore. You must agree
          to the Guidelines or your app will be removed and you will lose the privilage 
          of being a developer.</p>
        <br>
        <h3>Guidelines</h3>
        <ul>
        	<li>You must always warn the user if you are to save personal data</li>
        	<li>You are not allowed to connect to any other server to send information</li>
        	<li>You must always give a description of your Application</li>
        	<li>You may not spam the Appstore with the same app under a different name</li>
        	<li>You must warn the user if you are using external scripts that require a download</li>
        	<li>You must warn the user before they download something unless there is a button the user presses with knowledge that they will download a file</li>
        	<li>No profanity, or "porn" Applications allowed</li>
        	<li>You may not upload executable files or files larger than 2MB</li>
        </ul>
        </br>
        <h3>Requirements to Submit an App</h3>
        <ul>
        	<li>must have below files in "APP_core"</li>
        		<ul>
        			<li>version.txt</li>
        			<li>descript.txt</li>
        			<li>img.png</li>
        			<li>notes.txt</li>
        		</ul>
        	<li>Contents of "version.txt" must match below (order does not matter)</li>
        		<ul>
        			<li>{"version":"<version>", "cat":"<category>", "auth":"<your full name>"}</li>
        			<li>Version is a float integer. One whole number and one decimal</li>
        			<li>Category can be one of the following:</li>
        				<ul>
        					<li>Games</li>
        					<li>Social</li>
        					<li>Productivity</li>
        					<li>Office</li>
        					<li>Tweaks</li>
        				</ul>
        		</ul>
        	<li>img.png is the icon for your app. It must match 100X100 pixels</li>
        	<li>You must include certain functions:</li>
        		<ul>
        			<li>Doc.menu()</li>
        			<li>Doc.parentNode.onclose = function() {}</li>
        				<ul>
        					<li>this function must include "window.dock.removeApp('<appname>');" at the end</li>
        				</ul>
        		</ul>
        	<li>When using stylesheets, you must access certain classes as: #dhtmlwindow #<appname> <class or id> {}</li>
        </ul>
        </br>
        <h3>The UI of the DevCenter</h3>
        <p>You can start an app right when you load DevCenter. Before you exit, however, you must save the
        app under a different name than it already is(APP). You can also go to file->New app. Right clicking on a 
        folder or file gives you several options. Those are self explanitory. To save a current file, just hit "save". It will
        automatically know which file to save. There are three tabs at the top if the sidebar filemanager. The first one 
        is the filemanager itself. The second is still under development. The third is for notes. The last is 
        the description of your app. The "build" option packages your app. The "debug" option allows you to test 
        you app. It saves and builds your app just in case something goes wrong.</p>
        </br>
        <h3>The Doc</h3>
        <p>The Doc is the window of the app. You can append to it, change styles,
          and move. You cannot add functions to this object. Doc holds all the functions
          that you would need to build your app. Offered functions are:</p>
        <ul>
          <li>Doc.ajax</li>
          <li>Doc.onclose</li>
          <li>Doc.Notify</li>
          <li>Doc.command</li>
          <li>Doc.Run</li>
          <li>Doc.menu</li>
          <li>Doc.create</li>
          <li>Doc.style</li>
        </ul>
        <div class="well pull-right well-small note">There is also an Inlcude function</div>
        <br>
        <ul>
          <li>
            <font>Doc.ajax(url, callback, type, send, sync)</font>
            <ul>
              <li>
                <font>Makes an Ajax call to</font>
                <font class="argument">url</font>
                <font>and send via</font>
                <font class="argument">type</font>
                <font>(text, html, json) and</font>
                <font class="argument">send</font>
                <font>with POST and have</font>
                <font class="argument">sync</font>
                <font>true or false. Also include a</font>
                <font class="argument">callback</font>
                <font>as: function(obj){}</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.onclose =</font>
            <ul>
              <li>
                <font>Doc.onclose will equal anything written as: function(){}</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.Notify(itext, src, duration)</font>
            <ul>
              <li>
                <font>can give only</font>
                <font class="argument">itext</font>
                <font>or add a image</font>
                <font class="argument">src</font>
                <font>and specify the</font>
                <font class="argument">duration</font>
                <font>of the notification</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.command(name, command)</font>
            <ul>
              <li>
                <font>give the</font>
                <font class="argument">name</font>
                <font>of the function and then give the</font>
                <font class="argument">command</font>
                <font>as: function(){}</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.Run(command)</font>
            <ul>
              <li>
                <font>run any</font>
                <font class="argument">command</font>
                <font>that is connected to Doc</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.menu(main, lower, action)</font>
            <ul>
              <li>
                <font class="argument">main</font>
                <font>is an array that holds the main taskbar menues.</font>
                <font class="argument">lower</font>
                <font>holds all the menus under each main menu option</font>
                <font class="argument">action</font>
                <font>holds all the onclick events for each</font>
                <font class="argument">lower</font>
                <font>array element.</font>
                <font>Example:</font>
                <br>
                <font>Doc.menu</font>
                <br>
                <font>['test1', 'test2', 'test3'],</font>
                <br>
                <font>[['test', 'test1'], [], ['test', 'test1', 'test2']],</font>
                <br>
                <font>[['alert(\'bob\')', null], [], ['alert(this.innerHTML);', 'alert(this.innerHTML);',
                  'alert(this.innerHTML);']]</font>
                <br>
                <font>);</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.create(type)</font>
            <ul>
              <li>
                <font>enter any</font>
                <font class="argument">type</font>
                <font>that is a valid document element</font>
              </li>
            </ul>
          </li>
          <li>
            <font>Doc.style(style, node)</font>
            <ul>
              <li>
                <font>enter the</font>
                <font class="argument">style</font>
                <font>and then the</font>
                <font class="argument">node</font>
                <font>that it should be applied to</font>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="container"></div>
      <div class="container"></div>
      <div class="container"></div>
      <div class="container"></div>
    </div>
  </body>

</html>
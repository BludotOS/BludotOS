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
        <p>This is not a whole new language that is needed to build apps. This is
          a little helper to make building apps easy. It also sandboxes the environment.
          New functions will be added on request from developers. To be able to build
          apps, all you need it knowledge of javascript. Due to limited services
          for hosting, there are no special evnvironments offered. This API offeres
          total freedom to developers to write their code anyway they want and not
          be too restricted as to what functions they can use. Since the OS is based
          of using Ajax, it is expected that developers also base their apps of Ajax
          as much as possible to make communication between apps compatible. Developers
          will soon be able to submit their apps to the Appstore. You must agree
          to the guidelines to submit the app. Guildelines are further below.</p>
        <br>
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
        <div class="well pull-right well-small note">There is aslo an Inlcude function</div>
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
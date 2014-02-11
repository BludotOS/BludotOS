<?
/**
 * ForgotPass.php
 *
 * This page is for those users who have forgotten their
 * password and want to have a new password generated for
 * them and sent to the email address attached to their
 * account in the database. The new password is not
 * displayed on the website for security purposes.
 *
 * Note: If your server is not properly setup to send
 * mail, then this page is essentially useless and it
 * would be better to not even link to this page from
 * your website.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<title>Forgot Password</title>
<head>
	<style>
		h1 {
position: relative;
font-size: 30px;
text-align: center;
font-family: open sans;
font-weight: normal;
		}
		.text {
			position: relative;
height: auto;
width: auto;
display: block;
padding: 0 10px;
font-family: sans-serif;
font-size: 13px;
text-align: center;
		}
		.finput {
			outline: none;
border: 1px solid grey;
border-radius: 5px;
padding: 0;
margin: 0;
left: 0;
right: 0;
width: 300px;
height: 25px;
position: relative;
margin: 0 auto;
display: block;
padding: 0 5px;
font-size: 18px;
line-height: 25px;
font-weight: bold;
font-family: open sans;
		}
		.submitb {
			position: absolute;
bottom: 10px;
left: 0;
right: 0;
width: 300px;
height: 30px;
border: 1px solid lightgrey;
outline: none;
border-radius: 5px;
margin: 0 auto;
background: -moz-linear-gradient(top, #fcfcfc 0%, #ededed 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfcfc), color-stop(100%,#ededed));
background: -webkit-linear-gradient(top, #fcfcfc 0%,#ededed 100%);
background: -o-linear-gradient(top, #fcfcfc 0%,#ededed 100%);
background: -ms-linear-gradient(top, #fcfcfc 0%,#ededed 100%);
background: linear-gradient(to bottom, #fcfcfc 0%,#ededed 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfcfc', endColorstr='#ededed',GradientType=0 );
font-family: open sans;
		}
	</style>
</head>
<body>

<?
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>New Password Generated</h1>";
      echo "<p>Your new password has been generated "
          ."and sent to the email <br>associated with your account. "
          ."<a href=\"index.php\">Home</a>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>New Password Failure</h1>";
      echo "<p>There was an error sending you the "
          ."email with the new password,<br> so your password has not been changed. "
          ."<a href=\"default.php\">Home</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>
<div style="position: absolute;top: -13px;right: -15px;background: black;border-radius: 20px;width: 25px;height: 25px;text-align: center;font-weight: bold;color: white;line-height: 25px;font-size: 16px;box-shadow: 0px 0px 10px 0px black;cursor: pointer;font-family: sans-serif;border: 1px solid white;" onclick="this.parentNode.style['transform'] = 'scale(0.1)';this.parentNode.style['-ms-transform'] = 'scale(0.1)'; this.parentNode.style['-webkit-transform'] = 'scale(0.1)'; var temp = this;window.setTimeout(function(){document.body.removeChild(temp.parentNode);}, 200)">X</div>
<h1>Forgot Password</h1>
<font class="text">Please enter your username below:</font>
</br>
<? echo $form->error("user"); ?>
<form action="javascript:core.sendfpass(this.user.value, this.subforgot.value);" method="POST">
<input class="finput" id="user" type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>">
<input id="subforgot" type="hidden" name="subforgot" value="1">
<input class="submitb" type="submit" value="Get New Password">
</form>

<?
}
?>

</body>
</html>

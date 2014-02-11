<?
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");

?>

<html>
<title>Registration Page</title>
<head>
<style>
#signupf input {
	margin: 0px 40px 0px 40px;
border-radius: 20px;
outline: none;
border: none;
box-shadow: inset 0px 0px 10px 3px black;
height: 28px;
width:170px;
padding: 0px 5px 0px 5px;
color: grey;
font-weight: bold;
text-align: center;
}
</style>
</head>
<body>

<?
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<a href=\"index.php\">Main</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
          ."you may now <a onclick=\"parent.window.location.href = 'index.php'\">log in</a>.</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>

<h1 style="width: 100%;text-align: center;font-family: Helvetica, Arial, sans-serif;font-weight: bold;font-size: 3em;line-height: 1em;text-shadow: 1px 4px 6px black, 0 0 0 black, 1px 4px 6px black;color: rgba(-5,91,186,0.8);">Register</h1>
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
$betacoded = base_convert(mt_rand(0x1D39D3E06400000, 0x41C21CB8E0FFFFFF), 36, 15);
?>
<div style="position: absolute;top: 0px;right: 0px;background: red;border-radius: 5px;width: 20px;height: 20px;text-align: center;font-weight: bold;color: white;line-height: 20px;font-size: 13px;box-shadow: inset 0px 0px 8px 3px rgba(0,0,0,0.8), 0px 0px 9px 1px black;cursor:pointer;" onclick="document.body.removeChild(this.parentNode);">X</div>
<form id="signupf" action="javascript:core.sendreg(document.getElementById('signupf').children[0].children[0].children[0].children[0].children[0].value, document.getElementById('signupf').children[0].children[0].children[1].children[0].children[0].value, document.getElementById('signupf').children[0].children[0].children[2].children[0].children[0].value, document.getElementById('signupf').children[0].children[0].children[3].children[0].children[0].value, document.getElementById('signupf').children[0].children[0].children[4].children[0].children[0].value);" method="POST" style="position: relative;top: -18px;">
<table align="left" border="0" cellspacing="0" cellpadding="3" style="width:100%;">
<tr><td><input type="text" name="user" maxlength="30" value="Username" style="margin: 0px 40px 0px 40px;" onfocus="this.value='';this.style.color='black';" onblur="if(this.value==''){this.style.color='grey';this.value='Username';}"></td><td><? echo $form->error("user"); ?></td></tr>
<tr><td><input type="password" name="pass" maxlength="30" value="Password" style="margin: 0px 40px 0px 40px;" onfocus="this.value='';this.style.color='black';" onblur="if(this.value==''){this.style.color='grey';this.value='Password';}"></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td><input type="text" name="email" maxlength="50" value="Email" style="margin: 0px 40px 0px 40px;" onfocus="this.value='';this.style.color='black';" onblur="if(this.value==''){this.style.color='grey';this.value='Email';}"></td><td><? echo $form->error("email"); ?></td></tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="subjoin" value="1"></td></tr>
<tr><td><input type="hidden" name="betacode" value="<? echo $betacoded; ?>" /></td></tr>
<tr><td><input type="submit" value="Join!" style="background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzFlNTc5OSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iIzI5ODlkOCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM3ZGI5ZTgiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);border: none;border-radius: 20px;box-shadow: 0px 0px 9px 1px black;padding: 0px 5px 0px 5px;outline: none;width: 170px;height: 28px;text-align: center;font-weight: bold;color: rgba(10,48,146, 1);position: absolute;font-size: 12px;line-height: 12px;"></td></tr>
<tr><td colspan="2" align="left"><a onclick="parent.window.location = 'index.php';">Back to Main</a></td></tr>
</table>
</form>

<?
};
?>
</body>
</html>
<?
//} else {
?>
<script>
//	alert(document.body.innerHTML);
//	window.location = 'http://bludotos.com';
</script>
<?
//};
?>
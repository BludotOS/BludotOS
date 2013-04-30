<?
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("../../include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Build me!!!</title>
<body>
<style>
  body { background-image: URL(../../background.jpg); background-repeat: no-repeat; background-size: 100%; }
  h1 { font-size: 400%; color: white; background: transparent; font-style: bold; position: center; }
  h3 { font-size: 200%; color: white; background: transparent; font-style: underline; }
 .text {color: white;}
  b1 { color: white; }
  b2 { color: white; }
 .banner { width: 100%; height: 200px; position: top; border-bottom: solid 2px #C9C0BB; }
 .banner_logo { width: 175px; height: 175px; float: right; }
 #right_sidebars { float: right; position: relative; }
 #right_sidebar_one { background-image: URL(../../background.jpg); background-height: 220px; width: 230px; height: 420px; position; absolute; -moz-border-radius: 6px; -webkit-border-radius:6px; border-radius: 6px; margin-top: 20px; border-top: solid 2px #C9C0BB; border-left: solid 2px #C9C0BB; }
 #right_sidebar_two { background-image: URL(../../background.jpg); background-height: 60px; width: 230px; height: 230px; position: absolute; -moz-border-radius: 6px; -webkit-border-radius:6px; border-radius: 6px; top: 460px; border-top: solid 2px #C9C0BB; border-left: solid 2px #C9C0BB; }
 #float_center { background-color: white; width: 750px; height: 670px; float: center; position: relative; -moz-border-radius: 6px; -webkit-border-radius:6px; border-radius: 6px; margin-top: 20px; border-top: solid 2px #C9C0BB; border-left: solid 2px #C9C0BB; border-bottom: solid 2px #C9C0BB; border-right: solid 2px #C9C0BB; }
 #float_banner { background-image: URL(../../background.jpg);background-height: 50px; width: 100%; position: absolute; top: 0px; -moz-border-radius: 6px; -webkit-border-radius:6px; border-radius: 6px; border-bottom: solid 2px #C9C0BB; }
 #float_content { background-color: white; width: 100%; height: 600px; position: absolute; top: 70px; }
 #home_link { text-color: blue; }
</style>
</head>
<link rel="shortcut icon" type="image/x-icon" href="../../logo.png">
<div CLASS="fw-container">
	<div CLASS="banner">
                <div CLASS="banner_logo">
                <img src="../../banner_logo.png" CLASS="banner_logo"/> 
                </div>
                <h1 id="fw-title" align="center"><a id="fw-titlelink">Build me!!!</a></h1>
                <div id="home_link">
                <a href="http://buildme.tk">Home</a>
                </div>
	</div>
<div id="right_sidebars">
     <div id="right_sidebar_one">
			     <div id="fw-sidebarbegin"></div>
			     <div class="fw-paragraph">
			     <div class="fw-paragraphtop"></div>
			     <div class="fw-text">
                             <div class="projects">
                             <table>
                             <tr><td>
                        
                             <?
                             /**
                              * User has already logged in, so display relavent links, including
                              * a link to the admin center if the user is an administrator.
                              */
                             if($session->logged_in){
                                echo "<h3><u>Logged In</u></h3>";
                                echo "<b1>Welcome <b2>$session->username</b2>, you are logged in.</b1> <br><br>"
                                    ."[<a href=\"../../userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
                                    ."[<a href=\"../../useredit.php\">Edit Account</a>] &nbsp;&nbsp;"
                                    ."[<a href=\"../../users/$session->username/Buy.php\">Buy site</a>] &nbsp;&nbsp;";
                                if($session->isAdmin()){
                                   echo "[<a href=\"../../admin/admin.php\">Admin Center</a>] &nbsp;&nbsp;";
                                }
                                echo "[<a href=\"../../process.php\">Logout</a>]";
                             }
                             else{
                             ?>
                        
                             <h3 align="center"><u>Clients</u></h3>
                             <?
                             /**
                              * User not logged in, display the login form.
                              * If user has already tried to login, but errors were
                              * found, display the total number of errors.
                              * If errors occurred, they will be displayed.
                              */
                             if($form->num_errors > 0){
                                echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
                             }
                             ?>
                             <?
                             header("location: http://buildme.tk");
                             ?>
                        
                             <?
                             }

                             /**
                              * Just a little page footer, tells how many registered members
                              * there are, how many users currently logged in and viewing site,
                              * and how many guests viewing site. Active users are displayed,
                              * with link to their user information.
                              */
                              echo "</td></tr><tr><td align=\"center\"><br><br>";
                              echo "<b1>Members Total: ".$database->getNumMembers()."<br>";
                              echo "There are $database->num_active_users registered members and ";
                              echo "$database->num_active_guests guests viewing the site</b1>.<br><br>";
                         
                              include("../../include/view_active.php");
                         
                              ?>
                         
                         
                              </td></tr>
                              </table>

                             <div id="fw-sidebarend"></div>
                             </div></div></div></div>

     <div id="right_sidebar_two">
			     <div id="fw-sidebarbegin"></div>
			     <div class="fw-paragraph">
			     <div class="fw-paragraphtop"></div>
			     <h3 align="center"><u>More Projects</u></h3>
			     <div class="fw-text">
                             <div class="projects">
                             <br>
                             <center>
                             <a href="../../Firefox.html" style="float: center;">Firefox on mobile</a>
                             </center>
                             <br>
                             <center>
                             <a href="../../More-Projects.html" style="float: center;">More Projects</a>
                             </center>
                             <div id="fw-sidebarend"></div>
                             </div></div></div>
     </div>
</div>
<div id="float_center">
     <div id="float_banner">
     <center>
     <h2>Welcome:</h2>
     </center>
     </div>
     <div id="float_content">
     <?php
       echo "<form method='post' action='mailform.php'>
       Email: <input name='email' type='text'><br />
       Message:<br />
       <textarea name='message' rows='20' cols='90'>
       </textarea><br />
       <input type='submit' value='Send' />
       </form>";
     ?>
     </div>
</div>
</html>
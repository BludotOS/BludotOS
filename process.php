<?
/**
 * Process.php
 * 
 * The Process class is meant to simplify the task of processing
 * user submitted forms, redirecting the user to the correct
 * pages if errors are found, or if form is successful, either
 * way. Also handles the logout procedure.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");
ob_start();
class Process
{
   /* Class constructor */
   function Process(){
   $this->connection = mysql_connect("127.0.0.1", "vios_admin", "qlalsldl") or die(mysql_error());
      mysql_select_db("vios_users", $this->connection) or die(mysql_error());
      global $session;
      /* User submitted login form */
      if(isset($_POST['sublogin'])){
         $this->procLogin();
      }
      /* User submitted registration form */
      else if(isset($_POST['subjoin'])){
         $this->procRegister();
      }
      /* User submitted forgot password form */
      else if(isset($_POST['subforgot'])){
         $this->procForgotPass();
      }
      /* User submitted edit account form */
      else if(isset($_POST['subedit'])){
         $this->procEditAccount();
      }
      /**
       * The only other reason user should be directed here
       * is if he wants to logout, which means user is
       * logged in currently.
       */
      else if($session->logged_in && $_POST['subedit'] != 1){
         $this->procLogout();
      }
      /**
       * Should not get here, which means user is viewing this page
       * by mistake and therefore is redirected.
       */
       else{
          //header("Location: http://bludotos.com");
       }
   }

   /**
    * procLogin - Processes the user submitted login form, if errors
    * are found, the user is redirected to correct the information,
    * if not, the user is effectively logged in to the system.
    */
   function procLogin(){
      global $session, $form;
      /* Login attempt */
      $retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
      
      /* Login successful */
      if($retval){
      
         //header("Location: ".$session->referrer);
         echo '{"result":"true", "user":"'.$session->username.'", "Admin":"'.$session->isAdmin().'", "Dev":"'.$session->isDev().'"}';
      }
      /* Login failed */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         //header("Location: ".$session->referrer);
         session_unset();
         header("Connection: close");
         echo '{"result":"false"}';
         //exit;
         
      }
   }
   
   /**
    * procLogout - Simply attempts to log the user out of the system
    * given that there is no logout form to process.
    */
   function procLogout(){
      global $session;
      $retval = $session->logout();
      header("Location: http://bludotos.com/index.php");
   }
   
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }

   function generateRandID(){
      return md5($this->generateRandStr(16));
   }
   
   function updateUserField($username, $field, $value){
      $q = "UPDATE ".TBL_USERS." SET ".$field." = '$value' WHERE username = '$username'";
      return mysql_query($q, $this->connection);
   }
   
   function betacode($user, $pass, $mail, $code){
   	
$quser_name = "vios_admin";
$qpassword = "qlalsldl";
$qdatabase = "vios_beta";
$qserver = "127.0.0.1";
$db_handle = mysql_connect($qserver, $quser_name, $qpassword);
$db_found = mysql_select_db($qdatabase, $db_handle);

if ($db_found) {
$qsubemail = $mail;
$qusername = $user;
$qusername = addslashes($qusername);
      $q = "SELECT * FROM beta_codes WHERE username = '$qusername'";
      $resulted = mysql_query($q);
         $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$";
         if(!eregi($regex,$subemail)){
            print "The email you have entered is invalid";
	    //header('Location:http://bludotos.com/');
         };
         $subemail = stripslashes($subemail);
      if (mysql_numrows($resulted) > 0) {
	echo 'username already taken';
	//header('Location:http://bludotos.com/');
      } else {

$SQL = "INSERT INTO beta_codes (username, betacode, email) VALUES ('$user', '$code', '$mail')";
$result = mysql_query($SQL);
print "Records added to the database";
$from = "From: bludot";
$to = $subemail;
$subject = "bludot - Welcome!";
$body = $user.",\n\n"
             ."Welcome! You've just registered at the bludot Site "
             ."with the following information:\n\n"
             ."Username: ".$user."\n"
             ."Password: ".$subemail."\n\n"
             ."You will receive a beta code shortly."
             ."- administrator";
if (mail($to, $subject, $body, $from)) {
  echo("<p>Message successfully sent!</p>");
 } else {
  echo("<p>Message delivery failed...</p>");
 }
};
mysql_close($db_handle);
//header("location: http://bludotos.com/register.php?code=".$_POST[betacode]."");
}
else {
print "Database NOT Found ";
mysql_close($db_handle);
}
   }
   
   /**
    * procRegister - Processes the user submitted registration form,
    * if errors are found, the user is redirected to correct the
    * information, if not, the user is effectively registered with
    * the system and an email is (optionally) sent to the newly
    * created user.
    */
   function procRegister(){
      global $session, $form;
      /* Convert username to all lowercase (by option) */
      if(ALL_LOWERCASE){
         $_POST['user'] = strtolower($_POST['user']);
      }
      /* Registration attempt */
      $retval = $session->register($_POST['user'], $_POST['pass'], $_POST['email']);
      
      /* Registration Successful */
      if($retval == 0){
      	 $this->betacode($_POST['user'], $_POST['pass'], $_POST['email'], $_POST['betacode']);
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = true;
         $newuser = $_POST['user'];
         $userid = $this->generateRandID();
      	 $this->updateUserField($newuser, "userid", $userid);
         header("Location: http://bludotos.com/createF/createT.php?namer=$newuser&id=$userid");
         //echo "success";
      }
      /* Error found with form */
      else if($retval == 1){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         //header("Location: ".$session->referrer);
         header("Connection: close");
         exit;
      }
      /* Registration attempt failed */
      else if($retval == 2){
         $_SESSION['reguname'] = $_POST['user'];
         $_SESSION['regsuccess'] = false;
         //header("Location: ".$session->referrer);
         header("Connection: close");
         exit;
      }
   }
   
   /**
    * procForgotPass - Validates the given username then if
    * everything is fine, a new password is generated and
    * emailed to the address the user gave on sign up.
    */
   function procForgotPass(){
      global $database, $session, $mailer, $form;
      /* Username error checking */
      $subuser = $_POST['user'];
      $field = "user";  //Use field name for username
      if(!$subuser || strlen($subuser = trim($subuser)) == 0){
         $form->setError($field, "* Username not entered<br>");
      }
      else{
         /* Make sure username is in database */
         $subuser = stripslashes($subuser);
         if(strlen($subuser) < 5 || strlen($subuser) > 30 ||
            !preg_match("^([0-9a-z])+$", $subuser) ||
            (!$database->usernameTaken($subuser))){
            $form->setError($field, "* Username does not exist<br>");
         }
      }
      
      /* Errors exist, have user correct them */
      if($form->num_errors > 0){
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
      }
      /* Generate new password and email it to user */
      else{
         /* Generate new password */
         $newpass = $session->generateRandStr(8);
         
         /* Get email of user */
         $usrinf = $database->getUserInfo($subuser);
         $email  = $usrinf['email'];
         
         /* Attempt to send the email with new password */
         if($mailer->sendNewPass($subuser,$email,$newpass)){
            /* Email sent, update database */
            $database->updateUserField($subuser, "password", md5($newpass));
            $_SESSION['forgotpass'] = true;
         }
         /* Email failure, do not change password */
         else{
            $_SESSION['forgotpass'] = false;
         }
      }
      
      header("Location: ".$session->referrer);
   }
   
   /**
    * procEditAccount - Attempts to edit the user's account
    * information, including the password, which must be verified
    * before a change is made.
    */
   function procEditAccount(){
      global $session, $form;
      /* Account edit attempt */
      $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['email']);

      /* Account edit successful */
      if($retval){
         $_SESSION['useredit'] = true;
         header("Location: ".$session->referrer);
      }
      /* Error found with form */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
};

/* Initialize process */
$process = new Process;

?>
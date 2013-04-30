<?
include("include/session.php");
ob_start();
class Process
{
function Process(){
	global $session;
	if(isset($_POST['subedit'])){
         $this->procEditAccount();
        } else {
         echo "error1";
        }
}
function procEditAccount(){
      global $session, $form;
      /* Account edit attempt */
      $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['email']);

      /* Account edit successful */
      if($retval){
         $_SESSION['useredit'] = true;
         echo "success";
         //header("Location: ".$session->referrer);
      }
      /* Error found with form */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         echo "error";
         echo $_POST['curpass'];
         echo $_POST['newpass'];
         echo $_POST['email'];
         //header("Location: ".$session->referrer);
      }
   }
};

/* Initialize process */
$process = new Process;
?>
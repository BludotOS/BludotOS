<?
$emails = explode(",", $_POST['email']);
$Sbody = $_POST['message'];
      foreach($emails as $email) {
      $from = "From: admin@Bludot.tk <Vios>";
      $subject = "BluDot special message!";
      $body = $Sbody;
      return mail($email,$subject,$body,$from);
      };
?>
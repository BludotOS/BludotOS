<?php
  $email = $_REQUEST['email'] ;
  $subject = "Build my site: DETAILS!!!";
  $message = $_REQUEST['message'] ;
  mail("admin@buildme.tk", "$subject",
  $message, "From:" . $email);
  echo "Thank you for using our mail form";
header('location: Buy.php');
?> 
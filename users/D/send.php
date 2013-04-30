<?php
$from = "From: "test" <"$_POST['mail']">";
$to = "admin@buildme.tk";
$subject = "Build my site: details";
$body = $_POST['mail'];
if (mail($to, $subject, $body, $from)) {
  echo("<p>Message successfully sent!</p>");
 } else {
  echo("<p>Message delivery failed...</p>");
 }
?>
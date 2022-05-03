<?php
  session_start();
  unset($_SESSION["id"]);
  session_unset();
  session_destroy();
  echo "Logging Out... Please Wait";
  header("Refresh: 3; url=FormValidate.php");
  exit();
?>

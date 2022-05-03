<?php

  include("DBConnection.php");
  $user_id = $_REQUEST["id"];


  $delete_query = mysqli_query($DB_CONNECTION, "DELETE FROM users WHERE id='$user_id'");
  echo "<script language='javascript'>alert('Record Deleted')</script>";
  echo "<script language='javascript'>window.location.href='FormValidate.php'</script>";
?>

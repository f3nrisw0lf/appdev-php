<?php
  include("DBConnection.php");

  $user_id = $_POST["id"];
  $name = $_POST["new_name"];
  $address = $_POST["new_address"];
  $email = $_POST["new_email"];

  $edit_query = mysqli_query($DB_CONNECTION, "UPDATE users SET name='$name', address='$address', email='$email' WHERE id='$user_id'");

  echo "<script language='javascript'>alert('Record Updated')</script>";
  echo "<script language='javascript'>window.location.href='FormValidate.php'</script>";

?>

<?php
  include("connection.php");

  $user_id = $_REQUEST["id"];

  $records = mysqli_query($connections, "SELECT * FROM mytbl WHERE id = '$user_id'");
?>

<form action="Update.php" method="post">
  <input type="text" name="name" id="">
  <input type="text" name="address" id="">
  <input type="text" name="email" id="">
  <input type="submit" value="submit">
</form>

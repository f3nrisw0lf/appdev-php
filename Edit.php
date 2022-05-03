<?php

  include("DBConnection.php");

  $user_id = $_REQUEST["id"];

  $retrieve_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users WHERE id='$user_id'");

  while($row = mysqli_fetch_assoc($retrieve_query)){
    $db_name = $row["name"];
    $db_address = $row["address"];
    $db_email = $row["email"];
  }

?>

<form action="Update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $user_id ?>">
  <input type="text" name="new_name" value="<?php echo $db_name?>" id="">
  <input type="text" name="new_address" value="<?php echo $db_address?>" id="">
  <input type="text" name="new_email" value="<?php echo $db_email?>" id="">
  <input type="submit" value="Edit">
</form>

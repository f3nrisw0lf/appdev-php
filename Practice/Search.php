<?php
  include("DBConnection.php");
  $search = $_REQUEST["search"];
?>

<form action="" method="get">
  <input type="text" name="search" value="<?php echo $search ?>" id="">
  <input type="submit" value="submit">
</form>

<?php
  $view_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users WHERE name LIKE '%$search%' OR address LIKE '%$search%'");

  while($row = mysqli_fetch_assoc($view_query)){
      $user_id = $row["id"];
      $db_name = $row["name"];
      $db_address = $row["address"];
      $db_email = $row["email"];

      echo "
            $db_name $db_address $db_email
            <a href='Edit.php?id=$user_id'>Update</a>
            <a href='Delete.php?id=$user_id'>Delete</a>
            <br>";
  }
?>

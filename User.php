<?php
  session_start();

  include("DBConnection.php");
  if(isset($_SESSION["id"])){
    $user_id = $_SESSION["id"];

    $retrieve_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users WHERE id='$user_id'");

    while($row = mysqli_fetch_assoc($retrieve_query)){
      $db_name = $row["name"];
      $db_address = $row["address"];
      $db_email = $row["email"];
    }

    echo "Welcome " . $db_name . "<br>";
    echo "<a href='Logout.php'>Logout</a>";
  } else {
    echo "Login Required ";
    echo "<a href='Login.php'>Login</a>";
  }
?>

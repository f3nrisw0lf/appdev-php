<?php
  include("DBConnection.php");
  $email = $password = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
  }
?>
<form action="" method="post">
  <label for="email">Email</label>
  <input type="text" name="email" id="" required>
  <label for="password">Password</label>
  <input type="text" name="password" id="" required>
  <input type="submit" value="submit">
</form>

<?php
  if($email & $password){
    $check_email_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users WHERE email='$email'");
    $email_count = mysqli_num_rows($check_email_query);

    if($email_count > 0){
      while($row = mysqli_fetch_assoc($check_email_query)){
        $user_id = $row["id"];
        $db_email = $row["email"];
        $db_password = $row["password"];
      }

      if($db_password == $password){
        session_start();

        $_SESSION["id"] = $user_id;

        echo "<script language='javascript'>alert('LOGGED!')</script>";
        echo "<script language='javascript'>window.location.href='User.php'</script>";
      }
    } 
  }
?>

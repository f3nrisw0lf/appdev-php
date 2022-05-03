<?php
 
 include("DBConnection.php");
 $name = $address = $email = $password = "";
 $emailErr = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
  }
?>

<a href="Search.php?search=">Search</a>
<a href="Login.php">Login</a>
<br>
<br>
<form action="" method="POST">
  <label for="name">Name</label>
  <input type="text" name="name" value="<?php echo $name;?>" required>
  <br>

  <label for="address">Address</label>
  <input type="text" name="address" value="<?php echo $address;?>" required>
  <br>

  <label for="email">Email</label>
  <input type="text" name="email" value="<?php echo $email?>" required>
  <span><?php echo $emailErr?></span>
  <br>

  <label for="password">Password</label>
  <input type="text" name="password" value="<?php echo $password?>" required>
  <br>

  <input type="submit" value="submit">
</form>

<?php
  if($name & $address & $email & $password){
    $check_email_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users WHERE email='$email'");
    $email_count = mysqli_num_rows($check_email_query);

    if($email_count > 0){
        $emailErr = "Email Exists!";
    } else {
        $query = mysqli_query($DB_CONNECTION, "INSERT INTO users(name, address, email, password) VALUES ('$name', '$address', '$email', '$password')");
    }
  }

  $view_query = mysqli_query($DB_CONNECTION, "SELECT * FROM users");

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

<?php
session_start();
include_once("Nav.php");

$email = $password = $notify_message =  "";
$passwordError = "";

date_default_timezone_set("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");

$end_time = date("h:i A", strtotime("+15 minutes", strtotime($time_now)));

if (isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $query_user = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users WHERE email='$email'");
  $result = mysqli_fetch_assoc($query_user);
  $account_type = $result["account_type"];

  if ($account_type == '1') {
    header("Location: Admin");
  } else {
    header("Location: Users");
  }
}

if (isset($_POST["btnLogin"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
}

if ($email and $password) {
  $check_email_exists = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users WHERE email='$email'");
  $check_row = mysqli_num_rows($check_email_exists);

  if ($check_row) {
    $result = mysqli_fetch_assoc($check_email_exists);
    $user_password = $result["password"];
    $user_email = $result["email"];
    $user_attempt = $result["attempt"];
    $user_log_time = $result["log_time"];
    $user_account_type = $result["account_type"];
    $new_time = strtotime($time_now);

    if ($user_account_type == "1") {
    } else {
      if ($user_log_time <= $new_time) {
        if ($user_password == $password) {
          $_SESSION["email"] = $user_email;
          mysqli_query($DB_CONNECTION, "UPDATE tbl_users SET attempt='0' WHERE email='$email'");
        } else {
          $attempt = (int)$user_attempt + 1;

          if ($attempt >= 3) {
            mysqli_query($DB_CONNECTION, "UPDATE tbl_users SET attempt='$attempt', log_time='$end_time' WHERE email='$email'");
            $notify_message = "I'm Sorry, You have to wait until: <b>$user_log_time</b before login.";
          } else {
            mysqli_query($DB_CONNECTION, "UPDATE tbl_users SET attempt='$attempt' WHERE email='$email'");
            $passwordError = "Password is Incorrect!";
            $notify_message = "Login Attempt: <b> $attempt </b>";
          }
        }
      }
    }
  } else {
    $notify_message = "Email Not Existing!";
  }
}
?>

<center>
  <form action="" method="post">
    <h2>Login</h2>
    <input type="text" class="input-text" name="email" value="<?php echo $email ?>" placeholder="Email" id="" required>
    <br>
    <br>
    <input type="text" class="input-text" name="password" value="<?php echo $password ?>" id="" placeholder="Password" required>
    <br>
    <br>
    <span><?php echo $passwordError ?></span>
    <input type="submit" name="btnLogin" value="Login">
    <h4><?php echo $notify_message ?></h4>
  </form>
</center>

<?php

session_start();
if (isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $query_user = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users WHERE email='$email'");
  $result = mysqli_fetch_assoc($query_user);
  $account_type = $result["account_type"];

  if ($account_type != '1') {
    header("Location: ../401");
  }
} else header("Location: ../Login");

<?php

  $DB_CONNECTION = mysqli_connect("localhost", "root","", "mydatabase");

  if(mysqli_connect_errno()){
    echo "MYSQL CONNECTION ERROR: " . mysqli_connect_errno();
  }
?>

<?php

  $connection = mysqli_connect("localhost", "root", "myDB");

  if(mysqli_connect_errno()){
    echo "Failed to Connect to MySQL" . mysqli_connect_errno();
  }
?>

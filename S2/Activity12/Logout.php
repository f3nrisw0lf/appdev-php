<?php

session_start();

$logout = md5($_SESSION["email"]);
$email_md5 = md5($logout);

unset($_SESSION["email"]);

session_unset();
session_destroy();


echo "Logging Out... Please Wait";
header("Location: Admin/index?logout=$logout&_1=$email_md5");
exit();

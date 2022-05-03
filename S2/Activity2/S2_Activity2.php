<?php
include("DBConnection.php");
$first_name = $middle_name = $last_name = $gender = $prefix = $seven_digit = $email = "";

if (isset($_POST["btnRegister"])) {
  $first_name = $_POST["first_name"];
  $middle_name = $_POST["middle_name"];
  $last_name = $_POST["last_name"];
  $gender = $_POST["gender"];
  $prefix = $_POST["prefix"];
  $seven_digit = $_POST["seven_digit"];
  $email = $_POST["email"];
}
?>

<form action="" method="post">
  <table>
    <tr>
      <td> <input type="text" minlength="2" name="first_name" placeholder="First Name" required></td>
    </tr>
    <tr>
      <td> <input type="text" minlength="2" name="middle_name" placeholder="Middle Name" required></td>
    </tr>
    <tr>
      <td> <input type="text" minlength="2" name="last_name" placeholder="Last Name" id="" required></td>
    </tr>

    <tr>
      <td>
        <select name="gender" required>
          <option value="" disabled hidden selected>Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <select name="prefix" required>
          <option value="" disabled hidden selected>Network Provider (Globe, Smart, Sun, TNT, TM etc.)</option>
          <option value="0917">0917</option>
          <option value="0985">0985</option>
          <option value="0906">0906</option>
          <option value="0907">0907</option>
        </select>

        <input type="text" name="seven_digit" id="" minlength="7" maxlength="7" placeholder="Other Seven Digits">
      </td>
    </tr>

    <tr>
      <td> <input type="email" name="email" placeholder="Email" required> </td>
    </tr>

    <tr>
      <td>
        <hr>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="btnRegister" value="Register"></td>
    </tr>
  </table>
</form>

<?php

function random_password($length = 5) {
  $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789JK";
  $randomize = substr(str_shuffle($str), 0, $length);
  return $randomize;
}

$password = random_password(10);

if ($first_name) {
  // echo $first_name . "<br>";
  // echo $middle_name . "<br>";
  // echo $last_name . "<br>";
  // echo $gender . "<br>";
  // echo $prefix;
  // echo $seven_digit . "<br>";
  echo "Your Email is " . "<strong>$email</strong>" . "<br>";
  echo "Your Password is " . "<strong>$password</strong>" . "<br>";

  mysqli_query($DB_CONNECTION, "INSERT INTO tbl_users(first_name, middle_name, last_name, gender, prefix, seven_digit, email, password) VALUES ('$first_name', '$middle_name', '$last_name', '$gender', '$prefix', '$seven_digit', '$email', '$password')");
}
?>

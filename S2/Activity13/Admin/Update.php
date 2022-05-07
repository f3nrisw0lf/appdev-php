<?php
include_once("AdminCheck.php");
include_once("../../DBConnection.php");

$user_id = $_GET["userId"];

$query = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users WHERE id=$user_id");
$new_first_name = $new_middle_name = $new_last_name = $new_gender = $new_prefix = $new_seven_digit = $new_email = "";

while ($row = mysqli_fetch_assoc($query)) {
  $first_name = $row["first_name"];
  $middle_name = $row["middle_name"];
  $last_name = $row["last_name"];
  $gender = $row["gender"];
  $prefix = $row["prefix"];
  $seven_digit = $row["seven_digit"];
  $email = $row["email"];
}

if (isset($_POST["btnUpdate"])) {
  $new_first_name = $_POST["first_name"];
  $new_middle_name = $_POST["middle_name"];
  $new_last_name = $_POST["last_name"];
  $new_gender = $_POST["gender"];
  $new_prefix = $_POST["prefix"];
  $new_seven_digit = $_POST["seven_digit"];
  $new_email = $_POST["email"];
}

?>

<form action="" method="post">
  <table>
    <tr>
      <td> <input type="text" minlength="2" name="first_name" placeholder="First Name" required value="<?php echo $first_name ?>"></td>
    </tr>
    <tr>
      <td> <input type="text" minlength="2" name="middle_name" placeholder="Middle Name" value="<?php echo $middle_name ?>" required></td>
    </tr>
    <tr>
      <td> <input type="text" minlength="2" name="last_name" placeholder="Last Name" id="" value="<?php echo $last_name ?>" required></td>
    </tr>

    <tr>
      <td>
        <select name="gender" required>
          <option value="male" <?php if ($gender == "male") echo "selected" ?>>Male</option>
          <option value="female" <?php if ($gender == "female") echo "selected" ?>>Female</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        <select name="prefix" required>
          <option value="" disabled hidden>Network Provider (Globe, Smart, Sun, TNT, TM etc.)</option>
          <option value="0917" <?php if ($prefix == "0917") echo "selected" ?>>0917</option>
          <option value="0985" <?php if ($prefix == "0985") echo "selected" ?>>0985</option>
          <option value="0906" <?php if ($prefix == "0906") echo "selected" ?>>0906</option>
          <option value="0907" <?php if ($prefix == "0907") echo "selected" ?>>0907</option>
        </select>

        <input type="text" name="seven_digit" id="" minlength="7" maxlength="7" placeholder="Other Seven Digits" value="<?php echo $seven_digit ?>">
      </td>
    </tr>

    <tr>
      <td> <input type="email" name="email" placeholder="Email" required value="<?php echo $email ?>"> </td>
    </tr>

    <tr>
      <td>
        <hr>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="btnUpdate" value="Update"></td>
    </tr>
  </table>
</form>

<?php
if ($new_first_name) {
  $update_query = mysqli_query($DB_CONNECTION, "UPDATE tbl_users SET first_name='$new_first_name', middle_name='$new_middle_name',last_name='$new_last_name', gender='$new_gender', prefix='$new_prefix', seven_digit='$new_seven_digit', email='$email' WHERE id='$user_id'");
  header("Location: ViewRecord");
}
?>

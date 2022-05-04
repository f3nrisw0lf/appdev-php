<?php
$user_id = $_GET["userId"];

$query = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users WHERE id='$user_id'");

$user = mysqli_fetch_assoc($query);

$id = $user["id"];
$full_name = ucfirst($user["first_name"]) . " " . ucfirst($user["middle_name"]) . " " . ucfirst($user["last_name"]);
$gender = ucfirst($user["gender"]);
$prefix = $user["prefix"];
$seven_digit = $user["seven_digit"];
$contact_number = $prefix . $seven_digit;
$email = $user["email"];
$password = $user["password"];

$gender_prefix = "";

if ($gender == "male")
  $gender_prefix = "Mr. ";
else
  $gender_prefix = "Ms. ";

$name_with_prefix = $gender_prefix . " " . $full_name;

if (isset($_POST["btnDelete"])) {
  mysqli_query($DB_CONNECTION, "DELETE FROM tbl_users WHERE id='$user_id'");
  header("Location: ViewRecord?notify=$name_with_prefix has been successfuly deleted!");
}

?>

<center>
  <form action="" method="post">
    <h4> You are about to delete this user: <font color="red"> <?php echo $name_with_prefix ?> </font>
      <input type="submit" name="btnDelete" value="Confirm" class="btn-primary"> <a href="?" class="btn-warning"> Cancel </a>
    </h4>
  </form>
</center>

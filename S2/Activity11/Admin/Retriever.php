<?php

include_once("../../DBConnection.php");
$jsScript = md5(rand(1, 9));
$newScript = md5(rand(1, 9));
$getUpdate = md5(rand(1, 9));
$getDelete = md5(rand(1, 9));

$notify_message = "";

if (isset($_GET["notify"]))
  $notify_message = $_GET["notify"];
?>
<center>
  <table border="1" width="80%">
    <td width="16%">Name</td>
    <td width="16%">Gender</td>
    <td width="16%">Contact</td>
    <td width="16%">Email</td>
    <td width="16%">Password</td>
    <td width="30%">Action</td>

    <?php

    $query = mysqli_query($DB_CONNECTION, "SELECT * FROM tbl_users");

    $COLUMN_COUNT = mysqli_field_count($DB_CONNECTION);

    while ($user = mysqli_fetch_assoc($query)) {
      $id = $user["id"];
      $full_name = ucfirst($user["first_name"]) . " " . ucfirst($user["middle_name"]) . " " . ucfirst($user["last_name"]);
      $gender = ucfirst($user["gender"]);
      $prefix = $user["prefix"];
      $seven_digit = $user["seven_digit"];
      $contact_number = $prefix . $seven_digit;
      $email = $user["email"];
      $password = $user["password"];

      echo "<tr>";
      echo "<td> $full_name </td>";
      echo "<td> $gender </td>";
      echo "<td> $contact_number </td>";
      echo "<td> $email </td>";
      echo "<td> $password </td>";
      echo "<td> <a href='?jScript=$jsScript && newScript=$newScript && getUpdate=$getUpdate && userId=$id' class='btn-secondary' style=''> Update </a>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<a href='?jScript=$jsScript && newScript=$newScript && getDelete=$getDelete && userId=$id' class='btn-warning' style=''> Delete </a> </td>";
      echo "</tr>";
    }
    ?>
  </table>

  <h4><?php echo $notify_message ?></h4>
</center>

<style>
  tr td {
    text-align: center;
    padding: 15px;
  }
</style>

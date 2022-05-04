<?php
include_once("Nav.php");

$check = $checkError = 0;

if (isset($_POST["btnSubmit"])) {
  if (empty($_POST["check"])) {
    $checkError = "Select at least one (1).";
  } else {
    $check = $_POST["check"];
  }
}
?>

<form action="" method="post">
  <input type="checkbox" name="check[]" placeholder="Beer" value="Beer" id="">
  Beer <br>
  <input type="checkbox" name="check[]" placeholder="San Miguel Pale Pilsen" value="San Miguel Pale Pilsen" id="">
  San Miguel Pale Pilsen <br>
  <input type="checkbox" name="check[]" placeholder="Primera Light" value="Primera Light" id="">
  Alfonso Light <br>
  <input type="checkbox" name="check[]" placeholder="Alfonso Light" value="Alfonso Light" id="">
  Alfonso Light <br>
  <input type="checkbox" name="check[]" placeholder="Tang Orange" value="Tang Orange" id="">
  Tang Orange <br>
  <input type="checkbox" name="check[]" placeholder="Tang Pineapple" value="Tang Pineapple" id="">
  Tang Pineapple <br>
  <input type="checkbox" name="check[]" placeholder="San Miguel Apple" value="San Miguel Apple" id="">
  San Miguel Apple <br>
  <input type="checkbox" name="check[]" placeholder="Nescafe White" value="Nescafe White" id="">
  Nescafe White <br>
  <input type="checkbox" name="check[]" placeholder="Great Taste White" value="Great Taste White Chocolate" id="">
  Great Taste White <br>
  <input type="checkbox" name="check[]" placeholder="Iced Coffee White Chocolate Mocha" value="Iced Coffee White Chocolate Mocha" id="">
  Iced Coffee White Chocolate <br>
  <input type="submit" name="btnSubmit" value="Submit">
</form>

<?php
if ($check) {
  foreach ($check as $drink) {
    echo $drink . "<br>";
  }
}
?>

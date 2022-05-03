<form action="" method="post">
  <input type="submit" name="Press-1" value="ARRIBA">
  <input type="submit" name="Press-2" value="SCST">
</form>

<?php

if (isset($_POST["Press-1"])) {
  echo $_POST["Press-1"];
}

if (isset($_POST["Press-2"])) {
  echo $_POST["Press-2"];
}

?>

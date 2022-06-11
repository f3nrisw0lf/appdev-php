<?php
include_once("Nav.php");
include_once("AdminCheck.php");

$contactErr = $contact = "";

if (isset($_POST["btnSMS"])) {
  if (empty($_POST["contact"])) {
    $contactErr = "Required!";
  } else {
    $contact = $_POST["contact"];
  }

  if ($contact) {
    $check_digits = strlen($contact);

    if ($check_digits < 11) {
      $contactErr = "Mobile number must be 11 characters!";
    } else {
      $message = "Sir Ten, Web Developer na ako!";

      function itexmo($contact, $message, $apicode) {
        $url = 'https://www.itexmo.com/php_api/api.php';

        $apicode = "TR-NEOLA636465_7Z634";
        $apipassword = "257mp))46s";


        $itexmo = array('1' => $contact, '2' => $message, '3' => $apicode, 'passwd' => $apipassword);
        $param = array(
          'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($itexmo),
          ),
        );
        $context = stream_context_create($param);
        return file_get_contents($url, false, $context);
      }

      $result = itexmo("$contact", "$message", "API_CODE");

      if ($result == "") {
        echo "<font color=red>Message Not Sent.</font>";
      } else {
        if ($result == 0) {
          echo "<font color=green>Message Sent.</font>";
        } else {
          echo $result;
        }
      }
    }
  }
}
?>

<form action="" method="post" style="display: flex; flex-direction: column; width: 50%;">
  <label for="contact">11 Digit Number</label>
  <input type="text" name="contact" minlength="11" maxlength="11" id="" value="<?php echo $contact ?>" placeholder="Enter Number" style="padding: 5px 3px" required>
  <input type="submit" name="btnSMS" value="Send SMS">
  <span><?php echo $contactErr ?></span>
</form>

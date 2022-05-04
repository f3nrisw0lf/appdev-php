<?php
include_once("Nav.php");

$target_directory = "photo_folder/";
$uploadError = "";


if (isset($_POST["btnUpload"])) {
  $target_file = $target_directory . "/" . basename($_FILES["profile_pic"]["name"]);

  $uploadOk = 1;

  if (file_exists($target_file)) {
    $target_file = $target_directory . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . "_" . basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
  }

  $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);

  if ($_FILES["profile_pic"]["size"] > 500000000000000000) {
    $uploadError = "Sorry, File too large.";
    $uploadOk = 0;
  }

  if ($image_file_type != "JPG" && $image_file_type != "PNG" && $image_file_type != "jpeg" && $image_file_type != "gif") {
    $uploadError = "Sorry, only JPG, JPEG, PNG or GIF files are allowed";
    $uploadOk = 0;
  }

  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
      echo "<font color=green> The file " . basename($_FILES["profile_pic"]["name"]) . " has been uploaded </font>";
    } else echo "Sorry, there was an error uploading your file.";
  }
}
?>


<script src="../js/jQuery.js"></script>

<script type="application/javascript">
  const URL = window.URL || window.webkitURL;

  function displayPreview(files) {
    const file = files[0];
    const img = new Image();
    const sizeKB = file.size / 1024;

    img.onload = () => {
      $('#preview').append(img);
    }

    img.src = URL.createObjectURL(file);
  }
</script>
<form action="" enctype="multipart/form-data" method="post">
  <table border="0" width="30%">
    <tr>
      <td colspan="2">
        <center><span id="preview"></span></center>
      </td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td width="50%" colspan="2"><input type="file" name="profile_pic" onchange="displayPreview(this.files);" id=""></td>
    </tr>
    <tr>
      <td colspan="2">
        <center>
          <input type="submit" name="btnUpload" value="Upload">
        </center>
      </td>
    </tr>
  </table>
</form>
<span><?php echo $uploadError ?></span>

<style>
  img {
    height: 150px;
  }
</style>

<?php

    $name = $address = $email = $section = $contact ="";
    $nameErr = $adressErr = $emailErr = $sectionErr = $contactErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty ($_POST["name"])){
            $nameErr = "Name is required!";
        } else {
            $name = $_POST["name"];
        }

        if (empty ($_POST["address"])){
            $address = "Address is required!";
        } else {
            $address = $_POST["address"];
        }

        if (empty ($_POST["email"])){
            $emailErr = "Email is required!";
        } else {
            $email = $_POST["email"];
        }

        if (empty ($_POST["section"])){
            $sectionErr = "Section is required!";
        } else {
            $section = $_POST["section"];
        }

        if (empty ($_POST["contact"])){
            $contactErr = "Contact Number is required!";
        } else {
            $contact = $_POST["contact"];
        }
    }

?>

<style>
.error {
    color:red;
}
</style>

<form method="POST" action="">

<label for="name"> Full Name:</label> <br>
<input type="text" name="name" width="250" value="<?php echo $name; ?>"> <br>
<span class="error"> <?php echo $nameErr; ?> </span> <br>

<label for="address"> Full Address:</label> <br>
<input type="text" name="address" value="<?php echo $address;?>"> <br>
<span class="error"> <?php echo $adressErr; ?> </span> <br>

<label for="email"> E-mail Address:</label> <br>
<input type="text" name="email" value="<?php echo $email; ?>"> <br>
<span class="error"> <?php echo $emailErr; ?> </span> <br>

<label for="section"> Section:</label> <br>
<input type="text" name="section" value="<?php echo $section; ?>"> <br>
<span class="error"> <?php echo $sectionErr; ?> </span> <br>

<label for="contact"> Contact #:</label> <br>
<input type="text" name="contact" value="<?php echo $contact; ?>"> <br>
<span class="error"> <?php echo $contactErr; ?> </span> <br>

<input type="submit" value="Submit">

</form>

<hr>

<?php 
    if ($name & $address & $email) {
        echo $name . "<br>";
        echo $address . "<br>";
        echo $email . "<br>";
        echo $section . "<br>";
        echo $contact . "<br>";
    }
?>

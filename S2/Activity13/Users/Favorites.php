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

<hr>

<script type="text/javascript">
  const categoryOnChange = (choice) => {
    const select = document.getElementById("choice");
    let categoryOptions = "";
    if (!choice.length) select.innerHTML = "<option></option>";
    else {
      Categories[choice].forEach((category) => {
        categoryOptions += `<option name="choice" value="${category}"> ${category} </option>`
      })
    }

    select.innerHTML = categoryOptions;
  };

  const Categories = {
    "Car": ["Honda", "BMW", "Mustang", "Porsche", "Toyota", "Geely", "Morgan Garages", "Ferrari", "Mercedes Benz"],
    "Food": ["Burger", "Maling", "Hotdog", "Sisig", "Siomai", "Porkchop", "Wings", "Chicken Fillet", "Itlog", "Footlong"],
    "Beer": ["Red Horse", "Colt 45", "San Mig Light Apple", "San Mig Pale Pilsen", "Guiness", "Heineken", "Modelo", "Corona", "Miller Lite", "Coors"],
    "Beverages": ["Coke", "Sarsi", "Royal", "Yakult", "Pepsi", "Red Bull", "Monster", "Gatorade", "Sprite", "Mountain Dew"]
  };

  let choice = document.getElementById("choice");

  choice.innerHTML = "<option></option>";
</script>

<select name="category" id="category" onchange="categoryOnChange(this.value)">
  <option name="category" value="Car">Car</option>
  <option name="category" value="Food">Food</option>
  <option name="category" value="Beer">Beer</option>
  <option name="category" value="Beverages">Beverages</option>
</select>

<select name="choice" id="choice">
  <option name="choice" value="">Select Category First</option>
</select>

<?php
if ($check) {
  foreach ($check as $drink) {
    echo $drink . "<br>";
  }
}
?>

<?php
$nameError = "";
$priceError = "";
$countryError = "";
$photoError = "";
$name = $_POST["name"];
$price = $_POST["price"];
$country = $_POST["country"];
$photo = $_POST["photo"];

if (isset($_POST["submit"])) {
    if (empty($name)) {
        $nameError = "name is required";
    }
    if (empty($price)) {
        $priceError = "please Enter valid price";
    }
    if (empty($country)) {
        $countryError = "Please enter valid country";
    }
    if (empty($photo)) {
        $photoError = "Please select product image";
    }

    if (empty($nameError) && empty($priceError) && empty($countryError) && empty($photoError)) {

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width = device - width, initial - scale = 1">
    <link rel="stylesheet" href="../Static/css/style.css">
    <title>PHP Demo</title>
</head>
<body>
<form method="post" name="form-insert-items" action="../index.php?page=Insert.php">
    <label>
        Product Name :
        <input type="text" name="name">
    </label>
    <label>
        Price:
        <input type="number" name="price">
    </label>

    <label>
        Country:
        <input type="text" name="country">
    </label>
    <label>
        Photo:
        <input type="file" name="photo">
    </label>
    <input type="submit" value="Insert">
</form>

</body>
</html>

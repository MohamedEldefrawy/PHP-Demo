<?php
session_start();
require_once("../vendor/autoload.php");

$nameError = "";
$priceError = "";
$countryError = "";
$idError = "";

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$country = $_POST["country"];
$photo = $_POST["photo"];
$itemsService = new ItemsService();


if (isset($_POST["submit"])) {

    if (empty($id)) {
        $idError = "Please insert valid id";
    }
    if (empty($name)) {
        $nameError = "name is required";
    }
    if (empty($price)) {
        $priceError = "please Enter valid price";
    }
    if (empty($country)) {
        $countryError = "Please enter valid country";
    }

    if (empty($nameError) && empty($priceError) && empty($countryError)) {

        $itemsService->insertItem(
            [
                "id" => $id,
                "product_name" => $name,
                "list_price" => $price,
                "CouNtry" => $country,
                "Photo" => $photo
            ]
        );

        $successPage = "<h1> item has been added</h1>" . "<a href='../index.php'>Products</a>";
        die($successPage);
    }
}

function get_default($field)
{
    if (isset($_POST[$field])) {
        echo $_POST[$field];
    } else
        echo "";
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
<label style="color: red">
    <?php echo $nameError ?>
</label>
<label style="color: red">
    <?php echo $priceError ?>
</label>
<label style="color: red">
    <?php echo $countryError ?>
</label>
<label style="color: red">
    <?php echo $idError ?>
</label>
<form method="post" enctype="multipart/form-data" name="form-insert-items" action="./Insert.php">
    <label>
        Product ID :
        <input type="number" name="id" value="<?php get_default("id"); ?>">
    </label>
    <label>
        Product Name :
        <input type="text" name="name" value="<?php get_default("name"); ?>">
    </label>
    <label>
        Price:
        <input type="number" name="price" value="<?php get_default("price"); ?>">
    </label>

    <label>
        Country:
        <input type="text" name="country" value="<?php get_default("country"); ?>">
    </label>
    <label>
        Photo:
        <input type="file" name="photo">
    </label>
    <input name="submit" type="submit" value="Insert">
</form>

</body>
</html>

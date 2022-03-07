<?php

echo "<table>";
$record_index = 0;
$items = new ItemsService();
$records = $items->getAllItems();

foreach ($records["all_records"] as $item) {
    if ($record_index === 0) {
        echo "<tr>";
        echo "<td> Name </td>";
        echo "<td> Price </td>";
        echo "<td> Country </td>";
        echo "<td> Photo </td>";

        echo "</tr>";
    }
    echo "<tr>";

    echo "<td>" . $item->product_name . "</td>";
    echo "<td>" . $item->list_price . "</td>";
    echo "<td>" . $item->CouNtry . "</td>";
    echo "<td>" . "<img  class='product-image' src = '" . "../Static/Images/" . "$item->Photo" . "' alt='product_image'>";
    echo "</tr>";

    $record_index++;
}
echo "</table>";
echo "<div>";
echo "<a href=" . $records["previous_link"] . "> << Prev </a> | <a href=" . $records["next_link"] . ">Next >> </a> </div> ";
echo "<a href='../Views/Insert.php'>" . "Insert items </a>";


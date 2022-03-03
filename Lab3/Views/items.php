<?php

echo "<table border='1'>";
$record_index = 0;
$items = new ItemsService();
$records = $items->getAllItems();

foreach ($records["all_records"] as $item) {
    if ($record_index === 0) {
        echo "<tr>";
        echo "<td> Name </td>";
        echo "<td> Price </td>";
        echo "<td> Country </td>";

        echo "</tr>";
    }
    echo "<tr>";

    echo "<td>".$item->product_name ."</td>";
    echo "<td>".$item->list_price ."</td>";
    echo "<td>".$item->CouNtry ."</td>";
    echo "</tr>";

    $record_index ++;
}
echo "</table>";
?>
<div>
    <a href="<?php echo $records["next_link"];  ?>"> << Prev </a> | <a href="<?php echo $records["previous_link"];  ?>">  Next >> </a>
</div>

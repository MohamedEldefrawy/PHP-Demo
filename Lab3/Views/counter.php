<?php
$file = file("counter.txt");
$count = explode("=", $file[0])[1];

echo "Number of unique users = $count";


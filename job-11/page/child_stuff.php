<?php

include "../class/child/Clothing.php";

$clothing = new Clothing(
    1,
    "T-shirt",
    ["https://picsum.photos/200/300"], // $photos
    15.99, // $price
    "T-shirt en coton",
    100,
    1,
    new DateTime("2021-01-01"),
    new DateTime("2021-01-01"),
    "M",
    "white",
    "T-shirt",
    2
);

echo $clothing; 
echo "<br>";
var_dump($clothing);

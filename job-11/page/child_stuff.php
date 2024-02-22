<?php


include "../class/child/Clothing.php";

$clothing = new Clothing(
    1,
    "T-shirt",
    15.99,
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
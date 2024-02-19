<?php

include "class/Product.php";    

$product = new Product(
    1,
    "T-shirt",
    ["https://picsum.photos/200/300"],
    10000,
    "a beautiful T-shirt",
    10,
    new DateTime("2021-01-01"),
    new DateTime("2021-01-01")
);

// echo $product;
$product->getPhotos();
$product->setPrice(3000);
var_dump($product);
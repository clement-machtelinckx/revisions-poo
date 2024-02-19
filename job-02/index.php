
<?php

include "class/Product.php";    

$product = new Product(
    1,
    "T-shirt",
    ["https://picsum.photos/200/300"],
    10000,
    "a beautiful T-shirt",
    10,
    1,
    new DateTime("2021-01-01"),
    new DateTime("2021-01-01")
);

// Utilisation automatique de __toString lors de l'affichage avec echo ou print
echo $product;

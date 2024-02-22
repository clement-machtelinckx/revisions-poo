<?php
include "class/Product.php";
include "class/Category.php";

$product = new Product();

if(isset($_GET['id'])) {
    // Récupérer et stocker l'ID depuis l'URL
    $product ->setId($_GET['id']);
}
$product -> setName("new short");
$product -> setPrice(20);
$product -> setDescription("new short description");

echo $product -> getName();
echo $product -> getPrice();
echo $product -> getDescription();
echo $product ->getId();
// var_dump($product); 

$product->update();
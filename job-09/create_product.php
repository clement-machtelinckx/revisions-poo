<?php
include "class/Product.php";
include "class/Category.php";


$product = new Product(0, "new product", ["https://picsum.photos/200/300"], 139.0, "description", 19, 2);

$product->create();
// var_dump($product);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
<table class="table table-hover mt-4">

    <h1>Détails du produit sélectionné</h1>
    <?php
    echo "nom du produit : " . $product->getName() . "<br>";
    echo "prix du produit : " . $product->getPrice() . "<br>";
    echo "description du produit : " . $product->getDescription() . "<br>";
    echo "quantité du produit : " . $product->getQuantity() . "<br>";
    // echo "catégorie du produit : " . $product->getCategory()->getName() . "<br>";


    ?>

    <thead>
        <tr>

            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Category</th>

        </tr>
    </thead>
    <tbody>

            <tr>

                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getPrice() ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><?php echo $product->getQuantity(); ?></td>
                <td><?php echo $product->getCategory(); ?></td>

            </tr>

    </tbody>
</table>
    
</body>
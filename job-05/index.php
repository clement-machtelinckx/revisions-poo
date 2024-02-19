<?php

include "class/Product.php";    

// Instanciation d'un objet Product
$product = new Product();

// Récupération des produits depuis la base de données
$products = $product->show_all_product();

// var_dump($products);
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Récupération du produit par son ID
    $selected_product = $product->get_product_by_id($product_id);

    // Affichage des détails du produit
    if ($selected_product) {
        echo "Id: " . $selected_product['id'] . "<br>";
        echo "Name: " . $selected_product['name'] . "<br>";

        echo "Price: " . $selected_product['price'] . "<br>";
        echo "Description: " . $selected_product['description'] . "<br>";
        echo "Quantity: " . $selected_product['quantity'] . "<br>";
        echo "Category: " . $selected_product['category_id'] . "<br>";
        echo "Created At: " . $selected_product['createdAt'] . "<br>";
        echo "Updated At: " . $selected_product['updatedAt'] . "<br>";


        // Afficher les autres détails du produit...
    } else {
        echo "Produit non trouvé.";
    }
}
?>
<img src="<?php echo $selected_product["photos"] ?>"></img>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>

<form method="POST">
    <label for="product_id">Sélectionnez un produit par son ID :</label>
    <select name="product_id" id="product_id">
        <!-- Ajoutez ici les options du select en récupérant les produits de la base de données -->
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['id']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Afficher le produit</button>
</form>

<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td><?php echo $product['category_id']; ?></td>
                <td><?php echo $product['createdAt']; ?></td>
                <td><?php echo $product['updatedAt']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>

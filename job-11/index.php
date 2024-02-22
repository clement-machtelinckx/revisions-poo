<?php
include "class/Product.php";
include "class/Category.php";

$product = new Product();

// Instanciation d'un objet Category
$category = new Category();

// Récupération de toutes les catégories
$categories = $product->getCategory2();

// Récupération des produits depuis la base de données
$products = $product->show_all_product();

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

        // Récupération du nom de la catégorie associée à ce produit
        $category_name = $categories[$selected_product['category_id'] - 1]['name']; // Ajustement de l'index
        echo "Category: " . $category_name . "<br>";

        echo "Created At: " . $selected_product['createdAt'] . "<br>";
        echo "Updated At: " . $selected_product['updatedAt'] . "<br>";

        // Afficher les autres détails du produit...
    } else {
        echo "Produit non trouvé.";
    }
}

?>

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
<div style="display: flex; flex-direction: column;">
    <a href="page/category_select.php?category_id=<?php echo $selected_product["category_id"]; ?>">category selector !!</a>
    <a href="page/create_product.php">Créer un produit</a>
    <a href="page/update_product.php?id=<?php echo $selected_product["id"]; ?>">update produit</a>
    <a href="page/child_stuff.php">child test</a>
</div>



<?php if ($selected_product): ?>
    <h1>Détails du produit sélectionné</h1>
    <div>
        <p>Id: <?php echo $selected_product['id']; ?></p>
        <p>Name: <?php echo $selected_product['name']; ?></p>
        <p>Price: <?php echo $selected_product['price']; ?></p>
        <p>Description: <?php echo $selected_product['description']; ?></p>
        <p>Quantity: <?php echo $selected_product['quantity']; ?></p>
        <p>Category: <?php echo $selected_product['category_id']; ?></p>
        <p>Created At: <?php echo $selected_product['createdAt']; ?></p>
        <p>Updated At: <?php echo $selected_product['updatedAt']; ?></p>
        <img src="<?php echo $selected_product["photos"]; ?>" alt="Product Photo">
    </div>
<?php endif; ?>

<h1>Liste des produits</h1>
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

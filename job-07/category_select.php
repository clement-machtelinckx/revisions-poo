<?php
include "class/Product.php";
include "class/Category.php";

$product = new Product();

// Instanciation d'un objet Category
$category = new Category();

$categorys = $category->show_all_category();
$category_id = $_GET["category_id"];
var_dump($_GET["category_id"]);
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Récupération du produit par son ID
    $selected_category = $category->getCategoryById($category_id);

    // Affichage des détails du produit
    if ($selected_category) {
        echo "Id: " . $selected_category['id'] . "<br>";
        echo "Name: " . $selected_category['name'] . "<br>";

        echo "Description: " . $selected_category['description'] . "<br>";

        echo "Created At: " . $selected_category['createdAt'] . "<br>";
        echo "Updated At: " . $selected_category['updatedAt'] . "<br>";

        // Afficher les autres détails du produit...
    } else {
        echo "Produit non trouvé.";
    }
}


$category_table = $category->getProducts($category_id);

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
    <label for="product_id">Sélectionnez une category par son ID :</label>
    <select name="category_id" id="category_id">
        <!-- Ajoutez ici les options du select en récupérant les produits de la base de données -->
        <?php foreach ($categorys as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['id']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Afficher les détails</button>
</form>

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
        <?php foreach ($category_table as $category_tables): ?>
            <tr>
                <td><?php echo $category_tables['id']; ?></td>
                <td><?php echo $category_tables['name']; ?></td>
                <td><?php echo $category_tables['price']; ?></td>
                <td><?php echo $category_tables['description']; ?></td>
                <td><?php echo $category_tables['quantity']; ?></td>
                <td><?php echo $category_tables['category_id']; ?></td>
                <td><?php echo $category_tables['createdAt']; ?></td>
                <td><?php echo $category_tables['updatedAt']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

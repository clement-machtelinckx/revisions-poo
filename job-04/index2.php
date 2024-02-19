<?php

include "class/Product.php";    

$db_name = "draft-shop";
$db_user = "clement";
$db_pass = "Clement2203$";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=localhost;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des produits depuis la base de données
    $stmt = $pdo->query("SELECT * FROM products");
    $products = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = new Product(
            $row['id'],
            $row['name'],
            [], // Les photos peuvent être récupérées depuis la base de données si elles sont stockées sous forme de lien dans une table
            $row['price'],
            $row['description'],
            $row['quantity'],
            $row['category'],
            new DateTime($row['created_at']),
            new DateTime($row['updated_at'])
        );
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
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

<form method="post">
    <label for="product_id">Select Product ID:</label>
    <select name="product_id" id="product_id">
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product->getId(); ?>"><?php echo $product->getId(); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Show Details</button>
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'ID du produit sélectionné
    $selectedProductId = $_POST['product_id'];

    // Recherche du produit correspondant dans la liste des produits
    foreach ($products as $product) {
        if ($product->getId() == $selectedProductId) {
            $selectedProduct = $product;
            break;
        }
    }

    // Affichage des détails du produit sélectionné
    if (isset($selectedProduct)) {
        echo "<table class=\"table table-hover mt-4\">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>CeatedAt</th>
                        <th>UpdatedAt</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$selectedProduct->getId()}</td>
                        <td>{$selectedProduct->getName()}</td>
                        <td>{$selectedProduct->getPrice()}</td>
                        <td>{$selectedProduct->getDescription()}</td>
                        <td>{$selectedProduct->getQuantity()}</td>
                        <td>{$selectedProduct->getCategoryId()}</td>
                        <td>{$selectedProduct->getCreatedAt()->format('Y-m-d H:i:s')}</td>
                        <td>{$selectedProduct->getUpdatedAt()->format('Y-m-d H:i:s')}</td>
                    </tr>
                </tbody>
            </table>";
    } else {
        echo "Product not found";
    }
}
?>

</body>
</html>

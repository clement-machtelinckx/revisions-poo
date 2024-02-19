<?php

include "class/Product.php";    

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crée une instance de Product
    $product = new Product(
        1,
        "T-shirt",
        ["https://picsum.photos/200/300"],
        10000,
        "a beautiful T-shirt",
        10,
        1, // Assurez-vous que cette valeur correspond à une catégorie existante dans votre base de données
        new DateTime("2021-01-01"),
        new DateTime("2021-01-01")
    );

    // Appel de la méthode add_product sur l'objet $product
    $product->add_product($product);
    echo "Données insérées avec succès !";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Formulaire pour envoyer les données à PHP -->
    <form method="post">
        <button type="submit">Envoyer en base de données</button>
    </form>
</body>
</html>

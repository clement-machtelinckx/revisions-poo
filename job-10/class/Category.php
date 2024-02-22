<?php

class Category {

    private $id;

    private $name;

    private $description;

    private $createdAt;
    
    private $updatedAt;

    public function __construct(
        int $id = 1,
        string $name = "",
        string $description = "",
        DateTime $createdAt = new DateTime("2021-01-01"),
        DateTime $updatedAt = new DateTime("2021-01-01")
    ) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> description = $description;
        $this -> createdAt = $createdAt;
        $this -> updatedAt = $updatedAt;
    }

    public function getId(): int {
        return $this -> id;
    }

    public function getName(): string {
        return $this -> name;
    }

    public function getDescription(): string {
        return $this -> description;
    }

    public function getCreatedAt(): DateTime {
        return $this -> createdAt;
    }

    public function getUpdatedAt(): DateTime {
        return $this -> updatedAt;
    }
    
    public function setId(int $id) {
        $this -> id = $id;
    }

    public function setName(string $name) {
        $this -> name = $name;
    }

    public function setDescription(string $description) {
        $this -> description = $description;
    }

    public function setUpdatedAt(DateTime $updatedAt) {
        $this -> updatedAt = $updatedAt;
    }


    public function getCategoryById(int $id) {
        $host = "localhost";
        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête de sélection
            $stmt = $pdo->prepare("SELECT * FROM category WHERE id = :id");
    
            // Liaison des valeurs des paramètres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Exécution de la requête de sélection
            $stmt->execute();
    
            // Récupération du produit
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            echo "Erreur de sélection : " . $e->getMessage();
        }
        return $category;
    }
    public function show_all_category() {
        $host = "localhost";
        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête de sélection
            $stmt = $pdo->prepare("SELECT * FROM category");
    
            // Exécution de la requête de sélection
            $stmt->execute();
    
            // Récupération de tous les produits
            $categorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            echo "Erreur de sélection : " . $e->getMessage();
        }
        return $categorys;
    }

    public function __toString() {
        return "Id: " . $this -> id . "<br>" .
        "Name: " . $this -> name . "<br>" .
        "Description: " . $this -> description . "<br>" .
        "Created At: " . $this -> createdAt -> format("Y-m-d H:i:s") . "<br>" .
        "Updated At: " . $this -> updatedAt -> format("Y-m-d H:i:s") . "<br>";
    }

    public function getProducts(int $id) {
        $host = "localhost";
        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête de sélection
            $stmt = $pdo->prepare("SELECT * FROM product WHERE category_id = :id");
    
            // Liaison des valeurs des paramètres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Exécution de la requête de sélection
            $stmt->execute();
    
            // Récupération de tous les produits de la catégorie spécifiée
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $products;
        } catch (PDOException $e) {
            echo "Erreur de sélection : " . $e->getMessage();
        }
    }
    
}



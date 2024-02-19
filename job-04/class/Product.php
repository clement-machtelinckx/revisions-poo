<?php

class Product {
    private $id;
    private $name;
    private $photos = [];
    private $price;
    private $description;
    private $quantity;
    private $category_id;

    private $createdAt;
    private $updatedAt;

    public function __construct(
        int $id = 0,
        string $name = "",
        array $photos = [],
        float $price = 0.0,
        string $description = "",
        int $quantity = 0,
        int $category_id = 0,
        DateTime $createdAt = new DateTime("2021-01-01"),
        DateTime $updatedAt = new DateTime("2021-01-01")

    ) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> photos = $photos;
        $this -> price = $price;
        $this -> description = $description;
        $this -> quantity = $quantity;
        $this -> category_id = $category_id;
        $this -> createdAt = $createdAt;
        $this -> updatedAt = $updatedAt;

    }

    public function getId(): int {
        return $this -> id;
    }

    public function getName(): string {
        return $this -> name;
    }

    public function getPhotos(): array {
        return $this -> photos;
    }

    public function getPrice(): float {
        return $this -> price;
    }

    public function getDescription(): string {
        return $this -> description;
    }

    public function getQuantity(): int {
        return $this -> quantity;
    }

    public function getCategoryId(): int {
        return $this -> category_id;
    }

    public function getCreatedAt(): DateTime {
        return $this -> createdAt;
    }

    public function getUpdatedAt(): DateTime {
        return $this -> updatedAt;
    }

    public function setId(int $id): void {
        $this -> id = $id;
    }

    public function setName(string $name): void {
        $this -> name = $name;
    }

    public function setPhotos(array $photos): void {
        $this -> photos = $photos;
    }

    public function setPrice(float $price): void {
        $this -> price = $price;
    }

    public function setDescription(string $description): void {
        $this -> description = $description;
    }

    public function setQuantity(int $quantity): void {
        $this -> quantity = $quantity; 
    }

    public function setCategoryId(int $category_id): void {
        $this -> category_id = $category_id;
    }

    public function setCreatedAt(DateTime $createdAt): void {
        $this -> createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void {
        $this -> updatedAt = $updatedAt;
    }

    public function __toString() {
        $photoList = implode(", ", $this->photos);
        return "Product: [id: $this->id, name: $this->name, price: $this->price, description: $this->description, quantity: $this->quantity, category: $this->category_id, createdAt: {$this->createdAt->format('Y-m-d H:i:s')}, updatedAt: {$this->updatedAt->format('Y-m-d H:i:s')}, photos: [$photoList]]";
    }
    
    public function add_product($product) {

        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=localhost;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO product (name, photos, price, description, quantity, category_id, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
            // Extraction des données de l'objet Product
            $name = $product->getName();
            $photos = implode(',', $product->getPhotos());
            $price = $product->getPrice();
            $description = $product->getDescription();
            $quantity = $product->getQuantity();
            // Utilisation de getCategoryId() au lieu de getCategory()
            $category_id = $product->getCategoryId();
            $createdAt = $product->getCreatedAt()->format('Y-m-d H:i:s');
            $updatedAt = $product->getUpdatedAt()->format('Y-m-d H:i:s');
    
            // Exécution de la requête d'insertion
            $stmt->execute([$name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt]);
    
            echo "Données insérées avec succès !";
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function show_all_product() {
        $host = "localhost";
        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête de sélection
            $stmt = $pdo->prepare("SELECT * FROM product");
    
            // Exécution de la requête de sélection
            $stmt->execute();
    
            // Récupération de tous les produits
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            echo "Erreur de sélection : " . $e->getMessage();
        }
        return $products;
    }


    public function get_product_by_id($id) {
        $host = "localhost";
        $db_name = "draft-shop";
        $db_user = "clement";
        $db_pass = "Clement2203$";
    
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Préparation de la requête de sélection
            $stmt = $pdo->prepare("SELECT * FROM product WHERE id = :id");
    
            // Liaison des valeurs des paramètres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Exécution de la requête de sélection
            $stmt->execute();
    
            // Récupération du produit
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            echo "Erreur de sélection : " . $e->getMessage();
        }
        return $product;
    }
    
    
    

}
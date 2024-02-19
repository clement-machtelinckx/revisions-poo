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
        int $id,
        string $name,
        array $photos,
        float $price,
        string $description,
        int $quantity,
        int $category_id,
        DateTime $createdAt,
        DateTime $updatedAt

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
    

    

}

?>
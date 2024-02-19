<?php

class Product {
    private $id;
    private $name;
    private $photos = [];
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        int $id,
        string $name,
        array $photos,
        float $price,
        string $description,
        int $quantity,
        DateTime $createdAt,
        DateTime $updatedAt

    ) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> photos = $photos;
        $this -> price = $price;
        $this -> description = $description;
        $this -> quantity = $quantity;
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

    public function setCreatedAt(DateTime $createdAt): void {
        $this -> createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void {
        $this -> updatedAt = $updatedAt;
    }

    

}

?>
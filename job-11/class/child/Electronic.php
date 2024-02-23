<?php

include "../class/Product.php";

class Electronic extends product {

    private $brand;

    private $watanty_fee;

    public function __construct(
        int $id = 0,
        string $name = "",
        array $photos = [],
        float $price = 0.0,
        string $description = "",
        int $quantity = 0,
        int $category_id = 1,
        DateTime $createdAt = null,
        DateTime $updatedAt = null,
        string $brand = "",
        int $watanty_fee = 0
    ) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt);
        $this -> brand = $brand;
        $this -> watanty_fee = $watanty_fee;
    }
    
    public function getBrand(): string {
        return $this -> brand;
    }

    public function getWatantyFee(): int {
        return $this -> watanty_fee;
    }

    public function setBrand(string $brand) {
        $this -> brand = $brand;
    }

    public function setWatantyFee(int $watanty_fee) {
        $this -> watanty_fee = $watanty_fee;
    }

    public function __toString(): string {
        return "Electronic: " . parent::__toString() . " brand: " . $this -> brand . " watanty_fee: " . $this -> watanty_fee;
    }
}
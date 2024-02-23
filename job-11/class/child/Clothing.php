<?php

include "../class/Product.php";

class Clothing extends Product {

    private $size;

    private $color;

    private $type;

    private $material_fee;

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
        string $size = "",
        string $color = "",
        string $type = "",
        int $material_fee = 0)

    {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt);
        $this -> size = $size;
        $this -> color = $color;
        $this -> type = $type;
        $this -> material_fee = $material_fee;
    }

    public function getSize(): string {
        return $this -> size;
    }

    public function getColor(): string {
        return $this -> color;
    }

    public function getType(): string {
        return $this -> type;
    }

    public function getMaterialFee(): int {
        return $this -> material_fee;
    }

    public function setSize(string $size) {
        $this -> size = $size;
    }

    public function setColor(string $color) {
        $this -> color = $color;
    }

    public function setType(string $type) {
        $this -> type = $type;
    }

    public function setMaterialFee(int $material_fee) {
        $this -> material_fee = $material_fee;
    }

    public function __toString(): string {
        return "Clothing: " . parent::__toString() . " size: " . $this -> size . " color: " . $this -> color . " type: " . $this -> type . " material_fee: " . $this -> material_fee;
    }

    


}
<?php

class Category {

    private $id;

    private $name;

    private $description;

    private $createdAt;
    
    private $updatedAt;

    public function __construct(
        int $id,
        string $name,
        string $description,
        DateTime $createdAt,
        DateTime $updatedAt
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

    public function setName(string $name) {
        $this -> name = $name;
    }

    public function setDescription(string $description) {
        $this -> description = $description;
    }

    public function setUpdatedAt(DateTime $updatedAt) {
        $this -> updatedAt = $updatedAt;
    }

    public function __toString() {
        return "Category: $this->id, $this->name, $this->description, $this->createdAt, $this->updatedAt";
    }

    
}


?>
<?php

class Category {
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;
    public function __construct($id, $name, $description, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = new DateTime($updatedAt);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = new DateTime($createdAt);
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = new DateTime($updatedAt);
    }
}

class Product {
    private ?int $id = null;
    private ?string $name = null;
    private ?array $photos = [];
    private ?int $price = 0;
    private ?string $description = null;
    private ?int $quantity = 0;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;
    private ?int $category_id = null;

    public function __construct($id, $name, $photos, $price, $description,
                                $quantity, $createdAt, $updatedAt, $category_id) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = new DateTime($updatedAt);
        $this->category_id = $category_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPhotos() {
        return $this->photos;
    }

    public function setPhotos($photos) {
        $this->photos = $photos;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = new DateTime($createdAt);
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = new DateTime($updatedAt);
    }

    public function getCategoryID() {
        return $this->category_id;
    }

    public function setCategoryID($category_id) {
        $this->category_id = $category_id;
    }
}

// Exemple d'utilisation :
$category = new Category(1, "Électronique", "Catégorie pour les produits électroniques");

$product = new Product(1, "Smartphone", ["photo1.json", "photo2.json"], 500, "Un excellent smartphone", 20, null, null, $category->getId());

// Afficher les propriétés de la catégorie avec var_dump()
var_dump($category);

// Afficher les propriétés du produit avec var_dump()
var_dump($product);

<?php

class Product {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
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
}

// Exemple d'utilisation :
$product = new Product(
    1,
    "Nom du produit",
    ["photo1.jpg", "photo2.jpg"],
    100,
    "Description du produit",
    10,
    '2024-01-08 12:00:00',
    '2024-01-08 13:30:00'
);

// Afficher les propriétés du produit avec var_dump()
var_dump($product);

<?php

class Category {
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private DateTime $createdAt;
    private DateTime $updatedAt;
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
    private $createdAt = null;
    private $updatedAt = null;
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
// Connexion à la base de données (remplacez ces informations par les vôtres)
$dsn = 'mysql:host=localhost;dbname=draft-shop';
$username = 'root';
$password = 'Dyane198124//';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer le produit avec l'ID 6
    $productId = 6;
    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer les données sous forme de tableau associatif
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Créer une nouvelle instance de la classe Product
$product = new Product(
    $productData['id'] ?? null,
    $productData['name'] ?? null,
    json_decode($productData['photos'], true) ?? [], // Supposons que les photos soient stockées sous forme JSON dans la base de données
    $productData['price'] ?? 0,
    $productData['description'] ?? null,
    $productData['quantity'] ?? 0,
    $productData['created_at'] ?? null,
    $productData['updated_at'] ?? null,
    $productData['category_id'] ?? null
);

// Afficher les propriétés du produit avec var_dump()
var_dump($product);

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

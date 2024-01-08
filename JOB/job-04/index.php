<?php


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
        $productData['id'],
        $productData['name'],
        json_decode($productData['photos'], true), // Supposons que les photos soient stockées sous forme JSON dans la base de données
        $productData['price'],
        $productData['description'],
        $productData['quantity'],
        $productData['created_at'],
        $productData['updated_at'],
        $productData['category_id']
    );

    // Afficher les propriétés du produit avec var_dump()
    var_dump($product);

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

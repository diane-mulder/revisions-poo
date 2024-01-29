<?php

require_once 'Product.php';
require_once 'Category.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=draft-shop','root','Dyane198124//' );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->bindValue(':id', 6, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer les données sous forme de tableau associatif
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($productData) {
    // Créer une nouvelle instance de la classe Product
        $productInstance = new Product(
            $productData['id'],
            $productData['name'],
            $productData['photos'], // Supposons que les photos soient stockées sous forme JSON dans la base de données
            $productData['price'],
            $productData['description'],
            $productData['quantity'],
            new DateTime($productData['createdAt']),
            new DateTime($productData['updatedAt']),
            $productData['category_id']
        );   

        $productCategory = $productInstance->getCategory();

        echo('<pre>');
        var_dump($productCategory);
        echo('</pre>');

    } else {
        echo 'Le produit n\'a pas été trouvé!';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>


<?php

require_once 'Product.php';
require_once 'Category.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=draft-shop','root','Dyane198124//');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :category_id');
    $stmt->bindValue(':category_id', 4, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer les données sous forme de tableau associatif
    $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categoryData) {
        
        $categoryInstance = new Category(
            $categoryData['id'],
            $categoryData['name'],
            $categoryData['description'],
            new DateTime($categoryData['createdAt']),
            new DateTime($categoryData['updatedAt']),
        );

        $categoryProducts = $categoryInstance->getProduct();

        foreach ($categoryProducts as $product) {
            echo('<pre>');
            var_dump($product);
            echo('</pre>');  
        }
        

    } else {
        echo 'La catégorie n\'a pas été trouvé!';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>
<?php

class Product
{
    public function __construct(
        private ?int $id = null, 
        private ?string $name = null, 
        private ?string $photos = null,
        private ?float $price = null, 
        private ?string $description = null, 
        private ?int $quantity = null, 
        private ?DateTime $createdAt = null, 
        private ?DateTime $updatedAt = null, 
        private ?int $category_id = null
        ) {
       
        }

    public function getCategory() {
        
        $pdo = new PDO('mysql:host=localhost;dbname=draft-shop','root', 'Dyane198124//' );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :category_id');
        $stmt->bindValue(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->execute();

        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoryData) {
            return new Category(
                $categoryData['id'],
                $categoryData['name'],
                $categoryData['description'],
                new DateTime($categoryData['createdAt']),
                new DateTime($categoryData['updatedAt'])
            );
        } else {
            return null;
        }
    }

    // Getters
    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPhotos() : string
    {
        return $this->photos;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getCategoryId() : int
    {
        return $this->category_id;
    }

    // Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPhotos(string $photos)
    {
        $this->photos = $photos;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->created_at = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function setCategoryId(int $category_id)
    {
        $this->category_id = $category_id;
    }
}

?>
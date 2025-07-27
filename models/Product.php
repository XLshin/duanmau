<?php 

class Product
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        $sql = "SELECT products.*,categories.name AS categoryName FROM products LEFT JOIN categories ON products.category_id = categories.id";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne()
    {
        $sql = "SELECT products.*,categories.name AS categoryName FROM products LEFT JOIN categories ON products.category_id = categories.id
        WHERE products.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($image)
    {
        $sql = "
            INSERT INTO `products`(`id`, `name`, `description`, `price`, `category_id`, `brand`, `image`, `created_at`) VALUES
             (:id, :name, :description, :price, :category_id, :brand, :image, :created_at)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':brand', $_POST['brand']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':created_at', $_POST['created_at']);
        $stmt->execute();
    }
    
    public function update($image)
    {
        $sql = "
            UPDATE `products` SET `id`=:id,`name`=:name,`description`=:description,`price`=:price,`category_id`=:category_id,
            `brand`=:brand,`image`=:image,`created_at`=:created_at
            WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':brand', $_POST['brand']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':created_at', $_POST['created_at']);
        $stmt->execute();
    }
    public function delete()
    {
        $sql ="DELETE FROM `products` WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
    }
}
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
}
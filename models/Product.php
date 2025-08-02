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

    public function getOneProduct()
    {
        $sql = "SELECT products.*,categories.name AS categoryName FROM products LEFT JOIN categories ON products.category_id = categories.id
        WHERE products.id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProduct($image)
    {
        $sql = "
            INSERT INTO `products`(`name`, `description`, `price`, `category_id`, `brand`, `image`, `created_at`) 
            VALUES (:name, :description, :price, :category_id, :brand, :image, :created_at)
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':brand', $_POST['brand']);
        $stmt->bindParam(':image', $image); // ảnh truyền vào từ controller
        $created_at = date('Y-m-d H:i:s');
        $stmt->bindParam(':created_at', $created_at);
        $stmt->execute();
    }


    
    public function updateProduct($id, $name, $description, $price, $category_id, $brand, $image)
    {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price,
                category_id = :category_id, brand = :brand, image = :image WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':category_id' => $category_id,
            ':brand' => $brand,
            ':image' => $image
        ]);
    }

    public function deleteProduct()
    {
        $sql ="DELETE FROM `products` WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
    }
}
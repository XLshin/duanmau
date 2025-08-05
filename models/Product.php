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

    public function getOneProduct($id)
    {
        $sql = "SELECT p.*, c.name AS categoryName 
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Lấy danh sách size + tồn kho nếu có
        $sql_size = "SELECT size, quantity FROM inventory WHERE product_id = :id ORDER BY size ASC";
        $stmt_size = $this->conn->prepare($sql_size);
        $stmt_size->bindParam(':id', $id);
        $stmt_size->execute();
        $product['sizes'] = $stmt_size->fetchAll(PDO::FETCH_ASSOC);

        return $product;
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

        public function deleteProduct($id)
        {
            $sql ="DELETE FROM `products` WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

    public function searchByKeyword($keyword)
    {
        $sql = "SELECT p.*, c.name AS categoryName
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.name LIKE :keyword
            OR p.brand LIKE :keyword
            OR c.name LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'keyword' => '%' . $keyword . '%'
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsByCategory($category_id)
    {
        $sql = "SELECT * FROM products WHERE category_id = :category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function countProducts()
    {
        $sql = "SELECT COUNT(*) as total FROM products";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

}
<?php
class CartModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy giỏ hàng theo user_id
    public function getCartByUserId($user_id) {
        $sql = "SELECT c.*, p.name, p.image, p.price 
                FROM cart_items c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm vào giỏ
    public function addToCart($user_id, $product_id, $size, $quantity = 1) {
        // Kiểm tra xem đã có chưa
        $sql = "SELECT * FROM cart_items WHERE user_id = ? AND product_id = ? AND size = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $product_id, $size]);
        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($exists) {
            $sql = "UPDATE cart_items SET quantity = quantity + ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$quantity, $exists['id']]);
        } else {
            $sql = "INSERT INTO cart_items (user_id, product_id, size, quantity) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user_id, $product_id, $size, $quantity]);
        }
    }

    // Xóa sản phẩm khỏi giỏ
    public function removeItem($id) {
        $sql = "DELETE FROM cart_items WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    // Xóa toàn bộ giỏ hàng sau khi đặt hàng
    public function clearCart($user_id) {
        $sql = "DELETE FROM cart_items WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
    }
}

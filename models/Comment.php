<?php
class Comment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách bình luận theo product_id, mới nhất trước
    public function getCommentsByProductId($product_id)
    {
        $sql = "SELECT c.*, u.name AS user_name FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.product_id = :product_id
                ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bình luận mới
    public function addComment($product_id, $user_id, $content, $rating = 5)
    {
        $sql = "INSERT INTO comments (product_id, user_id, content, rating, created_at) 
                VALUES (:product_id, :user_id, :content, :rating, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'content' => $content,
            'rating' => $rating
        ]);
    }
    // Xóa bình luận theo id
    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $comment_id]);
    }

}

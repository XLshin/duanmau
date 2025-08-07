<?php
class ProductController
{
    public function Home()
    {
        $product = new ProductModel();
        $data = $product->getAllProduct();
        require_once './views/trangchu.php';
    }

    public function detailProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }
        $id = $_GET['id'];
        $productModel = new ProductModel();
        $commentModel = new Comment();

        $data = $productModel->getOneProduct($id);
        $comments = $commentModel->getCommentsByProductId($id);

        require_once './views/products/detail.php';
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                header("Location: " . BASE_URL . "?act=login");
                exit();
            }

            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['product_id'] ?? null;
            $content = trim($_POST['content'] ?? '');
            $rating = intval($_POST['rating'] ?? 5);
            if ($rating < 1 || $rating > 5) $rating = 5;

            if ($product_id && $content !== '') {
                $commentModel = new Comment();
                $commentModel->addComment($product_id, $user_id, $content, $rating);
            }
            header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
            exit();
        }
    }

    public function deleteComment()
    {
        if (!isset($_GET['id']) || !isset($_GET['product_id'])) {
            header("Location: " . BASE_URL);
            exit();
        }

        $comment_id = intval($_GET['id']);
        $product_id = intval($_GET['product_id']);

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "?act=login");
            exit();
        }

        $user = $_SESSION['user'];
        $commentModel = new Comment();

        $sql = "SELECT user_id FROM comments WHERE id = :id";
        $stmt = $commentModel->conn->prepare($sql);
        $stmt->execute(['id' => $comment_id]);
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$comment || ($user['role'] !== 'admin' && $user['id'] != $comment['user_id'])) {
            header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
            exit();
        }

        $commentModel->deleteComment($comment_id);
        header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
        exit();
    }

    public function searchProduct()
    {
        $keyword = $_GET['keyword'] ?? '';
        $results = [];

        if (!empty($keyword)) {
            $product = new ProductModel();
            $results = $product->searchByKeyword($keyword);
        }

        require_once './views/products/search_result.php';
    }

    public function viewByCategory()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }

        $category_id = $_GET['id'];
        $productModel = new ProductModel();
        $categoryModel = new Category();

        $products = $productModel->getProductsByCategory($category_id);
        $category = $categoryModel->getCategoryById($category_id);

        require_once './views/products/by_category.php';
    }
}

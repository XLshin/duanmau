<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $product = new Product();
        $data = $product ->getAllProduct();
        require_once './views/trangchu.php';
    }
    public function detailProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }
        $id = $_GET['id'];

        $productModel = new Product();
        $commentModel = new Comment();

        $data = $productModel->getOneProduct($id);

        // Lấy bình luận của sản phẩm
        $comments = $commentModel->getCommentsByProductId($id);

        require_once './views/detail.php';
    }

    public function insertProduct()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        require_once './views/admin/products/insert.php';
    }
    public function storeProduct()
    {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $price = $_POST['price'] ?? null;
        $category_id = $_POST['category_id'] ?? null;
        $brand = $_POST['brand'] ?? null;

        $image = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uploadFile($_FILES['image'], "imgproduct");
        }

        // Lưu chính xác đường dẫn này vào DB
        $product = new Product();
        $product->insertProduct($image);


        header("Location: " . BASE_URL);
        exit();
    }
    public function deleteProduct()
    {
        $id = $_GET['id'];
        $product = new Product();
        $data = $product->deleteProduct($id);
        header("Location: " . BASE_URL . "?act=admin-products");
        exit();

    }
    public function updateProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }
        $id = $_GET['id'];
        $product = new Product();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();

        require_once './views/admin/products/update.php'; // giống như insert dùng views/insert.php
    }

    public function editProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }

        $id = $_GET['id'];

        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $price = $_POST['price'] ?? null;
        $category_id = $_POST['category_id'] ?? null;
        $brand = $_POST['brand'] ?? null;

        $product = new Product();
        $oldData = $product->getOneProduct($id);

        $image = $oldData['image'] ?? null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uploadFile($_FILES['image'], "imgproduct");
        }

        $product->updateProduct($id, $name, $description, $price, $category_id, $brand, $image);

        header("Location: " . BASE_URL);
        exit();
    }
    public function searchProduct()
    {
        $keyword = $_GET['keyword'] ?? '';
        $product = new Product(); // Gọi đúng model Product
        $results = [];

        if (!empty($keyword)) {
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

        $productModel = new Product();
        $categoryModel = new Category();

        $products = $productModel->getProductsByCategory($category_id);
        $category = $categoryModel->getCategoryById($category_id);

        require_once './views/products/by_category.php';
    }
    
    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                // Chưa đăng nhập thì chuyển về trang đăng nhập
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
            // Quay lại trang chi tiết sản phẩm sau khi thêm bình luận
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

        // Kiểm tra quyền: chỉ user đăng nhập và admin mới được xóa (bạn có thể thêm kiểm tra quyền ở đây)
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "?act=login");
            exit();
        }

        // Ví dụ kiểm tra quyền đơn giản: user phải là admin hoặc là người comment đó
        $user = $_SESSION['user'];
        $commentModel = new Comment();

        // Lấy comment để check user_id
        $sql = "SELECT user_id FROM comments WHERE id = :id";
        $stmt = $commentModel->conn->prepare($sql);
        $stmt->execute(['id' => $comment_id]);
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$comment) {
            header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
            exit();
        }

        if ($user['role'] !== 'admin' && $user['id'] != $comment['user_id']) {
            // Không có quyền xóa
            header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
            exit();
        }

        // Thực hiện xóa
        $commentModel->deleteComment($comment_id);

        // Quay lại trang chi tiết sản phẩm
        header("Location: " . BASE_URL . "?act=detail&id=" . $product_id);
        exit();
    }

    public function listProduct()
{
    $productModel = new Product();
    $products = $productModel->getAllProduct(); // dùng đúng hàm bạn đã có
    require_once './views/admin/products/list.php';
}



}

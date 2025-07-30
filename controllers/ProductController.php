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
        $Product = new Product();
        $data = $Product->getOne();
        require_once './views/detail.php';
    }
    public function insertProduct()
    {
        $category = new Category();
        $data = $category->getAllProduct();
        require_once './views/insert.php';
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
            $image = uploadFile($_FILES['image'], "product");
        }

        if (!$name || !$price || !$category_id) {
            die("Thiếu dữ liệu bắt buộc: name, price, category_id");
        }

        $product = new Product();
        $product->insertProduct($name, $description, $price, $category_id, $brand, $image);

        header("Location: " . BASE_URL);
        exit();
    }
    public function deleteProduct()
    {
        $product = new Product();
        $data = $product->deleteProduct();
        header("Location: " . BASE_URL);

    }
}

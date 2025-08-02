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
        $data = $Product->getOneProduct();
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
        $product = new Product();
        $data = $product->deleteProduct();
        header("Location: " . BASE_URL);

    }
    public function updateProduct()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL);
            exit();
        }

        $product = new Product();
        $data_product = $product->getOneProduct();

        $category = new Category();
        $data_category = $category->getAllProduct();

        require_once './views/update.php'; // giống như insert dùng views/insert.php
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
        $oldData = $product->getOneProduct();

        $image = $oldData['image'] ?? null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uploadFile($_FILES['image'], "imgproduct");
        }

        $product->updateProduct($id, $name, $description, $price, $category_id, $brand, $image);

        header("Location: " . BASE_URL);
        exit();
    }


}

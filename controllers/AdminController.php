<?php
class AdminController
{
    // ----------- SẢN PHẨM -----------

    public function listProduct()
    {
        $productModel = new ProductModel();
        $products = $productModel->getAllProduct();
        require_once './views/admin/products/list.php';
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

        $product = new ProductModel();
        $product->insertProduct($image);

        header("Location: " . BASE_URL . "?act=admin-products");
        exit();
    }

    public function deleteProduct()
    {
        $id = $_GET['id'];
        $product = new ProductModel();
        $product->deleteProduct($id);
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
        $product = new ProductModel();
        $data_product = $product->getOneProduct($id);

        $category = new Category();
        $data_category = $category->getAllCategory();

        require_once './views/admin/products/update.php';
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

        $product = new ProductModel();
        $oldData = $product->getOneProduct($id);
        $image = $oldData['image'] ?? null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uploadFile($_FILES['image'], "imgproduct");
        }

        $product->updateProduct($id, $name, $description, $price, $category_id, $brand, $image);
        header("Location: " . BASE_URL . "?act=admin-products");
        exit();
    }

    // ----------- BÌNH LUẬN -----------

    public function listComments()
    {
        $commentModel = new Comment();
        $comments = $commentModel->getAllComments();
        require_once './views/admin/comments/listcomments.php';
    }

    public function deleteComment()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL . "?act=admin-comments");
            exit();
        }

        $comment_id = intval($_GET['id']);
        $commentModel = new Comment();
        $commentModel->deleteComment($comment_id);

        header("Location: " . BASE_URL . "?act=admin-comments");
        exit();
    }
}
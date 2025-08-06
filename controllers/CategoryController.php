<?php
class CategoryController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = $this->categoryModel->getAllCategory();
        require_once './views/admin/category/list.php';
    }

    // Hiển thị form thêm
    public function insert()
    {
        require_once './views/admin/category/insert.php';
    }

    // Xử lý thêm
    public function store()
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        $this->categoryModel->createCategory($name, $description);
        header('Location: index.php?act=admin-categories');
        exit();
    }

    // Hiển thị form sửa
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?act=admin-categories');
            exit();
        }

        $category = $this->categoryModel->getCategoryById($id);
        require_once './views/admin/category/update.php';
    }

    // Xử lý cập nhật
    public function update()
    {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        $this->categoryModel->updateCategory($id, $name, $description);
        header('Location: index.php?act=admin-categories');
        exit();
    }

    // Xóa danh mục
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->categoryModel->deleteCategory($id);
        }
        header('Location: index.php?act=admin-categories');
        exit();
    }
}
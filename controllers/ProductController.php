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
}

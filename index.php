<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/Product.php';
require_once './models/Category.php';



// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'=>(new ProductController())->Home(),
    'detail'         => (new ProductController)->detailProduct(),
    'insert'         => (new ProductController)->insertProduct(),
    'storeProduct'   => (new ProductController)->storeProduct(),
    'deleteProduct'  => (new ProductController)->deleteProduct(),
    'update'         => (new ProductController)->updateProduct(),
    'editProduct'    => (new ProductController)->editProduct(),
};
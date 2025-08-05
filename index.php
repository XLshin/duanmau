<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/CartController.php';
require_once './controllers/UserController.php';




// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/User.php';
require_once './models/Comment.php';




// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Product
    '/'               => (new ProductController())->Home(),
    'detail'          => (new ProductController)->detailProduct(),
    'insert'          => (new ProductController)->insertProduct(),
    'storeProduct'    => (new ProductController)->storeProduct(),
    'deleteProduct'   => (new ProductController)->deleteProduct(),
    'update'          => (new ProductController)->updateProduct(),
    'editProduct'     => (new ProductController)->editProduct(),
    'search'          => (new ProductController)->searchProduct(),
    'category'        => (new ProductController)->viewByCategory(),

    // User
    'login'           => (new UserController)->login(),
    'handle-login'    => (new UserController)->handleLogin(),
    'register'        => (new UserController)->register(),
    'handle-register' => (new UserController)->handleRegister(),
    'logout'          => (new UserController)->logout(),
    'profile'         => (new UserController)->profile(),
    'update-profile'  => (new UserController)->updateProfile(),
    'admin-users'     => (new UserController)->listCustomer(),
    'admin-user-delete' => (new UserController)->deleteCustomer(),
    'add-comment' => (new ProductController)->addComment(),
    'delete-comment' => (new ProductController)->deleteComment(),

    // Cart
    'cart'            => (new CartController)->index(),
    'add-cart'     => (new CartController)->add(),
    'remove-cart'     => (new CartController)->remove(),
    'orders' => print("không có đâu"),



    
};


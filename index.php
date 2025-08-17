    <?php 
    // Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

    // Require file Common
    require_once './commons/env.php'; // Khai báo biến môi trường
    require_once './commons/function.php'; // Hàm hỗ trợ

    // Require toàn bộ file Controllers
    require_once './controllers/ProductController.php';
    require_once './controllers/CartController.php';
    require_once './controllers/UserController.php';
    require_once './controllers/CategoryController.php';
    require_once './controllers/AdminController.php';






    // Require toàn bộ file Models
    require_once './models/Product.php';
    require_once './models/Category.php';
    require_once './models/User.php';
    require_once './models/Comment.php';




    // Route
    $act = $_GET['act'] ?? '/';


    // Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

    match ($act) {
    // --- SẢN PHẨM (người dùng) ---
        '/'               => (new ProductController())->Home(),
        'detail'          => (new ProductController())->detailProduct(),
        'search'          => (new ProductController())->searchProduct(),
        'category'        => (new ProductController())->viewByCategory(),

        // --- BÌNH LUẬN (người dùng) ---
        'add-comment'     => (new ProductController())->addComment(),
        'delete-comment'  => (new ProductController())->deleteComment(),

        // --- NGƯỜI DÙNG ---
        'login'           => (new UserController())->login(),
        'handle-login'    => (new UserController())->handleLogin(),
        'register'        => (new UserController())->register(),
        'handle-register' => (new UserController())->handleRegister(),
        'logout'          => (new UserController())->logout(),
        'profile'         => (new UserController())->profile(),
        'update-profile'  => (new UserController())->updateProfile(),

        // --- GIỎ HÀNG ---
        'cart'            => (new CartController())->index(),
        'add-cart'        => (new CartController())->add(),
        'remove-cart'     => (new CartController())->remove(),
        'orders'          => print("không có đâu"), // chưa xử lý

        // --- ADMIN  ---
        // Quản lý sản phẩm
        'admin-products'       => (new AdminController())->listProduct(),
        'insertProduct'        => (new AdminController())->insertProduct(),
        'storeProduct'         => (new AdminController())->storeProduct(),
        'updateProduct'        => (new AdminController())->updateProduct(),
        'editProduct'          => (new AdminController())->editProduct(),
        'deleteProduct'        => (new AdminController())->deleteProduct(),

        // Quản lý bình luận
        'admin-comments'       => (new AdminController())->listComments(),
        'admin-comment-delete' => (new AdminController())->deleteComment(),

        // Quản lý người dùng
        'admin-users'          => (new UserController())->listCustomer(),
        'admin-user-delete'    => (new UserController())->deleteCustomer(),
        'admin-user-lock'      => (new AdminController())->lockUser(),
        'admin-user-unlock'    => (new AdminController())->unlockUser(),

        // Quản lý danh mục
        'admin-categories'         => (new CategoryController())->index(),
        'admin-category-insert'    => (new CategoryController())->insert(),
        'admin-category-store'     => (new CategoryController())->store(),
        'admin-category-edit'      => (new CategoryController())->edit(),
        'admin-category-update'    => (new CategoryController())->update(),
        'admin-category-delete'    => (new CategoryController())->delete(),
        
    };



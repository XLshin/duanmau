<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once './models/User.php';

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Hiển thị form đăng ký
    public function register()
    {
        require_once './views/accounts/register.php';
    }

    // Xử lý form đăng ký
    public function handleRegister()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        if ($this->userModel->findByEmail($email)) {
            $_SESSION['error'] = "Email đã tồn tại.";
            header("Location: " . BASE_URL . "?act=register");
            exit;
        }

        // Lưu mật khẩu thẳng (không băm)
        $plainPassword = $password;

        $this->userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => $plainPassword,
            'phone' => $phone,
            'address' => $address,
            'role' => 'customer',
        ]);

        $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
        header("Location: " . BASE_URL . "?act=login");
        exit;
    }

    // Hiển thị form đăng nhập
    public function login()
    {
        require_once './views/accounts/login.php';
    }

    // Xử lý đăng nhập
   public function handleLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if ($user && $password === $user['password']) {
            // Lưu thông tin cần thiết vào session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];

            header("Location: " . BASE_URL);
            exit;
        } else {
            $_SESSION['error'] = "Email hoặc mật khẩu không đúng!";
            header("Location: " . BASE_URL . "?act=login");
            exit;
        }
    }
    // Đăng xuất
    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }

    // Hiển thị thông tin tài khoản người dùng
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "?act=login");
            exit;
        }

        $user = $this->userModel->findById($_SESSION['user']['id']);
        require_once './views/accounts/profile.php';
    }

    // Danh sách khách hàng
    public function listCustomer()
    {
        $users = $this->userModel->getAllCustomers();
        require_once './views/admin/users/index.php';
    }

    // Xóa khách hàng
    public function deleteCustomer()
    {
        if (!isset($_GET['id'])) {
            header("Location: " . BASE_URL . "?act=admin-users");
            exit();
        }

        $this->userModel->deleteUser($_GET['id']);
        header("Location: " . BASE_URL . "?act=admin-users");
        exit();
    }
    // Xử lý cập nhật thông tin tài khoản
    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "?act=login");
            exit;
        }

        $id = $_SESSION['user']['id'];
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        $result = $this->userModel->updateProfile($id, [
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ]);


        if ($result) {
            $_SESSION['success'] = "Cập nhật thông tin thành công!";
            $_SESSION['user']['name'] = $name; // Cập nhật lại session nếu tên thay đổi
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi cập nhật!";
        }

        header("Location: " . BASE_URL . "?act=profile");
        exit;
    }

}

<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php 
require_once './models/User.php';
require_once './models/Product.php';

$userModel = new User();
$productModel = new Product();

$totalUsers = $userModel->countUsers();
$totalProducts = $productModel->countProducts();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản Trị Hệ Thống</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    header {
      background: #2c3e50;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      margin-top: 10px;
      padding: 0;
    }

    nav li {
      margin: 0 15px;
    }

    nav a {
      text-decoration: none;
      color: white;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    main {
      padding: 30px;
      background-color: #ffffff;
      max-width: 1100px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    h2 {
      color: #1d2c46;
      margin-bottom: 20px;
      text-align: center;
    }

    .dashboard-cards {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 40px;
    }

    .card {
      background-color: #34495e;
      color: white;
      padding: 30px;
      border-radius: 8px;
      flex: 1;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .card h3 {
      font-size: 28px;
      margin: 0;
    }

    .card p {
      margin-top: 10px;
      font-size: 16px;
      color: #ecf0f1;
    }

    footer {
      background: #2c3e50;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 30px;
    }
  </style>
</head>
<body>

<header>
  <h1>Quản Trị Hệ Thống</h1>
  <nav>
    <ul>
      <li><a href="<?= BASE_URL ?>?act=admin-users">Người dùng</a></li>
      <li><a href="<?= BASE_URL ?>?act=admin-products">Sản phẩm</a></li>
      <li><a href="<?= BASE_URL ?>?act=admin-categories">Danh mục</a></li>
      <li><a href="<?= BASE_URL ?>?act=admin-comments">Bình luận</a></li>
      <li><a href="<?= BASE_URL ?>">Trang chính</a></li>
      <?php if (isset($_SESSION['user'])): ?>
        <li><a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<main>
  <h2>Thống kê nhanh</h2>
  <div class="dashboard-cards">
    <div class="card">
      <h3><?= $totalProducts ?></h3>
      <p>Sản phẩm</p>
    </div>
    <div class="card">
      <h3><?= $totalUsers ?></h3>
      <p>Người dùng</p>
    </div>
    <div class="card">
      <h3>0</h3>
      <p>Đơn hàng</p>
    </div>
  </div>
</main>



</body>
</html>

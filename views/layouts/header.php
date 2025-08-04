<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giày Sneaker Shop</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background-color: #111;
            color: white;
            padding: 15px 30px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        ul.nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        ul.nav-links li a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        ul.nav-links li a:hover {
            background-color: #444;
            border-radius: 4px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-cart {
            background-color: #e91e63;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-cart:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">FakeSneaker</div>
            <ul class="nav-links">
                <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                <li><a href="<?= BASE_URL ?>?act=products">Sản phẩm</a></li>
                <li><a href="<?= BASE_URL ?>?act=orders">Đơn hàng</a></li>
                <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href="<?= BASE_URL ?>?act=login">Đăng nhập</a></li>
                    <li><a href="<?= BASE_URL ?>?act=register">Đăng ký</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>?act=profile">Tài khoản</a></li>
                    <li><a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a></li>
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                        <li><a href="<?= BASE_URL ?>?act=admin">Quản trị</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <div class="nav-right">
                <a href="<?= BASE_URL ?>?act=cart" class="btn-cart">🛒 Giỏ hàng</a>
            </div>
        </nav>
    </header>

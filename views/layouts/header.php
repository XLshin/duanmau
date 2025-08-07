<?php if (session_status() === PHP_SESSION_NONE) session_start(); 
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
?>
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
            padding: 12px 30px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left,
        .nav-center,
        .nav-right {
            display: flex;
            align-items: center;
        }

        .nav-left {
            gap: 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-center {
            flex: 1;
            justify-content: center;
            gap: 25px;
        }

        .nav-center ul {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
            position: relative; /* <-- rất quan trọng */
        }


        .nav-center ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .nav-center ul li a:hover {
            background-color: #444;
            border-radius: 4px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 4px;
            overflow: hidden;
        }

        .search-box input {
            padding: 6px 10px;
            border: none;
            outline: none;
            font-size: 14px;
            width: 200px;
        }

        .search-box button {
            background-color: #e91e63;
            border: none;
            padding: 6px 10px;
            color: #fff;
            cursor: pointer;
        }

        .btn-cart {
            background-color: #e91e63;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            margin-left: 20px;
        }

        .btn-cart:hover {
            background-color: #c2185b;
        }

        .dropdown {
            position: relative;
        }
.dropdown {
    position: relative;
}

.dropdown .dropbtn {
    display: inline-block;
    color: white;
    text-decoration: none;
    padding: 8px 12px;
}

.dropdown-content {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #222;
    min-width: 180px;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 6px 0;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: all 0.2s ease;
}

.dropdown:hover .dropdown-content,
.dropdown:focus-within .dropdown-content {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.dropdown-content li a {
    display: block;
    padding: 10px 16px;
    color: white;
    text-decoration: none;
}

.dropdown-content li a:hover {
    background-color: #444;
}


        .dropdown-content li a:hover {
            background-color: #444;
        }

        .dropdown .dropdown-content {
            display: none; /* ẩn ban đầu */
            position: absolute;
            background-color: #222;
            min-width: 180px;
            top: 40px;
            left: 0;
            border-radius: 4px;
            z-index: 1000;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .profile-dropdown {
            position: relative;
            margin-left: 20px;
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 35px;
            background-color: #222;
            min-width: 160px;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            z-index: 1000;
        }

        .profile-dropdown-content a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
        }

        .profile-dropdown-content a:hover {
            background-color: #444;
        }

        .profile-dropdown.active .profile-dropdown-content {
            display: block;
        }
        /* Dropdown container */
.dropdown {
    position: relative;
}

/* Nút chính */
.dropdown .dropbtn {
    display: inline-block;
    color: white;
    text-decoration: none;
    padding: 8px 12px;
}

/* Menu con */
.dropdown .dropdown-content {
    display: none;
    position: absolute;
    top: 100%; /* nằm sát dưới nút danh mục */
    left: 0;
    background-color: #222;
    min-width: 180px;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    z-index: 1000;
    padding: 6px 0;
    transition: all 0.2s ease-in-out;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}

/* Khi hover toàn bộ block dropdown */
.dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

/* Link bên trong */
.dropdown-content li a {
    display: block;
    padding: 10px 16px;
    color: white;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.dropdown-content li a:hover {
    background-color: #444;
}

    </style>
    <script>
        function toggleDropdown() {
            document.getElementById('profileDropdown').classList.toggle('active');
        }

        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown && !dropdown.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <!-- Left -->
            <div class="nav-left">
                <div class="logo">FakeSneaker</div>
            </div>

            <!-- Center -->
            <div class="nav-center">
                <ul>
                    <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
<li class="dropdown">
    <a href="#" class="dropbtn">Danh mục</a>
    <ul class="dropdown-content">
        <?php foreach ($categories as $cat): ?>
            <li><a href="<?= BASE_URL ?>?act=category&id=<?= $cat['id'] ?>">
                <?= htmlspecialchars($cat['name']) ?>
            </a></li>
        <?php endforeach; ?>
    </ul>
</li>

                    <li><a href="<?= BASE_URL ?>?act=orders">Đơn Hàng</a></li>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <li><a href="<?= BASE_URL ?>?act=admin-products">Quản trị</a></li>
                        <?php endif; ?>
                    </ul>

                <!-- Search form -->
                <form class="search-box" action="<?= BASE_URL ?>?act=search" method="GET">
                    <input type="hidden" name="act" value="search">
                    <input type="text" name="keyword" placeholder="Tìm sản phẩm...">
                    <button type="submit">🔍</button>
                </form>
            </div>

            <!-- Right -->
            <div class="nav-right">
                <a href="<?= BASE_URL ?>?act=cart" class="btn-cart">🛒 Giỏ hàng</a>

                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="<?= BASE_URL ?>?act=login" style="color: white; margin-left: 16px;">Đăng nhập</a>
                <?php else: ?>
                    <div class="profile-dropdown" id="profileDropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown()" style="color: white;">
                            👤 <?= htmlspecialchars($_SESSION['user']['name']) ?>
                        </a>
                        <div class="profile-dropdown-content">
                            <a href="<?= BASE_URL ?>?act=profile">Thông tin cá nhân</a>
                            <a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

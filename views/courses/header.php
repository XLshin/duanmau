<!-- header.php -->
<header>
    <style>
        /* Cấu hình chung */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        h1 {
            font-size: 36px;
            color: #333;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header .logo h1 {
            margin-bottom: 10px;
        }

        header nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        header nav ul li a:hover {
            color: #f4a261;
        }
    </style>
    <div class="logo">
        <h1>Giày Thời Trang</h1>
    </div>
    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>">Trang Chủ</a></li>
            <li><a href="#">Giới Thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li><a href="#">Đăng Nhập</a></li>
        </ul>
    </nav>
</header>

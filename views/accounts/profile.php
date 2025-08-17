<?php require_once './views/layouts/header.php'; ?>

<div style="max-width: 600px; margin: 50px auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h2>Cập nhật thông tin tài khoản</h2>

    <?php if (!empty($_SESSION['success'])): ?>
        <div style="color: green; margin-bottom: 10px;"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <div style="color: red; margin-bottom: 10px;"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>?act=update-profile" method="post">
        <div style="margin-bottom: 15px;">
            <label for="name">Họ và tên:</label><br />
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email:</label><br />
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required style="width: 100%; padding: 8px;" readonly>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password">Mật Khẩu:</label><br />
            <input type="text" name="password" id="password" value="<?= htmlspecialchars($user['password']) ?>" required style="width: 100%; padding: 8px;" >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="phone">Số điện thoại:</label><br />
            <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($user['phone']) ?>" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="address">Địa chỉ:</label><br />
            <input type="text" name="address" id="address" value="<?= htmlspecialchars($user['address']) ?>" style="width: 100%; padding: 8px;">
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #2c3e50; color: white; border: none; border-radius: 6px; cursor: pointer;">
            Cập nhật
        </button>
    </form>
</div>



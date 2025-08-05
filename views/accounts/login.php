<?php require_once './views/layouts/header.php'; ?>

<style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .auth-wrapper {
        max-width: 500px;
        margin: 80px auto;
        padding: 24px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .auth-wrapper h2 {
        text-align: center;
        margin-bottom: 24px;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .form-row {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
    }

    .form-row label {
        width: 120px;
        font-size: 14px;
        color: #444;
        margin-right: 10px;
    }

    .form-row input {
        flex: 1;
        height: 36px;
        padding: 6px 10px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn {
        width: 100%;
        height: 38px;
        background-color: #404040ff;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: #232323ff;
    }

    .btn-link {
        display: block;
        text-align: center;
        margin-top: 12px;
        font-size: 13px;
        color: #555;
        text-decoration: none;
    }

    .alert {
        font-size: 13px;
        margin-bottom: 12px;
        padding: 8px 12px;
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 4px;
    }
</style>

<div class="auth-wrapper">
    <h2>Đăng nhập</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert" style="background-color:#d4edda; color:#155724; padding:10px; margin-bottom:10px; border-radius:4px;">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert" style="background-color:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px; border-radius:4px;">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

    <form action="<?= BASE_URL ?>?act=handle-login" method="post">
        <div class="form-row">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-row">
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="btn">Đăng nhập</button>
        <a href="<?= BASE_URL ?>?act=register" class="btn-link">Chưa có tài khoản?</a>
    </form>
</div>

<?php require_once './views/layouts/footer.php'; ?>

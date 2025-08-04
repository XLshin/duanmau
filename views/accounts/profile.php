<?php require_once './views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Thông tin tài khoản</h2>

    <?php if (isset($user)): ?>
        <ul class="list-group mt-3">
            <li class="list-group-item"><strong>Họ tên:</strong> <?= htmlspecialchars($user['name']) ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
            <li class="list-group-item"><strong>Điện thoại:</strong> <?= htmlspecialchars($user['phone']) ?></li>
            <li class="list-group-item"><strong>Địa chỉ:</strong> <?= htmlspecialchars($user['address']) ?></li>
            <li class="list-group-item"><strong>Vai trò:</strong> <?= htmlspecialchars($user['role']) ?></li>
        </ul>
    <?php else: ?>
        <div class="alert alert-warning mt-3">Không tìm thấy thông tin người dùng.</div>
    <?php endif; ?>
</div>

<?php require_once './views/layouts/footer.php'; ?>

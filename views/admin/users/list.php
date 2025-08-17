<?php require_once './views/layouts/layoutAdmin.php'; ?>

<style>
    h2 {
        margin-bottom: 20px;
        color: #2c3e50;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    table th, table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        font-size: 14px;
    }

    table tr:nth-child(even) {
        background-color: #fafafa;
    }

    /* Badge trạng thái */
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }
    .status-active {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .status-locked {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Nút hành động */
    .btn-action {
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }
    .btn-lock {
        background-color: #e74c3c;
        color: white;
    }
    .btn-unlock {
        background-color: #28a745;
        color: white;
    }
    .btn-action:hover {
        opacity: 0.9;
    }
</style>

<h2>Danh sách người dùng</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td><?= htmlspecialchars($user['address']) ?></td>
                <td>
                    <?php if ($user['status'] == 1): ?>
                        <span class="status-badge status-active">Hoạt động</span>
                    <?php else: ?>
                        <span class="status-badge status-locked">Đã khóa</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($user['status'] == 1): ?>
                        <a href="?act=admin-user-lock&id=<?= $user['id'] ?>" class="btn-action btn-lock">Khóa</a>
                    <?php else: ?>
                        <a href="?act=admin-user-unlock&id=<?= $user['id'] ?>" class="btn-action btn-unlock">Mở khóa</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

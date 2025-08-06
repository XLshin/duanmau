<?php require_once './views/layouts/layoutAdmin.php'; ?>

<style>
    h2 {
        margin-bottom: 20px;
        color: #2c3e50;
        text-align: center;
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
        background-color: #f0f0f0;
        font-weight: bold;
        color: #333;
    }

    table tr:nth-child(even) {
        background-color: #fafafa;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 13px;
    }

    .btn-delete:hover {
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
                    <a href="<?= BASE_URL ?>?act=admin-user-delete&id=<?= $user['id'] ?>"
                       class="btn-delete"
                       onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
